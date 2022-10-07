<?php

namespace App\Http\Controllers;

use App\Player;
use App\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function index () {

        $userId = Auth::id();
        $type_id = Auth::user()->select('type_id')->where('id', $userId)->get();

        if ($type_id=='0') {
            return view('players./home');
        } else if ($type_id=='1') {
            return view ('staffs./home');
        } else{
            return $type_id.$userId."<br>".'error発生';
        }
    }

    public function mypaige () {
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get();

        if (empty($players)) {
            return view('players./create');
        }else{
            return view('players./mypaige', [
                'players' => $players,
            ]);
        }
    }

    public function staffs_mypaige () {
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get();

        if (empty($posts)) {
            return view('staffs./create');
        } else {
            return view('staffs./mypaige', [
                'posts' => $posts,
            ]);
        }
    }

    public function update () {
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get();
        
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
