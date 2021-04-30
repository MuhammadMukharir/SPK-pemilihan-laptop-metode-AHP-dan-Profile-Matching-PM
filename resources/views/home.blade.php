@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<div class="card card-primary">
    <div class="card-header">
        {{-- <h2>Sistem Pendukung Keputusan</h2> --}}
        <h2 style="text-align: center">Sistem Pendukung Keputusan</h2>
        <h4 style="text-align: center">Pemilihan Laptop Menggunakan Metode AHP dan Profile Matching </h4><br>
    </div>
    {{-- <div class="card-body">
        <h2 style="text-align: center">Sistem Pendukung Keputusan</h2>
        <h4 style="text-align: center">Pemilihan Laptop Menggunakan Metode AHP dan Profile Matching </h4><br>

    </div> --}}
    
</div>
    
@stop

@section('content')

{{-- <div class="row">

    <div class="col-md-5">

        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Deskripsi</h3>
    
              {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div> --}}
            {{-- </div> --}}
            <div class="card-body p-0">
                <table class="table table-">
                    <tr>
                        <td><p style="padding: 10px 50px; text-align:justify; font-size: 18px">Laptop adalah personal computer (PC) desktop yang dimensinya diperkecil untuk meningkatkan fleksibilitas dalam penggunaannya. Perangkat keras yang terdapat di dalamnya sama persis dengan komponen pada desktop, hanya saja dijadikan lebih ringan, lebih tidak panas, ukurannya diperkecil, dan lebih hemat daya. Bahan, ukuran, dan perangkat keras yang terpasang pada laptop memengaruhi berat laptop.
                        Saat ini banyak produk laptop yang ditawarkan di pasaran. Berbagai merek menawarkan berbagai produk laptopnya, juga pelayanan berupa perbaikan, dan masa garansi yang berbeda. Produsen laptop pada setiap merek tentunya mempertimbangkan target konsumen yang ingin dijangkau oleh produk yang akan dibuat. Hal tersebut menyebabkan banyaknya variasi spesifikasi laptop dan harganya di pasaran. Banyaknya produk laptop akan membuat kesulitan konsumen dalam menentukan pilihan laptop yang sesuai dengan kebutuhannya. Oleh karena itu, diperlukan sistem pendukung keputusan (SPK) untuk membantu konsumen dalam memilih produk laptop.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12" style="text-align: center">
                                <a class="btn btn-info btn-lg" href="{{ route('rekomendasi.index') }}"> Mulai! </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        {{-- </div> --}}
      <!-- /.card -->
    {{-- </div> --}}

    {{-- <div class="col-md-12" style="text-align: center">
        <a class="btn btn-primary btn-lg" href="{{ route('rekomendasi.index') }}"> Mulai!</a>
    </div> --}}

{{-- <div>
    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title" >Detail Penggunaan Metode </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body p-0">
            <p style="padding: 25px; text-align:justify">Metode Profile Matching (PM) digunakan untuk menilai kriteria yang mendekati nilai ideal yang diinginkan pembuat keputusan. Dalam proses PM, dilakukan proses membandingkan spesifikasi laptop dengan spesifikasi target atau nilai ideal yang diinginkan pembuat keputusan. Jadi ada perbedaan nilai spesifikasi produk laptop dengan nilai spesifikasi target (disebut juga gap), semakin kecil gap menghasilkan bobot nilai yang besar artinya semakin besar peluang bagi suatu alternatif pilihan untuk direkomendasikan (Turban dkk., 1995). Setiap Individu tentunya memiliki tujuan dan kebutuhan yang bervariasi dalam membeli produk laptop. Itu artinya setiap orang memiliki preferensi sendiri dalam memilih produk laptop. Sehubungan dengan itu, maka digunakan metode PM. Dengan demikian, penelitian ini bertujuan untuk merancang dan membuat SPK pemilihan laptop yang menggunakan metode AHP dan PM.</p>
        
        </div>
    </div>

</div> --}}

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop