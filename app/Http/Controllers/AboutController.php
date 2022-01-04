<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use stdClass;
/**
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "About", 'name' => "Inicio"], ['name' => "abouts"]];
        $dinamico['item'] = new  stdClass();
        foreach ($abouts as $about) { 
            $dinamico['item']->{ $about->key } = $about->value;
        } 
        $data = [
            'dinamico' => $dinamico['item'],
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('about.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about = new About();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "about", 'name' => "Inicio"], ['name' => "Crear about"]];
        $data = [
            'about' => $about,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('about.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(About::$rules);
       $data = $request->all();
       foreach ($data as $key => $value) {
           if($key != '_token' ){
               if($key != 'avatar'){
                    if($key != 'resume'){
                        $about =  About::find($key);
                        $about->key =  $key;
                        $about->value =  $value;
                        $about->save();
                    }
               }
           }
        }
       if($request->hasFile('avatar') ){
            $about =  About::find('avatar');
            if($about->value != "" and file_exists(storage_path('app/public/abouts/'.$about->value))){
                unlink(storage_path('app/public/abouts/'.$about->value));
            }
            $about->value = time().'_'.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('abouts',  $about->value );
            $about->save();
        }
       if($request->hasFile('resume') ){
            $about =  About::find('resume');
            if($about->value != "" and file_exists(storage_path('app/public/abouts/'.$about->value))){
                unlink(storage_path('app/public/abouts/'.$about->value));
            }
            $about->value = time().'_'.$request->file('resume')->getClientOriginalName();
            $request->file('resume')->storeAs('abouts',  $about->value );
            $about->save();
        }
        return redirect()->route('about.index')
            ->with('success', 'About created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = About::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "about", 'name' => "Inicio"], ['name' => "Detalles del About"]];
        $data = [
            'about' => $about,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('about.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "about", 'name' => "Inicio"], ['name' => "Detalles del About"]];
        $data = [
            'about' => $about,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('about.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  About $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        request()->validate(About::$rules);
        $data = $request->all();
        $about->update($data);
        return redirect()->route('about.index')
            ->with('success', 'About updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('about.index')
            ->with('success', 'abouts deleted successfully');
    }
}
