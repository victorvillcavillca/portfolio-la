@extends('layouts.admin-dash')

@section('content')
<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.categories.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Ver Usuario
                </div>
                <!--Card content-->
                <div class="card-body">
                    <p><strong>Nombre</strong>     {{ $user->name }}</p>
                    <p><strong>Email</strong>      {{ $user->email }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection