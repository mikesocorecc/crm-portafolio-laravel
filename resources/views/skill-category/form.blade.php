<div class="box box-info padding-1">
    <div class="row justify-content-center">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('title') }}
            {{ Form::text('title', $skillCategory->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('skill-category.index',$skillCategory->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>