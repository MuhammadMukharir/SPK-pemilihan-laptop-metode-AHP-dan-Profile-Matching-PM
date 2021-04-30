@extends('adminlte::page')

@section('title', 'AHP Management')

@section('content_header')
<h2> Add New AHP Calculation </h2>

<form id="productCreateForm" action="{{ route('ahp.store') }}" method="POST">
    @csrf
    
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('ahp.index') }}"> Back</a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>
    {{-- <button type="submit" onclick="document.getElementById('productCreateForm').submit()" class="btn btn-warning">Submit</button> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@stop

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    th {
    position: relative;
    top: 0;
    background: #6c7ae0;
    text-align: Center;
    font-weight: normal;
    font-size: 1.1rem;
    color: white;
    }

    /* td 
    {
        height: 5px; 
        width: 5px;
    } */

    input{
        text-align: center;
    }

    .custColor{
        top: 0;
        background: #6c7ae0;
        text-align: Center;
        font-weight: normal;
        font-size: 1.1rem;
        color: white;
    }

    .cssTableCenter td
    {
        text-align: center; 
        vertical-align: middle;
    }

    .goCenter
    {
        text-align: center; 
        vertical-align: middle;
    }

    .column {
        float: left;
        width: 50%;
        }

</style>

{{-- <p>Hello {{ auth()->user()->name }}, here you can add new AHP weighting</p> --}}

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>




{{-- card --}}
<div class="row">

    <div class="col-md-3">

        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Daftar kriteria</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-hover table-borderless table-striped">
                <thead>
                  <tr>
                    <th class="goCenter">No</th>
                    <th class="" style="text-align: left">Kriteria</th>
                    {{-- <th></th> --}}
                  </tr>
                </thead>
                <tbody>
    
                  <tr>
                    <td class="custColor goCenter">C1</td>
                    <td class=""><strong> Harga laptop</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C2</td>
                    <td><strong> Prosesor</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C3</td>
                    <td><strong> Kapasitas RAM</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C4</td>
                    <td><strong> Kapasitas Harddisk</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C5</td>
                    <td><strong> Kapasitas SSD</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C6</td>
                    <td><strong> Kapasitas V-RAM</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C7</td>
                    <td><strong> Kapasitas maksimal upgrade RAM</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C8</td>
                    <td><strong> Berat laptop</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C9</td>
                    <td><strong> Ukuran layar</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C10</td>
                    <td><strong> Jenis layar</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C11</td>
                    <td><strong> Refresh rate layar</strong></td>
                  </tr><tr>
                    <td class="custColor goCenter">C12</td>
                    <td><strong> Resolusi layar</strong></td>
                  </tr>
                  

                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>

    <div class="col-md-9">

        <div class="card card-primary">

            <div class="card-header">
              <h3 class="card-title" >Detail Perhitungan</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover table-">
                    <thead>
                      <tr>
                        {{-- <th class="goCenter">Intensitas kepentingan</th>
                        <th class="goCenter">Definisi</th> --}}
                        {{-- <th></th> --}}
                      </tr>
                    </thead>
                    <tbody>

        
                      <tr>
                        <td class=""> <strong> Nama Perhitungan </strong></td>
                        <td style="width: 70%"> <input type="text" name="nama_perhitungan" class="form-control" placeholder="Nama Perhitungan" required style="text-align: left" value=""> </td>
                      </tr><tr>
                        <td class=""> <strong> Detail </strong></td>
                        <td> <input type="text" name="detail" class="form-control" placeholder="Deskripsi" required style="text-align: left" value=""> </td>
                      </tr>
      
                    </tbody>
                  </table>
        
        
        
        
            </div>
        </div>

        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Tabel Acuan Skala Perbandingan Kriteria</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-hover table-stripe table-borderles">
                <thead>
                  <tr>
                    <th class="goCenter">Intensitas kepentingan</th>
                    <th class="goCente">Definisi</th>
                    {{-- <th></th> --}}
                  </tr>
                </thead>
                <tbody>
    
                  <tr>
                    <td class="goCenter"><strong> 1</strong></td>
                    <td>Kedua kriteria tersebut sama pentingnya.</td>
                  </tr><tr>
                    <td class="goCenter"><strong> 3</strong></td>
                    <td>Satu kriteria sedikit lebih penting.</td>
                  </tr><tr>
                    <td class="goCenter"><strong>5</strong></td>
                    <td>Satu kriteria lebih penting.</td>
                  </tr><tr>
                    <td class="goCenter"><strong>7</strong></td>
                    <td>Satu kriteria jauh lebih penting.</td>
                  </tr><tr>
                    <td class="goCenter"><strong>9</strong></td>
                    <td>Satu kriteria sangatlah penting.</td>
                  </tr>
                  <tr>
                    <td class="goCenter"><strong>2, 4, 6, 8</strong></td>
                    <td>Nilai antara dua penilaian yang berdekatan.</td>
                  </tr>
                  <tr>
                    <td class="goCenter"><strong>Timbal-balik</strong></td>
                    <td>Jika kriteria i ditetapkan dengan salah satu nilai di atas jika dibandingkan dengan kriteria j, maka kriteria j memiliki nilai timbal balik jika dibandingkan dengan kriteria i. (Contoh: i : j = 3 maka j : i = 1 / 3)</td>
                  </tr>
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>


</div>



<section class="content">
    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Tabel Perbandingan Berpasangan</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body p-0">

<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2>Users Management</h2>
        </div> --}}
        {{-- <div class="pull-right">
             <h3>Tabel Perbandingan Berpasangan</h3>
        </div> --}}
    </div>
