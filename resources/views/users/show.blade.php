@extends('adminlte::page')

@section('title', 'Users Management')

@section('content_header')
<h2> Show User </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
</div>
@stop

@section('content')

<section class="content">
    <div class="card">
        <div class="card-body">

            
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-pill badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>

        </div>
    </div>
</section>
@endsection