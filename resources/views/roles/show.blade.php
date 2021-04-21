@extends('adminlte::page')

@section('title', 'Roles Management')

@section('content_header')
<h2> Show Role </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('roles.index') }}"> Back</a>
    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
</div>
@stop

@section('content')

<section class="content">
    <div class="card">
        <div class="card-body">

{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>

        </div>
    </div>
</section>
@endsection