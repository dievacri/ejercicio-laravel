@extends('pages._page_layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Usuarios</h2>
            <button class="btn btn-success pt-2 pb-2" onclick="showModal()">Nuevo</button>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nº</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Fecha de Registro</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->user }}</td>
                            <td>{{ $user->name }} {{ $user->last_name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if ( $user->active === 1)
                                    <button class="btn btn-danger" onclick="disable({{ $user->id }})">Desactivar</button>
                                @else
                                    <button class="btn btn-success" onclick="enable({{ $user->id }})">Activar</button>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="showModal({{ $user }})"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="user">Usuario</label>
                        <input type="text" class="form-control" id="user" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnNew" class="btn btn-primary" onclick="registrar()">registrar</button>
                    <button type="button" id="btnUpdate" class="btn btn-primary" onclick="edit()">Modificar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/user.js') }}"></script>
@endsection