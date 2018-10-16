@extends('layouts.blog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        	<h1>{{ $specialty->name }}</h1>

            <div class="card">
                <div class="card-header">
                    Catergoría
                    {{-- <a href="{{ route('specialtyArea', $specialty->specialtyArea->slug) }}">
                        {{ $specialty->specialtyArea->name }}
                    </a> --}}
                </div>

                <div class="card-body">
                    @if($specialty->file)
                        <img src="{{ $specialty->file }}" class="img-fluid" alt="{{ $specialty->name }}">
                    @endif

                    {{ $specialty->description }}
                    <hr>
                    {!! $specialty->body !!}
                    <hr>

                    Etiquetas
                    {{-- @foreach($specialty->tags as $tag)
                    <a href="{{ route('tag', $tag->slug) }}">
                        {{ $tag->name }}
                    </a>
                    @endforeach --}}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection