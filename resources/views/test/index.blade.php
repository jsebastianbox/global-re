@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Lista de usuarios</h4>

        </div>
        <div class="card-body">
            <a href="{{route('users.create')}}" class="btn btn-info">ADD</a> <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">Editar</a>
                                <form role='form' method="POST" action="{{route('users.destroy',$user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
