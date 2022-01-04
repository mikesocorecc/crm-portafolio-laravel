@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Setting')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @includeif('partials.errors')
                <div class="card ">
                    <div class="card-header">
                        <span class="card-title">Create Setting</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('setting.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
