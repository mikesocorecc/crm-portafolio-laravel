<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('name') }}
            {{ Form::text('name', $message->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('email') }}
            {{ Form::email('email', $message->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('message') }}
            {{ Form::textarea('message', $message->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Message']) }}
            {!! $errors->first('message', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('message.index',$message->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>