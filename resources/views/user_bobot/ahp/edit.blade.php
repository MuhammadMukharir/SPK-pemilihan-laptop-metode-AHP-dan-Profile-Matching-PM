{{-- {{$ahp}}
<br><br>
{{$bobot}}
<br><br>
{{$PB_obj}} --}}
{{-- {{$ahp->id_perhitungan}} --}}

@extends('adminlte::page')

@section('title', 'AHP Management')

@section('content_header')
<h2> Edit AHP Calculation</h2>

<form id="productCreateForm" action="{{ route('user.bobot.ahp.update', $ahp->id_perhitungan) }}" method="POST">
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

</style>

{{-- <p>Hello {{ auth()->user()->name }}, here you can edit your AHP weighting</p> --}}

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>




{{-- card --}}
<div class="row">

    <div class="col-md-4">

        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Bobot Kriteria</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-hover table- ">
                <thead>
                  <tr>
                    <th class="goCenter">No</th>
                    <th class="goCenter">Kriteria</th>
                    <th class="goCenter">Bobot</th>
                    {{-- <th></th> --}}
                  </tr>
                </thead>
                <tbody>
    
                  <tr>
                    <td class="goCenter">C1</td>
                    <td>Harga laptop</td>
                    <td class="goCenter">{{ number_format($bobot->c1,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C2</td>
                    <td>Prosesor</td>
                    <td class="goCenter">{{ number_format($bobot->c2,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C3</td>
                    <td>Kapasitas RAM</td>
                    <td class="goCenter">{{ number_format($bobot->c3,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C4</td>
                    <td>Kapasitas Harddisk</td>
                    <td class="goCenter">{{ number_format($bobot->c4,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C5</td>
                    <td>Kapasitas SSD</td>
                    <td class="goCenter">{{ number_format($bobot->c5,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C6</td>
                    <td>Kapasitas V-RAM</td>
                    <td class="goCenter">{{ number_format($bobot->c6,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C7</td>
                    <td>Kapasitas maksimal upgrade RAM</td>
                    <td class="goCenter">{{ number_format($bobot->c7,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C8</td>
                    <td>Berat laptop</td>
                    <td class="goCenter">{{ number_format($bobot->c8,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C9</td>
                    <td>Ukuran layar</td>
                    <td class="goCenter">{{ number_format($bobot->c9,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C10</td>
                    <td>Jenis layar</td>
                    <td class="goCenter">{{ number_format($bobot->c10,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C11</td>
                    <td>Refresh rate layar</td>
                    <td class="goCenter">{{ number_format($bobot->c11,2,",",".") }}</td>
                  </tr><tr>
                    <td class="goCenter">C12</td>
                    <td>Resolusi layar</td>
                    <td class="goCenter">{{ number_format($bobot->c12,2,",",".") }}</td>
                  </tr>
                  

                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>

    <div class="col-md-8">

        <div>
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
                        <td style="width: 70%"> <input type="text" name="nama_perhitungan" class="form-control" placeholder="Nama Perhitungan" required style="text-align: left" value="{{ $ahp->nama_perhitungan }}"> </td>
                      </tr><tr>
                        <td class=""> <strong> Detail </strong></td>
                        <td> <input type="text" name="detail" class="form-control" placeholder="Deskripsi" required style="text-align: left" value="{{ $ahp->detail }}"> </td>
                      </tr><tr>
                        <td class=""> <strong> Lamda Max </strong> </td>
                        <td> {{ $bobot->lamda_max }} </td>
                      </tr><tr>
                        <td class=""> <strong> Consistency Index (CI) </strong> </td>
                        <td> {{ $bobot->consistency_index }} </td>
                      </tr><tr>
                        <td class=""> <strong> Consistency Ratio (CR) </strong> </td>
                        <td> {{ $bobot->consistency_ratio }} </td>
                      </tr>
                      </tr><tr>
                        <td class=""> <strong> Consistency </strong> </td>
                        @if ( $ahp->is_konsisten ) <td> <label class="badge badge-pill badge-success"> Perhitungan sudah konsisten (CR < 0.1) </label> </td>
                        @else     <td> <label class="badge badge-danger"> Perhitungan belum konsisten (CR >= 0.1) </label> </td>
                        @endif
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
              <table class="table table-hover table-">
                <thead>
                  <tr>
                    <th class="goCenter">Intensitas kepentingan</th>
                    <th class="goCenter">Definisi</th>
                    {{-- <th></th> --}}
                  </tr>
                </thead>
                <tbody>
    
                  <tr>
                    <td class="goCenter">1</td>
                    <td>Kedua kriteria tersebut sama pentingnya.</td>
                  </tr><tr>
                    <td class="goCenter">3</td>
                    <td>Satu kriteria sedikit lebih penting.</td>
                  </tr><tr>
                    <td class="goCenter">5</td>
                    <td>Satu kriteria lebih penting.</td>
                  </tr><tr>
                    <td class="goCenter">7</td>
                    <td>Satu kriteria jauh lebih penting.</td>
                  </tr><tr>
                    <td class="goCenter">9</td>
                    <td>Satu kriteria sangatlah penting.</td>
                  </tr>
                  <tr>
                    <td class="goCenter">2, 4, 6, 8</td>
                    <td>Nilai antara dua penilaian yang berdekatan.</td>
                  </tr>
                  <tr>
                    <td class="goCenter">Timbal-balik</td>
                    <td>Jika kriteria i ditetapkan dengan salah satu nilai di atas jika dibandingkan dengan kriteria j, maka kriteria j memiliki nilai timbal balik jika dibandingkan dengan kriteria i.</td>
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



<tr>
    <td class="custColor">C1</td>
    <td><input type="number" name="c1c1" class="form-control center" style="text-align:center" value="{{ $PB_obj[0]->c1 }}"  disabled></td> <input type="number" name="c1c1" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c1c2" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c2 }}"> </td>
    <td> <input type="number" name="c1c3" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c3 }}"> </td>
    <td> <input type="number" name="c1c4" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c4 }}">  </td>
    <td> <input type="number" name="c1c5" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c5 }}">  </td>
    <td> <input type="number" name="c1c6" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c6 }}">  </td>
    <td> <input type="number" name="c1c7" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c7 }}">  </td>
    <td> <input type="number" name="c1c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c8 }}">  </td>
    <td> <input type="number" name="c1c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c9 }}">  </td>
    <td> <input type="number" name="c1c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c10 }}">  </td>
    <td> <input type="number" name="c1c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c11 }}">  </td>
    <td> <input type="number" name="c1c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[0]->c12 }}">  </td>
</tr>

<tr>
    <td class="custColor">C2</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[1]->c1 }}" disabled></td>
    <td><input type="number" name="c2c2" class="form-control" value="{{ $PB_obj[1]->c2 }}" disabled></td>                  <input type="number" name="c2c2" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c2c3" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c3 }}"> </td>
    <td> <input type="number" name="c2c4" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c4 }}"> </td>
    <td> <input type="number" name="c2c5" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c5 }}"> </td>
    <td> <input type="number" name="c2c6" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c6 }}"> </td>
    <td> <input type="number" name="c2c7" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c7 }}"> </td>
    <td> <input type="number" name="c2c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c8 }}"> </td>
    <td> <input type="number" name="c2c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c9 }}"> </td>
    <td> <input type="number" name="c2c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c10 }}"> </td>
    <td> <input type="number" name="c2c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c11 }}"> </td>
    <td> <input type="number" name="c2c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[1]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C3</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[2]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[2]->c2 }}" disabled></td>
    <td><input type="number" name="c3c3" class="form-control" value="{{ $PB_obj[2]->c3 }}" disabled></td>              <input type="number" name="c3c3" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c3c4" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c4 }}"> </td>
    <td> <input type="number" name="c3c5" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c5 }}"> </td>
    <td> <input type="number" name="c3c6" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c6 }}"> </td>
    <td> <input type="number" name="c3c7" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c7 }}"> </td>
    <td> <input type="number" name="c3c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c8 }}"> </td>
    <td> <input type="number" name="c3c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c9 }}"> </td>
    <td> <input type="number" name="c3c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c10 }}"> </td>
    <td> <input type="number" name="c3c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c11 }}"> </td>
    <td> <input type="number" name="c3c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[2]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C4</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[3]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[3]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[3]->c3 }}" disabled></td>
    <td><input type="number" name="c4c4" class="form-control" value="{{ $PB_obj[3]->c4 }}" disabled></td>              <input type="number" name="c4c4" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c4c5" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c5 }}"> </td>
    <td> <input type="number" name="c4c6" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c6 }}"> </td>
    <td> <input type="number" name="c4c7" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c7 }}"> </td>
    <td> <input type="number" name="c4c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c8 }}"> </td>
    <td> <input type="number" name="c4c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c9 }}"> </td>
    <td> <input type="number" name="c4c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c10 }}"> </td>
    <td> <input type="number" name="c4c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c11 }}"> </td>
    <td> <input type="number" name="c4c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[3]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C5</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[4]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[4]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[4]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[4]->c4 }}" disabled></td>
    <td><input type="number" name="c5c5"class="form-control" value="{{ $PB_obj[4]->c5 }}" disabled></td>               <input type="number" name="c5c5" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c5c6" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c6 }}"> </td>
    <td> <input type="number" name="c5c7" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c7 }}"> </td>
    <td> <input type="number" name="c5c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c8 }}"> </td>
    <td> <input type="number" name="c5c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c9 }}"> </td>
    <td> <input type="number" name="c5c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c10 }}"> </td>
    <td> <input type="number" name="c5c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c11 }}"> </td>
    <td> <input type="number" name="c5c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[4]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C6</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[5]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[5]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[5]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[5]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[5]->c5 }}" disabled></td>
    <td><input type="number" name="c6c6" class="form-control" value="{{ $PB_obj[5]->c6 }}" disabled></td>              <input type="number" name="c6c6" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c6c7" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[5]->c7 }}"> </td>
    <td> <input type="number" name="c6c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[5]->c8 }}"> </td>
    <td> <input type="number" name="c6c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[5]->c9 }}"> </td>
    <td> <input type="number" name="c6c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[5]->c10 }}"> </td>
    <td> <input type="number" name="c6c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[5]->c11 }}"> </td>
    <td> <input type="number" name="c6c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[5]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C7</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[6]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[6]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[6]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[6]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[6]->c5 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[6]->c6 }}" disabled></td>
    <td><input type="number" name="c7c7" class="form-control" value="{{ $PB_obj[6]->c7 }}" disabled></td>              <input type="number" name="c7c7" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c7c8" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[6]->c8 }}"> </td>
    <td> <input type="number" name="c7c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[6]->c9 }}"> </td>
    <td> <input type="number" name="c7c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[6]->c10 }}"> </td>
    <td> <input type="number" name="c7c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[6]->c11 }}"> </td>
    <td> <input type="number" name="c7c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[6]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C8</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c5 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c6 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[7]->c7 }}" disabled></td>
    <td><input type="number" name="c8c8" class="form-control" value="{{ $PB_obj[7]->c8 }}" disabled></td>              <input type="number" name="c8c8" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c8c9" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[7]->c9 }}"> </td>
    <td> <input type="number" name="c8c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[7]->c10 }}"> </td>
    <td> <input type="number" name="c8c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[7]->c11 }}"> </td>
    <td> <input type="number" name="c8c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[7]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C9</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c5 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c6 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c7 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[8]->c8 }}" disabled></td>
    <td><input type="number" name="c9c9" class="form-control" value="{{ $PB_obj[8]->c9 }}" disabled></td>              <input type="number" name="c9c9" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c9c10" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[8]->c10 }}"> </td>
    <td> <input type="number" name="c9c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[8]->c11 }}"> </td>
    <td> <input type="number" name="c9c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[8]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C10</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c5 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c6 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c7 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c8 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[9]->c9 }}" disabled></td>
    <td><input type="number" name="c10c10" class="form-control" value="{{ $PB_obj[9]->c10 }}" disabled></td>            <input type="number" name="c10c10" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c10c11" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[9]->c11 }}"> </td>
    <td> <input type="number" name="c10c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[9]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C11</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c5 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c6 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c7 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c8 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c9 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[10]->c10 }}" disabled></td>
    <td><input type="number" name="c11c11" class="form-control" value="{{ $PB_obj[10]->c11 }}" disabled></td>            <input type="number" name="c11c11" class="form-control center" style="display: none" value="1">
    <td> <input type="number" name="c11c12" class="form-control" placeholder="" min=0 max="9" step="0.01" required value="{{ $PB_obj[10]->c12 }}"> </td>
</tr>

<tr>
    <td class="custColor">C12</td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c1 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c2 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c3 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c4 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c5 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c6 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c7 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c8 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c9 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c10 }}" disabled></td>
    <td><input type="number" class="form-control" value="{{ $PB_obj[11]->c11 }}" disabled></td>
    <td><input type="number" name="c12c12" class="form-control" value="{{ $PB_obj[11]->c12 }}" disabled></td>            <input type="number" name="c12c12" class="form-control center" style="display: none" value="1">
</tr>

</table>

</form>


        </div>
    </div>
</section>
@endsection
