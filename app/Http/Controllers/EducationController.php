<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

/**
 * Class EducationController
 * @package App\Http\Controllers
 */
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $educations = Education::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Education", 'name' => "Inicio"], ['name' => "education"]];
        $data = [
            'educations' => $educations,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('education.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $education = new Education();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "education", 'name' => "Inicio"], ['name' => "Crear education"]];
        $data = [
            'education' => $education,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('education.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Education::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('educations',  $data['image'] );
       }
       Education::create($data);
        return redirect()->route('education.index')
            ->with('success', 'Education created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "education", 'name' => "Inicio"], ['name' => "Detalles del Education"]];
        $data = [
            'education' => $education,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('education.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $education = Education::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "education", 'name' => "Inicio"], ['name' => "Detalles del Education"]];
        $data = [
            'education' => $education,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('education.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Education $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        request()->validate(Education::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('educations',  $data['image'] );
            if($education->image != "" and file_exists(storage_path('app/public/educations/'.$education->image))){
                unlink(storage_path('app/public/educations/'.$education->image));
            }
        }
        $education->update($data);
        return redirect()->route('education.index')
            ->with('success', 'Education updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        if($education->image != "" and file_exists(storage_path('app/public/educations/'.$education->image))){
            unlink(storage_path('app/public/educations/'.$education->image));
        }
        $education->delete();
        return redirect()->route('education.index')
            ->with('success', 'education deleted successfully');
    }
}
