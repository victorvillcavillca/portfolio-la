<div class="col-lg-6 col-md-12 mb-4">
    <!--Card-->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-clock-o"></i> {{ $video->created_at  }} por <a href="#"><i class="fa fa-user"></i> {{ $video->user['name'] }}</a>
        </div>

        <!--Card image-->
        <div class="view overlay">
            <div class="embed-responsive embed-responsive-16by9 rounded-top">
                {!! $video->embed_code !!}
            </div>
        </div>

        <!--Card content-->
        <div class="card-body">
            <!--Title-->
            <h5 class="card-title">{{ $video->name }}</h5>
            <!--Text-->
            <p class="card-text">{{ $video->description }}</p>
            <a href="{{ $video->url }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-file"></i> ver en Youtube</a>
        </div>

    </div>
    <!--/.Card-->
</div>