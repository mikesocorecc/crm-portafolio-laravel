@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Experience')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"> 
            <div class="row" id="table-borderless">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header pb-1">
                        <h4 class="card-title">Experience</h4>
                        <a href="{{ route('experience.create') }}" class="btn btn-relief-success">Nuevo</a>
                    </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success mx-3" role="alert">
                                <h4 class="alert-heading">Success</h4>
                                <div class="alert-body">
                                    <p>{{ $message }}</p>
                                </div>
                            </div>
                        @endif
                    <div class="">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Description</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Image</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($experiences as $experience)
                            <tr>
                                <td>{{ $experience->id }}</td>
                                <td>{{ $experience->position }}</td>
                                <td>{{ $experience->company }}</td>
                                <td>{{ $experience->description }}</td>
                                <td>{{ $experience->fecha_inicio }}</td>
                                <td>{{ $experience->fecha_fin }}</td>
                                <td>
                                    <div class="avatar avatar-xl">
                                        <img src="{{ 'storage/experiences/'.$experience->image }}"  alt="img">                                                
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"  href="{{ route('experience.show',$experience->id) }}">
                                                <i data-feather="eye" class="me-50"></i>
                                                <span>Ver</span>
                                            </a>
                                            <a class="dropdown-item"  href="{{ route('experience.edit',$experience->id) }}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Editar</span>
                                            </a>
                                            <form action="{{ route('experience.destroy',$experience->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"    class="dropdown-item" >
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Borrar</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
