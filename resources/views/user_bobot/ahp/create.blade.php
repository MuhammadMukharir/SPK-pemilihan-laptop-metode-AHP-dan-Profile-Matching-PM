@extends('adminlte::page')

@section('title', 'AHP Management')

@section('content_header')
<h2> Add New AHP Calculation </h2>

<form id="productCreateForm" action="{{ route('user.bobot.ahp.store') }}" method="POST">
    @csrf
    
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('user.bobot.ahp.index') }}"> Back</a>
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

    select{
      width: 400px; text-align-last:center; text-align: center;
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

    <div class="col-md-4">

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

      <div class="card card-info collapsed-card">
        <div class="card-header">
          <h3 class="card-title">Penyebab tidak konsitennya pembobotan </h3> 
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-hover table-borderless table-striped">
            <tbody>
              <tr>
                <td class="" colspan="2" style="border-color: #a9d5de;background-color: #f8ffff; text-align: justify;">
                  Misalnya Anda memasukkan nilai dengan kepentingan sebagai berikut. <br>
                  - Kriteria C1 : 2 kali lebih penting C2 <br>
                  - Kriteria C1 : 3 kali lebih penting C3 <br>
                  - Kriteria C3 : 9 kali lebih penting C2 <br>
                  Maka pembobotan tidak konsisten karena C3 lebih penting dibanding C2, sedangkan dalam perbandingan C1 dengan C2 dan C3, C2 lebih penting dibanding C3.
                  <strong> Ketidak konsistenan tersebut akan menaikkan nilai Consistency Ratio (CR).  </strong> Hasil bobot perbandingan berpasangan antar kriteria dianggap tidak konsisten apabila nilai CR >= 0,1
                </td>
              </tr>
            
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->


    </div>

    <div class="col-md-8">

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
                  <tr>
                    <td class="" colspan="2" style="border-color: #a9d5de;background-color: #f8ffff; text-align:justify"> <strong> Catatan cara melakukan perbandingan berpasangan: </strong>
                      Perbandingan dibaca dari kriteria baris terhadap kriteria kolom.
                      Misalnya kriteria C1 empat kali lebih penting terhadap kriteria C2 maka diisi nilai 4 pada baris C1 kolom C2 pada Tabel Perbandingan Berpasangan di bawah ini.
                    </td>
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
            <h3 class="card-title">Tabel Perbandingan Berpasangan &nbsp; &nbsp;</h3>
            <p onclick="resetTabel()" class="btn btn-sm btn-warning">Reset Tabel</p>
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





<table class="table table-borderless table-sm table-hover cssTableCenter">
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

@php
    $sharedOptions = [
      ['', '.....'],
      [1, '1'],
      [2, '2'],
      [3, '3'],
      [4, '4'],
      [5, '5'],
      [6, '6'],
      [7, '7'],
      [8, '8'],
      [9, '9'],
      [0.5, '1/2'],
      [0.33, '1/3'],
      [0.25, '1/4'],
      [0.20, '1/5'],
      [0.17, '1/6'],
      [0.14, '1/7'],
      [0.13, '1/8'],
      [0.11, '1/9']
  ];
  $amSelect = 0.9999;
@endphp

<tr>
    <td class="custColor">C1</td>
    <td><input  type="text" name="c1c1" class="form-control center" style="text-align:center" value="1"  disabled></td>
    {{-- <td><select name="c1c1" id="c1c1" class="form-control" disabled><option value="1" selected>1</option></select></td>  --}}
      <input  type="number" name="c1c1" class="form-control center" style="display: none" value="1">

    <td><select name="c1c2" id="c1c2" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c3" id="c1c3" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c4" id="c1c4" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 7.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c5" id="c1c5" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c6" id="c1c6" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c7" id="c1c7" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c8" id="c1c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c9" id="c1c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c10" id="c1c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 6.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c11" id="c1c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c1c12" id="c1c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 6.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>



{{-- kebawah adalah C2 dan seterusnya --}}

<tr>
    <td class="custColor">C2</td>
    <td><input name="c2c1" id="c2c1" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c2c2" class="form-control" value="1" disabled></td>                  <input  type="number" name="c2c2" class="form-control center" style="display: none" value="1">

    <td><select name="c2c3" id="c2c3" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.17) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c4" id="c2c4" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 6.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c5" id="c2c5" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.25) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c6" id="c2c6" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 1.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c7" id="c2c7" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.17) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c8" id="c2c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.25) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c9" id="c2c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c10" id="c2c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c11" id="c2c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c2c12" id="c2c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>

