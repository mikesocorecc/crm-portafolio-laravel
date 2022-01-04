@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Project')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Project</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('projects.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $project->title }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $project->image }}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            {{ $project->link }}
                        </div>
                        <div class="form-group">
                            <strong>Datetime:</strong>
                            {{ $project->datetime }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $project->description }}
                        </div>
                        <div class="form-group">
                            <strong>Project Category Id:</strong>
                            {{ $project->project_category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
