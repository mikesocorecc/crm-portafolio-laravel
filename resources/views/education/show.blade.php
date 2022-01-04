@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Education')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Education</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('education.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>School:</strong>
                            {{ $education->school }}
                        </div>
                        <div class="form-group">
                            <strong>Speciality:</strong>
                            {{ $education->speciality }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $education->description }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $education->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $education->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $education->image }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
