<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

/**
 * Class BlogCategoryController
 * @package App\Http\Controllers
 */
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories = BlogCategory::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "BlogCategory", 'name' => "Inicio"], ['name' => "Blog Categories"]];
        $data = [
            'blogCategories' => $blogCategories,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory = new BlogCategory();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "blogCategory", 'name' => "Inicio"], ['name' => "Crear blogCategory"]];
        $data = [
            'blogCategory' => $blogCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog-category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(BlogCategory::$rules);
       $data = $request->all();
       BlogCategory::create($data);
        return redirect()->route('blog-category.index')
            ->with('success', 'BlogCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogCategory = BlogCategory::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "blogCategory", 'name' => "Inicio"], ['name' => "Detalles del BlogCategory"]];
        $data = [
            'blogCategory' => $blogCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog-category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogCategory = BlogCategory::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "blogCategory", 'name' => "Inicio"], ['name' => "Detalles del BlogCategory"]];
        $data = [
            'blogCategory' => $blogCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        request()->validate(BlogCategory::$rules);
        $data = $request->all();
        $blogCategory->update($data);
        return redirect()->route('blog-category.index')
            ->with('success', 'BlogCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();
        return redirect()->route('blog-category.index')
            ->with('success', 'blog-categories deleted successfully');
    }
}
