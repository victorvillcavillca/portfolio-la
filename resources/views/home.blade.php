@extends('layouts.blog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido ya es parte de este Blog</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has iniciado sesión! d
                </div>
            </div>


        </div>
    </div>

    <my-thoughts-component></my-thoughts-component>

    {{-- <example-component></example-component> --}}
</div>
@endsection
