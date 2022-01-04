@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Setting')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Settings</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="config-sitio-web-tab" data-bs-toggle="tab"
                                    href="#config-sitio-web" aria-controls="home" role="tab" aria-selected="true"><i
                                        data-feather="globe"></i>
                                    Configuracion del sitio web</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="config-general-tab" data-bs-toggle="tab"
                                    href="#config-general" aria-controls="profile" role="tab" aria-selected="false"><i
                                        data-feather="settings"></i>
                                    Configuracion general</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                    aria-controls="profile" role="tab" aria-selected="false"><i data-feather="layers"></i>
                                    Configuracion SEO</a>
                            </li>
                        </ul>
                        <form class="form form-vertical" method="POST" action="{{ route('setting.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            {{-- input{!! Form::hidden("actualizar", 1, []) !!} --}}
                            <div class="tab-content">
                                <div class="tab-pane active" id="config-sitio-web" aria-labelledby="config-sitio-web-tab" role="tabpanel">
                                    <div class="row">
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 mt-4 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="language">Idioma</label>
                                        </div>
                                        <div class="col-10 mt-4 my-1">
                                            <select class="form-select" name="language" id="language">
                                                <option value="spanish"
                                                    {{ $dinamico->language == 'spanish' ? 'selected' : '' }}>Español
                                                </option>
                                                <option value="english"
                                                    {{ $dinamico->language == 'english' ? 'selected' : '' }}>Ingles
                                                </option>
                                            </select>
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2  text-center  my-1">
                                            <label class="form-label font-weight-bold" for="color">Color</label>
                                        </div>
                                        <div class="col-10 my-1">
                                            <select class="form-select" name="color" id="color">
                                                <option value="blanco"
                                                    {{ $dinamico->color == 'blanco' ? 'selected' : '' }}>Blanco</option>
                                                <option value="oscuro"
                                                    {{ $dinamico->color == 'oscuro' ? 'selected' : '' }}>Oscuro</option>
                                            </select>
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="title">Titulo del sitio</label>
                                        </div>
                                        <div class="col-10 my-1">
                                            <input type="text" value="{{ $dinamico->title }}" id="title" name="title"
                                                class="form-control" name="fname" placeholder="TTitulo del sitio web" />
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="webmaster_email">Correo
                                                electronico web-master</label>
                                        </div>
                                        <div class="col-10 my-1">
                                            <input type="email" value="{{ $dinamico->webmaster_email }}"
                                                id="webmaster_email" name="webmaster_email" class="form-control"
                                                name="fname" placeholder="Correo electronico web-master" />
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="favicon">Favicon</label>
                                        </div>
                                        <div class="col-8 my-1">
                                            <input class="form-control {{ $errors->has('favicon') ? ' is-invalid' : '' }}"
                                                type="file" id="favicon" name="favicon">
                                            {!! $errors->first('favicon', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                                        </div>
                                        <div class="col-2">
                                            <div class="avatar avatar-lg">
                                                <img src="{{ 'storage/settings/' . $dinamico->favicon }}" alt="avatar">
                                            </div>
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="home_bg">Fondo de la pagina de
                                                inicio</label>
                                        </div>
                                        <div class="col-8 my-1">
                                            <input class="form-control {{ $errors->has('home_bg') ? ' is-invalid' : '' }}"
                                                type="file" id="home_bg" name="home_bg">
                                            {!! $errors->first('home_bg', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                                        </div>
                                        <div class="col-2">
                                            <div class="avatar avatar-lg">
                                                <img src="{{ 'storage/settings/' . $dinamico->home_bg }}" alt="avatar">
                                            </div>
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="about_bg">Acerca de mi
                                                imagen</label>
                                        </div>
                                        <div class="col-8 my-1">
                                            <input
                                                class="form-control {{ $errors->has('about_bg') ? ' is-invalid' : '' }}"
                                                type="file" id="about_bg" name="about_bg">
                                            {!! $errors->first('about_bg', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                                        </div>
                                        <div class="col-2">
                                            <div class="avatar avatar-lg">
                                                <img src="{{ 'storage/settings/' . $dinamico->about_bg }}" alt="avatar">
                                            </div>
                                        </div>
                                        <!-- Fin Campo  -->
                                        <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1">
                                            <label class="form-label font-weight-bold" for="contact_bg">Imagen del
                                                formulario de contacto </label>
                                        </div>
                                        <div class="col-8 my-1">
                                            <input
                                                class="form-control {{ $errors->has('contact_bg') ? ' is-invalid' : '' }}"
                                                type="file" id="contact_bg" name="contact_bg">
                                            {!! $errors->first('contact_bg', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                                        </div>
                                        <div class="col-2">
                                            <div class="avatar avatar-lg">
                                                <img src="{{ 'storage/settings/' . $dinamico->contact_bg }}" alt="avatar">
                                            </div>
                                        </div>
                                        <!-- Fin Campo  -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="config-general" aria-labelledby="config-general-tab" role="tabpanel">
                                    <div class="row">
                                        <!-- INICIO Campo  -->
                                        <ul class="list-group p-3">
                                            <h5 class="my-2 text-center">Apariencia de los widgets de la página del blog</h5>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span> Permitir que aparezca el widget de cuadro de búsqueda? </span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="blog_search_wedgit" {{ $dinamico->blog_search_wedgit == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span> Permitir que aparezca el widget de categorías?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="blog_categories_widget" {{ $dinamico->blog_categories_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezca el widget de últimas publicaciones?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="blog_latest_widget" {{ $dinamico->blog_latest_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezca el widget de publicaciones populares?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="blog_popular_widget" {{ $dinamico->blog_popular_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <h5 class="my-2 text-center">Apariencia de widgets de la página de publicación</h5>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezca el widget de cuadro de búsqueda?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="post_search_widget" {{ $dinamico->post_search_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezca el widget de últimas publicaciones?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="post_latest_widget" {{ $dinamico->post_latest_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezca el widget de publicaciones relacionadas?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="post_related_widget" {{ $dinamico->post_related_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezca el widget de etiquetas?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="post_tags_widget" {{ $dinamico->post_tags_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezcan comentarios?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="blog_comments_widget" {{ $dinamico->blog_comments_widget == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <h5 class="my-2 text-center">Apariencia de widgets de página de objeto</h5>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezcan proyectos relacionados?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="portfolio_related" {{ $dinamico->portfolio_related == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span>Permitir que aparezcan comentarios?</span>
                                                <div class="form-check form-check-success form-switch ms-auto">
                                                    <input type="checkbox" name="portfolio_comments" {{ $dinamico->portfolio_comments == 1 ? 'checked':'' }} class="form-check-input" id="customSwitch4" />
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- Fin Campo  -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="seo" aria-labelledby="seo-tab" role="tabpanel">
                                    <div class="row">
                                            <!-- Inicio Campo  -->
                                        <div class="col-2 mt-4 text-center  my-1 d-flex align-items-center ">
                                            <label class="form-label font-weight-bold" for="meta_keywords">Palabras clave meta</label>
                                        </div>
                                        <div class="col-10 mt-4 my-1">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="meta_keywords" >{{ $dinamico->meta_keywords }}</textarea>
                                        </div>
                                        <!-- Fin Campo  -->
                                            <!-- Inicio Campo  -->
                                        <div class="col-2 text-center  my-1 d-flex align-items-center ">
                                            <label class="form-label font-weight-bold" for="meta_description">Meta descripción</label>
                                        </div>
                                        <div class="col-10 my-1">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="meta_description">{{ $dinamico->meta_description }}</textarea>
                                        </div>
                                        <!-- Fin Campo  -->
                                    </div>
                                </div>
                                <div class="col-12 my-4 text-center">
                                    <button type="submit" class="btn btn-primary me-1">Guardar</button>
                                    <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
