@extends('adminlte::page')

@section('title', 'Users Management')

@section('content_header')
<h2> Users Management </h2>
@stop

@section('content')

<style>
    * {
  box-sizing: border-box;
}





th {
  position: sticky;
  top: 0;
  background: #6c7ae0;
  text-align: left;
  font-weight: normal;
  font-size: 1.1rem;
  color: white;
}


</style>

<p>Hello {{ auth()->user()->name }}, here you can manage your users</p>

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
            <h2>Users Management</h2>
        </div> --}}
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fas fa-user-plus"></i> Create New User</a>
        </div>
    </div>
</div>
<br>


<table class="table table- table-hover">
<tr>
<th style="text-align: center">No</th>
<th>Username</th>
<th>Email</th>
<th>Role</th>
<th width="280px">Action</th>
</tr>
@foreach ($data as $key => $user)
<tr>
    <td style="text-align: center">{{ ++$i }}</td>
    <td> <i class="fas fa-fw fa-user"></i> {{ $user->name }}</td>
    <td> <i class="fas fa-fw fa-envelope"></i> {{ $user->email }}</td>
    <td>
        <i class="fas fa-fw fa-tag"></i>
    @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
         <label class="badge badge-pill badge-success">{{ $v }}</label>
        @endforeach
    @endif
    </td>
    <td>
    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        @if ($user->id !== auth()->user()->id )
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {{-- {!! Form::button('<i class="fas fa-user-times"></i>Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!} --}}
        {!! Form::close() !!}
        @endif
    </td>
</tr>
@endforeach
</table>
<br>

{{-- {!! $data->render("pagination::default") !!} --}}
@include('pagination.index', ['paginator' => $data])

        {{-- </div>
    </div> --}}
</section>


@endsection