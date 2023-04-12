@extends('layouts.app')

@section('content')
    <h4>Adjuntar PDF</h4>
    <div class="card-body">

        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="file">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>


    </div>
@endsection
