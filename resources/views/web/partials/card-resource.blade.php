<div class="col-lg-4 col-md-12 mb-4">
    <!--Card-->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-clock-o"></i> {{ $resource->created_at  }} por <a href="#"><i class="fa fa-user"></i> {{ $resource->user['name'] }}</a>
        </div>

        <!--Card image-->
        <div class="text-center">
          @if($resource->file)
            <img src="{{ $resource->file }}" class="img-fluid" alt="{{ $resource->name }}">
          @endif
        </div>

        <!--Card content-->
        <div class="card-body">
            <!--Title-->
            <h5 class="card-title">{{ $resource->name }}</h5>
            <!--Text-->
            <p class="card-text">{{ $resource->description }}</p>
            <a href="{{ $resource->filename }}" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-file"></i> Descargar</a>
        </div>

    </div>
    <!--/.Card-->
</div>