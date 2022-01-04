@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Skill Category')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @includeif('partials.errors')
                <div class="card ">
                    <div class="card-header">
                        <span class="card-title">Create Skill Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('skill-category.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('skill-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
