@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Skill Category')

@section('content')
   <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Skill Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('skill-category.update', $skillCategory->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('skill-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