</tr>

<tr>
    <td class="custColor">C3</td>
    <td><input name="c3c1" id="c3c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c3c2" id="c3c2" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c3c3" class="form-control" value="1" disabled></td>              <input  type="number" name="c3c3" class="form-control center" style="display: none" value="1">

    <td><select name="c3c4" id="c3c4" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 9.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c5" id="c3c5" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c6" id="c3c6" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 6.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c7" id="c3c7" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 1.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c8" id="c3c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c9" id="c3c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 5.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c10" id="c3c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 7.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c11" id="c3c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 5.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c3c12" id="c3c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 7.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C4</td>
    <td><input name="c4c1" id="c4c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c4c2" id="c4c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c4c3" id="c4c3" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c4c4" class="form-control" value="1" disabled></td>              <input  type="number" name="c4c4" class="form-control center" style="display: none" value="1">

    <td><select name="c4c5" id="c4c5" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.14) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c6" id="c4c6" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.25) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c7" id="c4c7" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.11) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c8" id="c4c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.14) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c9" id="c4c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.2) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c10" id="c4c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.33) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c11" id="c4c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.2) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c4c12" id="c4c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.33) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C5</td>
    <td><input name="c5c1" id="c5c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c5c2" id="c5c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c5c3" id="c5c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c5c4" id="c5c4" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c5c5"class="form-control" value="1" disabled></td>               <input  type="number" name="c5c5" class="form-control center" style="display: none" value="1">

    <td><select name="c5c6" id="c5c6" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c5c7" id="c5c7" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 1.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c5c8" id="c5c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c5c9" id="c5c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c5c10" id="c5c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 6.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c5c11" id="c5c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 4.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c5c12" id="c5c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 6.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>

</tr>

<tr>
    <td class="custColor">C6</td>
    <td><input name="c6c1" id="c6c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c6c2" id="c6c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c6c3" id="c6c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c6c4" id="c6c4" type="text" class="form-control" value="" disabled></td>
    <td><input name="c6c5" id="c6c5" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c6c6" class="form-control" value="1" disabled></td>              <input  type="number" name="c6c6" class="form-control center" style="display: none" value="1">

    <td><select name="c6c7" id="c6c7" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.25) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c6c8" id="c6c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.25) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c6c9" id="c6c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c6c10" id="c6c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c6c11" id="c6c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.5) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c6c12" id="c6c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 2.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C7</td>
    <td><input name="c7c1" id="c7c1" class="form-control" value="" disabled></td>
    <td><input name="c7c2" id="c7c2" class="form-control" value="" disabled></td>
    <td><input name="c7c3" id="c7c3" class="form-control" value="" disabled></td>
    <td><input name="c7c4" id="c7c4" class="form-control" value="" disabled></td>
    <td><input name="c7c5" id="c7c5" class="form-control" value="" disabled></td>
    <td><input name="c7c6" id="c7c6" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c7c7" class="form-control" value="1" disabled></td>              <input  type="number" name="c7c7" class="form-control center" style="display: none" value="1">

    <td><select name="c7c8" id="c7c8" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c7c9" id="c7c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 5.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c7c10" id="c7c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 7.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c7c11" id="c7c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 5.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c7c12" id="c7c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 7.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C8</td>
    <td><input name="c8c1" id="c8c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c8c2" id="c8c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c8c3" id="c8c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c8c4" id="c8c4" type="text" class="form-control" value="" disabled></td>
    <td><input name="c8c5" id="c8c5" type="text" class="form-control" value="" disabled></td>
    <td><input name="c8c6" id="c8c6" type="text" class="form-control" value="" disabled></td>
    <td><input name="c8c7" id="c8c7" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c8c8" class="form-control" value="1" disabled></td>              <input  type="number" name="c8c8" class="form-control center" style="display: none" value="1">

    <td><select name="c8c9" id="c8c9" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c8c10" id="c8c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 5.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c8c11" id="c8c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c8c12" id="c8c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 5.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C9</td>
    <td><input name="c9c1" id="c9c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c2" id="c9c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c3" id="c9c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c4" id="c9c4" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c5" id="c9c5" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c6" id="c9c6" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c7" id="c9c7" type="text" class="form-control" value="" disabled></td>
    <td><input name="c9c8" id="c9c8" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c9c9" class="form-control" value="1" disabled></td>              <input  type="number" name="c9c9" class="form-control center" style="display: none" value="1">

    <td><select name="c9c10" id="c9c10" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c9c11" id="c9c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 1.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c9c12" id="c9c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C10</td>
    <td><input name="c10c1" id="c10c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c2" id="c10c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c3" id="c10c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c4" id="c10c4" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c5" id="c10c5" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c6" id="c10c6" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c7" id="c10c7" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c8" id="c10c8" type="text" class="form-control" value="" disabled></td>
    <td><input name="c10c9" id="c10c9" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c10c10" class="form-control" value="1" disabled></td>            <input  type="number" name="c10c10" class="form-control center" style="display: none" value="1">

    <td><select name="c10c11" id="c10c11" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 0.33) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
    <td><select name="c10c12" id="c10c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 1.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C11</td>
    <td><input name="c11c1" id="c11c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c2" id="c11c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c3" id="c11c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c4" id="c11c4" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c5" id="c11c5" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c6" id="c11c6" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c7" id="c11c7" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c8" id="c11c8" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c9" id="c11c9" type="text" class="form-control" value="" disabled></td>
    <td><input name="c11c10" id="c11c10" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c11c11" class="form-control" value="1" disabled></td>            <input  type="number" name="c11c11" class="form-control center" style="display: none" value="1">

    <td><select name="c11c12" id="c11c12" class="form-control" required> @foreach ($sharedOptions as $item) <option value="{{ $item[0] }}" @if ($item[0] == 3.0) selected='selected' @endif @if ($item[0] === '') disabled selected @endif> {{ $item[1] }} </option> @endforeach </select></td>
