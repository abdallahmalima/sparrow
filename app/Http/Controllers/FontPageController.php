<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Fsection;
use App\Models\Gallery;
use App\Models\Header;
use App\Models\Logo;
use App\Models\Service;
use App\Models\Ssection;
use Illuminate\Http\Request;

class FontPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
       
        $data=['logo'=>Logo::first(),
               'header'=>Header::first(),
                'galleries'=>Gallery::take(6)->get(),
                'services'=>Service::take(4)->get(),
               'fsection'=>Fsection::first(),
               'ssection'=>Ssection::first(),
               'footer'=>Footer::first()];
       
       
        return view('index', $data);
    }
}
