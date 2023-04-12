@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Agregar Usuario</h4>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @method('PUT')
                @csrf
                <h6>{{ $user->getRoleNames() }}</h6>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input name="name" type="role" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" value="{{$user->password}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pais</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="country">
                        @foreach ($countries as $c)
                            <option value="{{ $c->name }}" @if ($user->country == $c->name) selected @endif>
                                {{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach ($roles as $role)
                    <div class="form-check">
                        <input name="roles[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{$role->id}}" value="{{$role->name}}"
                            @foreach ($user->getRoleNames() as $p)
                        @if ($role->name == $p) checked @endif
                            @endforeach >
                        <label class="form-check-label" for="inlineCheckbox">{{ $role->name }}</label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>

            </form>
        </div>
    </div>
@endsection


{{-- @extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Rol</h4>
        </div>
        <div class="card-body">

            <form method="POST" action="{{route('users.update',$find->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rol</label>
                    <div class="col-sm-10">
                        <input type="role" class="form-control" id="inputEmail3" placeholder="Role" value="{{$find->name}}">
                    </div>
                </div>

                @foreach ($permission as $p)
                    <div class="form-check">
                        <input name="permissions[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{$p->id}}" value="{{$p->id}}">
                        <label class="form-check-label" for="inlineCheckbox{{$p->id}}">{{ $p->description }}</label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>

            </form>
        </div>
    </div>
@endsection --}}
