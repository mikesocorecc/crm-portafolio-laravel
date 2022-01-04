@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Skill')

@section('content')
    <section class=" container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Skill</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('skill.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $skill->title }}
                        </div>
                        <div class="form-group">
                            <strong>Rate:</strong>
                            {{ $skill->rate }}
                        </div>
                        <div class="form-group">
                            <strong>Skill Category Id:</strong>
                            {{ $skill->skill_category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
