@extends('layouts.blog')

@section('content')
<div class="container">
	<!--Breadcrumbs-->
	@php $name = 'start' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h2 class="justify-content-center">Bienvenido al blog del Club de Conquistadores</h2>
            <h3 class="justify-content-center">{{ Auth::user()->name }}</h3>
        </div>
    </div>


    {{-- <my-thoughts-component></my-thoughts-component> --}}

</div>
@endsection
