<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

/**
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Message", 'name' => "Inicio"], ['name' => "messages"]];
        $data = [
            'messages' => $messages,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('message.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "message", 'name' => "Inicio"], ['name' => "Crear message"]];
        $data = [
            'message' => $message,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('message.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Message::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('messages',  $data['image'] );
       }
       Message::create($data);
        return redirect()->route('message.index')
            ->with('success', 'Message created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "message", 'name' => "Inicio"], ['name' => "Detalles del Message"]];
        $data = [
            'message' => $message,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('message.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "message", 'name' => "Inicio"], ['name' => "Detalles del Message"]];
        $data = [
            'message' => $message,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('message.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        request()->validate(Message::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('messages',  $data['image'] );
            if($message->image != "" and file_exists(storage_path('app/public/messages/'.$message->image))){
                unlink(storage_path('app/public/messages/'.$message->image));
            }
        }
        $message->update($data);
        return redirect()->route('message.index')
            ->with('success', 'Message updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        if($message->image != "" and file_exists(storage_path('app/public/messages/'.$message->image))){
            unlink(storage_path('app/public/messages/'.$message->image));
        }
        $message->delete();
        return redirect()->route('message.index')
            ->with('success', 'messages deleted successfully');
    }
}
