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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $me = \Auth::user();
            $you = User::find($request->id);
            // $messages = $user->message_ids()->orderBy('created_at', 'desc')->paginate(10);
            
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
                    
            // $to_messages = $me->message_to_ids()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $me,
                'user_id' => $you,
                'messages' => $messages,
                // 'to_messages' => $to_messages,
            ];
            
        
        return view('messages.message', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
