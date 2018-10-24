@extends('layouts.blog')
@section('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
@endsection

@section('content')
<div class="container">
    <!--Breadcrumbs-->
    @php $name = 'post' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->

            <!--Section: Post-->
            <section class="mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-4">

                        <!--Featured Image-->
                        {{-- <div class="card mb-4 wow fadeIn"> --}}
                        <div class="card mb-4 wow fadeIn">

                            {{-- <img src="http://mdbootstrap.com/img/Photos/Slides/img%20(144).jpg" class="img-fluid" alt=""> --}}
                            @if($post->file)
                                <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                            @endif

                        </div>
                        <!--/.Featured Image-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">
                                <h2>{{ $post->name }}</h2>
                                {{-- <p class="h5 my-4">{{ $post->name }}</p> --}}


                                <blockquote class="blockquote">
                                    <p class="mb-0">{!! $post->excerpt !!}</p>
                                    {{-- <footer class="blockquote-footer">Someone famous in
                                        <cite title="Source Title">Source Title</cite>
                                    </footer> --}}
                                </blockquote>

                                {{-- <p class="h5 my-4">That's a very long heading </p> --}}

                                {!! $post->body !!}

                                <hr>

                                <p class="h5 my-4">Categoría</p>
                                <strong><a href="{{ route('category', $post->category->slug) }}" class="card-link">{{ $post->category->name }}</a></strong>
                            </div>


                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header font-weight-bold">
                                <span>Acerca del Autor</span>
                                <span class="pull-right">
                                    <a href="">
                                        <i class="fa fa-facebook mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin mr-2"></i>
                                    </a>
                                </span>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <div class="media d-block d-md-flex mt-3">
                                    {{-- <img class="d-flex mb-3 mx-auto z-depth-1" src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image"
                                        style="width: 100px;"> --}}
                                    <img class="d-flex mb-3 mx-auto z-depth-1" src="{{ $post->user->photo }}" alt="Generic placeholder image"
                                        style="width: 100px;">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{ $post->user->name }}
                                        </h5>
                                        {{ $post->user->bio }}
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Comments-->
                        <div class="card card-comments mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">{{ $post->comments()->count() }} omentarios</div>
                            <div class="card-body">

                                @foreach($post->comments as $comment)
                                <div class="media d-block d-md-flex mt-4">
                                    <img class="d-flex mb-3 mx-auto " src="{{ $comment->user->photo }}" alt="Generic placeholder image">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{ $comment->user->name }}
                                            <a href="" class="pull-right">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                            <h6 class="date">{{ $comment->created_at->diffForHumans()}}</h6>
                                        </h5>
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                                @endforeach
                                <!-- Quick Reply -->
                                @guest
                                    <p>Para publicar un nuevo comentario. Necesitas iniciar sesión primero.<a class="btn btn-default btn-sm" href="{{ route('login') }}">Login</a></p>
                                @else
                                    <form method="post" action="{{ route('comment.store',$post->id) }}">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label for="quickReplyFormComment">Your comment</label>
                                            <textarea name="comment" rows="2" class="form-control" id="quickReplyFormComment"></textarea>

                                            <div class="text-center">
                                                <button class="btn btn-info btn-sm" type="submit">Post</button>
                                            </div>
                                        </div>
                                    </form>
                                @endguest
                            </div>
                        </div>
                        <!--/.Comments-->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">


                        <!--/.Card : Dynamic content wrapper-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-2">Artículos Relacionados</div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled">
                                    @php $c = 0; @endphp
                                    @foreach($post->tags as $tag)
                                    {{-- <a href="{{ route('tag', $tag->slug) }}">
                                        {{ $tag->name }}
                                    </a> --}}

                                    @if($c % 2 == 0)
                                    <li class="media">
                                    @else
                                    <li class="media my-4">
                                    @endif
                                        {{-- <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image"> --}}
                                        <div class="media-body">
                                            <a href="{{ route('tag', $tag->slug) }}">
                                                <h5 class="mt-0 mb-1 font-weight-bold">{{ $tag->name }}</h5>
                                            </a>
                                            {{-- Lorem ipsum dolor. --}}
                                        </div>
                                    </li>
                                    @php $c++; @endphp
                                    @endforeach


                                </ul>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Post-->

        </div>

@endsection

@section('scripts')
  {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script> --}}
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}
  <!-- page script -->
  <
@endsection