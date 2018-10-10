@extends('layouts.dashboard')

@section('content')
{{-- <div class="container"> --}}
<div class="container-fluid mt-5">
    
    <!-- Alerts -->    
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.categories.partials.heading')
    <!-- Heading -->
    
    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">

                <!--Card content-->
                <div class="card-body">

                    {{-- <canvas id="myChart"></canvas> --}}
                    
                    <!-- Table  -->
    {{--                 <table class="table table-hover">
                    <!-- Table head -->
                    <thead class="blue lighten-4">
                        <tr>
                            <th>#</th>
                            <th>Lorem</th>
                            <th>Ipsum</th>
                            <th>Dolor</th>
                        </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                            <td>Cell 3</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Cell 4</td>
                            <td>Cell 5</td>
                            <td>Cell 6</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                    </tbody>
                    <!-- Table body -->
                    </table> --}}
                    <!-- Table  -->
                    <a href="{{ route('categories.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                    <table class="table table-hover">
                        <thead class="blue lighten-4">
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td scope="row">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td width="10px">
                                    {{-- <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
 --}}
                                    {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) }}
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>        

                    {{ $categories->links() }}
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Categorías 
                    <a href="{{ route('categories.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	

                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
