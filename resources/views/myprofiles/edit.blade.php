@extends('adminlte::page')

@section('title', 'Users Management')

@section('content_header')
<h2> Edit Profile </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('myprofile.index') }}"> Back</a>
    <a class="btn btn-primary" href="{{ route('myprofile.changePassword.index') }}"> Change Password</a>
</div>
@stop

@section('content')

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-body">

<form class="form-horizontal" method="POST" action="{{ route('myprofile.update') }}">
    <!-- <form class="form-horizontal" method="POST" action=""> -->
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name"  id="name" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->name }}" required placeholder="Name">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" placeholder="E-mail Address">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group button">
                <button type="submit" class="btn btn-primary"> Submit</button>
                
                
                
            </div>
        </div>
    </div>
</form>

        </div>
    </div>
</section>

@endsection