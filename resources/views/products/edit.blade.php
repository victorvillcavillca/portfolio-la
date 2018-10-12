@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    
    <!-- Alerts -->    
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.products.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Editar Producto
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->
                
                <!--Card content-->
                <div class="card-body">
                    {!! Form::model($product, ['route' => ['products.update', $product->id],
                    'method' => 'PUT']) !!}

                        @include('products.partials.form')
                        
                    {!! Form::close() !!}
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection