<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Client", 'name' => "Inicio"], ['name' => "clients"]];
        $data = [
            'clients' => $clients,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "client", 'name' => "Inicio"], ['name' => "Crear client"]];
        $data = [
            'client' => $client,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('client.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Client::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('clients',  $data['image'] );
       }
       Client::create($data);
        return redirect()->route('client.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "client", 'name' => "Inicio"], ['name' => "Detalles del Client"]];
        $data = [
            'client' => $client,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('client.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "client", 'name' => "Inicio"], ['name' => "Detalles del Client"]];
        $data = [
            'client' => $client,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('client.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        request()->validate(Client::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('clients',  $data['image'] );
            if($client->image != "" and file_exists(storage_path('app/public/clients/'.$client->image))){
                unlink(storage_path('app/public/clients/'.$client->image));
            }
        }
        $client->update($data);
        return redirect()->route('client.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if($client->image != "" and file_exists(storage_path('app/public/clients/'.$client->image))){
            unlink(storage_path('app/public/clients/'.$client->image));
        }
        $client->delete();
        return redirect()->route('client.index')
            ->with('success', 'clients deleted successfully');
    }
}
