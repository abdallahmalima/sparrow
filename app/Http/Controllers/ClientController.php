<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
              $clients=Client::query()
              ->get();


              return view('clients.index',[
              'clients'=>$clients
              ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
        'name'=>['required','max:50'],
        'email'=>['required','email','max:50','unique:clients,email'],
        'image'=>['required','image'],
        ]);

        $client=Client::create(Arr::except($data,['image']));
        $this->storeImage($client);

        return redirect()->route('clients.create')->withSuccess('Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        return view('clients.edit',[
            'client'=>$client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
          //
          $data=$request->validate([
            'name'=>['required','max:50'],
            'email'=>['required','email','max:50',],
            'image'=>['image'],
            ]);
    
            $client->update(Arr::except($data,['image']));
            $this->UpdateImage($client);
            return redirect()->route('clients.edit', $client)->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
      
        $this->deleteWithImage($client);
        return redirect()->route('clients.index')->withSuccess('Deleted Successfully');
    }
}
