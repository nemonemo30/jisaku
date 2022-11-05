<?php

namespace App\Http\Controllers;

use App\Player;
use App\Staff;
use App\Recruit;
use App\Contact;
use App\Http\Requests\SearchTeamRequest;
use App\Http\Requests\SearchPlayerRequest;
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
        } else if ($type_id[0]['type_id']=='2') {
            return view('managers./home');
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

    public function manager_mypaige () {
        $players = DB::table('players')->get()->toArray();

        return view('managers.mypaige', [
            'players' => $players,
        ]);
    }

    public function manager_staff_mypaige () {
        $staffs = DB::table('staffs')->get()->toArray();

        return view('managers.staff_mypaige', [
            'staffs' => $staffs,
        ]);
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

    public function manager_update (int $id) {
        $players = DB::table('players')->where('id', $id)->get()->toArray();

        return view('managers./update', [
                'players' => $players,
            ]);
    }

    public function manager_staffs_update (int $id) {
        $posts = DB::table('staffs')->where('id', $id)->get()->toArray();
        
        return view('managers.staff_update', [
                'posts' => $posts,
            ]);
    }

    // 検索結果ページ
    public function search(SearchTeamRequest $request) {
        if (!empty($_POST['hometown'] && !empty($_POST['position_id']) && !empty($_POST['league_id']) && !empty($_POST['sex_id']))) {
            $keywords = DB::table('staffs')
            ->select('recruits.id', 'staffs.hometown', 'recruits.position_id', 'staffs.league_id', 'recruits.active', 'recruits.comment','recruits.name')
            ->join('recruits', 'staffs.user_id', '=', 'recruits.user_id')
            ->where('hometown', 'like', '%'.$_POST['hometown'].'%')
            ->where('recruits.position_id', $_POST['position_id'])
            ->where('staffs.league_id', $_POST['league_id'])
            ->where('recruits.sex_id', $_POST['sex_id'])->get();
            
            return view('players.search', [
                'keywords' => $keywords,
            ]);
        } else if (!empty($_POST['position_id']) && !empty($_POST['league_id']) && !empty($_POST['sex_id'])) {
            $keywords = DB::table('staffs')
            ->select('recruits.id', 'staffs.hometown', 'recruits.position_id', 'staffs.league_id', 'recruits.active', 'recruits.comment','recruits.name')
            ->join('recruits', 'staffs.user_id', '=', 'recruits.user_id')
            ->where('recruits.position_id', $_POST['position_id'])
            ->where('staffs.league_id', $_POST['league_id'])
            ->where('recruits.sex_id', $_POST['sex_id'])->get();
            return view('players.search', [
                'keywords' => $keywords,
            ]);
        } else if ($_POST['hometown'] && !empty($_POST['position_id']) && !empty($_POST['sex_id'])) {
            $keywords = DB::table('staffs')
            ->select('recruits.id', 'staffs.hometown', 'recruits.position_id', 'staffs.league_id', 'recruits.active', 'recruits.comment','recruits.name')
            ->join('recruits', 'staffs.user_id', '=', 'recruits.user_id')
            ->where('hometown', 'like', '%'.$_POST['hometown'].'%')
            ->where('recruits.position_id', $_POST['position_id'])
            ->where('recruits.sex_id', $_POST['sex_id'])->get();
            return view('players.search', [
                'keywords' => $keywords,
            ]);
        } else if (!empty($_POST['position_id']) && !empty($_POST['sex_id'])) {
            $keywords = DB::table('staffs')
            ->select('recruits.id', 'staffs.hometown', 'recruits.position_id', 'staffs.league_id', 'recruits.active', 'recruits.comment','recruits.name')
            ->join('recruits', 'staffs.user_id', '=', 'recruits.user_id')
            ->where('recruits.position_id', $_POST['position_id'])
            ->where('recruits.sex_id', $_POST['sex_id'])->get();
            return view('players.search', [
                'keywords' => $keywords,
            ]);
        };
    }



    public function staffs_search(SearchPlayerRequest $request) {
        if (!empty($_POST['sex_id'])) {
            $keywords = DB::table('players')
            ->where('sex_id', $_POST['sex_id'])->get();        
        }

        if (!empty($_POST['sex_id']) && !empty($_POST['height'])) {
            $keywords = DB::table('players')
            ->where('sex_id', $_POST['sex_id'])
            ->where('height', '>=', $_POST['height'])->get();
        }

        if (!empty($_POST['sex_id']) && !empty($_POST['age'])) {
            if ($_POST['age']==1) {
                $keywords = DB::table('players')
                ->where('sex_id', $_POST['sex_id'])
                ->where('age', '>=', 18)
                ->where('age', '<=', 25)->get();
            } else if ($_POST['age']==2) {
                $keywords = DB::table('players')
                ->where('sex_id', $_POST['sex_id'])
                ->where('age', '>=', 26)
                ->where('age', '<=', 30)->get();
            } else if ($_POST['age']==3) {
                $keywords = DB::table('players')
                ->where('sex_id', $_POST['sex_id'])
                ->where('age', '>=', 26)
                ->where('age', '<=', 30)->get();
            }
        }

        if (!empty($_POST['position_id']) && !empty($_POST['sex_id'])) {
            $keywords = DB::table('players')
            ->where('position_id', $_POST['position_id'])
            ->where('sex_id', $_POST['sex_id'])->get();
        }

        if (!empty($_POST['position_id']) && !empty($_POST['sex_id']) && !empty($_POST['age'])) {
            if ($_POST['age']==1) {
                $keywords = DB::table('players')
                ->where('position_id', $_POST['position_id'])
                ->where('sex_id', $_POST['sex_id'])
                ->where('age', '>=', 18)
                ->where('age', '<=', 25)->get();
            } else if ($_POST['age']==2) {
                $keywords = DB::table('players')
                ->where('position_id', $_POST['position_id'])
                ->where('sex_id', $_POST['sex_id'])
                ->where('age', '>=', 26)
                ->where('age', '<=', 30)->get();
            } else if ($_POST['age']==3) {
                $keywords = DB::table('players')
                ->where('position_id', $_POST['position_id'])
                ->where('sex_id', $_POST['sex_id'])
                ->where('age', '>=', 26)
                ->where('age', '<=', 30)->get();
            }
        }

        if (!empty($_POST['position_id']) && !empty($_POST['sex_id']) && !empty($_POST['height'])) {
            $keywords = DB::table('players')
            ->where('position_id', $_POST['position_id'])
            ->where('sex_id', $_POST['sex_id'])
            ->where('height', '>=', $_POST['height'])->get();
    }

    if (!empty($_POST['sex_id']) && !empty($_POST['age']) && !empty($_POST['height'])) {
        if ($_POST['age']==1) {
            $keywords = DB::table('players')
            ->where('sex_id', $_POST['sex_id'])
            ->where('age', '>=', 18)
            ->where('age', '<=', 25)
            ->where('height', '>=', $_POST['height'])->get();
        } else if ($_POST['age']==2) {
            $keywords = DB::table('players')
            ->where('sex_id', $_POST['sex_id'])
            ->where('age', '>=', 26)
            ->where('age', '<=', 30)
            ->where('height', '>=', $_POST['height'])->get();
        } else if ($_POST['age']==3) {
            $keywords = DB::table('players')
            ->where('sex_id', $_POST['sex_id'])
            ->where('age', '>=', 26)
            ->where('age', '<=', 30)
            ->where('height', '>=', $_POST['height'])->get();
        }
    }

    if (!empty($_POST['position_id']) && !empty($_POST['sex_id']) && !empty($_POST['age']) && !empty($_POST['height'])) {
        if ($_POST['age']==1) {
            $keywords = DB::table('players')
            ->where('position_id', $_POST['position_id'])
            ->where('sex_id', $_POST['sex_id'])
            ->where('age', '>=', 18)
            ->where('age', '<=', 25)
            ->where('height', '>=', $_POST['height'])->get();
        } else if ($_POST['age']==2) {
            $keywords = DB::table('players')
            ->where('position_id', $_POST['position_id'])
            ->where('sex_id', $_POST['sex_id'])
            ->where('age', '>=', 26)
            ->where('age', '<=', 30)
            ->where('height', '>=', $_POST['height'])->get();
        } else if ($_POST['age']==3) {
            $keywords = DB::table('players')
            ->where('position_id', $_POST['position_id'])
            ->where('sex_id', $_POST['sex_id'])
            ->where('age', '>=', 26)
            ->where('age', '<=', 30)
            ->where('height', '>=', $_POST['height'])->get();
        }
    }

        return view('staffs.search', [
            'keywords' => $keywords,
        ]);
    }


    
    // 詳細
    public function detail (int $id) {
        $user_id = DB::table('recruits')->select('user_id')->where('id', $id)->get();
        $details = DB::table('recruits')
        ->select('staffs.video', 'staffs.name', 'staffs.hometown', 'staffs.league_id', 'staffs.comment', 'recruits.id')
        ->join('staffs', 'recruits.user_id', '=', 'staffs.user_id')
        ->where('recruits.id', $id)->get();

        $staffs = DB::table('staffs')->select('id')->where('user_id', $user_id[0]->user_id)->get();

        if  (empty($details)) {
            return view('players.create');
        } else {
            return view('players.detail', [
                'details' => $details,
                'staffs' => $staffs,
            ]);
        }
    }

    public function good_detail (int $id) {

        $details = DB::table('staffs')->where('id', $id)->get();

        if  (empty($details)) {
            return view('players.create');
        } else {
            return view('players.good_detail', [
                'details' => $details,
            ]);
        }
    }

    public function staffs_detail(int $id) {
        $details = DB::table('players')->where('id', $id)->get();
        $likes = Auth::user()->good()->where('player_id', $id)->get()->toArray();
        foreach ($details as $detail) {
            $emails = DB::table('users')->select('email')->where('id', $detail->user_id)->get();
        }

        return view('staffs./detail', [
            'details' => $details,
            'likes' => $likes,
            'emails' => $emails,
        ]);
    }


    // 応募
    public function apply (int $id) {
        $players = Auth::user()->player()->with(['sex', 'position'])->where('del_flg', 0)->get()->toArray();
        $recruits_id = $id;

        return view('players.apply', [
                'players' => $players,
                'recruits_id' => $recruits_id,
            ]);
    }


    // 募集
    public function recruit () {
        $staffs = Auth::user()->staff()->where('del_flg', 0)->get()->toArray();
        
        return view('staffs./recruit', [
            'staffs' => $staffs,
        ]);
    }
    
    public function manager_recruit () {
        
        $recruits = DB::table('recruits')->get()->toArray();

        return view('managers./recruit', [
            'recruits' => $recruits,
        ]);
    }

    // いいね
    public function good() {
        $goods = DB::table('goods')
        ->select('players.name', 'players.position_id', 'players.height', 'players.weight', 'players.age', 'players.sex_id', 'players.video', 'players.comment', 'players.id')
        ->join('players', 'goods.player_id', 'players.id')
        ->where('goods.user_id', Auth::id())
        ->get();

        if (count($goods)!=0) {
            return view('staffs.good', [
                'goods' => $goods,
            ]);
        } else {
            return view('/');
        }
    }
    
    public function player_good() {
        $player_id = Auth::user()->player()->select('id')->where('user_id', Auth::id())->get();
        $goods = DB::table('goods')
        ->where('player_id', $player_id[0]->id)
        ->get();

        $staffs = DB::table('goods')
        ->select('staffs.name', 'staffs.hometown', 'staffs.league_id', 'staffs.comment', 'staffs.id')
        ->join('staffs', 'goods.user_id', 'staffs.user_id')
        ->where('player_id', $player_id[0]->id)
        ->get();

        return view('players.good', [
            'goods' => $goods,
            'staffs' => $staffs,
        ]);
    }

    // 応募者
    public function applicant() {
        $recruits_id = Auth::user()->recruit()->select('id')->get();
        
        $contacts = Auth::user()->recruit()->select('players.name', 'players.position_id', 'players.height', 'players.weight', 'players.age', 'players.sex_id', 'players.video', 'contacts.comment', 'players.id')
        ->join('contacts', 'recruits.id', 'contacts.recruit_id')
        ->join('players', 'contacts.user_id', 'players.user_id')->get();
    
        return view('staffs.applicant', [
            'contacts' => $contacts,
        ]);
    }

    public function players_recruit (int $id) {
        $user_id = DB::table('staffs')->select('user_id')->where('id', $id)->get();
        $recruits = DB::table('recruits')
        ->select('recruits.name', 'recruits.sex_id', 'recruits.position_id', 'recruits.active', 'recruits.comment', 'recruits.id')
        ->where('user_id', $user_id[0]->user_id)->get();
        return view('players.recruit', [
            'recruits' => $recruits,
        ]);
    }

    // chat
    public function chat (int $id) {
        $send_id = Auth::user()->player()->select('id')->get();
        $staff = DB::table('staffs')->where('id', $id)->get();

        $sends = DB::table('chats')->where('talkGroup', $id)
        ->orWhere('send_id', $send_id[0]->id)
        ->where('receive_id', $send_id[0]->id)->get();

        return view('players.chat', [
            'sends' => $sends,
            'send_id' => $send_id[0]->id,
            'staffs' => $staff,
        ]);
    }

    public function staffs_chat (int $id) {
        $send_id = Auth::user()->staff()->select('id')->get();
        $player = DB::table('players')->where('id', $id)->get();

        $sends = DB::table('chats')->where('talkGroup', $send_id[0]->id)
        ->orWhere('receive_id', $player[0]->id)
        ->where('send_id', $player[0]->id)->get();

        return view('staffs.chat', [
            'sends' => $sends,
            'send_id' => $send_id[0]->id,
            'players' => $player,
        ]);
    }

    public function chat_list () {
        $id = Auth::user()->player()->select('id')->get();
        $send_id = DB::table('chats')->select('send_id')->distinct()->where('receive_id', $id[0]->id)->get();
        $new_message = DB::table('chats')->select('staffs.id', 'staffs.name')->distinct()
        ->join('staffs', 'chats.send_id', '=', 'staffs.id')->get();

        return view('players.chat_list', [
            'new_messages' => $new_message,
        ]);
    }

    public function staffs_chat_list () {
        $id = Auth::user()->staff()->select('id')->get();
        $send_id = DB::table('chats')->select('send_id')->distinct()->where('send_id', $id[0]->id)->get();
        $new_message = DB::table('chats')->select('players.id', 'players.name')->distinct()
        ->join('players', 'chats.receive_id', '=', 'players.id')->get();

        return view('staffs.chat_list', [
            'new_messages' => $new_message,
        ]);
    }

}
