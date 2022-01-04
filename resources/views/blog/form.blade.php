<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('title') }}
            {{ Form::text('title', $blog->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('author') }}
            {{ Form::text('author', $blog->author, ['class' => 'form-control' . ($errors->has('author') ? ' is-invalid' : ''), 'placeholder' => 'Author']) }}
            {!! $errors->first('author', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Blog Category </label>
            <select name="blog_category_id" id="blog_category_id"
                class="form-control {{ $errors->has('blog_category_id') ? ' is-invalid' : '' }}">
                @foreach ($blogs_categorie as $blog_categorie)
                    <option value="{{ $blog_categorie->id }}" {{ ($blog_categorie->id == $blog->blog_category_id) ? 'selected' : '' }}>{{ $blog_categorie->title }}</option>
                @endforeach
            </select>
            {!! $errors->first('blog_category_id', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('short_description') }}
            {{ Form::text('short_description', $blog->short_description, ['class' => 'form-control' . ($errors->has('short_description') ? ' is-invalid' : ''), 'placeholder' => 'Short Description']) }}
            {!! $errors->first('short_description', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            {{ Form::label('meta_keywords') }}
            {{ Form::text('meta_keywords', $blog->meta_keywords, ['class' => 'form-control' . ($errors->has('meta_keywords') ? ' is-invalid' : ''), 'placeholder' => 'Meta Keywords']) }}
            {!! $errors->first('meta_keywords', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <div class="col-md-6 col-12 mb-1">
            <label for="formFile"> Imagen </label>
            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile"
                name="image">
            {!! $errors->first('image', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>

        <!-- Snow Editor start -->
        <div class="col-md-12 col-12 mb-1">
            {{ Form::label('Descripcion del blog') }}
            {{ Form::textarea('description', $blog->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion del blog']) }}
            {!! $errors->first('description', '<div class="invalid-feedback"><p>:message</p></div>') !!}
        </div>
        <!-- Snow Editor end -->
        @if ($blog->image)
            <div class="d-flex align-items-center flex-column">
                <img class="img-fluid rounded mt-3 mb-2" src="{{ '../../storage/blogs/' . $blog->image }}" height="110"
                    width="110" alt="User avatar">
                <div class="user-info text-center">
                    <h4>{{ $blog->image }}</h4>
                </div>
            </div>
        @endif
    </div>
    <div class="mt-5 text-center">
        <a type="submit" class="btn btn-danger" href="{{ route('blog.index', $blog->id) }}">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>
