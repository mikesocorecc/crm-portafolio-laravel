<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

/**
 * Class ExperienceController
 * @package App\Http\Controllers
 */
class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Experience", 'name' => "Inicio"], ['name' => "experiences"]];
        $data = [
            'experiences' => $experiences,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('experience.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experience = new Experience();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "experience", 'name' => "Inicio"], ['name' => "Crear experience"]];
        $data = [
            'experience' => $experience,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('experience.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Experience::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('experiences',  $data['image'] );
       }
       Experience::create($data);
        return redirect()->route('experience.index')
            ->with('success', 'Experience created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experience = Experience::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "experience", 'name' => "Inicio"], ['name' => "Detalles del Experience"]];
        $data = [
            'experience' => $experience,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('experience.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "experience", 'name' => "Inicio"], ['name' => "Detalles del Experience"]];
        $data = [
            'experience' => $experience,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('experience.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        request()->validate(Experience::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('experiences',  $data['image'] );
            if($experience->image != "" and file_exists(storage_path('app/public/experiences/'.$experience->image))){
                unlink(storage_path('app/public/experiences/'.$experience->image));
            }
        }
        $experience->update($data);
        return redirect()->route('experience.index')
            ->with('success', 'Experience updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        if($experience->image != "" and file_exists(storage_path('app/public/experiences/'.$experience->image))){
            unlink(storage_path('app/public/experiences/'.$experience->image));
        }
        $experience->delete();
        return redirect()->route('experience.index')
            ->with('success', 'experiences deleted successfully');
    }
}
