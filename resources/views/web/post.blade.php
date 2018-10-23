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

        <section class="comment-section">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        @guest
                            <p>For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a></p>
                        @else
                            <form method="post" action="{{ route('comment.store',$post->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control"
                                                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                    </div><!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                    </div><!-- col-sm-12 -->

                                </div><!-- row -->
                            </form>
                        @endguest
                    </div><!-- comment-form -->

                    <h4><b>COMMENTS({{ $post->comments()->count() }})</b></h4>
                    @if($post->comments->count() > 0)
                        @foreach($post->comments as $comment)
                            <div class="commnets-area ">

                                <div class="comment">

                                    <div class="post-info">

                                        <div class="left-area">
                                            {{-- <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" alt="Profile Image"></a> --}}

                                            <a class="avatar" href="#"><img src="{{ asset('image/aMgsf8SUyvCaDh81VN1fkk2VS3mysWSg5JACUAwr.png') }}" alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                                            <h6 class="date">on {{ $comment->created_at->diffForHumans()}}</h6>
                                        </div>

                                    </div><!-- post-info -->

                                    <p>{{ $comment->comment }}</p>

                                </div>

                            </div><!-- commnets-area -->
                        @endforeach
                    @else

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No Comment yet. Be the first :)</p>
                    </div>
                    </div>

                    @endif

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>


@endsection

@section('scripts')
  {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script> --}}
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}
  <!-- page script -->
  <
@endsection