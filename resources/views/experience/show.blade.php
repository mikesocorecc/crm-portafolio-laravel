@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Experience')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Experience</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('experience.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Position:</strong>
                            {{ $experience->position }}
                        </div>
                        <div class="form-group">
                            <strong>Company:</strong>
                            {{ $experience->company }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $experience->description }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $experience->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $experience->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $experience->image }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
