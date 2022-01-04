<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "Blog", 'name' => "Inicio"], ['name' => "blogs"]];
        $data = [
            'blogs' => $blogs,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog();
        $blogsCategory = BlogCategory::all();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "blog", 'name' => "Inicio"], ['name' => "Crear blog"]];
        $data = [
            'blog' => $blog,
            'blogs_categorie' => $blogsCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Blog::$rules);
       $data = $request->all();
       if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('blogs',  $data['image'] );
       }
       $data['datetime'] = date('Y-m-d H:i:s');
       $data['visits'] = 0;
       Blog::create($data);
        return redirect()->route('blog.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "blog", 'name' => "Inicio"], ['name' => "Detalles del Blog"]];
        $data = [
            'blog' => $blog,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $blogsCategory = BlogCategory::all();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "blog", 'name' => "Inicio"], ['name' => "Detalles del Blog"]];
        $data = [
            'blog' => $blog,
            'blogs_categorie' => $blogsCategory,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('blog.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        request()->validate(Blog::$rules);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('blogs',  $data['image'] );
            if($blog->image != "" and file_exists(storage_path('app/public/blogs/'.$blog->image))){
                unlink(storage_path('app/public/blogs/'.$blog->image));
            }
        }
        $blog->update($data);
        return redirect()->route('blog.index')
            ->with('success', 'Blog updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if($blog->image != "" and file_exists(storage_path('app/public/blogs/'.$blog->image))){
            unlink(storage_path('app/public/blogs/'.$blog->image));
        }
        $blog->delete();
        return redirect()->route('blog.index')
            ->with('success', 'blogs deleted successfully');
    }
}
