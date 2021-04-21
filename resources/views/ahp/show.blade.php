{{-- {{$ahp}}
<br><br>
{{$bobot}}
<br><br>
{{$PB_obj}} --}}

@extends('adminlte::page')

@section('title', 'AHP Management')

@section('content_header')
<h2> AHP Calculation Detail</h2>

<form id="productCreateForm" action="{{ route('ahp.store') }}" method="POST">
    @csrf
    
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('ahp.index') }}"> Back</a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>

    <a class="btn btn-primary" href="{{ route('ahp.edit', $ahp->id_perhitungan) }}">Edit</a>
    
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

{{-- <p>Hello {{ auth()->user()->name }}, here you can preview your AHP weighting</p> --}}

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
                        <td style="width: 70%"> {{ $ahp->nama_perhitungan }} </td>
                      </tr><tr>
                        <td class=""> <strong> Detail </strong></td>
                        <td> {{ $ahp->detail }} </td>
                      </tr><tr>
                        <td class=""> <strong> Lamda Max </strong> </td>
                        <td> {{ $bobot->lamda_max }} </td>
                      </tr><tr>
                        <td class=""> <strong> Consistency Index (CI)</strong> </td>
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
    <div class="col-s-12 col-md-12 col-lg-12 margin-tb">
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


@foreach ($PB_obj as $row)
    <tr>
        <td class="custColor">{{ $row->nama_kriteria }}</td>
        
        <td> <input disabled type="number" name="c1c2" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c1 }}"> </td>
        <td> <input disabled type="number" name="c1c3" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c2 }}"> </td>
        <td> <input disabled type="number" name="c1c4" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c3 }}">  </td>
        <td> <input disabled type="number" name="c1c5" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c4 }}">  </td>
        <td> <input disabled type="number" name="c1c6" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c5 }}">  </td>
        <td> <input disabled type="number" name="c1c7" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c6 }}">  </td>
        <td> <input disabled type="number" name="c1c8" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c7 }}">  </td>
        <td> <input disabled type="number" name="c1c9" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c8 }}">  </td>
        <td> <input disabled type="number" name="c1c10" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c9 }}">  </td>
        <td> <input disabled type="number" name="c1c11" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c10 }}">  </td>
        <td> <input disabled type="number" name="c1c12" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c11 }}">  </td>
        <td> <input disabled type="number" name="c1c12" class="form-control" placeholder="" min=0 max="9" step="0.01" value="{{ $row->c12 }}"> </td> <input type="number" name="c1c1" class="form-control center" style="display: none" value="1">
    </tr>
@endforeach

</table>

</form>


        </div>
    </div>
</section>
@endsection
