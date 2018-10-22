<div class="col-lg-4 col-md-12 mb-4">
    <!--Card-->
    <div class="card">

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
            <a href="{{ $specialty->filename }}" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> Descargar</a>
        </div>

    </div>
    <!--/.Card-->
</div>