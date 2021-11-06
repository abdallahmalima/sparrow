<?php

namespace App\Http\Controllers;

use App\Models\Fsection;
use Illuminate\Http\Request;

class FsectionController extends Controller
{
    //
    //
    public function edit()
    {
        //
        $fsection=Fsection::first();
        return view('fsections.edit',compact('fsection'));
    }

    public function update(Request $request)
    {
        //
       $data= $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255'
        ]);
      
        $fsection=$this->firstUpdateOrCreate(Fsection::class, $data);
       
      
      return redirect()->route('fsections.edit',$fsection)->with(compact('fsection'))->withSuccess('Updated Successfully');
    }
}
