@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Testimonial')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Testimonial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('testimonial.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $testimonial->name }}
                        </div>
                        <div class="form-group">
                            <strong>Position:</strong>
                            {{ $testimonial->position }}
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            {{ $testimonial->message }}
                        </div>
                        <div class="form-group">
                            <strong>Rating:</strong>
                            {{ $testimonial->rating }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $testimonial->image }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
