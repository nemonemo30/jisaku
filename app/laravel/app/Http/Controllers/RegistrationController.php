<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Database\Eloquent\Collection;
use App\Player;
use App\Staff;
use App\Recruit;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    // 新規登録
    public function create (CreateData $request) {
        $player = new Player;
        $columns = ['name', 'position_id', 'height', 'weight', 'age', 'sex_id', 'video', 'comment'];

        foreach ($columns as $column) {
            $player->$column = $request->$column;
        }

        Auth::user()->player()->save($player);

        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        return view('players./mypaige', [
            'players' => $players,
        ]);
    }

    public function staffs_create (CreateData $request) {
        $staff = new Staff;
        $columns = ['name', 'hometown', 'league_id', 'comment'];

        foreach ($columns as $column) {
            $staff->$column = $request->$column;
        }

        Auth::user()->staff()->save($staff);
        $recruits = Auth::user()->recruit()->with(['position', 'sex'])->get()->toArray();

        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        return view('staffs./mypaige', [
            'posts' => $posts,
            'recruits' => $recruits,
        ]);
    }

    // アップデート
    public function update (CreateData $request) {
        $player = new Player;
        $target = $player->find(Auth::user()->player()->select('id')->get());

        $columns = ['name', 'position_id', 'height', 'weight', 'age', 'sex_id', 'video', 'comment'];
        foreach ($columns as $column) {
            $target[0]->$column = $request->$column;
        }

        Auth::user()->player()->save($target[0]);

        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get();
        
        return view('players./mypaige', [
            'players' => $players,
        ]);
    }
    
    public function staffs_update (CreateData $request) {
        $staff = new Staff;
        $target = $staff->find(Auth::user()->staff()->select('id')->get());
        
        $columns = ['name', 'hometown', 'league_id', 'comment'];
        foreach ($columns as $column) {
            $target[0]->$column = $request->$column;
        }
        Auth::user()->staff()->save($target[0]);
        
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        $recruits = Auth::user()->recruit()->with(['position', 'sex'])->get()->toArray();
        return view('staffs./mypaige', [
            'posts' => $posts,
            'recruits' => $recruits,
        ]);
    }

    // 募集
    public function recruit (CreateData $request) {
        $recruit = new Recruit;
        $columns = ['name', 'position_id', 'sex_id', 'active', 'comment'];

        foreach ($columns as $column) {
            $recruit->$column = $request->$column;
        }

        Auth::user()->recruit()->save($recruit);

        $recruits = Auth::user()->recruit()->with(['position', 'sex'])->get()->toArray();
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        return view('staffs./mypaige', [
            'posts' => $posts,
            'recruits' => $recruits,
        ]);
    }

    public function delete (int $id, CreateData $request) {
        $recruit = new Recruit;
        $target = $recruit->find($id);

        $target->delete();

        $recruits = Auth::user()->recruit()->with(['position', 'sex'])->get()->toArray();
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        return view('staffs./mypaige', [
            'posts' => $posts,
            'recruits' => $recruits,
        ]);  
    }
}