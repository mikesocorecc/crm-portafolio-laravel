@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Blog')

@section('content')
   <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Blog</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('blog.update', $blog->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('blog.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
