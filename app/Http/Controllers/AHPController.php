<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\PresetPreference;
// use App\Models\Product;

use App\Models\AHP;
use App\Models\Bobot;
use App\Models\PerbandinganBerpasangan;

use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

class AHPController extends Controller
{
    protected $product_atribute_required = array(
        'name'          => 'required',
        'detail'        => '',
        'harga'             => 'required|numeric|between:0,200000000',
        'prosesor'          => 'required|numeric|between:0,200',
        'kapasitas_ram'     => 'required|numeric|between:0,64',
        'kapasitas_hdd'     => 'required|numeric|between:0,5000',
        'kapasitas_ssd'     => 'required|numeric|between:0,5000',
        'kapasitas_vram'    => 'required|numeric|between:0,32',
        'kapasitas_maxram'  => 'required|numeric|between:0,64',
        'berat'             => 'required|numeric|between:0,10000',
        'ukuran_layar'      => 'required|numeric|between:5,30',
        'jenis_layar'       => 'required|numeric|between:0,5',
        'refresh_rate'      => 'required|numeric|between:0,1000',
        'resolusi_layar'    => 'required|numeric|between:0,80000000'


    );

    protected $ahp_atribute_required = array(
        'nama_perhitungan'      => 'required',  
        'detail'    => '',  
        'c1c2'      => 'required|numeric|between:0,9',   
        'c1c3'      => 'required|numeric|between:0,9',   
        'c1c4'      => 'required|numeric|between:0,9',   
        'c1c5'      => 'required|numeric|between:0,9',   
        'c1c6'      => 'required|numeric|between:0,9',   
        'c1c7'      => 'required|numeric|between:0,9',   
        'c1c8'      => 'required|numeric|between:0,9',   
        'c1c9'      => 'required|numeric|between:0,9',   
        'c1c10'     => 'required|numeric|between:0,9',  
        'c1c11'     => 'required|numeric|between:0,9',  
        'c1c12'     => 'required|numeric|between:0,9',  
        'c2c3'      => 'required|numeric|between:0,9',   
        'c2c4'      => 'required|numeric|between:0,9',   
        'c2c5'      => 'required|numeric|between:0,9',   
        'c2c6'      => 'required|numeric|between:0,9',   
        'c2c7'      => 'required|numeric|between:0,9',   
        'c2c8'      => 'required|numeric|between:0,9',   
        'c2c9'      => 'required|numeric|between:0,9',   
        'c2c10'     => 'required|numeric|between:0,9',  
        'c2c11'     => 'required|numeric|between:0,9',  
        'c2c12'     => 'required|numeric|between:0,9',  
        'c3c4'      => 'required|numeric|between:0,9',   
        'c3c5'      => 'required|numeric|between:0,9',   
        'c3c6'      => 'required|numeric|between:0,9',   
        'c3c7'      => 'required|numeric|between:0,9',   
        'c3c8'      => 'required|numeric|between:0,9',   
        'c3c9'      => 'required|numeric|between:0,9',   
        'c3c10'     => 'required|numeric|between:0,9',  
        'c3c11'     => 'required|numeric|between:0,9',  
        'c3c12'     => 'required|numeric|between:0,9',  
        'c4c5'      => 'required|numeric|between:0,9',   
        'c4c6'      => 'required|numeric|between:0,9',   
        'c4c7'      => 'required|numeric|between:0,9',   
        'c4c8'      => 'required|numeric|between:0,9',   
        'c4c9'      => 'required|numeric|between:0,9',   
        'c4c10'     => 'required|numeric|between:0,9',  
        'c4c11'     => 'required|numeric|between:0,9',  
        'c4c12'     => 'required|numeric|between:0,9',  
        'c5c6'      => 'required|numeric|between:0,9',   
        'c5c7'      => 'required|numeric|between:0,9',   
        'c5c8'      => 'required|numeric|between:0,9',   
        'c5c9'      => 'required|numeric|between:0,9',   
        'c5c10'     => 'required|numeric|between:0,9',  
        'c5c11'     => 'required|numeric|between:0,9',  
        'c5c12'     => 'required|numeric|between:0,9',  
        'c6c7'      => 'required|numeric|between:0,9',   
        'c6c8'      => 'required|numeric|between:0,9',   
        'c6c9'      => 'required|numeric|between:0,9',   
        'c6c10'     => 'required|numeric|between:0,9',  
        'c6c11'     => 'required|numeric|between:0,9',  
        'c6c12'     => 'required|numeric|between:0,9',  
        'c7c8'      => 'required|numeric|between:0,9',   
        'c7c9'      => 'required|numeric|between:0,9',   
        'c7c10'     => 'required|numeric|between:0,9',  
        'c7c11'     => 'required|numeric|between:0,9',  
        'c7c12'     => 'required|numeric|between:0,9',  
        'c8c9'      => 'required|numeric|between:0,9',   
        'c8c10'     => 'required|numeric|between:0,9',  
        'c8c11'     => 'required|numeric|between:0,9',  
        'c8c12'     => 'required|numeric|between:0,9',  
        'c9c10'     => 'required|numeric|between:0,9',  
        'c9c11'     => 'required|numeric|between:0,9',  
        'c9c12'     => 'required|numeric|between:0,9',  
        'c10c11'    => 'required|numeric|between:0,9', 
        'c10c12'    => 'required|numeric|between:0,9', 
        'c11c12'    => 'required|numeric|between:0,9', 
    );


    //
    public function index()
    {
        // $ahplist = AHP::latest()->paginate(6);
        // $ahplist = AHP::latest()->get();
        $this_user = User::where('id', Auth::id())->first();
        // $users = User::get();

        // $nama_pembuat = array();
        // foreach ($ahplist as $key => $ahp) {
        //     $temp = User::where('id', $ahp->creator_id)->first();
        //     array_push($nama_pembuat, $temp->name);
        // }

        $ahplist = DB::table('ahp')
        ->select('*')
        ->join('users','users.id','=','ahp.creator_id')
        ->orderBy('ahp.created_at', 'desc')->get();

        // $ahplist = DB::table('users')
        // ->select('*')
        // ->join('ahp', 'ahp.creator_id','=', 'users.id')
        // ->get();
        // dd($ahplist);

        // dd($this_user);

        // return view('presetpreferences.index',compact('presetpreferences'))
        //     ->with('i', (request()->input('page', 1) - 1) * 6);
        
        return view('ahp.index',compact('ahplist', 'this_user'));
    }

