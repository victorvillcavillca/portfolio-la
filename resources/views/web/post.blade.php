@extends('layouts.blog')

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
                                <h1>{{ $post->name }}</h1>
                                {{-- <p class="h5 my-4">{{ $post->name }}</p> --}}


                                <blockquote class="blockquote">
                                    <p class="mb-0">{{ $post->excerpt }}</p>
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

                        <!--Card: Jumbotron-->
                        {{-- <div class="card blue-gradient mb-4 wow fadeIn">

                            <!-- Content -->
                            <div class="card-body text-white text-center">

                                <h4 class="mb-4">
                                    <strong>Learn Bootstrap 4 with MDB</strong>
                                </h4>
                                <p>
                                    <strong>Best & free guide of responsive web design</strong>
                                </p>
                                <p class="mb-4">
                                    <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video
                                        and written versions available. Create your own, stunning website.</strong>
                                </p>
                                <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-outline-white btn-md">Start free tutorial
                                    <i class="fa fa-graduation-cap ml-2"></i>
                                </a>

                            </div>
                            <!-- Content -->
                        </div> --}}
                        <!--Card: Jumbotron-->

                        <!--Card : Dynamic content wrapper-->
                       {{--  <div class="card mb-4 text-center wow fadeIn">

                            <div class="card-header">Do you want to get informed about new articles?</div>

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Default form login -->
                                <form>

                                    <!-- Default input email -->
                                    <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                                    <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                                    <br>

                                    <!-- Default input password -->
                                    <label for="defaultFormNameEx" class="grey-text">Your name</label>
                                    <input type="text" id="defaultFormNameEx" class="form-control">

                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">Sign up</button>
                                    </div>
                                </form>
                                <!-- Default form login -->

                            </div>

                        </div> --}}
                        <!--/.Card : Dynamic content wrapper-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header">Artículos Relacionados</div>

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
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="{{ route('tag', $tag->slug) }}">
                                                <h5 class="mt-0 mb-1 font-weight-bold">{{ $tag->name }}</h5>
                                            </a>
                                            {{-- Lorem ipsum dolor. --}}
                                        </div>
                                    </li>
                                    @php $c++; @endphp
                                    @endforeach

                                    {{-- <li class="media">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                    <li class="media my-4">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder6.jpg" alt="An image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>

                                    <li class="media my-4">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object pepep</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li> --}}
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

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        	<h1>{{ $post->name }}</h1>

            <div class="card">
                <div class="card-header">
                    1 Categoría<a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}
                    </a>
                </div>

                <div class="card-body">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                    @endif

                    {{ $post->excerpt }}
                    <hr>
                    {!! $post->body !!}
                    <hr>

                    Etiquetas
                    @foreach($post->tags as $tag)
                    <a href="{{ route('tag', $tag->slug) }}">
                        {{ $tag->name }}
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div> --}}
@endsection