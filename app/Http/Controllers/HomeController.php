<?php

namespace App\Http\Controllers;

use App\Models\Card;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cards = Card::query()->cursor();

        if (auth()->user()) {
            return view("home", compact("cards"));
        } else {
            return redirect()->route('login');
        }
    }
}
