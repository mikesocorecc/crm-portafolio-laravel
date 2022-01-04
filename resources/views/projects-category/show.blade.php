@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Projects Category')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Projects Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('projects-category.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $projectsCategory->title }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
