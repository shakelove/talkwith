<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \DB;
use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;

class MessagesController extends Controller
{
    
    public function index(Request $request)
    {
            $me = \Auth::user();
            $you = User::find($request->id);
            
            $first = DB::table('messages')
                    ->Where('from_id', '=', $me->id)
                    ->Where('to_id', '=', $you->id);
                    
            $results = DB::table('messages')
                    ->Where('from_id', '=', $you->id)
                    ->Where('to_id', '=', $me->id)
                    ->union($first)
                    ->orderBy('created_at', 'asc')
                    ->get();
                    
            $page = Input::get('page', 1);
            $paginate = 30;
            
            $offSet = ($page * $paginate) - $paginate;
            $itemsForCurrentPage = array_slice($results, $offSet, $paginate, true);
            $messages = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($results), $paginate, $page);
                    
            
            $data = [
                'user' => $me,
                'user_id' => $you,
                'messages' => $messages,
            ];
            
        
        return view('messages.message', $data);
    }
    

    
    public function create()
    {
        //
    }

    
     //メッセージの保存
    public function store(Request $request)
    {
        $user = \Auth::user();
        
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        
        $request->user()->message_ids()->create([
            'content' => $request->content,
            'from_id' => $user->id,
            'to_id' => $request->user_id,
        ]);
    
        return redirect('/messages?id=' . $request->user_id);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
