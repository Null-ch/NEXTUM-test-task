@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <table id="table" class="table table-bordered col-12">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Название</th>
                                <th class="text-center">Текст</th>
                                <th colspan="2" class="text-center">Экспорт</th>
                            </tr>
                        </thead>
                        <tbody id="tablecontents">
                            @foreach ($cards as $card)
                                <tr>
                                    <td class="text-center">{{ $card->id }}</td>
                                    <td class="text-center">{{ strip_tags($card->title) }}</td>
                                    <td class="text-center">{!! $card->text !!}</td>
                                    <td class="text-center p-5">
                                        <a href="{{ route('export', ['format' => 'pdf', 'id' => $card->id]) }}" class="btn btn-primary">Экспорт в PDF</a>
                                    </td>
                                    <td class="text-center p-5">
                                        <a href="{{ route('export', ['format' => 'docx', 'id' => $card->id]) }}" class="btn btn-primary">Экспорт в DOCX</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection