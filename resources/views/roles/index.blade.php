@extends('adminlte::page')

@section('title', 'Roles Management')

@section('content_header')
<h2> Roles Management </h2>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, here you can manage your app roles</p>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    {{-- <div class="card">
        <div class="card-body"> --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2>Role Management</h2>
        </div> --}}
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> <i class="fas fa-plus"></i> Create New Role</a>
            @endcan
        </div>
    </div>
</div>
<br>


<table class="table table- table-hover">
<tr>
    <th style="text-align: center">No</th>
    <th>Role Name</th>
    <th width="280px">Action</th>
</tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td style="text-align: center">{{ ++$i }}</td>
        <td> <i class="fas fa-fw fa-tag"></i> <div class="badge badge-success"> {{ $role->name }} </div> </td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $roles->render() !!} --}}
@include('pagination.index', ['paginator' => $roles])

        {{-- </div>
    </div> --}}
</section>


@endsection