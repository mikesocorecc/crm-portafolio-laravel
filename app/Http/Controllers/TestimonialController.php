<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

/**
 * Class TestimonialController
 * @package App\Http\Controllers
 */
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Testimonial", 'name' => "Inicio"], ['name' => "testimonials"]];
        $data = [
            'testimonials' => $testimonials,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('testimonial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonial = new Testimonial();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "testimonial", 'name' => "Inicio"], ['name' => "Crear testimonial"]];
        $data = [
            'testimonial' => $testimonial,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('testimonial.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Testimonial::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('testimonials',  $data['image'] );
       }
       Testimonial::create($data);
        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "testimonial", 'name' => "Inicio"], ['name' => "Detalles del Testimonial"]];
        $data = [
            'testimonial' => $testimonial,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('testimonial.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "testimonial", 'name' => "Inicio"], ['name' => "Detalles del Testimonial"]];
        $data = [
            'testimonial' => $testimonial,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('testimonial.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        request()->validate(Testimonial::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('testimonials',  $data['image'] );
            if($testimonial->image != "" and file_exists(storage_path('app/public/testimonials/'.$testimonial->image))){
                unlink(storage_path('app/public/testimonials/'.$testimonial->image));
            }
        }
        $testimonial->update($data);
        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial->image != "" and file_exists(storage_path('app/public/testimonials/'.$testimonial->image))){
            unlink(storage_path('app/public/testimonials/'.$testimonial->image));
        }
        $testimonial->delete();
        return redirect()->route('testimonial.index')
            ->with('success', 'testimonials deleted successfully');
    }
}
