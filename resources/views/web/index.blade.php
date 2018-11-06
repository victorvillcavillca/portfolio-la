@extends('layouts.blog')

@section('content')
<div class="container">
    <my-thoughts-component :username={{ auth::user()->name }}></my-thoughts-component>

</div>
@endsection
