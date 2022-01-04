@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de About')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show About</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('about.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $about->key }}
                        </div>
                        <div class="form-group">
                            <strong>Value:</strong>
                            {{ $about->value }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
