@extends('layouts.blog')

@section('content')
<div class="container">
	<!--Breadcrumbs-->
	@php $name = 'start' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->

    <my-thoughts-component></my-thoughts-component>

</div>
@endsection
