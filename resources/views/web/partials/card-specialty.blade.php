<div class="col-lg-4 col-md-12 mb-4">
    <!--Card-->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-clock-o"></i> {{ $specialty->created_at  }} por <a href="#"><i class="fa fa-user"></i> {{ $specialty->user['name'] }}</a>
        </div>

        <!--Card image-->
        <div class="text-center">
          @if($specialty->file)
            <img src="{{ $specialty->file }}" class="img-fluid" alt="{{ $specialty->name }}">
          @endif
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h5 class="card-title">{{ $specialty->name }}</h5>
            <!--Text-->
            <p class="card-text">{{ $specialty->description }}</p>
         {{--    @guest
                <a href="#" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> Descargar</a>
                <p>Para descargar. Necesitas iniciar sesión primero.<a class="btn btn-default btn-sm" href="{{ route('login') }}">Login</a></p>
            @else --}}
                <a href="{{ $specialty->filename }}" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-download"></i> Descargar</a>



               {{--  <a href="{{ route('specialty', $specialty->slug) }}" target="_blank" class="btn btn-default btn-rounded btn-md waves-effect waves-light">Leer más<i class="fa fa-photo ml-2"></i></a> --}}
            {{-- @endguest --}}
        </div>

    </div>
    <!--/.Card-->
</div>