@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <br>

                        <div>
                            @can('admin.index')
                                <button type="button" class="btn btn-outline-primary"><a
                                        href=" {{ route('users.index') }}">User</a></button>

                                <button type="button" class="btn btn-outline-primary"><a
                                        href=" {{ route('users.index') }}">PDF</a></button>
                            @endcan

                            @can('reinsurers.edit')
                                <button type="button" class="btn btn-outline-secondary"><a
                                        href="{{ route('reinsurers.index') }}">Reinsurer</a></button>
                            @endcan

                            {{-- @can('regions.index')
                                <button type="button" class="btn btn-outline-success"><a
                                        href="{{ route('regions.index') }}">Region</a> </button>
                            @endcan --}}



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
