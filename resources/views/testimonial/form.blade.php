<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('name') }}
            {{ Form::text('name', $testimonial->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('position') }}
            {{ Form::text('position', $testimonial->position, ['class' => 'form-control' . ($errors->has('position') ? ' is-invalid' : ''), 'placeholder' => 'Position']) }}
            {!! $errors->first('position', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('message') }}
            {{ Form::text('message', $testimonial->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Message']) }}
            {!! $errors->first('message', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('rating') }}
            {{ Form::number('rating', $testimonial->rating, ['class' => 'form-control' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Rating']) }}
            {!! $errors->first('rating', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Imagen </label>
            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile" name="image">
            {!! $errors->first('image', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        @if ($testimonial->image)
        <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded mt-3 mb-2" src="{{ '../../storage/testimonials/'.$testimonial->image }}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
                <h4>{{ $testimonial->image }}</h4>
            </div>
        </div>
        @endif
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('testimonial.index',$testimonial->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>