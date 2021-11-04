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
       $datas= $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255'
        ]);
      
        $fsection=Fsection::first();
        if($fsection){
            $fsection->update($datas);
            
        }else{
          
            $fsection= Fsection::create( $datas);
            
        }
       
      
      return redirect()->route('fsections.edit',$fsection)->with(compact('fsection'))->withSuccess('Updated Successfully');
    }
}
