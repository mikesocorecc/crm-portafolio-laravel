@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Client')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Client</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('client.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $client->title }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $client->image }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
