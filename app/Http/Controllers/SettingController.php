<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;
use stdClass;

/**
 * Class SettingController
 * @package App\Http\Controllers
 */
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::get();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "/", 'name' => "Inicio"], ['name' => "settings"]];
        $dinamico['item'] = new  stdClass();
        foreach ($settings as $setting) { 
            $dinamico['item']->{ $setting->key } = $setting->value;
        }
        $data = [
            'dinamico' => $dinamico['item'],
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('setting.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = new Setting();
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "setting", 'name' => "Inicio"], ['name' => "Crear setting"]];
        $data = [
            'setting' => $setting,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('setting.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            request()->validate(Setting::$rules);
            $data = $request->all();  
            $data['blog_search_wedgit'] = isset($data['blog_search_wedgit'])?1:0;
            $data['blog_categories_widget'] = isset($data['blog_categories_widget'])?1:0;
            $data['blog_latest_widget'] = isset($data['blog_latest_widget'])?1:0;
            $data['blog_popular_widget'] = isset($data['blog_popular_widget'])?1:0;
            $data['post_search_widget'] = isset($data['post_search_widget'])?1:0;
            $data['post_latest_widget'] = isset($data['post_latest_widget'])?1:0;
            $data['post_related_widget'] = isset($data['post_related_widget'])?1:0;
            $data['post_tags_widget'] = isset($data['post_tags_widget'])?1:0;
            $data['blog_comments_widget'] = isset($data['blog_comments_widget'])?1:0;
            $data['portfolio_related'] = isset($data['portfolio_related'])?1:0;
            $data['portfolio_comments'] = isset($data['portfolio_comments'])?1:0;
            foreach ($data as $key => $value) {
                    $setting =  Setting::find($key);
                    $setting->key =  $key;
                    $setting->value =  $value;
                    $setting->save();
            } 
            // Archivos
            if($request->hasFile('favicon') ){
                $setting =  Setting::find('favicon');
                if($setting->value != "" and file_exists(storage_path('app/public/settings/'.$setting->value))){
                    unlink(storage_path('app/public/settings/'.$setting->value));
                }
                $setting->value = time().'_'.$request->file('favicon')->getClientOriginalName();
                $request->file('favicon')->storeAs('settings',  $setting->value );
                $setting->save();
            }
            if($request->hasFile('home_bg') ){
                $setting =  Setting::find('home_bg');
                if($setting->value != "" and file_exists(storage_path('app/public/settings/'.$setting->value))){
                    unlink(storage_path('app/public/settings/'.$setting->value));
                }
                $setting->value = time().'_'.$request->file('home_bg')->getClientOriginalName();
                $request->file('home_bg')->storeAs('settings',  $setting->value );
                $setting->save();
            }
            if($request->hasFile('about_bg') ){
                $setting =  Setting::find('about_bg');
                if($setting->value != "" and file_exists(storage_path('app/public/settings/'.$setting->value))){
                    unlink(storage_path('app/public/settings/'.$setting->value));
                }
                $setting->value = time().'_'.$request->file('about_bg')->getClientOriginalName();
                $request->file('about_bg')->storeAs('settings',  $setting->value );
                $setting->save();
            }
            if($request->hasFile('contact_bg') ){
                $setting =  Setting::find('contact_bg');
                if($setting->value != "" and file_exists(storage_path('app/public/settings/'.$setting->value))){
                    unlink(storage_path('app/public/settings/'.$setting->value));
                }
                $setting->value = time().'_'.$request->file('contact_bg')->getClientOriginalName();
                $request->file('contact_bg')->storeAs('settings',  $setting->value );
                $setting->save();
            }

        return redirect()->route('setting.index')
            ->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "setting", 'name' => "Inicio"], ['name' => "Detalles del Setting"]];
        $data = [
            'setting' => $setting,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('setting.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        $pageConfigs = ['layoutWidth' => 'full'];
        $breadcrumbs = [['link' => "setting", 'name' => "Inicio"], ['name' => "Detalles del Setting"]];
        $data = [
            'setting' => $setting,
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ];
        return view('setting.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        request()->validate(Setting::$rules);
        $data = $request->all();
        if($request->hasFile('favicon') ){
            $data['favicon'] = time().'_'.$request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->storeAs('settings',  $data['favicon'] );
            if($setting->favicon != "" and file_exists(storage_path('app/public/settings/'.$setting->favicon))){
                unlink(storage_path('app/public/settings/'.$setting->favicon));
            }
        }
        if($request->hasFile('home_bg') ){
            $data['home_bg'] = time().'_'.$request->file('home_bg')->getClientOriginalName();
            $request->file('home_bg')->storeAs('settings',  $data['home_bg'] );
            if($setting->home_bg != "" and file_exists(storage_path('app/public/settings/'.$setting->home_bg))){
                unlink(storage_path('app/public/settings/'.$setting->home_bg));
            }
        }
        if($request->hasFile('about_bg') ){
            $data['about_bg'] = time().'_'.$request->file('about_bg')->getClientOriginalName();
            $request->file('about_bg')->storeAs('settings',  $data['about_bg'] );
            if($setting->about_bg != "" and file_exists(storage_path('app/public/settings/'.$setting->about_bg))){
                unlink(storage_path('app/public/settings/'.$setting->about_bg));
            }
        }
        if($request->hasFile('contact_bg') ){
            $data['contact_bg'] = time().'_'.$request->file('contact_bg')->getClientOriginalName();
            $request->file('contact_bg')->storeAs('settings',  $data['contact_bg'] );
            if($setting->contact_bg != "" and file_exists(storage_path('app/public/settings/'.$setting->contact_bg))){
                unlink(storage_path('app/public/settings/'.$setting->contact_bg));
            }
        }

        $setting->update($data);
        return redirect()->route('setting.index')
            ->with('success', 'Setting updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        if($setting->image != "" and file_exists(storage_path('app/public/settings/'.$setting->image))){
            unlink(storage_path('app/public/settings/'.$setting->image));
        }
        $setting->delete();
        return redirect()->route('setting.index')
            ->with('success', 'settings deleted successfully');
    }
}
