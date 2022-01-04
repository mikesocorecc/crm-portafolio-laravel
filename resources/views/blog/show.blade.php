@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Blog')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Blog</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('blog.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $blog->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $blog->description }}
                        </div>
                        <div class="form-group">
                            <strong>Datetime:</strong>
                            {{ $blog->datetime }}
                        </div>
                        <div class="form-group">
                            <strong>Author:</strong>
                            {{ $blog->author }}
                        </div>
                        <div class="form-group">
                            <strong>Short Description:</strong>
                            {{ $blog->short_description }}
                        </div>
                        <div class="form-group">
                            <strong>Visits:</strong>
                            {{ $blog->visits }}
                        </div>
                        <div class="form-group">
                            <strong>Meta Keywords:</strong>
                            {{ $blog->meta_keywords }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $blog->image }}
                        </div>
                        <div class="form-group">
                            <strong>Blog Category Id:</strong>
                            {{ $blog->blog_category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