    public function create()
    {
        return view('ahp.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate($this->ahp_atribute_required);
    
        // Product::create($request->all());

        // dd($request);
        function round_if ($value){
            if ($value >= 9) {
                return 9;
            }
            elseif ($value >= 1) {
                return round($value);
            } 
            else {
                return round($value, 2);
            }  
        }

        // inisiasi nilai bagian segitaga bawah pada tabel (1 / request->xxxx)
        if (true) 
        {
            // bulatkan dulu menggunakan fungsi round_if pada masukan user
            $request->c1c2 = round_if($request->c1c2);
            $request->c1c3 = round_if($request->c1c3);
            $request->c1c4 = round_if($request->c1c4);
            $request->c1c5 = round_if($request->c1c5);
            $request->c1c6 = round_if($request->c1c6);
            $request->c1c7 = round_if($request->c1c7);
            $request->c1c8 = round_if($request->c1c8);
            $request->c1c9 = round_if($request->c1c9);
            $request->c1c10 = round_if($request->c1c10);
            $request->c1c11 = round_if($request->c1c11);
            $request->c1c12 = round_if($request->c1c12);
            $request->c2c3 = round_if($request->c2c3);
            $request->c2c4 = round_if($request->c2c4);
            $request->c2c5 = round_if($request->c2c5);
            $request->c2c6 = round_if($request->c2c6);
            $request->c2c7 = round_if($request->c2c7);
            $request->c2c8 = round_if($request->c2c8);
            $request->c2c9 = round_if($request->c2c9);
            $request->c2c10 = round_if($request->c2c10);
            $request->c2c11 = round_if($request->c2c11);
            $request->c2c12 = round_if($request->c2c12);
            $request->c3c4 = round_if($request->c3c4);
            $request->c3c5 = round_if($request->c3c5);
            $request->c3c6 = round_if($request->c3c6);
            $request->c3c7 = round_if($request->c3c7);
            $request->c3c8 = round_if($request->c3c8);
            $request->c3c9 = round_if($request->c3c9);
            $request->c3c10 = round_if($request->c3c10);
            $request->c3c11 = round_if($request->c3c11);
            $request->c3c12 = round_if($request->c3c12);
            $request->c4c5 = round_if($request->c4c5);
            $request->c4c6 = round_if($request->c4c6);
            $request->c4c7 = round_if($request->c4c7);
            $request->c4c8 = round_if($request->c4c8);
            $request->c4c9 = round_if($request->c4c9);
            $request->c4c10 = round_if($request->c4c10);
            $request->c4c11 = round_if($request->c4c11);
            $request->c4c12 = round_if($request->c4c12);
            $request->c5c6 = round_if($request->c5c6);
            $request->c5c7 = round_if($request->c5c7);
            $request->c5c8 = round_if($request->c5c8);
            $request->c5c9 = round_if($request->c5c9);
            $request->c5c10 = round_if($request->c5c10);
            $request->c5c11 = round_if($request->c5c11);
            $request->c5c12 = round_if($request->c5c12);
            $request->c6c7 = round_if($request->c6c7);
            $request->c6c8 = round_if($request->c6c8);
            $request->c6c9 = round_if($request->c6c9);
            $request->c6c10 = round_if($request->c6c10);
            $request->c6c11 = round_if($request->c6c11);
            $request->c6c12 = round_if($request->c6c12);
            $request->c7c8 = round_if($request->c7c8);
            $request->c7c9 = round_if($request->c7c9);
            $request->c7c10 = round_if($request->c7c10);
            $request->c7c11 = round_if($request->c7c11);
            $request->c7c12 = round_if($request->c7c12);
            $request->c8c9 = round_if($request->c8c9);
            $request->c8c10 = round_if($request->c8c10);
            $request->c8c11 = round_if($request->c8c11);
            $request->c8c12 = round_if($request->c8c12);
            $request->c9c10 = round_if($request->c9c10);
            $request->c9c11 = round_if($request->c9c11);
            $request->c9c12 = round_if($request->c9c12);
            $request->c10c11 = round_if($request->c10c11);
            $request->c10c12 = round_if($request->c10c12);
            $request->c11c12 = round_if($request->c11c12);

            // inisiasi nilai bagian segitaga bawah pada tabel (1 / request->xxxx)
            $c2c1 = round_if( 1 / $request->c1c2 );
            $c3c1 = round_if( 1 / $request->c1c3 );
            $c4c1 = round_if( 1 / $request->c1c4 );
            $c5c1 = round_if( 1 / $request->c1c5 );
            $c6c1 = round_if( 1 / $request->c1c6 );
            $c7c1 = round_if( 1 / $request->c1c7 );
            $c8c1 = round_if( 1 / $request->c1c8 );
            $c9c1 = round_if( 1 / $request->c1c9 );
            $c10c1 = round_if( 1 / $request->c1c10 );
            $c11c1 = round_if( 1 / $request->c1c11 );
            $c12c1 = round_if( 1 / $request->c1c12 );
            $c3c2 = round_if( 1 / $request->c2c3 );
            $c4c2 = round_if( 1 / $request->c2c4 );
            $c5c2 = round_if( 1 / $request->c2c5 );
            $c6c2 = round_if( 1 / $request->c2c6 );
            $c7c2 = round_if( 1 / $request->c2c7 );
            $c8c2 = round_if( 1 / $request->c2c8 );
            $c9c2 = round_if( 1 / $request->c2c9 );
            $c10c2 = round_if( 1 / $request->c2c10 );
            $c11c2 = round_if( 1 / $request->c2c11 );
            $c12c2 = round_if( 1 / $request->c2c12 );
            $c4c3 = round_if( 1 / $request->c3c4 );
            $c5c3 = round_if( 1 / $request->c3c5 );
            $c6c3 = round_if( 1 / $request->c3c6 );
            $c7c3 = round_if( 1 / $request->c3c7 );
            $c8c3 = round_if( 1 / $request->c3c8 );
            $c9c3 = round_if( 1 / $request->c3c9 );
            $c10c3 = round_if( 1 / $request->c3c10 );
            $c11c3 = round_if( 1 / $request->c3c11 );
            $c12c3 = round_if( 1 / $request->c3c12 );
            $c5c4 = round_if( 1 / $request->c4c5 );
            $c6c4 = round_if( 1 / $request->c4c6 );
            $c7c4 = round_if( 1 / $request->c4c7 );
            $c8c4 = round_if( 1 / $request->c4c8 );
            $c9c4 = round_if( 1 / $request->c4c9 );
            $c10c4 = round_if( 1 / $request->c4c10 );
            $c11c4 = round_if( 1 / $request->c4c11 );
            $c12c4 = round_if( 1 / $request->c4c12 );
            $c6c5 = round_if( 1 / $request->c5c6 );
            $c7c5 = round_if( 1 / $request->c5c7 );
            $c8c5 = round_if( 1 / $request->c5c8 );
            $c9c5 = round_if( 1 / $request->c5c9 );
            $c10c5 = round_if( 1 / $request->c5c10 );
            $c11c5 = round_if( 1 / $request->c5c11 );
            $c12c5 = round_if( 1 / $request->c5c12 );
            $c7c6 = round_if( 1 / $request->c6c7 );
            $c8c6 = round_if( 1 / $request->c6c8 );
            $c9c6 = round_if( 1 / $request->c6c9 );
            $c10c6 = round_if( 1 / $request->c6c10 );
            $c11c6 = round_if( 1 / $request->c6c11 );
            $c12c6 = round_if( 1 / $request->c6c12 );
            $c8c7 = round_if( 1 / $request->c7c8 );
            $c9c7 = round_if( 1 / $request->c7c9 );
            $c10c7 = round_if( 1 / $request->c7c10 );
            $c11c7 = round_if( 1 / $request->c7c11 );
            $c12c7 = round_if( 1 / $request->c7c12 );
            $c9c8 = round_if( 1 / $request->c8c9 );
            $c10c8 = round_if( 1 / $request->c8c10 );
            $c11c8 = round_if( 1 / $request->c8c11 );
            $c12c8 = round_if( 1 / $request->c8c12 );
            $c10c9 = round_if( 1 / $request->c9c10 );
            $c11c9 = round_if( 1 / $request->c9c11 );
            $c12c9 = round_if( 1 / $request->c9c12 );
            $c11c10 = round_if( 1 / $request->c10c11 );
            $c12c10 = round_if( 1 / $request->c10c12 );
            $c12c11 = round_if( 1 / $request->c11c12 );
        }


        $c1 = array();
        $c2 = array();
        $c3 = array();
        $c4 = array();
        $c5 = array();
        $c6 = array();
        $c7 = array();
        $c8 = array();
        $c9 = array();
        $c10 = array();
        $c11 = array();
        $c12 = array();

        $initial_full_ahp_arr = array();

        // bangun tabel dan array
        if (true) {
            array_push($c1, 1, $request->c1c2, $request->c1c3, $request->c1c4, $request->c1c5, $request->c1c6, $request->c1c7, $request->c1c8, $request->c1c9, $request->c1c10, $request->c1c11, $request->c1c12);
            array_push($c2, $c2c1, 1, $request->c2c3, $request->c2c4, $request->c2c5, $request->c2c6, $request->c2c7, $request->c2c8, $request->c2c9, $request->c2c10, $request->c2c11, $request->c2c12);
            array_push($c3, $c3c1, $c3c2, 1, $request->c3c4, $request->c3c5, $request->c3c6, $request->c3c7, $request->c3c8, $request->c3c9, $request->c3c10, $request->c3c11, $request->c3c12);
            array_push($c4, $c4c1, $c4c2, $c4c3, 1, $request->c4c5, $request->c4c6, $request->c4c7, $request->c4c8, $request->c4c9, $request->c4c10, $request->c4c11, $request->c4c12);
            array_push($c5, $c5c1, $c5c2, $c5c3, $c5c4, 1, $request->c5c6, $request->c5c7, $request->c5c8, $request->c5c9, $request->c5c10, $request->c5c11, $request->c5c12);
            array_push($c6, $c6c1, $c6c2, $c6c3, $c6c4, $c6c5, 1, $request->c6c7, $request->c6c8, $request->c6c9, $request->c6c10, $request->c6c11, $request->c6c12);
            array_push($c7, $c7c1, $c7c2, $c7c3, $c7c4, $c7c5, $c7c6, 1, $request->c7c8, $request->c7c9, $request->c7c10, $request->c7c11, $request->c7c12);
            array_push($c8, $c8c1, $c8c2, $c8c3, $c8c4, $c8c5, $c8c6, $c8c7, 1, $request->c8c9, $request->c8c10, $request->c8c11, $request->c8c12);
            array_push($c9, $c9c1, $c9c2, $c9c3, $c9c4, $c9c5, $c9c6, $c9c7, $c9c8, 1, $request->c9c10, $request->c9c11, $request->c9c12);
            array_push($c10, $c10c1, $c10c2, $c10c3, $c10c4, $c10c5, $c10c6, $c10c7, $c10c8, $c10c9, 1, $request->c10c11, $request->c10c12);
            array_push($c11, $c11c1, $c11c2, $c11c3, $c11c4, $c11c5, $c11c6, $c11c7, $c11c8, $c11c9, $c11c10, 1, $request->c11c12);
            array_push($c12, $c12c1, $c12c2, $c12c3, $c12c4, $c12c5, $c12c6, $c12c7, $c12c8, $c12c9, $c12c10, $c12c11, 1);

            array_push($initial_full_ahp_arr, $c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12);
        }


        // fungsi transpose (https://stackoverflow.com/questions/797251/transposing-multidimensional-arrays-in-php)
        function transpose($array) {
            return array_map(null, ...$array);
        }

        // transpose matriks untuk mempermudah dalam jumlahkan kolum kemudian rij / sumCol_j
        $transpose_initial_full_ahp_arr = transpose($initial_full_ahp_arr);

        // normalisasi
        $normalized_ahp_arr = array();
        foreach ($transpose_initial_full_ahp_arr as $column) 
        {
            $temp_sum = array_sum($column);

            foreach ($column as $key => $value) 
            {
                $column[$key] = $value / $temp_sum;
            }
            array_push($normalized_ahp_arr, $column);
            
        }

        // didapatkan matriks ahp yang ternormalisasi
        $normalized_ahp_arr = transpose($normalized_ahp_arr);

        // dapatkan bobot tiap kriteria
        $bobot_tiap_kriteria = array();
        foreach ($normalized_ahp_arr as $arr) 
        {
            array_push($bobot_tiap_kriteria, array_sum($arr) / count($arr));
        }

        // Code dibawah berikut mulai pengecekan nilai konsistensi

        // hitung nilai WSV
        $WSV_arr = $initial_full_ahp_arr;
        // array_push($WSV_arr, $initial_full_ahp_arr);
        $WSV_value = array();
        foreach ( $WSV_arr as $arr) 
        {
            $temp = 0;
            foreach ( $arr as $key => $value) 
            {
                $temp = $temp + ($value * $bobot_tiap_kriteria[$key]);
            }
            array_push($WSV_value, $temp);
        }

        // hitung nilai CV 
        $CV_value = array();
        foreach ($WSV_value as $key => $value)
        {
            array_push($CV_value, $value / $bobot_tiap_kriteria[$key]);
        }

        // hitung lamdaMax (rata-rata CV)
        $banyak_kriteria = count($CV_value);
        $lamdaMax = array_sum($CV_value) / $banyak_kriteria;

        // hitung nilai Consistency Index (CI)
        $CI_value = ($lamdaMax - $banyak_kriteria) / ($banyak_kriteria - 1);

        // hitung nilai Consistency Ratio (CR)
        $RandomIndex = 1.54;
        $CR_value = $CI_value / $RandomIndex;

        // dd($CR_value);

        // + validasi inputan
        // ide selanjutnya jika konsisten maka return konsisten, redirect ke ahp.index (kyknya mending), kasih pesan konsisten
        // (kyknya mending kasih redirect ke edit, ) didalam tampilan ahp.edit nanti kasih perhitungan men-DETAIL nya
        // kasih tampilan

        if (true) {
            $col_1 = array_column( $initial_full_ahp_arr, 0 );
            $col_2 = array_column( $initial_full_ahp_arr, 1 );
            $col_3 = array_column( $initial_full_ahp_arr, 2 );
            $col_4 = array_column( $initial_full_ahp_arr, 3 );
            $col_5 = array_column( $initial_full_ahp_arr, 4 );
            $col_6 = array_column( $initial_full_ahp_arr, 5 );
            $col_7 = array_column( $initial_full_ahp_arr, 6 );
            $col_8 = array_column( $initial_full_ahp_arr, 7 );
            $col_9 = array_column( $initial_full_ahp_arr, 8 );
            $col_10 = array_column( $initial_full_ahp_arr, 9 );
            $col_11 = array_column( $initial_full_ahp_arr, 10 );
            $col_12 = array_column( $initial_full_ahp_arr, 11 );



            $sum_col_1 = array_sum( $col_1 );
            $sum_col_2 = array_sum( $col_2 );
            $sum_col_3 = array_sum( $col_3 );
            $sum_col_4 = array_sum( $col_4 );
            $sum_col_5 = array_sum( $col_5 );
            $sum_col_6 = array_sum( $col_6 );
            $sum_col_7 = array_sum( $col_7 );
            $sum_col_8 = array_sum( $col_8 );
            $sum_col_9 = array_sum( $col_9 );
            $sum_col_10 = array_sum( $col_10 );
            $sum_col_11 = array_sum( $col_11 );
            $sum_col_12 = array_sum( $col_12 );

            // foreach ($variable as $key => $value) {
            //     # code...
            // }
        }

        

        // dd($sum_col_12);

        $is_konsisten = ($CR_value < 0.1) ? true : false;
        
        $created_by_admin = (Auth::user()->hasRole('Admin')) ? 1 : 0;

        $ahp_obj = AHP::create(
        [
            'nama_perhitungan' => $request->nama_perhitungan,
            'detail'           => $request->detail,
            'is_konsisten'     => $is_konsisten,
            'is_created_by_admin' => $created_by_admin,
            'creator_id' => Auth::id(),
        ]);

        
        // dd($ahp_obj->id);

        $bobot_eloquent_obj = Bobot::create(
        [
            'id_perhitungan'   => $ahp_obj->id_perhitungan ,                              
            'c1'   => $bobot_tiap_kriteria[0] ,                               
            'c2'   => $bobot_tiap_kriteria[1] ,                               
            'c3'   => $bobot_tiap_kriteria[2] ,                               
            'c4'   => $bobot_tiap_kriteria[3] ,                               
            'c5'   => $bobot_tiap_kriteria[4] ,                               
            'c6'   => $bobot_tiap_kriteria[5] ,                               
            'c7'   => $bobot_tiap_kriteria[6] ,                               
            'c8'   => $bobot_tiap_kriteria[7] ,                               
            'c9'   => $bobot_tiap_kriteria[8] ,                               
            'c10'  => $bobot_tiap_kriteria[9] ,                              
            'c11'  => $bobot_tiap_kriteria[10] ,                              
            'c12'  => $bobot_tiap_kriteria[11] ,   
            
            'lamda_max' => $lamdaMax,
            'consistency_index' => $CI_value,
            'consistency_ratio' => $CR_value
        ]);

        // dd($bobot_eloquent_obj->id_perhitungan);



        // $ahp_obj = DB::table('ahp')->insert([
        //     'nama_perhitungan' => $request->nama_perhitungan,
        //     'detail'           => $request->detail
        // ])->first();

        
        // dd($ahp_obj->id_perhitungan);


        // masukkan nilai ke tabel PerbandinganBerpasangan
        foreach ($initial_full_ahp_arr as $key => $crit) 
        {
            $perbandingan_berpasangan_elo_obj = PerbandinganBerpasangan::create([
                'id_perhitungan'    => $ahp_obj->id_perhitungan,
                'nama_kriteria'     => 'C' . ($key+1),
                'c1'    => $crit[0],
                'c2'    => $crit[1],
                'c3'    => $crit[2],
                'c4'    => $crit[3],
                'c5'    => $crit[4],
                'c6'    => $crit[5],
                'c7'    => $crit[6],
                'c8'    => $crit[7],
                'c9'    => $crit[8],
                'c10'   => $crit[9],
                'c11'   => $crit[10],
                'c12'   => $crit[11],
            ]);
        }

        // dd($perbandingan_berpasangan_elo_obj);


        if ($is_konsisten) {
            return redirect()->route('ahp.show', $ahp_obj->id_perhitungan)
                        ->with('success','Perhitungan AHP berhasil ditambahkan.
                        Perbandingan berpasangan antar kriteria SUDAH konsisten karena nilai Consitency Ratio < 0,1');
        } elseif (!$is_konsisten) {
            return redirect()->route('ahp.show', $ahp_obj->id_perhitungan)
                        ->with('error','Perhitungan AHP berhasil ditambahkan.
                        Perbandingan berpasangan antar kriteria BELUM konsisten karena nilai Consitency Ratio >= 0,1');
        }else {
            return redirect()->route('ahp.show', $ahp_obj->id_perhitungan)
                        ->with('error','ooppss something wrong');
        }

        // if ($is_konsisten) {
        //     return redirect()->route('ahp.index')
        //                 ->with('success','AHP calculation added successfully and consistent.');
        // } elseif (!$is_konsisten) {
        //     return redirect()->route('ahp.index')
        //                 ->with('warning','AHP calculation added successfully but not consistent.');
        // }else {
        //     return redirect()->route('ahp.index')
        //                 ->with('danger','ooppss something wrong');
        // }
        
            
    }
    
    public function show($id)
    {
        // dd($init_id_perhitungan);
        // dd($input->ahp);
        // dd($ahp_obj->id());

        // $AHP
        $ahp = AHP::where('id_perhitungan', '=', $id)->first();
        $bobot = Bobot::where('id_perhitungan', '=', $id)->first();
        $PB_obj = PerbandinganBerpasangan::where('id_perhitungan', '=', $id)->get();

        return view('ahp.show',compact('ahp', 'bobot', 'PB_obj'));

    }
    
    public function edit(AHP $ahp_obj, $id)
    {
        // dd($id);

        $ahp = AHP::where('id_perhitungan', '=', $id)->first();
        $bobot = Bobot::where('id_perhitungan', '=', $id)->first();
        $PB_obj = PerbandinganBerpasangan::where('id_perhitungan', '=', $id)->get();

        return view('ahp.edit',compact('ahp', 'bobot', 'PB_obj'));
    }
    

    public function update(Request $request, $id_get)
    {
        // dd($id_get);
        // dd($request->all());
        request()->validate($this->ahp_atribute_required);

        function round_if ($value){
            if ($value >= 9) {
                return 9;
            }
            elseif ($value >= 1) {
                return round($value);
            } 
            else {
                return round($value, 2);
            }  
        }

        // inisiasi nilai bagian segitaga bawah pada tabel (1 / request->xxxx)
        if (true) 
        {
            // bulatkan dulu menggunakan fungsi round_if pada masukan user
            $request->c1c2 = round_if($request->c1c2);
            $request->c1c3 = round_if($request->c1c3);
            $request->c1c4 = round_if($request->c1c4);
            $request->c1c5 = round_if($request->c1c5);
            $request->c1c6 = round_if($request->c1c6);
            $request->c1c7 = round_if($request->c1c7);
            $request->c1c8 = round_if($request->c1c8);
            $request->c1c9 = round_if($request->c1c9);
            $request->c1c10 = round_if($request->c1c10);
            $request->c1c11 = round_if($request->c1c11);
            $request->c1c12 = round_if($request->c1c12);
            $request->c2c3 = round_if($request->c2c3);
            $request->c2c4 = round_if($request->c2c4);
            $request->c2c5 = round_if($request->c2c5);
            $request->c2c6 = round_if($request->c2c6);
            $request->c2c7 = round_if($request->c2c7);
            $request->c2c8 = round_if($request->c2c8);
            $request->c2c9 = round_if($request->c2c9);
            $request->c2c10 = round_if($request->c2c10);
            $request->c2c11 = round_if($request->c2c11);
            $request->c2c12 = round_if($request->c2c12);
            $request->c3c4 = round_if($request->c3c4);
            $request->c3c5 = round_if($request->c3c5);
            $request->c3c6 = round_if($request->c3c6);
            $request->c3c7 = round_if($request->c3c7);
            $request->c3c8 = round_if($request->c3c8);
            $request->c3c9 = round_if($request->c3c9);
            $request->c3c10 = round_if($request->c3c10);
            $request->c3c11 = round_if($request->c3c11);
            $request->c3c12 = round_if($request->c3c12);
            $request->c4c5 = round_if($request->c4c5);
            $request->c4c6 = round_if($request->c4c6);
            $request->c4c7 = round_if($request->c4c7);
            $request->c4c8 = round_if($request->c4c8);
            $request->c4c9 = round_if($request->c4c9);
            $request->c4c10 = round_if($request->c4c10);
            $request->c4c11 = round_if($request->c4c11);
            $request->c4c12 = round_if($request->c4c12);
            $request->c5c6 = round_if($request->c5c6);
            $request->c5c7 = round_if($request->c5c7);
            $request->c5c8 = round_if($request->c5c8);
            $request->c5c9 = round_if($request->c5c9);
            $request->c5c10 = round_if($request->c5c10);
            $request->c5c11 = round_if($request->c5c11);
            $request->c5c12 = round_if($request->c5c12);
            $request->c6c7 = round_if($request->c6c7);
            $request->c6c8 = round_if($request->c6c8);
            $request->c6c9 = round_if($request->c6c9);
            $request->c6c10 = round_if($request->c6c10);
            $request->c6c11 = round_if($request->c6c11);
            $request->c6c12 = round_if($request->c6c12);
            $request->c7c8 = round_if($request->c7c8);
            $request->c7c9 = round_if($request->c7c9);
            $request->c7c10 = round_if($request->c7c10);
            $request->c7c11 = round_if($request->c7c11);
            $request->c7c12 = round_if($request->c7c12);
            $request->c8c9 = round_if($request->c8c9);
            $request->c8c10 = round_if($request->c8c10);
            $request->c8c11 = round_if($request->c8c11);
            $request->c8c12 = round_if($request->c8c12);
            $request->c9c10 = round_if($request->c9c10);
            $request->c9c11 = round_if($request->c9c11);
            $request->c9c12 = round_if($request->c9c12);
            $request->c10c11 = round_if($request->c10c11);
            $request->c10c12 = round_if($request->c10c12);
            $request->c11c12 = round_if($request->c11c12);

            // inisiasi nilai bagian segitaga bawah pada tabel (1 / request->xxxx)
            $c2c1 = round_if( 1 / $request->c1c2 );
            $c3c1 = round_if( 1 / $request->c1c3 );
            $c4c1 = round_if( 1 / $request->c1c4 );
            $c5c1 = round_if( 1 / $request->c1c5 );
            $c6c1 = round_if( 1 / $request->c1c6 );
            $c7c1 = round_if( 1 / $request->c1c7 );
            $c8c1 = round_if( 1 / $request->c1c8 );
            $c9c1 = round_if( 1 / $request->c1c9 );
            $c10c1 = round_if( 1 / $request->c1c10 );
            $c11c1 = round_if( 1 / $request->c1c11 );
            $c12c1 = round_if( 1 / $request->c1c12 );
            $c3c2 = round_if( 1 / $request->c2c3 );
            $c4c2 = round_if( 1 / $request->c2c4 );
            $c5c2 = round_if( 1 / $request->c2c5 );
            $c6c2 = round_if( 1 / $request->c2c6 );
            $c7c2 = round_if( 1 / $request->c2c7 );
            $c8c2 = round_if( 1 / $request->c2c8 );
            $c9c2 = round_if( 1 / $request->c2c9 );
            $c10c2 = round_if( 1 / $request->c2c10 );
            $c11c2 = round_if( 1 / $request->c2c11 );
            $c12c2 = round_if( 1 / $request->c2c12 );
            $c4c3 = round_if( 1 / $request->c3c4 );
            $c5c3 = round_if( 1 / $request->c3c5 );
            $c6c3 = round_if( 1 / $request->c3c6 );
            $c7c3 = round_if( 1 / $request->c3c7 );
            $c8c3 = round_if( 1 / $request->c3c8 );
            $c9c3 = round_if( 1 / $request->c3c9 );
            $c10c3 = round_if( 1 / $request->c3c10 );
            $c11c3 = round_if( 1 / $request->c3c11 );
            $c12c3 = round_if( 1 / $request->c3c12 );
            $c5c4 = round_if( 1 / $request->c4c5 );
            $c6c4 = round_if( 1 / $request->c4c6 );
            $c7c4 = round_if( 1 / $request->c4c7 );
            $c8c4 = round_if( 1 / $request->c4c8 );
            $c9c4 = round_if( 1 / $request->c4c9 );
            $c10c4 = round_if( 1 / $request->c4c10 );
            $c11c4 = round_if( 1 / $request->c4c11 );
            $c12c4 = round_if( 1 / $request->c4c12 );
            $c6c5 = round_if( 1 / $request->c5c6 );
            $c7c5 = round_if( 1 / $request->c5c7 );
            $c8c5 = round_if( 1 / $request->c5c8 );
            $c9c5 = round_if( 1 / $request->c5c9 );
            $c10c5 = round_if( 1 / $request->c5c10 );
            $c11c5 = round_if( 1 / $request->c5c11 );
            $c12c5 = round_if( 1 / $request->c5c12 );
            $c7c6 = round_if( 1 / $request->c6c7 );
            $c8c6 = round_if( 1 / $request->c6c8 );
            $c9c6 = round_if( 1 / $request->c6c9 );
            $c10c6 = round_if( 1 / $request->c6c10 );
            $c11c6 = round_if( 1 / $request->c6c11 );
            $c12c6 = round_if( 1 / $request->c6c12 );
            $c8c7 = round_if( 1 / $request->c7c8 );
            $c9c7 = round_if( 1 / $request->c7c9 );
            $c10c7 = round_if( 1 / $request->c7c10 );
            $c11c7 = round_if( 1 / $request->c7c11 );
            $c12c7 = round_if( 1 / $request->c7c12 );
            $c9c8 = round_if( 1 / $request->c8c9 );
            $c10c8 = round_if( 1 / $request->c8c10 );
            $c11c8 = round_if( 1 / $request->c8c11 );
            $c12c8 = round_if( 1 / $request->c8c12 );
            $c10c9 = round_if( 1 / $request->c9c10 );
            $c11c9 = round_if( 1 / $request->c9c11 );
            $c12c9 = round_if( 1 / $request->c9c12 );
            $c11c10 = round_if( 1 / $request->c10c11 );
            $c12c10 = round_if( 1 / $request->c10c12 );
            $c12c11 = round_if( 1 / $request->c11c12 );
        }

        $c1 = array();
        $c2 = array();
        $c3 = array();
        $c4 = array();
        $c5 = array();
        $c6 = array();
        $c7 = array();
        $c8 = array();
        $c9 = array();
        $c10 = array();
        $c11 = array();
        $c12 = array();

        $initial_full_ahp_arr = array();

        // bangun tabel dan array
        if (true) {
            array_push($c1, 1, $request->c1c2, $request->c1c3, $request->c1c4, $request->c1c5, $request->c1c6, $request->c1c7, $request->c1c8, $request->c1c9, $request->c1c10, $request->c1c11, $request->c1c12);
            array_push($c2, $c2c1, 1, $request->c2c3, $request->c2c4, $request->c2c5, $request->c2c6, $request->c2c7, $request->c2c8, $request->c2c9, $request->c2c10, $request->c2c11, $request->c2c12);
            array_push($c3, $c3c1, $c3c2, 1, $request->c3c4, $request->c3c5, $request->c3c6, $request->c3c7, $request->c3c8, $request->c3c9, $request->c3c10, $request->c3c11, $request->c3c12);
            array_push($c4, $c4c1, $c4c2, $c4c3, 1, $request->c4c5, $request->c4c6, $request->c4c7, $request->c4c8, $request->c4c9, $request->c4c10, $request->c4c11, $request->c4c12);
            array_push($c5, $c5c1, $c5c2, $c5c3, $c5c4, 1, $request->c5c6, $request->c5c7, $request->c5c8, $request->c5c9, $request->c5c10, $request->c5c11, $request->c5c12);
            array_push($c6, $c6c1, $c6c2, $c6c3, $c6c4, $c6c5, 1, $request->c6c7, $request->c6c8, $request->c6c9, $request->c6c10, $request->c6c11, $request->c6c12);
            array_push($c7, $c7c1, $c7c2, $c7c3, $c7c4, $c7c5, $c7c6, 1, $request->c7c8, $request->c7c9, $request->c7c10, $request->c7c11, $request->c7c12);
            array_push($c8, $c8c1, $c8c2, $c8c3, $c8c4, $c8c5, $c8c6, $c8c7, 1, $request->c8c9, $request->c8c10, $request->c8c11, $request->c8c12);
            array_push($c9, $c9c1, $c9c2, $c9c3, $c9c4, $c9c5, $c9c6, $c9c7, $c9c8, 1, $request->c9c10, $request->c9c11, $request->c9c12);
            array_push($c10, $c10c1, $c10c2, $c10c3, $c10c4, $c10c5, $c10c6, $c10c7, $c10c8, $c10c9, 1, $request->c10c11, $request->c10c12);
            array_push($c11, $c11c1, $c11c2, $c11c3, $c11c4, $c11c5, $c11c6, $c11c7, $c11c8, $c11c9, $c11c10, 1, $request->c11c12);
            array_push($c12, $c12c1, $c12c2, $c12c3, $c12c4, $c12c5, $c12c6, $c12c7, $c12c8, $c12c9, $c12c10, $c12c11, 1);

            array_push($initial_full_ahp_arr, $c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12);
        }


        // fungsi transpose (https://stackoverflow.com/questions/797251/transposing-multidimensional-arrays-in-php)
        function transpose($array) {
            return array_map(null, ...$array);
        }

        // transpose matriks untuk mempermudah dalam jumlahkan kolum kemudian rij / sumCol_j
        $transpose_initial_full_ahp_arr = transpose($initial_full_ahp_arr);

        // normalisasi
        $normalized_ahp_arr = array();
        foreach ($transpose_initial_full_ahp_arr as $column) 
        {
            $temp_sum = array_sum($column);

            foreach ($column as $key => $value) 
            {
                $column[$key] = $value / $temp_sum;
            }
            array_push($normalized_ahp_arr, $column);
            
        }

        // didapatkan matriks ahp yang ternormalisasi
        $normalized_ahp_arr = transpose($normalized_ahp_arr);

        // dapatkan bobot tiap kriteria
        $bobot_tiap_kriteria = array();
        foreach ($normalized_ahp_arr as $arr) 
        {
            array_push($bobot_tiap_kriteria, array_sum($arr) / count($arr));
        }

        // Code dibawah berikut mulai pengecekan nilai konsistensi

        // hitung nilai WSV
        $WSV_arr = $initial_full_ahp_arr;
        // array_push($WSV_arr, $initial_full_ahp_arr);
        $WSV_value = array();
        foreach ( $WSV_arr as $arr) 
        {
            $temp = 0;
            foreach ( $arr as $key => $value) 
            {
                $temp = $temp + ($value * $bobot_tiap_kriteria[$key]);
            }
            array_push($WSV_value, $temp);
        }

        // hitung nilai CV 
        $CV_value = array();
        foreach ($WSV_value as $key => $value)
        {
            array_push($CV_value, $value / $bobot_tiap_kriteria[$key]);
        }

        // hitung lamdaMax (rata-rata CV)
        $banyak_kriteria = count($CV_value);
        $lamdaMax = array_sum($CV_value) / $banyak_kriteria;

        // hitung nilai Consistency Index (CI)
        $CI_value = ($lamdaMax - $banyak_kriteria) / ($banyak_kriteria - 1);

        // hitung nilai Consistency Ratio (CR)
        $RandomIndex = 1.54;
        $CR_value = $CI_value / $RandomIndex;

        $is_konsisten = ($CR_value < 0.1) ? true : false;

    
        // $product->update($request->all());

        // update di tabel AHP di database
        $ahp_obj = AHP::where('id_perhitungan', $id_get)->first();
        // dd($ahp_obj->id_perhitungan);
        $ahp_obj->nama_perhitungan = $request->nama_perhitungan;
        $ahp_obj->detail           = $request->detail;
        $ahp_obj->is_konsisten     = $is_konsisten;

        $ahp_obj->save();
        // dd($ahp_obj->id_perhitungan);
        
        // update di tabel bobot di database
        $bobot_eloquent_obj = Bobot::where('id_perhitungan', $ahp_obj->id_perhitungan)->first();
                         
        $bobot_eloquent_obj->c1   = $bobot_tiap_kriteria[0] ;                               
        $bobot_eloquent_obj->c2   = $bobot_tiap_kriteria[1] ;                               
        $bobot_eloquent_obj->c3   = $bobot_tiap_kriteria[2] ;                               
        $bobot_eloquent_obj->c4   = $bobot_tiap_kriteria[3] ;                               
        $bobot_eloquent_obj->c5   = $bobot_tiap_kriteria[4] ;                               
        $bobot_eloquent_obj->c6   = $bobot_tiap_kriteria[5] ;                               
        $bobot_eloquent_obj->c7   = $bobot_tiap_kriteria[6] ;                               
        $bobot_eloquent_obj->c8   = $bobot_tiap_kriteria[7] ;                               
        $bobot_eloquent_obj->c9   = $bobot_tiap_kriteria[8] ;                               
        $bobot_eloquent_obj->c10  = $bobot_tiap_kriteria[9] ;                              
        $bobot_eloquent_obj->c11  = $bobot_tiap_kriteria[10] ;                              
        $bobot_eloquent_obj->c12  = $bobot_tiap_kriteria[11] ;   
        $bobot_eloquent_obj->lamda_max = $lamdaMax ;
        $bobot_eloquent_obj->consistency_index = $CI_value ;
        $bobot_eloquent_obj->consistency_ratio = $CR_value ;
        $bobot_eloquent_obj->save();

        // $bobot_eloquent_obj = Bobot::create(
        // [
        //     'id_perhitungan'   => $ahp_obj->id ,                              
        //     'c1'   => $bobot_tiap_kriteria[0] ,                               
        //     'c2'   => $bobot_tiap_kriteria[1] ,                               
        //     'c3'   => $bobot_tiap_kriteria[2] ,                               
        //     'c4'   => $bobot_tiap_kriteria[3] ,                               
        //     'c5'   => $bobot_tiap_kriteria[4] ,                               
        //     'c6'   => $bobot_tiap_kriteria[5] ,                               
        //     'c7'   => $bobot_tiap_kriteria[6] ,                               
        //     'c8'   => $bobot_tiap_kriteria[7] ,                               
        //     'c9'   => $bobot_tiap_kriteria[8] ,                               
        //     'c10'  => $bobot_tiap_kriteria[9] ,                              
        //     'c11'  => $bobot_tiap_kriteria[10] ,                              
        //     'c12'  => $bobot_tiap_kriteria[11] ,   
            
        //     'lamda_max' => $lamdaMax,
        //     'consistency_index' => $CI_value,
        //     'consistency_ratio' => $CR_value
        // ]);

        // dd($bobot_eloquent_obj->id_perhitungan);



        // $ahp_obj = DB::table('ahp')->insert([
        //     'nama_perhitungan' => $request->nama_perhitungan,
        //     'detail'           => $request->detail
        // ])->first();

        
        // dd($ahp_obj->id_perhitungan);


        PerbandinganBerpasangan::where('id_perhitungan', $ahp_obj->id_perhitungan)->delete();
        // masukkan nilai ke tabel PerbandinganBerpasangan
        foreach ($initial_full_ahp_arr as $key => $crit) 
        {
            $perbandingan_berpasangan_elo_obj = PerbandinganBerpasangan::create([
                'id_perhitungan'    => $ahp_obj->id_perhitungan,
                'nama_kriteria'     => 'C' . ($key+1),
                'c1'    => $crit[0],
                'c2'    => $crit[1],
                'c3'    => $crit[2],
                'c4'    => $crit[3],
                'c5'    => $crit[4],
                'c6'    => $crit[5],
                'c7'    => $crit[6],
                'c8'    => $crit[7],
                'c9'    => $crit[8],
                'c10'   => $crit[9],
                'c11'   => $crit[10],
                'c12'   => $crit[11],
            ]);
        }
        // dd($perbandingan_berpasangan_elo_obj);


        if ($is_konsisten) {
            return redirect()->route('ahp.show', $ahp_obj->id_perhitungan)
                        ->with('success','Perhitungan AHP berhasil diperbarui.
                         Perbandingan berpasangan antar kriteria SUDAH konsisten karena nilai Consitency Ratio < 0,1');
        } elseif (!$is_konsisten) {
            return redirect()->route('ahp.show', $ahp_obj->id_perhitungan)
                        ->with('error','Perhitungan AHP berhasil diperbarui.
                        Perbandingan berpasangan antar kriteria BELUM konsisten karena nilai Consitency Ratio >= 0,1');
        }else {
            return redirect()->route('ahp.show', $ahp_obj->id_perhitungan)
                        ->with('error','ooppss something wrong');
        }

    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    public function destroy($id_get_url)
    {
        // dd($product);
        // var_dump($product);
        // print_r($product);
        // die();
        AHP::where('id_perhitungan', $id_get_url)->delete();
        
        // tidak perlu delete ke table Bobot dan PerbandinganBerpasangan karena sudah forignKey onCascade->delete()
        // ketika membuat database tabelnya
        // Bobot::where('id_perhitungan', $id_get_url)->delete();
        // PerbandinganBerpasangan::where('id_perhitungan', $id_get_url)->delete();
    
        return redirect()->route('ahp.index')
                        ->with('success','Perhitungan AHP berhasil dihapus');
    }

    public function toggle($id_get_url)
    {
        $this_user = User::where('id', Auth::id())->update(['id_perhitungan_aktif' => $id_get_url]);

        // $ahp_obj = AHP::where('is_dipilih', 1)->first();
        // $ahp_obj->is_dipilih = 0;
        // $ahp_obj->save();

        // $ahp_obj = AHP::where('id_perhitungan', $id_get_url)->first();
        // $ahp_obj->is_dipilih = 1;
        // $ahp_obj->save();

        return redirect()->route('ahp.index')
                        ->with('success','Bobot AHP yang digunakan berhasil diganti');
    }


}
