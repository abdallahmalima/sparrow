<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GallerySearchController extends Controller
{
    //
    public function __invoke(){
    
        $keyword=request('keyword');
        $galleries=Gallery::where('title','like',"%{$keyword}%")->get();
        return view('galleries.index',compact('galleries'));
    }
}
