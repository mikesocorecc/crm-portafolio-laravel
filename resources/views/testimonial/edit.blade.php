@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Testimonial')

@section('content')
   <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Testimonial</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('testimonial.update', $testimonial->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('testimonial.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
