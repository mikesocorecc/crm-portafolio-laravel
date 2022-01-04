<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('value') }}
            {{ Form::text('value', $setting->value, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Value']) }}
            {!! $errors->first('value', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('default_value') }}
            {{ Form::text('default_value', $setting->default_value, ['class' => 'form-control' . ($errors->has('default_value') ? ' is-invalid' : ''), 'placeholder' => 'Default Value']) }}
            {!! $errors->first('default_value', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('required') }}
            {{ Form::text('required', $setting->required, ['class' => 'form-control' . ($errors->has('required') ? ' is-invalid' : ''), 'placeholder' => 'Required']) }}
            {!! $errors->first('required', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>


        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Imagen </label>
            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile" name="image">
            {!! $errors->first('image', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        @if ($setting->image)
        <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded mt-3 mb-2" src="{{ '../../storage/settings/'.$setting->image }}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
                <h4>{{ $setting->image }}</h4>
            </div>
        </div>
        @endif
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('setting.index',$setting->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>