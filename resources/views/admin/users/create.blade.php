@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE ADMINISTRADOR</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">

        <form action="{{ url('/users') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        {{-- <h3>Datos de apoderado</h3> --}}
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-6">

                    <div class="form-group row">
                            <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                            <div class="col-sm-8">
                                <input type="text" name="dni" class="form-control" value="{{ isset($apoderado->dni)?$apoderado->dni:'' }}" id="dni">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{ isset($apoderado->name)?$apoderado->name:'' }}" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                            <div class="col-sm-8">
                                <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($apoderado->apellido_paterno)?$apoderado->apellido_paterno:'' }}" id="apellido_paterno">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-sm-4 col-form-label">Celular</label>
                            <div class="col-sm-8">
                                <input type="text" name="celular" class="form-control" value="{{ isset($apoderado->celular)?$apoderado->celular:'' }}" id="celular">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="usuario" class="col-sm-4 col-form-label">Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" name="usuario" class="form-control" value="{{ isset($apoderado->usuario)?$apoderado->usuario:'' }}" id="usuario">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="form-control" value="{{ isset($estudiante->password)?$estudiante->password:'' }}" id="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Repita su Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="form-control" value="{{ isset($estudiante->password)?$estudiante->password:'' }}" id="password">
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6">


                        <div class="form-group row">
                            <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                            <div class="col-sm-8">
                                <input type="text" name="apellido_materno" class="form-control" value="{{ isset($apoderado->apellido_materno)?$apoderado->apellido_materno:'' }}" id="apellido_materno">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" value="{{ isset($apoderado->email)?$apoderado->email:'' }}" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- <label for="email" class="col-sm-4 col-form-label">Email</label> -->
                            <div class="col-sm-8">
                                <input type="hidden" name="tipo_usuario" class="form-control" value="admin" id="tipo_usuario">
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-sm-4 col-form-label">Email</label> -->
                            <div class="col-sm-8">
                                <input type="hidden" name="roles" class="form-control" value="admin" id="tipo_usuario">
                            </div>
                        </div>


                    </div>
                </div>

                <input class="btn btn-info" type="submit" value="Guardar datos">

            </div>

        </form>





    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $('#myOptions').change(function() {
            var val = $("#myOptions option:selected").text();

            const div = document.getElementById("section");

            let node = document.createElement('li');
            node.innerHTML = '<input type="checkbox"><label>Content typed by the user</label>  <input type="text"><button class="edit">Edit</button><button class="delete">Delete</button>';

            // alert(val);
            if(val == 'Si'){
                // alert('SIIIIIIIIIII');
                document.getElementById('section').appendChild(node);
            }else if(val == 'No'){
                // alert('noooooooooooo');
                // createElement
                const e = document.querySelector("");
                // remove the last list item
                e.parentElement.removeChild(e);
                document.getElementById('section').removeChild(node);
            }




        });
    </script>
@stop

