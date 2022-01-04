@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Blog')
@section('page-style')
 {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> --}}
@endsection


@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @includeif('partials.errors')
                <div class="card ">
                    <div class="card-header">
                        <span class="card-title">Create Blog</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('blog.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('blog.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script')
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
@endsection