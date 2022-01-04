<?php

namespace App\Http\Controllers;

use App\Models\SkillCategory;
use Illuminate\Http\Request;

/**
 * Class SkillCategoryController
 * @package App\Http\Controllers
 */
class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillCategories = SkillCategory::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "SkillCategory", 'name' => "Inicio"], ['name' => "skillCategories"]];
        $data = [
            'skillCategories' => $skillCategories,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skillCategory = new SkillCategory();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "skillCategory", 'name' => "Inicio"], ['name' => "Crear skillCategory"]];
        $data = [
            'skillCategory' => $skillCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill-category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(SkillCategory::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('skillCategories',  $data['image'] );
       }
       SkillCategory::create($data);
        return redirect()->route('skill-category.index')
            ->with('success', 'SkillCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skillCategory = SkillCategory::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "skillCategory", 'name' => "Inicio"], ['name' => "Detalles del SkillCategory"]];
        $data = [
            'skillCategory' => $skillCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill-category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skillCategory = SkillCategory::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "skillCategory", 'name' => "Inicio"], ['name' => "Detalles del SkillCategory"]];
        $data = [
            'skillCategory' => $skillCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SkillCategory $skillCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillCategory $skillCategory)
    {
        request()->validate(SkillCategory::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('skillCategories',  $data['image'] );
            if($skillCategory->image != "" and file_exists(storage_path('app/public/skillCategories/'.$skillCategory->image))){
                unlink(storage_path('app/public/skillCategories/'.$skillCategory->image));
            }
        }
        $skillCategory->update($data);
        return redirect()->route('skill-category.index')
            ->with('success', 'SkillCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $skillCategory = SkillCategory::find($id);
        if($skillCategory->image != "" and file_exists(storage_path('app/public/skillCategories/'.$skillCategory->image))){
            unlink(storage_path('app/public/skillCategories/'.$skillCategory->image));
        }
        $skillCategory->delete();
        return redirect()->route('skill-category.index')
            ->with('success', 'skill-categories deleted successfully');
    }
}
