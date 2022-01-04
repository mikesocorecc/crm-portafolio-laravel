@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Client')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @includeif('partials.errors')
                <div class="card ">
                    <div class="card-header">
                        <span class="card-title">Create Client</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('client.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