</div>





<table class="table table-borderless table- table- cssTableCenter">
<tr>
    <th>Kriteria</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>C5</th>
    <th>C6</th>
    <th>C7</th>
    <th>C8</th>
    <th>C9</th>
    <th>C10</th>
    <th>C11</th>
    <th>C12</th>
</tr>


{{-- <div class="form-group">
    <strong>Resolusi layar (jumlah pixel):</strong> (pixel vertical x pixel horizontal) 
    <input type="number" name="resolusi_layar" class="form-control" placeholder="Jumlah pixel (pixel vertical x pixel horizontal)" min=0 max="80000000" list="resolution">
    <datalist id="resolution">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="1/2">1/2</option>
        <option value="1/3">1/3</option>
        <option value="1/4">1/4</option>
        <option value="1/5">1/5</option>
        <option value="1/6">1/6</option>
    </datalist>
</div> --}}

<datalist id="bobot">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  {{-- <option value="1">1/1</option> --}}
  <option value="0.5">1/2</option>
  <option value="0.33">1/3</option>
  <option value="0.25">1/4</option>
  <option value="0.20">1/5</option>
  <option value="0.17">1/6</option>
  <option value="0.14">1/7</option>
  <option value="0.13">1/8</option>
  <option value="0.11">1/9</option>
  {{-- <option value="1">2/2</option> --}}
  <option value="0.67">2/3</option>
  <option value="0.5">2/4</option>
  <option value="0.4">2/5</option>
  <option value="0.33">2/6</option>
  <option value="0.29">2/7</option>
  <option value="0.25">2/8</option>
  <option value="0.22">2/9</option>
  {{-- <option value="1">3/3</option> --}}
  <option value="0.75">3/4</option>
  <option value="0.6">3/5</option>
  <option value="0.5">3/6</option>
  <option value="0.43">3/7</option>
  <option value="0.38">3/8</option>
  <option value="0.33">3/9</option>
  {{-- <option value="1">4/4</option> --}}
  <option value="0.8">4/5</option>
  <option value="0.67">4/6</option>
  <option value="0.57">4/7</option>
  <option value="0.5">4/8</option>
  <option value="0.44">4/9</option>
  {{-- <option value="1">5/5</option> --}}
  <option value="0.83">5/6</option>
  <option value="0.71">5/7</option>
  <option value="0.63">5/8</option>
  <option value="0.56">5/9</option>
  {{-- <option value="1">6/6</option> --}}
  <option value="0.86">6/7</option>
  <option value="0.75">6/8</option>
  <option value="0.67">6/9</option>
  {{-- <option value="1">7/7</option> --}}
  <option value="0.88">7/8</option>
  <option value="0.78">7/9</option>
  {{-- <option value="1">8/8</option> --}}
  <option value="0.89">8/9</option>
  {{-- <option value="1">9/9</option> --}}
