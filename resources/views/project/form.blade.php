<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('title') }}
            {{ Form::text('title', $project->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('link') }}
            {{ Form::text('link', $project->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) }}
            {!! $errors->first('link', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('datetime') }}
            {{ Form::date('datetime', $project->datetime, ['class' => 'form-control' . ($errors->has('datetime') ? ' is-invalid' : ''), 'placeholder' => 'Datetime']) }}
            {!! $errors->first('datetime', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('description') }}
            {{ Form::text('description', $project->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Project Category </label>
            <select name="project_category_id" id="project_category_id"
                class="form-control {{ $errors->has('project_category_id') ? ' is-invalid' : '' }}">
                @foreach ($projects_category as $project_category)
                    <option value="{{ $project_category->id }}" {{ ($project_category->id == $project->project_category_id) ? 'selected' : '' }}>{{ $project_category->title }}</option>
                @endforeach
            </select>
            {!! $errors->first('project_category_id', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Imagen </label>
            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile" name="image">
            {!! $errors->first('image', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        @if ($project->image)
        <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded mt-3 mb-2" src="{{ '../../storage/projects/'.$project->image }}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
                <h4>{{ $project->image }}</h4>
            </div>
        </div>
        @endif
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('project.index',$project->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>