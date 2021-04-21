@extends('adminlte::page')

@section('title', 'AHP Management')

@section('content_header')
<h2> AHP Management </h2>
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

<p>Hello {{ auth()->user()->name }}, here you can manage your AHP weighting</p>


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
            <a class="btn btn-success" href="{{ route('ahp.create') }}"> <i class="fas fa-plus"></i> Create New Calculation</a>
        </div>
    </div>
</div>
<br>


<table class="table table- table-hover">
<tr>
<th style="text-align: center">No</th>
<th>Nama Perhitungan</th>
<th>Detail</th>
<th>Atribut</th>
<th width="320px">Action</th>
</tr>
@foreach ($ahplist as $key => $ahp)
<tr>
    <td style="text-align: center">{{ $key + 1 }}</td>
    <td>{{ $ahp->nama_perhitungan }}</td>
    <td>{{ $ahp->detail }}</td>

    <td>
   
    @if ( $ahp->is_konsisten ) <label class="badge badge-pill badge-success"> Perhitungan Konsisten </label>
    @else       <label class="badge badge-danger"> Perhitungan Belum Konsisten </label>    
    @endif

    {{-- @if ( $ahp->is_konsisten ) <label class="badge badge-danger"> Perhitungan Belum Konsisten </label> 
    @else          
    @endif --}}

    @if ( $ahp->is_dipilih ) <label class="badge badge-pill badge-success"> Aktif </label>
    @endif

    </td>

    <td>
    <a class="btn btn-info" href="{{ route('ahp.show',$ahp->id_perhitungan) }}">Show</a>
    <a class="btn btn-primary" href="{{ route('ahp.edit',$ahp->id_perhitungan) }}">Edit</a>

    {!! Form::open(['method' => 'DELETE','route' => ['ahp.destroy', $ahp->id_perhitungan],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {{-- {!! Form::button('<i class="fas fa-user-times"></i>Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!} --}}
        {!! Form::close() !!} 

    @if (!$ahp->is_dipilih && $ahp->is_konsisten)
        {!! Form::open(['method' => 'post','route' => ['ahp.toggle', $ahp->id_perhitungan],'style'=>'display:inline']) !!}
            {!! Form::submit('Set Aktif', ['class' => 'btn btn-warning']) !!}
            {{-- {!! Form::button('<i class="fas fa-user-times"></i>Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!} --}}
        {!! Form::close() !!}
    @else
        
    @endif
        
        
        

        
        
    </td>

</tr>
@endforeach
</table>


{{-- {!! $data->render("pagination::default") !!} --}}
{{-- @include('pagination.index', ['paginator' => $data]) --}}

        {{-- </div>
    </div> --}}
</section>


@endsection