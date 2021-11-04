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
      
        $header=Header::first();
        if($header){
            $header->update($request->except('image'));
            if($request->hasFile('image')){
             $this->updateImage($header);
            }
        }else{
          
            $header=Header::create($request->except('image'));
            if($request->hasFile('image')){
                $header->image()->create(['url'=>$request->file('image')->store('images','public')]);
            }
        }
       
       
      
      return redirect()->route('headers.edit',$header)->with('header',$header)->withSuccess('Updated Successfuly');
    }

}
