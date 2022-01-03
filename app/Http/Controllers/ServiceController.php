<?php

namespace App\Http\Controllers;

use App\Events\AppEvent;
use App\Models\Service;
use App\Notifications\ServiceUpdatedNotification;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('services.index',['services'=>Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'image'=>'required|image'
        ]);
        $service=Service::create($request->except('image'));
        if($request->hasFile('image')){
            $service->image()->create(['url'=>$request->file('image')->store('images','public')]);
        }
       
        return redirect()->route('services.create')->withSuccess('Deleted Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'image'=>'image'
        ]);

        $service->update($request->only('title','description'));
        if($request->hasFile('image')){
           $this->updateImage($service);
           
        }
      //  AppEvent::dispatch(AppEvent::class);
        $request->user()->notify(new ServiceUpdatedNotification());
        return redirect()->route('services.edit',$service)->withSuccess('Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $this->deleteWithImage($service);
        return redirect()->route('services.index')->withSuccess('Deleted Successfuly');
    }
}
