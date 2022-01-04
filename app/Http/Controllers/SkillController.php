<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

/**
 * Class SkillController
 * @package App\Http\Controllers
 */
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Skill", 'name' => "Inicio"], ['name' => "skills"]];
        $data = [
            'skills' => $skills,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = new Skill();
        $skill_categories = SkillCategory::all();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "skill", 'name' => "Inicio"], ['name' => "Crear skill"]];
        $data = [
            'skill' => $skill,
            'skill_categories' => $skill_categories,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Skill::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('skills',  $data['image'] );
       }
       Skill::create($data);
        return redirect()->route('skill.index')
            ->with('success', 'Skill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = Skill::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "skill", 'name' => "Inicio"], ['name' => "Detalles del Skill"]];
        $data = [
            'skill' => $skill,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        $skill_categories = SkillCategory::all();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "skill", 'name' => "Inicio"], ['name' => "Detalles del Skill"]];
        $data = [
            'skill' => $skill,
            'skill_categories' => $skill_categories,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('skill.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        request()->validate(Skill::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('skills',  $data['image'] );
            if($skill->image != "" and file_exists(storage_path('app/public/skills/'.$skill->image))){
                unlink(storage_path('app/public/skills/'.$skill->image));
            }
        }
        $skill->update($data);
        return redirect()->route('skill.index')
            ->with('success', 'Skill updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        if($skill->image != "" and file_exists(storage_path('app/public/skills/'.$skill->image))){
            unlink(storage_path('app/public/skills/'.$skill->image));
        }
        $skill->delete();
        return redirect()->route('skill.index')
            ->with('success', 'skills deleted successfully');
    }
}
