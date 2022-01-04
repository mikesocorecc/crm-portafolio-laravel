<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectsCategory;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Project", 'name' => "Inicio"], ['name' => "projects"]];
        $data = [
            'projects' => $projects,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $projects_category = ProjectsCategory::all();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "project", 'name' => "Inicio"], ['name' => "Crear project"]];
        $data = [
            'project' => $project,
            'projects_category' => $projects_category,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        request()->validate(Project::$rules);
        $project = Project::create($request->all());
        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
        */
       request()->validate(Project::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('projects',  $data['image'] );
       }
       Project::create($data);
        return redirect()->route('project.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "project", 'name' => "Inicio"], ['name' => "Detalles del Project"]];
        $data = [
            'project' => $project,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = Project::find($id);
        $projects_category = ProjectsCategory::all();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "project", 'name' => "Inicio"], ['name' => "Detalles del Project"]];
        $data = [
            'project' => $project,
            'projects_category' => $projects_category,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        /*
        request()->validate(Project::$rules);
        $project->update($request->all());
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
        */

        request()->validate(Project::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('projects',  $data['image'] );
            if($project->image != "" and file_exists(storage_path('app/public/projects/'.$project->image))){
                unlink(storage_path('app/public/projects/'.$project->image));
            }
        }
        $project->update($data);
        return redirect()->route('project.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        /*
        $project = Project::find($id)->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
        */
        $project = Project::find($id);
        if($project->image != "" and file_exists(storage_path('app/public/projects/'.$project->image))){
            unlink(storage_path('app/public/projects/'.$project->image));
        }
        $project->delete();
        return redirect()->route('project.index')
            ->with('success', 'projects deleted successfully');
    }
}
