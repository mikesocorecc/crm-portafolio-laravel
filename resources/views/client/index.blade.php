@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de Client')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"> 
            <div class="row" id="table-borderless">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header pb-1">
                        <h4 class="card-title">Client</h4>
                        <a href="{{ route('client.create') }}" class="btn btn-relief-success">Nuevo</a>
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
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->title }}</td>
                                <td>
                                    <div class="avatar avatar-xl">
                                        <img src="{{ 'storage/clients/'.$client->image }}"  alt="img">                                                
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"  href="{{ route('client.show',$client->id) }}">
                                                <i data-feather="eye" class="me-50"></i>
                                                <span>Ver</span>
                                            </a>
                                            <a class="dropdown-item"  href="{{ route('client.edit',$client->id) }}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Editar</span>
                                            </a>
                                            <form action="{{ route('client.destroy',$client->id) }}" method="POST">
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
