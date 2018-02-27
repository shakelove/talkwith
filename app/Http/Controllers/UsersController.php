<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $thankings = $user->thankings()->paginate(6);
        
        $data = [
            'user' => $user,
            'users' => $thankings,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function edit($id) {
        
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id) {
        
        $this->validate($request, [
            'comment' => 'max:40',
            'aboutme' => 'max:1600',
        ]);

        $user = User::find($id);
        $user->comment = $request->comment;
        $user->aboutme = $request->aboutme;
        $user->level = $request->level;
        $user->save();
        
        return redirect('/');
    }
    
//   public function thankings($id)
//     {
//         $user = User::find($id);
//         $thankings = $user->thankings()->paginate(3);
        
//         $data = [
//             'user' => $user,
//             'users' => $thankings,
//         ];
        
//         $data += $this->counts($user);
        
//         return view('users.thankings', $data);
//     }
    
    public function thankers($id)
    {
        $user = User::find($id);
        $thankers = $user->thankers()->paginate(6);
        
        $data = [
            'user' => $user,
            'users' => $thankers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.thankers', $data);
    }
}