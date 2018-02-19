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
        
        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    public function edit($id) {
        
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id) {
        
        $this->validate($request, [
            'comment' => 'max:60',
            'aboutme' => 'max:1600',
        ]);
        
        $user = User::find($id);
        $user->comment = $request->comment;
        $user->aboutme = $request->aboutme;
        $user->level = $request->level;
        $user->save();
        
        return redirect('/');
    }
}