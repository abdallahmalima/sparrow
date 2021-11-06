<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    //
    public function edit()
    {
        //
        $header=Header::first();
        return view('headers.edit',compact('header'));
    }

    public function update(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'image'=>'image'
        ]);
      
        $header=$this->firstUpdateOrCreateWithImage(Header::class,$request->only('title','description'));
       
      return redirect()->route('headers.edit',$header)->with('header',$header)->withSuccess('Updated Successfuly');
    }

}
