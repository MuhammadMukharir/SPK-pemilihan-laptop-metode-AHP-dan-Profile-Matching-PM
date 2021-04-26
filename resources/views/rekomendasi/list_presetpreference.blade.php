@extends('adminlte::page')

@section('title', 'Preset Preferences Management')

@section('content_header')
<h2> Preset Preferences </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('rekomendasi.index') }}"> Back</a>
</div>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, silakan pilih nilai preset preferensi spesifikasi laptop yang tersedia</p>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-body p-0">

<table class="table table- table-hover">
    <tr>
        <th style="text-align: center">No</th>
        <th>Preference Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($presetpreferences as $key => $presetpreference)
    <tr>
        <td style="text-align: center">{{ $key + 1 }}</td>
        <td>{{ $presetpreference->name }}</td>
        <td>{{ $presetpreference->detail }}</td>
        <td>
                <a class="btn btn-info" href="{{ route('rekomendasi.preset.show',$presetpreference->id) }}">Show</a>
                <a class="btn btn-warning" href="{{ route('rekomendasi.preset.use',$presetpreference->id) }}">Use Preset!</a>

            </form>
        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $presetpreferences->links() !!} --}}
{{-- @include('pagination.index', ['paginator' => $presetpreferences]) --}}

        </div>
    </div>
</section>


@endsection