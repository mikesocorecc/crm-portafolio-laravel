@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Project')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"> 
            <div class="row" id="table-borderless">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header pb-1">
                        <h4 class="card-title">Project</h4>
                        <a href="{{ route('project.create') }}" class="btn btn-relief-success">Nuevo</a>
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
                            
										<th>Title</th>
										<th>Image</th>
										<th>Link</th>
										<th>Datetime</th>
										<th>Description</th>
										<th>Project Category Id</th>

                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                 
											<td>{{ $project->title }}</td> 
                                            <td>
                                                <div class="avatar avatar-xl">
                                                    <img src="{{ 'storage/projects/'.$project->image }}"  alt="img">                                                
                                                </div>
                                            </td>
											<td>{{ $project->link }}</td>
											<td>{{ $project->datetime }}</td>
											<td>{{ $project->description }}</td>
											<td>{{ $project->project_category_id }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"  href="{{ route('project.show',$project->id) }}">
                                                <i data-feather="eye" class="me-50"></i>
                                                <span>Ver</span>
                                            </a>
                                            <a class="dropdown-item"  href="{{ route('project.edit',$project->id) }}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Editar</span>
                                            </a>
                                            <form action="{{ route('project.destroy',$project->id) }}" method="POST">
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
