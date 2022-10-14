<?php

namespace App\Http\Controllers;

use App\Player;
use App\Staff;
use App\Recruit;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    // ログインページ遷移
    public function index () {

        $userId = Auth::id();
        $type_id = Auth::user()->select('type_id')->where('id', $userId)->get();

        if ($type_id[0]['type_id']=='0') {
            return view('players./home');
        } else if ($type_id[0]['type_id']=='1') {
            return view('staffs./home');
        }
    }

    // マイページ
    public function mypaige () {
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        $contacts = Auth::user()->contact()->with('recruit')->where('user_id', Auth::id())->get()->toArray();
        // join句

        if (empty($players)) {
            return view('players./create');
        }else{
            return view('players./mypaige', [
                'players' => $players,
                'contacts' => $contacts,
            ]);
        }
    }

    public function staffs_mypaige () {
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        $recruits = Auth::user()->recruit()->with(['position', 'sex'])->get()->toArray();

        if (empty($posts)) {
            return view('staffs./create');
        } else {
            return view('staffs./mypaige', [
                'posts' => $posts,
                'recruits' => $recruits,
            ]);
        }
    }

    // アップデート
    public function update () {
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        
        return view('players./update', [
                'players' => $players,
            ]);
    }

    public function staffs_update () {
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        
        return view('staffs./update', [
                'posts' => $posts,
            ]);
    }

    // 検索結果ページ
    public function search() {
        if (!empty($_POST['hometown'] && !empty($_POST['position_id']) && !empty($_POST['league_id']) && !empty($_POST['sex_id']))) {
            $keywords = DB::table('staffs')->join('recruits', 'staffs.user_id', '=', 'recruits.user_id')
            ->where('hometown', 'like', '%'.$_POST['hometown'].'%')
            ->where('recruits.position_id', $_POST['position_id'])
            ->where('staffs.league_id', $_POST['league_id'])
            ->where('recruits.sex_id', $_POST['sex_id'])->get()->toArray();
            return $keywords;
        } else {
            return '正常';
        }

        // if (!empty($_POST['league_id'])) {
        //     $league_id = DB::table('staffs')->join('leagues', 'staffs.league_id', '=', 'leagues.id')->where('league_id', $_POST['league_id'])->get();
        // }

        // if (!empty($_POST['position_id'])) {
        //     $position_id = DB::table('recruits')->join('positions', 'recruits.position_id', '=', 'positions.id')->where('position_id', $_POST['position_id'])->get();
        // }

        // if (!empty($_POST['sex_id'])) {
        //     $sex_id = DB::table('recruits')->join('sexes', 'recruits.sex_id', '=', 'sexes.id')->where('sex_id', $_POST['sex_id'])->get();
        // }


        
    }

    public function staffs_search() {
        return view('staffs./search');
    }

    public function detail() {
        return view('players./detail');
    }

    public function staffs_detail() {
        return view('staffs./detail');
    }

    public function apply() {

        // $players = Auth::user()->player()->where('del_flg', 0)->get();
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        
        return view('players./apply', [
                'players' => $players,
            ]);
    }

    public function recruit () {
        $staffs = Auth::user()->staff()->where('del_flg', 0)->get()->toArray();

        return view('staffs./recruit', [
            'staffs' => $staffs,
        ]);
    }

    public function good() {
        return view('staffs./good');
    }

    public function applicant() {
        return view('staffs./applicant');
    }

}
