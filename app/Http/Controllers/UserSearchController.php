<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    //
    public function __invoke(){
        $keyword=request('keyword');
        $users=User::where('name','like',"%{$keyword}%")->orWhere('email','like',"%{$keyword}%")->get();
        return view('users.index',compact('users'));
    }
}
