<?php

namespace App\Http\Controllers;

use App\Models\Ssection;
use Illuminate\Http\Request;

class SsectionController extends Controller
{
    public function edit()
    {
        //
        
        $ssection=Ssection::first();
        return view('ssections.edit',compact('ssection'));
    }

    public function update(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $ssection=Ssection::first();
        if($ssection){
            $ssection->update($request->all());
            
        }else{
            $ssection= Ssection::create($request->all());
        }
      return redirect()->route('ssections.edit',$ssection)->with(compact('ssection'))->withSuccess('Updated Successfully');
    }
}
