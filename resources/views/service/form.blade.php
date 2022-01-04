<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('title') }}
            {{ Form::text('title', $service->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('description') }}
            {{ Form::text('description', $service->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Imagen </label>
            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile" name="image">
            {!! $errors->first('image', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        @if ($service->image)
        <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded mt-3 mb-2" src="{{ '../../storage/services/'.$service->image }}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
                <h4>{{ $service->image }}</h4>
            </div>
        </div>
        @endif
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('service.index',$service->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>