</tr>

<tr>
    <td class="custColor">C12</td>
    <td><input name="c12c1" id="c12c1" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c2" id="c12c2" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c3" id="c12c3" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c4" id="c12c4" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c5" id="c12c5" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c6" id="c12c6" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c7" id="c12c7" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c8" id="c12c8" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c9" id="c12c9" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c10" id="c12c10" type="text" class="form-control" value="" disabled></td>
    <td><input name="c12c11" id="c12c11" type="text" class="form-control" value="" disabled></td>
    <td><input  type="text" name="c12c12" class="form-control" value="1" disabled></td>     <input  type="number" name="c12c12" class="form-control center" style="display: none" value="1">
</tr>


<script>
  // id="c1c2" onchange="isi_kolom_yg_satunya(event)"    <==== masukkan di element <input ....here...>
  function roundToTwo(num) {
    return +(Math.round(num + "e+2")  + "e-2");
  }
  function round_if(num) {
    if (num >= 9) { return 9 } 
    else if (num >= 1) { return num.toFixed(0) }
    else { return roundToTwo(num) }
  }

  var onChangeCoba = function(evt) {
    console.log('x');
    // or
    // console.log(evt.target.value);
  };
  function isi_kolom_yg_satunya(e)
  {
    var source = event.target || event.srcElement;
    var source_element = document.getElementById(source.id)

    var id = source.id
    var first_c = 'c' + id.split("c")[1]
    var last_c = 'c' + id.split("c")[2]
    var full_el_target_id = last_c + first_c
    // console.log(full_el_target_id)
    // alert(id)
  
    var target_element = document.getElementById(full_el_target_id)
    // console.log(source_element.options[source_element.selectedIndex].text)
    var source_str = source_element.options[source_element.selectedIndex].text;
    var temp = ''
    console.log(source_str.includes("/"))
    if (source_str.includes("/")) {
      temp = source_str.split("/")[1]
    } else if (!source_str.includes("1")) {
      temp = '1/' + source_str
    } else {
      temp = source_str
    }
    target_element.value = temp
  }

  var elements = document.getElementsByClassName("form-control");

  var myFunction = function() {
      var attribute = this.getAttribute("data-myattribute");
      alert(attribute);
  };

  for (var i = 0; i < elements.length; i++) {
      elements[i].addEventListener('load', isi_kolom_yg_satunya, false);
      elements[i].addEventListener('keyup', isi_kolom_yg_satunya, false);
      elements[i].addEventListener('change', isi_kolom_yg_satunya, false);
      elements[i].addEventListener('click', isi_kolom_yg_satunya, false);
  }

  function resetTabel(e) {
    for (var i = 0; i < elements.length; i++) {
      if (elements[i].id.includes('c'))  {
        elements[i].value = '1'
      }
    }
  }
</script>


{{-- <tr>
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
  <td><input list="bobot" type="number" name="c12c12" class="form-control" value="1" disabled></td>            <input list="bobot" type="number" name="c12c12" class="form-control center" style="display: none" value="1">
</tr> --}}

</table>

</form>


        </div>
    </div>
</section>
@endsection
