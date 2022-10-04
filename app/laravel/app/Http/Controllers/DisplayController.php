<?php

namespace App\Http\Controllers;

use App\Player;
use App\Staff;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index () {
        return view('players./home');
    }

    public function mypaige () {
        $players = Auth::user()->player()->where('del_flg', 0)->get()->toArray();
        if (empty($players)) {
            return view('players./create');
        }else{
            return view('players./mypaige', [
                'players' => $players,
            ]);
        }
    }

    public function update () {
        $players = Auth::user()->player()->where('del_flg', 0)->get();
        
        return view('players./update', [
                'players' => $players,
            ]);
    }

    public function search() {
        return view('players./search');
    }

    public function detail() {
        return view('players./detail');
    }

    public function apply() {

        // $players = Auth::user()->player()->where('del_flg', 0)->get();
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get();
        
        return view('players./apply', [
                'players' => $players,
            ]);
    }

}
