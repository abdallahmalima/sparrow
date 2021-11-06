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
        $data=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'phone'=>'required|string|max:13|min:10',
            'email'=>'required|string|email'
        ]);
      

        $footer=$this->firstUpdateOrCreate(Footer::class,$data);
      
      return redirect()->route('footers.edit',$footer)->with('footer',$footer)->withSuccess('Updated Successfully');
    }
}
