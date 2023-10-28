<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Card;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use Illuminate\Support\Facades\File;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $format = $request->input('format');
        $id = $request->input('id');
        $card = Card::find($id);

        $text['Название'] = $card->title;
        $text['Текст'] = $card->text;

        if ($format === 'pdf' || $format === 'docx') {
            $tempDir = storage_path('app/temp');
            if (!File::exists($tempDir)) {
                File::makeDirectory($tempDir);
            }

            $exportPath = $tempDir . '/export.' . $format;
            if ($format === 'pdf') {
                $this->exportToPdf($text, $exportPath);
            } elseif ($format === 'docx') {
                $this->exportToDocx($text, $exportPath);
            }

            $zipPath = $tempDir . '/export.zip';
            $this->createZipArchive($zipPath, $exportPath);

            File::delete($exportPath);

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        return response()->json(['error' => 'Unsupported format'], 400);
    }

    private function exportToPdf($text, $exportPath)
    {
        $data = $text;
        $view = view('export_pdf', compact('data'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('a4');
        $dompdf->render();
        $output = $dompdf->output();

        File::put($exportPath, $output);
    }

    private function exportToDocx($data, $exportPath)
    {
        $phpWord = new PhpWord();

        $section = $phpWord->addSection();
        $title = $data['Название'];
        $text = strip_tags($data['Текст']);
        $section->addText("Название: {$title}");
        $section->addText("Текст: {$text}");

        // Сохраняем документ
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($exportPath);
    }

    private function createZipArchive($zipPath, $exportPath)
    {
        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE) === true) {
            $zip->addFile($exportPath, 'export.' . pathinfo($exportPath, PATHINFO_EXTENSION));
            $zip->close();
        }
    }
}
