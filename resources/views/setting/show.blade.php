@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Setting')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Setting</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('setting.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Value:</strong>
                            {{ $setting->value }}
                        </div>
                        <div class="form-group">
                            <strong>Default Value:</strong>
                            {{ $setting->default_value }}
                        </div>
                        <div class="form-group">
                            <strong>Required:</strong>
                            {{ $setting->required }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
