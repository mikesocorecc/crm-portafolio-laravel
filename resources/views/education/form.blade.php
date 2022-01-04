<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('school') }}
            {{ Form::text('school', $education->school, ['class' => 'form-control' . ($errors->has('school') ? ' is-invalid' : ''), 'placeholder' => 'School']) }}
            {!! $errors->first('school', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('speciality') }}
            {{ Form::text('speciality', $education->speciality, ['class' => 'form-control' . ($errors->has('speciality') ? ' is-invalid' : ''), 'placeholder' => 'Speciality']) }}
            {!! $errors->first('speciality', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('description') }}
            {{ Form::text('description', $education->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $education->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $education->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Imagen </label>
            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile" name="image">
            {!! $errors->first('image', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        @if ($education->image)
        <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded mt-3 mb-2" src="{{ '../../storage/educations/'.$education->image }}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
                <h4>{{ $education->image }}</h4>
            </div>
        </div>
        @endif
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('education.index',$education->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>