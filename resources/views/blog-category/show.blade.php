@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Blog Category')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Blog Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('blog-category.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $blogCategory->title }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
