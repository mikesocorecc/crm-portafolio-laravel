@extends('layouts/contentLayoutMaster')

@section('title', 'Administracion de About')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Vertical Left Tabs start -->
            <div class="col-12 col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vertical Left Tabs</h4>
                    </div>
                    <div class="card-body">
                        <div class="nav-vertical">
                            <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active " id="me" data-bs-toggle="tab" aria-controls="tabVerticalLeft1" href="#tabVerticalLeft1" role="tab" aria-selected="true"><i data-feather='user'></i> Acerca de mi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contactme" data-bs-toggle="tab" aria-controls="tabVerticalLeft2" href="#tabVerticalLeft2" role="tab" aria-selected="false"><i data-feather='phone-outgoing'></i> Informacion de contacto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="static" data-bs-toggle="tab"  aria-controls="tabVerticalLeft3" href="#tabVerticalLeft3" role="tab" aria-selected="false"><i data-feather='trending-down'></i> Estatica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-link" data-bs-toggle="tab"  aria-controls="tabVerticalLeft4" href="#tabVerticalLeft4" role="tab" aria-selected="false"><i data-feather='share-2'></i> Enlaces sociales</a>
                                </li>
                            </ul>
                            <form class="form form-vertical" method="POST" action="{{ route('about.store') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabVerticalLeft1" role="tabpanel" aria-labelledby="me">
                                        <div class="row">
                                              <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="name">Nombre</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->name }}"  id="name" name="name" class="form-control"  placeholder="Nombre" />
                                                </div>
                                            <!-- Fin Campo  -->
                                             <!-- Inicio Campo  -->
                                            <div class="col-2 text-center  my-1">
                                                <label class="form-label font-weight-bold" for="avatar">Imagen perfil</label>
                                            </div>
                                            <div class="col-8 my-1">
                                                <input class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}" type="file" id="avatar" name="avatar">
                                                {!! $errors->first('avatar', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                                            </div>
                                            <div class="col-2">
                                                <div class="avatar avatar-lg">
                                                    <img src="{{ 'storage/abouts/'.$dinamico->avatar}}" alt="avatar">
                                                </div>
                                            </div>
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="nationality">Nacionalidad</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->nationality }}"  id="nationality"  name="nationality" class="form-control"  placeholder="Nacionalidad" />
                                                </div>
                                            <!-- Fin Campo  -->
                                            <!-- Inicio Campo  -->
                                            <div class="col-2 text-center  my-1 d-flex align-items-center ">
                                                <label class="form-label font-weight-bold" for="about_me">Acerca de mi</label>
                                            </div>
                                            <div class="col-10 my-1">
                                                <textarea class="form-control" placeholder="about me" id="about_me" style="height: 100px" name="about_me">{{ $dinamico->about_me }}</textarea>
                                            </div>
                                            <!-- Fin Campo  -->
                                            <!-- Inicio Campo  -->
                                            <div class="col-2 text-center  my-1 d-flex align-items-center ">
                                                <label class="form-label font-weight-bold" for="position_typing">Mis posiciones</label>
                                            </div>
                                            <div class="col-10 my-1">
                                                <textarea class="form-control" placeholder="Mis posiciones" id="position_typing" style="height: 100px" name="position_typing">{{ $dinamico->position_typing }}</textarea>
                                            </div>
                                            <!-- Fin Campo  -->
                                                  <!-- Inicio Campo  -->
                                                  <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="video_link">Descripcion del video</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text"  value="{{ $dinamico->video_link }}"  id="video_link" name="video_link" class="form-control"  placeholder="https://www.youtube.com/watch?v=YykjpeuMNEk" />
                                                </div>
                                            <!-- Fin Campo  -->
                                              <!-- Inicio Campo  -->
                                              <div class="col-2 text-center  my-1">
                                                <label class="form-label font-weight-bold" for="resume">Curriculum</label>
                                            </div>
                                            <div class="col-8 my-1">
                                                <input class="form-control {{ $errors->has('resume') ? ' is-invalid' : '' }}" type="file" id="resume" name="resume">
                                                {!! $errors->first('resume', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                                            </div>
                                            <div class="col-2 text-center">
                                                <div class="avatar avatar-lg">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/833px-PDF_file_icon.svg.png" alt="resume">
                                                </div>
                                                <span>{{ $dinamico->resume }}</span>
                                            </div>
                                            <!-- Fin Campo  -->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft2" role="tabpanel" aria-labelledby="contactme"> 
                                       <div class="row">
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1 d-flex align-items-center ">
                                                    <label class="form-label font-weight-bold" for="address">Direccion</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <textarea class="form-control" placeholder="Direccion" id="address" style="height: 100px" name="address">{{ $dinamico->address }}</textarea>
                                                </div>
                                                <!-- Fin Campo  -->
                                                     <!-- Inicio Campo  -->
                                                     <div class="col-2 text-center  my-1">
                                                        <label class="form-label font-weight-bold" for="latitude">Ubicacion</label>
                                                    </div>
                                                    <div class="col-5 my-1">
                                                        <input type="text" value="{{ $dinamico->latitude }}"  id="latitude" name="latitude" class="form-control"  placeholder="latitude" />
                                                    </div>
                                                    <div class="col-5 my-1">
                                                        <input type="text" value="{{ $dinamico->longitude }}"  id="longitude" name="longitude" class="form-control"  placeholder="longitude" />
                                                    </div>
                                                <!-- Fin Campo  -->
                                                  <!-- Inicio Campo  -->
                                                  <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="phone">Telefono</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->phone }}"  id="phone" name="phone" class="form-control"  placeholder="phone" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                 <!-- Inicio Campo  -->
                                                 <div class="col-2 text-center  my-1 d-flex align-items-center ">
                                                    <label class="form-label font-weight-bold" for="email">Correo electronico</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <textarea class="form-control"  placeholder="Correos electronicos" id="email" style="height: 100px" name="email">{{ $dinamico->email }}</textarea>
                                                </div>
                                                <!-- Fin Campo  -->
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft3" role="tabpanel"aria-labelledby="static"> 
                                      <div class="row">
                                              <!-- Inicio Campo  -->
                                              <div class="col-2 text-center  my-1">
                                                <label class="form-label font-weight-bold" for="num_projects">Proyectos</label>
                                            </div>
                                            <div class="col-10 my-1">
                                                <input type="text" value="{{ $dinamico->num_projects }}"  id="num_projects" name="num_projects" class="form-control"  placeholder="Numero de proyectos" />
                                            </div> 
                                        <!-- Fin Campo  -->
                                              <!-- Inicio Campo  -->
                                              <div class="col-2 text-center  my-1">
                                                <label class="form-label font-weight-bold" for="num_meetings">Numero de reuniones</label>
                                            </div>
                                            <div class="col-10 my-1">
                                                <input type="text" value="{{ $dinamico->num_meetings }}"   id="num_meetings" name="num_meetings" class="form-control"  placeholder="Numero de reuniones" />
                                            </div> 
                                        <!-- Fin Campo  -->
                                              <!-- Inicio Campo  -->
                                              <div class="col-2 text-center  my-1">
                                                <label class="form-label font-weight-bold" for="num_happy_clients">Clientes satisfechos</label>
                                            </div>
                                            <div class="col-10 my-1">
                                                <input type="text"   value="{{ $dinamico->num_happy_clients }}"  id="num_happy_clients" name="num_happy_clients" class="form-control"  placeholder="Clientes satisfechos" />
                                            </div> 
                                        <!-- Fin Campo  -->
                                              <!-- Inicio Campo  -->
                                              <div class="col-2 text-center  my-1">
                                                <label class="form-label font-weight-bold" for="num_experience">Experiencia</label>
                                            </div>
                                            <div class="col-10 my-1">
                                                <input type="text" value="{{ $dinamico->num_experience }}"  id="num_experience" name="num_experience" class="form-control"  placeholder="Experiencia" />
                                            </div> 
                                        <!-- Fin Campo  -->
                                      </div>
                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft4" role="tabpanel"aria-labelledby="social-link"> 
                                        <div class="row">
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="facebook">Facebook</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->facebook }}"  id="facebook" name="facebook" class="form-control"  placeholder="Facebook" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="behance">Comportamiento</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->behance }}"  id="behance" name="behance" class="form-control"  placeholder="Facebook" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="codepen">Codepen</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->codepen }}"  id="codepen" name="codepen" class="form-control"  placeholder="Codepen" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="dribbble">Regatear</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->dribbble }}"  id="dribbble" name="dribbble" class="form-control"  placeholder="Regatear" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="dropbox">Dropbox</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->dropbox }}"  id="dropbox" name="dropbox" class="form-control"  placeholder="Dropbox" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="flickr">Flickr</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->flickr }}"  id="flickr" name="flickr" class="form-control"  placeholder="Flickr" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="google_plus">Google plus</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->google_plus }}"  id="google_plus" name="google_plus" class="form-control"  placeholder="Google plus" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="instagram">Instagram</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->instagram }}"  id="instagram" name="instagram" class="form-control"  placeholder="Instagram" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="linkedin">Linkedin</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->linkedin }}"  id="linkedin" name="linkedin" class="form-control"  placeholder="Linkedin" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="pinterest">Pinterest</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->pinterest }}"  id="pinterest" name="pinterest" class="form-control"  placeholder="Pinterest" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="youtube">Youtube</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->youtube }}"  id="youtube" name="youtube" class="form-control"  placeholder="Youtube" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                                <!-- Inicio Campo  -->
                                                <div class="col-2 text-center  my-1">
                                                    <label class="form-label font-weight-bold" for="twitter">Twitter</label>
                                                </div>
                                                <div class="col-10 my-1">
                                                    <input type="text" value="{{ $dinamico->twitter }}"  id="twitter" name="twitter" class="form-control"  placeholder="Twitter" />
                                                </div> 
                                            <!-- Fin Campo  -->
                                        </div>
                                    </div>
                                    <div class="col-12 my-4 text-center">
                                        <button type="submit" class="btn btn-primary me-1">Guardar</button>
                                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Left Tabs ends -->
        </div>
    </div>
@endsection