</datalist>

<tr>
    <td class="custColor">C1</td>
    <td><input list="bobot" type="number" name="c1c1" class="form-control center" style="text-align:center" value="1"  disabled></td> <input list="bobot" type="number" name="c1c1" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c1c2" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0"> </td>
    <td> <input list="bobot" type="number" name="c1c3" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5"> </td>
    <td> <input list="bobot" type="number" name="c1c4" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="7.0">  </td>
    <td> <input list="bobot" type="number" name="c1c5" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5">  </td>
    <td> <input list="bobot" type="number" name="c1c6" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0">  </td>
    <td> <input list="bobot" type="number" name="c1c7" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5">  </td>
    <td> <input list="bobot" type="number" name="c1c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0">  </td>
    <td> <input list="bobot" type="number" name="c1c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0">  </td>
    <td> <input list="bobot" type="number" name="c1c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="6.0">  </td>
    <td> <input list="bobot" type="number" name="c1c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0">  </td>
    <td> <input list="bobot" type="number" name="c1c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="6.0">  </td>
</tr>

<tr>
    <td class="custColor">C2</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c2c2" class="form-control" value="1" disabled></td>                  <input list="bobot" type="number" name="c2c2" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c2c3" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.17"> </td>
    <td> <input list="bobot" type="number" name="c2c4" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="6.0"> </td>
    <td> <input list="bobot" type="number" name="c2c5" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.25"> </td>
    <td> <input list="bobot" type="number" name="c2c6" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="1.0"> </td>
    <td> <input list="bobot" type="number" name="c2c7" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.17"> </td>
    <td> <input list="bobot" type="number" name="c2c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.25"> </td>
    <td> <input list="bobot" type="number" name="c2c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5"> </td>
    <td> <input list="bobot" type="number" name="c2c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0"> </td>
    <td> <input list="bobot" type="number" name="c2c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5"> </td>
    <td> <input list="bobot" type="number" name="c2c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0"> </td>
</tr>

<tr>
    <td class="custColor">C3</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c3c3" class="form-control" value="1" disabled></td>              <input list="bobot" type="number" name="c3c3" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c3c4" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="9.0"> </td>
    <td> <input list="bobot" type="number" name="c3c5" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0"> </td>
    <td> <input list="bobot" type="number" name="c3c6" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="6.0"> </td>
    <td> <input list="bobot" type="number" name="c3c7" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="1.0"> </td>
    <td> <input list="bobot" type="number" name="c3c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
    <td> <input list="bobot" type="number" name="c3c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="5.0"> </td>
    <td> <input list="bobot" type="number" name="c3c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="7.0"> </td>
    <td> <input list="bobot" type="number" name="c3c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="5.0"> </td>
    <td> <input list="bobot" type="number" name="c3c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="7.0"> </td>
</tr>

