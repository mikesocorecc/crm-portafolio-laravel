<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('title') }}
            {{ Form::text('title', $skill->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('rate') }}
            {{ Form::text('rate', $skill->rate, ['class' => 'form-control' . ($errors->has('rate') ? ' is-invalid' : ''), 'placeholder' => 'Rate']) }}
            {!! $errors->first('rate', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Skill Category </label>
            <select name="skill_category_id" id="skill_category_id"
                class="form-control {{ $errors->has('skill_category_id') ? ' is-invalid' : '' }}">
                @foreach ($skill_categories as $skill_categorie)
                    <option value="{{ $skill_categorie->id }}" {{ ($skill_categorie->id == $skill->skill_category_id) ? 'selected' : '' }}>{{ $skill_categorie->title }}</option>
                @endforeach
            </select>
            {!! $errors->first('skill_category_id', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('skill.index',$skill->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>