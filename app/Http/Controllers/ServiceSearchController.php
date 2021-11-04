<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceSearchController extends Controller
{
    public function __invoke(){
    
        $keyword=request('keyword');
        $services=Service::where('title','like',"%{$keyword}%")->orWhere('description','like',"%{$keyword}%")->get();
        return view('services.index',compact('services'));
    }
}
