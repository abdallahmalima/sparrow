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
        $data=$request->validate([
            'title'=>'required|string|max:255',
        ]);

        $ssection=$this->firstUpdateOrCreate(Ssection::class,$data);
      return redirect()->route('ssections.edit',$ssection)->with(compact('ssection'))->withSuccess('Updated Successfully');
    }
}
