<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user() ? $userId = auth()->user()->id : null;
        $cards = Card::query()->cursor()->where('user_id', '=', $userId);

        return view("index", compact("cards"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TextRequest $request)
    {
        $text = '';
        $data = $request->validated();

        foreach ($data as $key => $string) {
            if ($key !== 'title') {
                $text .= $string . " ";
            }
        }

        $card = mb_convert_encoding(trim($text), 'UTF-8');
        $title = mb_convert_encoding(trim($data['title']), 'UTF-8');

        Card::create(['title' => $title, 'text' => $card, 'user_id' => 1]);

        return redirect()->route('index_page')->with('success', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
