<?php

namespace App\Http\Controllers;

use App\Models\ProjectsCategory;
use Illuminate\Http\Request;

/**
 * Class ProjectsCategoryController
 * @package App\Http\Controllers
 */
class ProjectsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectsCategories = ProjectsCategory::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "ProjectsCategory", 'name' => "Inicio"], ['name' => "projectsCategories"]];
        $data = [
            'projectsCategories' => $projectsCategories,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('projects-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectsCategory = new ProjectsCategory();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "projectsCategory", 'name' => "Inicio"], ['name' => "Crear projectsCategory"]];
        $data = [
            'projectsCategory' => $projectsCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('projects-category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(ProjectsCategory::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('projectsCategories',  $data['image'] );
       }
       ProjectsCategory::create($data);
        return redirect()->route('projects-category.index')
            ->with('success', 'ProjectsCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectsCategory = ProjectsCategory::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "projectsCategory", 'name' => "Inicio"], ['name' => "Detalles del ProjectsCategory"]];
        $data = [
            'projectsCategory' => $projectsCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('projects-category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectsCategory = ProjectsCategory::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "projectsCategory", 'name' => "Inicio"], ['name' => "Detalles del ProjectsCategory"]];
        $data = [
            'projectsCategory' => $projectsCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('projects-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProjectsCategory $projectsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectsCategory $projectsCategory)
    {
        request()->validate(ProjectsCategory::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('projectsCategories',  $data['image'] );
            if($projectsCategory->image != "" and file_exists(storage_path('app/public/projectsCategories/'.$projectsCategory->image))){
                unlink(storage_path('app/public/projectsCategories/'.$projectsCategory->image));
            }
        }
        $projectsCategory->update($data);
        return redirect()->route('projects-category.index')
            ->with('success', 'ProjectsCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $projectsCategory = ProjectsCategory::find($id);
        if($projectsCategory->image != "" and file_exists(storage_path('app/public/projectsCategories/'.$projectsCategory->image))){
            unlink(storage_path('app/public/projectsCategories/'.$projectsCategory->image));
        }
        $projectsCategory->delete();
        return redirect()->route('projects-category.index')
            ->with('success', 'projects-categories deleted successfully');
    }
}
