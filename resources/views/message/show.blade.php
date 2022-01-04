@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Message')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Message</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('message.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $message->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $message->email }}
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            {{ $message->message }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
