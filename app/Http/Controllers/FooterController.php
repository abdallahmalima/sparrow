<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
   //
    //
    public function edit()
    {
      
        //
        $footer=Footer::first();
        return view('footers.edit',compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'phone'=>'required|string|max:13|min:10',
            'email'=>'required|string|email'
        ]);
      
        $footer=Footer::first();
        if($footer){
            $footer->update($request->all());
            
        }else{
          
            $footer= Footer::create($request->all());
            
        }
       
        \Session::flash('success','Updated Successfuly');
      
      return redirect()->route('footers.edit',$footer)->with('footer',$footer);
    }
}
