<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Http\Requests\CreateApplyData;
use App\Http\Requests\CreateRecruitData;
use App\Http\Requests\CreateStaffData;
use Illuminate\Database\Eloquent\Collection;
use App\Player;
use App\User;
use App\Staff;
use App\Recruit;
use App\Contact;
use App\Good;
use App\Chat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    // 新規登録
    public function create (CreateData $request) {
        $player = new Player;
        $columns = ['name', 'position_id', 'height', 'weight', 'age', 'sex_id', 'comment'];

        foreach ($columns as $column) {
            $player->$column = $request->$column;
        }

        // 画像ファイルの保存場所指定
        $img = $request->file('video');
        $img = $img->getClientOriginalName();

        $player->video = $request->file('video')->storeAs('public/image', $img);

        Auth::user()->player()->save($player);

        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        return view('players./mypaige', [
            'players' => $players,
        ]);
    }

    public function staffs_create (CreateStaffData $request) {
        $staff = new Staff;
        $columns = ['name', 'hometown', 'league_id', 'comment'];

        foreach ($columns as $column) {
            $staff->$column = $request->$column;
        }

        // 画像ファイルの保存場所指定
        $img = $request->file('video');
        $img = $img->getClientOriginalName();

        $staff->video = $request->file('video')->storeAs('public/image', $img);

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

        $columns = ['name', 'position_id', 'height', 'weight', 'age', 'sex_id', 'comment'];
        foreach ($columns as $column) {
            $target[0]->$column = $request->$column;
        }

        // 画像ファイルの保存場所指定
        $img = $request->file('video');
        $img = $img->getClientOriginalName();

        $target[0]->video = $request->file('video')->storeAs('public/image', $img);

        Auth::user()->player()->save($target[0]);

        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get();
        $contacts = Auth::user()->contact()->with('recruit')->where('user_id', Auth::id())->get()->toArray();
        
        return view('players./mypaige', [
            'players' => $players,
            'contacts' => $contacts,
        ]);
    }
    
    public function staffs_update (CreateStaffData $request) {
        $staff = new Staff;
        $target = $staff->find(Auth::user()->staff()->select('id')->get());
        
        $columns = ['name', 'hometown', 'league_id', 'comment'];
        foreach ($columns as $column) {
            $target[0]->$column = $request->$column;
        }

        // 画像ファイルの保存場所指定
        $img = $request->file('video');
        $img = $img->getClientOriginalName();

        $target[0]->video = $request->file('video')->storeAs('public/image', $img);
        
        Auth::user()->staff()->save($target[0]);
        
        $posts = Auth::user()->staff()->with('league')->where('del_flg', 0)->get()->toArray();
        $recruits = Auth::user()->recruit()->with(['position', 'sex'])->get()->toArray();
        return view('staffs./mypaige', [
            'posts' => $posts,
            'recruits' => $recruits,
        ]);
    }

    public function manager_update (int $id, CreateData $request) {
        $player = new Player;
        $user_id = $player->select('user_id')->where('id', $id)->get();
        $target = $player->where('id', $id)->get();
        
        $columns = ['name', 'position_id', 'height', 'weight', 'age', 'sex_id', 'comment'];
        foreach ($columns as $column) {
            $target[0]->$column = $request->$column;
        }

        // 画像ファイルの保存場所指定
        $img = $request->file('video');
        $img = $img->getClientOriginalName();

        $target[0]->video = $request->file('video')->storeAs('public/image', $img);
        
        $target[0]->user_id = $request->user_id;
        
        $player = new Player;
        $player->find($id)->save($target[0]);
        
        $players = DB::table('players')->get()->toArray();
        
        return view('managers.mypaige', [
            'players' => $players,
        ]);
    }
    
    public function manager_staffs_update (int $id, CreateStaffData $request) {
        $staff = new Staff;
        $target = $staff->find($id);
        
        $columns = ['name', 'hometown', 'league_id', 'comment'];
        foreach ($columns as $column) {
            $target->$column = $request->$column;
        }
        
        $target->user_id = $target->user_id;
        // 画像ファイルの保存場所指定
        $target->video = $request->file('video');
        
        $target->user_id = $request->user_id;
        
        $staff = new Staff;
        $staff->where('id', $id)->save($target);
        
        $staffs = DB::table('staffs')->get()->toArray();
        
        return view('managers.staff_mypaige', [
            'staffs' => $staffs,
        ]);
    }

    // 募集
    public function recruit (CreateRecruitData $request) {
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

    public function delete (int $id) {
        $contact = new Contact;
        $target = $contact->find($id);

        $target->delete();

        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        $contacts = Auth::user()->contact()->with('recruit')->where('user_id', Auth::id())->get()->toArray();
        // join句
        return view('players./mypaige', [
            'players' => $players,
            'contacts' => $contacts,
        ]);
    }

    public function staffs_delete (int $id) {
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


    public function manager_delete (int $id) {
        $user_id = DB::table('players')->select('user_id')->where('id', $id)->get();

        $contact  = new Contact;
        // $contact->where('user_id', $user_id[0]->user_id)->delete();

        $good =new Good;
        // $good->where('player_id', $id)->delete();

        $player = new Player;
        // $player->where('id', $id)->delete();

        $user = new User;
        $user->where('id', $user_id[0]->user_id)->delete();
        
        $players = DB::table('players')->get()->toArray();
        
        return $user->where('id', $user_id[0]->user_id);
    }

    public function manager_staffs_delete (int $id) {
        $user_id = DB::table('staffs')->select('user_id')->where('id', $id)->get();

        $good =new Good;
        $good->where('user_id', $user_id[0]->user_id)->delete();

        $recruit = new Recruit;
        $recruit->where('user_id', $user_id[0]->user_id)->delete();

        $staff = new Staff;
        $staff->where('id', $id)->delete();

        $user = new User;
        $user->where('id', $user_id[0]->user_id)->delete();

        $target->delete();

        $staffs = DB::table('staffs')->get()->toArray();

        return view('managers.staff_mypaige', [
            'staffs' => $staffs,
        ]);
    }


    // 応募
    public function apply (int $id, CreateApplyData $request) {
        $contact = new Contact;
        DB::table('contacts')->insert([
            'recruit_id' => $id,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
        ]);

        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        $contacts = Auth::user()->contact()->with('recruit')->where('user_id', Auth::id())->get()->toArray();
        // join句

        return view('players./mypaige', [
            'players' => $players,
            'contacts' => $contacts,
        ]);
    }

    // like
    public function like (Request $request) {
        $target = Auth::user()->good()->where('player_id', $request->player_id)->get();
        
        if (count($target) == 0) {
            DB::table('goods')->insert([
                'player_id' => $request->player_id,
                'user_id' => Auth::id(),
            ]);
        } else {
            DB::table('goods')->where('player_id', $request->player_id)->where('user_id', Auth::id())->delete();
        }
        
        return response()->json($target);
    }
    
    public function unlike (Request $request) {
        $target = Auth::user()->good()->where('player_id', $request->player_id)->get();
        
        if (count($target) == 0) {
            DB::table('goods')->insert([
                'player_id' => $request->player_id,
                'user_id' => Auth::id(),
            ]);
        } else {
            DB::table('goods')->where('player_id', $request->player_id)->where('user_id', Auth::id())->delete();
        }

        return response()->json($target);
    }
    
    // chat
    public function chat (Request $request) {
        $send_id = Auth::user()->player()->select('id')->get();
        DB::table('chats')->insert([
            'send_id' => $send_id[0]->id,
            'receive_id' => $request->id,
            'comment' => $request->comment,
            'talkGroup' => $request->id,
        ]);

        return response()->json($request->comment);
    }

    public function staffs_chat (Request $request) {
        $send_id = Auth::user()->staff()->select('id')->get();
        DB::table('chats')->insert([
            'send_id' => $send_id[0]->id,
            'receive_id' => $request->id,
            'comment' => $request->comment,
            'talkGroup' => $send_id[0]->id,
        ]);

        return response()->json($request->comment);
    }
}