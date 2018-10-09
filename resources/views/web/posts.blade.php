@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        	<h1>Lista de artículos</h1>

        	@foreach($posts as $post)
            <div class="card">
                <div class="card-header">{{ $post->name }}</div>

                <div class="card-body">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                    @endif
                    
                    {{ $post->excerpt }}
                    <a href="{{ route('post', $post->slug) }}" class="card-link">Leer más</a>
                </div>
            </div>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