<tr>
    <td class="custColor">C4</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c4c4" class="form-control" value="1" disabled></td>              <input list="bobot" type="number" name="c4c4" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c4c5" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.14"> </td>
    <td> <input list="bobot" type="number" name="c4c6" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.25"> </td>
    <td> <input list="bobot" type="number" name="c4c7" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.11"> </td>
    <td> <input list="bobot" type="number" name="c4c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.14"> </td>
    <td> <input list="bobot" type="number" name="c4c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.2"> </td>
    <td> <input list="bobot" type="number" name="c4c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.33"> </td>
    <td> <input list="bobot" type="number" name="c4c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.2"> </td>
    <td> <input list="bobot" type="number" name="c4c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.33"> </td>
</tr>

<tr>
    <td class="custColor">C5</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c5c5"class="form-control" value="1" disabled></td>               <input list="bobot" type="number" name="c5c5" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c5c6" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0"> </td>
    <td> <input list="bobot" type="number" name="c5c7" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="1.0"> </td>
    <td> <input list="bobot" type="number" name="c5c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0"> </td>
    <td> <input list="bobot" type="number" name="c5c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0"> </td>
    <td> <input list="bobot" type="number" name="c5c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="6.0"> </td>
    <td> <input list="bobot" type="number" name="c5c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="4.0"> </td>
    <td> <input list="bobot" type="number" name="c5c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="6.0"> </td>
</tr>

<tr>
    <td class="custColor">C6</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c6c6" class="form-control" value="1" disabled></td>              <input list="bobot" type="number" name="c6c6" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c6c7" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.25"> </td>
    <td> <input list="bobot" type="number" name="c6c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.25"> </td>
    <td> <input list="bobot" type="number" name="c6c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5"> </td>
    <td> <input list="bobot" type="number" name="c6c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0"> </td>
    <td> <input list="bobot" type="number" name="c6c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.5"> </td>
    <td> <input list="bobot" type="number" name="c6c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="2.0"> </td>
</tr>

<tr>
    <td class="custColor">C7</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c7c7" class="form-control" value="1" disabled></td>              <input list="bobot" type="number" name="c7c7" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c7c8" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
    <td> <input list="bobot" type="number" name="c7c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="5.0"> </td>
    <td> <input list="bobot" type="number" name="c7c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="7.0"> </td>
    <td> <input list="bobot" type="number" name="c7c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="5.0"> </td>
    <td> <input list="bobot" type="number" name="c7c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="7.0"> </td>
</tr>

<tr>
    <td class="custColor">C8</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c8c8" class="form-control" value="1" disabled></td>              <input list="bobot" type="number" name="c8c8" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c8c9" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
    <td> <input list="bobot" type="number" name="c8c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="5.0"> </td>
    <td> <input list="bobot" type="number" name="c8c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
    <td> <input list="bobot" type="number" name="c8c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="5.0"> </td>
</tr>

<tr>
    <td class="custColor">C9</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c9c9" class="form-control" value="1" disabled></td>              <input list="bobot" type="number" name="c9c9" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c9c10" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
    <td> <input list="bobot" type="number" name="c9c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="1.0"> </td>
    <td> <input list="bobot" type="number" name="c9c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
</tr>

<tr>
    <td class="custColor">C10</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c10c10" class="form-control" value="1" disabled></td>            <input list="bobot" type="number" name="c10c10" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c10c11" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="0.33"> </td>
    <td> <input list="bobot" type="number" name="c10c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="1.0"> </td>
</tr>

<tr>
    <td class="custColor">C11</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c11c11" class="form-control" value="1" disabled></td>            <input list="bobot" type="number" name="c11c11" class="form-control center" style="display: none" value="1">
    <td> <input list="bobot" type="number" name="c11c12" class="form-control" placeholder="" min=0.11 max="9" step="0.01" required value="3.0"> </td>
</tr>

<tr>
    <td class="custColor">C12</td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" class="form-control" value="" disabled></td>
    <td><input list="bobot" type="number" name="c12c12" class="form-control" value="1" disabled></td>     <input list="bobot" type="number" name="c12c12" class="form-control center" style="display: none" value="1">
</tr>

</table>

</form>


        </div>
    </div>
</section>
@endsection
