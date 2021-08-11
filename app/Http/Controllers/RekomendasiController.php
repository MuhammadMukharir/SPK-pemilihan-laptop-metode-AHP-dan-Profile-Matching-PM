<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PresetPreference;
use App\Models\Product;

use App\Models\AHP;
use App\Models\Bobot;
use App\Models\BobotLangsung;
use Auth;
use App\Models\User;
use App\Models\HasilRekomendasi;
use App\Models\AhpPmDigunakanHasilRekomendasi;
use App\Models\Favorite;

class RekomendasiController extends Controller
{
    protected $preference_atribute_required = array(
        'harga'             => 'required',
        'prosesor'          => 'required',
        'kapasitas_ram'     => 'required',
        'kapasitas_hdd'     => 'required',
        'kapasitas_ssd'     => 'required',
        'kapasitas_vram'    => 'required',
        'kapasitas_maxram'  => 'required',
        'berat'             => 'required',
        'ukuran_layar'      => 'required',
        'jenis_layar'       => 'required',
        'refresh_rate'      => 'required',
        'resolusi_layar'    => 'required'
    );

    

    public function index(PresetPreference $presetpreference, Request $request)
    {
        // $presetpreference = PresetPreference::all();
        // dd($presetpreference->harga);
        if (!empty($presetpreference->harga)) {
            $request->session()
            ->flash('success','Nilai preset preferensi berhasil digunakan, silakan ubah sesuai preferensi Anda.'); 
        }
        
        // $presetpreference = PresetPreference::first();
        // $presetpreference = [[]];
        // dd($presetpreference[0]->name);
        // $presetpreference = null;
        // return view('rekomendasi.index');
        $this_user_id = Auth::id();
        $this_user = User::where('id', $this_user_id)->first();
        

        $bobot_ahp = new Bobot();

        $is_bobot_dipilih = AHP::where('is_konsisten', '=', 1)->where('id_perhitungan', $this_user->id_perhitungan_aktif)->first();
        if (!empty($is_bobot_dipilih)) {
            $bobot_ahp = Bobot::where('id_perhitungan', '=', $is_bobot_dipilih->id_perhitungan)->first();
        }

        $bobot_langsung = BobotLangsung::where('id_user', '=', $this_user_id)->first();

        // normalisasi
        $sum = $bobot_langsung->c1 + $bobot_langsung->c2 + $bobot_langsung->c3 + $bobot_langsung->c4 + $bobot_langsung->c5 + $bobot_langsung->c6
                + $bobot_langsung->c7 + $bobot_langsung->c8 + $bobot_langsung->c9 + $bobot_langsung->c10 + $bobot_langsung->c11 + $bobot_langsung->c12;
        $bobot_langsung->c1 = $bobot_langsung->c1 / $sum;
        $bobot_langsung->c2 = $bobot_langsung->c2 / $sum;
        $bobot_langsung->c3 = $bobot_langsung->c3 / $sum;
        $bobot_langsung->c4 = $bobot_langsung->c4 / $sum;
        $bobot_langsung->c5 = $bobot_langsung->c5 / $sum;
        $bobot_langsung->c6 = $bobot_langsung->c6 / $sum;
        $bobot_langsung->c7 = $bobot_langsung->c7 / $sum;
        $bobot_langsung->c8 = $bobot_langsung->c8 / $sum;
        $bobot_langsung->c9 = $bobot_langsung->c9 / $sum;
        $bobot_langsung->c10 = $bobot_langsung->c10 / $sum;
        $bobot_langsung->c11 = $bobot_langsung->c11 / $sum;
        $bobot_langsung->c12 = $bobot_langsung->c12 / $sum;


        return view('rekomendasi.index',compact('presetpreference', 'bobot_ahp', 'bobot_langsung'));
    }

    public function list()
    {
        $presetpreferences = PresetPreference::latest()->get();
        return view('rekomendasi.list_presetpreference',compact('presetpreferences'));
    }

    public function presetDetail(PresetPreference $presetpreference)
    {
        return view('rekomendasi.preset_detail',compact('presetpreference'));
    }

    public function hasil_index(Product $product)
    {
        // $products = 
        $this_user_id = Auth::id();
        // $products = Product::leftJoin('favorites','favorites.fav_product_id','=','products.id')
        // // ->where(Auth::id())
        // ->where('favorites.user_id', $this_user_id)
        // ->orWhere('favorites.fav_product_id', null)
        // ->leftJoin('hasil_rekomendasi','hasil_rekomendasi.product_id','=','products.id')
        // ->orderBy('hasil_rekomendasi.n_bobot', 'desc')
        // ->get();


        $bobotKriteriaDanPreferensiKriteria = AhpPmDigunakanHasilRekomendasi::where('user_id', '=', $this_user_id)->first();
        if (empty($bobotKriteriaDanPreferensiKriteria)) {
            $bobotKriteriaDanPreferensiKriteria = new AhpPmDigunakanHasilRekomendasi();
        }

        $products = HasilRekomendasi::where('hasil_rekomendasi.user_id', $this_user_id)
        ->leftJoin('products', 'products.id', 'hasil_rekomendasi.product_id')
        ->leftJoin('favorites', 'favorites.fav_product_id', 'hasil_rekomendasi.product_id')
        ->orderBy('hasil_rekomendasi.n_bobot', 'desc')
        ->get();

        return view('rekomendasi.list_rekomendasi', compact('products', 'bobotKriteriaDanPreferensiKriteria'));
    }

    public function hasil(Request $input)
    {
        // dd(12345 - $input->harga);
        // dd($input->prioritas);
        // request()->validate($this->preference_atribute_required);
        $this_user_id = Auth::id();

        // dd($input->harga);


        // $products = Product::latest()->get();
        
        // $coba = DB::table('products')
        // ->select('*')
        // ->leftJoin('favorites','favorites.user_id','=','users.id')
        // ->where(Auth::id())
        // ->get();

        $products = Product::leftJoin('favorites','favorites.fav_product_id','=','products.id')
        ->where('favorites.user_id', '=', $this_user_id)
        ->orWhere('favorites.fav_product_id', '=', null)
        ->orderBy('products.created_at', 'desc')
        ->get();

        // dd($coba);
        

        // dd($products[0]->harga);

        $gaps = array();

        $preference_atribute = array(
            'harga'             ,
            'prosesor'          ,
            'kapasitas_ram'     ,
            'kapasitas_hdd'     ,
            'kapasitas_ssd'     ,
            'kapasitas_vram'    ,
            'kapasitas_maxram'  ,
            'berat'             ,
            'ukuran_layar'      ,
            'refresh_rate'      ,
            'resolusi_layar'    
        );

        // destructure variable $products tiap kriteria
        // variabel akan digunakan untuk penentuan SKORING pada COST or BENEFIT
        $products_harga            = array(); 
        $products_prosesor         = array();
        $products_kapasitas_ram    = array();
        $products_kapasitas_hdd    = array();
        $products_kapasitas_ssd    = array();
        $products_kapasitas_vram   = array();
        $products_kapasitas_maxram = array();
        $products_berat            = array();
        $products_ukuran_layar     = array();
        $products_jenis_layar      = array();
        $products_refresh_rate     = array();
        $products_resolusi_layar   = array();

        $gap_harga            = array(); 
        $gap_prosesor         = array();
        $gap_kapasitas_ram    = array();
        $gap_kapasitas_hdd    = array();
        $gap_kapasitas_ssd    = array();
        $gap_kapasitas_vram   = array();
        $gap_kapasitas_maxram = array();
        $gap_berat            = array();
        $gap_ukuran_layar     = array();
        $gap_jenis_layar      = array();
        $gap_refresh_rate     = array();
        $gap_resolusi_layar   = array();

        // hitung gap lalu masukkan data gap ke array untuk setiap nilai kriteria pada setiap produk
        foreach ($products as $key => $product) 
        {
            array_push($gap_harga,          $product->harga - $input->harga);
            array_push($gap_prosesor,       $product->prosesor - $input->prosesor);
            array_push($gap_kapasitas_ram,  $product->kapasitas_ram - $input->kapasitas_ram);
            array_push($gap_kapasitas_hdd,  $product->kapasitas_hdd - $input->kapasitas_hdd);
            array_push($gap_kapasitas_ssd,  $product->kapasitas_ssd - $input->kapasitas_ssd);
            array_push($gap_kapasitas_vram, $product->kapasitas_vram - $input->kapasitas_vram);
            array_push($gap_kapasitas_maxram, $product->kapasitas_maxram - $input->kapasitas_maxram);
            array_push($gap_berat,            $product->berat - $input->berat);
            array_push($gap_ukuran_layar,   $product->ukuran_layar - $input->ukuran_layar);
            array_push($gap_jenis_layar,    $product->jenis_layar - $input->jenis_layar);
            array_push($gap_refresh_rate,   $product->refresh_rate - $input->refresh_rate);
            array_push($gap_resolusi_layar, $product->resolusi_layar - $input->resolusi_layar);

            array_push($products_harga,          $product->harga);
            array_push($products_prosesor,       $product->prosesor);
            array_push($products_kapasitas_ram,  $product->kapasitas_ram);
            array_push($products_kapasitas_hdd,  $product->kapasitas_hdd);
            array_push($products_kapasitas_ssd,  $product->kapasitas_ssd);
            array_push($products_kapasitas_vram, $product->kapasitas_vram);
            array_push($products_kapasitas_maxram, $product->kapasitas_maxram);
            array_push($products_berat,            $product->berat);
            array_push($products_ukuran_layar,   $product->ukuran_layar);
            array_push($products_jenis_layar,    $product->jenis_layar);
            array_push($products_refresh_rate,   $product->refresh_rate);
            array_push($products_resolusi_layar, $product->resolusi_layar);
        }

        // kode dibawah mulai perhitungan skor tiap kriteria alternatif
        function hitungSkorBerdasarkanTabelGAP(Array $arr_gap)
        {
            foreach ($arr_gap as $key => $value) 
            {
                switch ($value) {
                    case 0  : $arr_gap[$key] = 5    ; break;
                    case 1  : $arr_gap[$key] = 4.5  ; break;
                    case -1 : $arr_gap[$key] = 4    ; break;
                    case 2  : $arr_gap[$key] = 3.5  ; break;
                    case -2 : $arr_gap[$key] = 3    ; break;
                    case 3  : $arr_gap[$key] = 2.5  ; break;
                    case -3 : $arr_gap[$key] = 2    ; break;
                    case 4  : $arr_gap[$key] = 1.5  ; break;
                    case -4 : $arr_gap[$key] = 1    ; break;
                }
            }
            return $arr_gap;
        }

        $skor_jenis_layar = hitungSkorBerdasarkanTabelGAP($gap_jenis_layar);
        $skor_ukuran_layar = hitungSkorBerdasarkanTabelGAP($gap_ukuran_layar);


        function hitungSkorBerdasarkanInterpolasiLinearGAP(Array $arr_gap)
        {
            $maxGAP = max($arr_gap) > abs(min($arr_gap)) ? max($arr_gap) : abs(min($arr_gap));

            foreach ($arr_gap as $key => $value) 
            {
                if (0 <= $value && $value <= $maxGAP) 
                {
                    $arr_gap[$key] = ($value - 0) / 
                                      ($maxGAP - 0) * (1 - 5) + 5;
                }
                elseif (-$maxGAP <= $value && $value < 0)
                {
                    $arr_gap[$key] = ($value - ( -$maxGAP)) / 
                                      (0 - ( -$maxGAP)) * (5 - 1) + 1;
                }
            }
            return $arr_gap;
        }

        $skor_harga            = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_harga);
        $skor_prosesor         = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_prosesor);
        $skor_kapasitas_ram    = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_kapasitas_ram);
        $skor_kapasitas_hdd    = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_kapasitas_hdd);
        $skor_kapasitas_ssd    = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_kapasitas_ssd);
        $skor_kapasitas_vram   = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_kapasitas_vram);
        $skor_kapasitas_maxram = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_kapasitas_maxram);
        $skor_berat            = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_berat);
        $skor_refresh_rate     = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_refresh_rate);
        $skor_resolusi_layar   = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_resolusi_layar);

        // $skor_ukuran_layar     = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_ukuran_layar);
        // $skor_jenis_layar      = hitungSkorBerdasarkanInterpolasiLinearGAP($gap_jenis_layar);
        
        // perhitungan skor berdasarkan prioritas (COST or BENEFIT)
        // pritoritas === nilai_terendah (COST) // pritoritas === nilai_tertinggi (BENEFIT)

        function hitungSkorBerdasarkanPrioritas(Array $arr_alternatif_kriteriaX, $prioritas)
        {
            $data = $arr_alternatif_kriteriaX;
            $dataMAX = max($data);
            $dataMIN = min($data);
            // SKOR KRITERIA BIAYA
            // skor kriteria input akan dihitung dengan fungsi Kriteria BIAYA
            // apabila pengguna memasukkan pritoritas "Prioritas Nilai Terendah" pada kriteria tersebut
            if ($prioritas === "Prioritas Nilai Terendah"){
                foreach ($data as $key => $value){
                    $data[$key] = ($value - $dataMIN) / 
                                ($dataMAX - $dataMIN)   * (1 - 5) + 5;
                }
            }
            // SKOR KRITERIA KEUNTUNGAN
            // skor kriteria input akan dihitung dengan fungsi skor Kriteria KEUNTUNGAN
            // apabila pengguna memasukkan pritoritas "Prioritas Nilai Tertinggi" pada kriteria tersebut
            elseif ($prioritas === "Prioritas Nilai Tertinggi") {
                foreach ($data as $key => $value){
                    $data[$key] = ($value - $dataMIN) / 
                                ($dataMAX - $dataMIN)   * (5 - 1) + 1;
                }
            }
            return $data;
        }

        foreach ($input->prioritas as $key => $prioritasStr) {
            if ($prioritasStr === "Prioritas Nilai Preferensi" || $prioritasStr === "Kriteria Diabaikan") { continue; }

            elseif ($prioritasStr === "Prioritas Nilai Terendah" || $prioritasStr === "Prioritas Nilai Tertinggi") { 
                switch ($key) {
                    case 0: $skor_harga = hitungSkorBerdasarkanPrioritas($products_harga, $prioritasStr); break;
                    case 1: $skor_prosesor = hitungSkorBerdasarkanPrioritas($products_prosesor, $prioritasStr); break;
                    case 2: $skor_kapasitas_ram = hitungSkorBerdasarkanPrioritas($products_kapasitas_ram, $prioritasStr); break;
                    case 3: $skor_kapasitas_hdd = hitungSkorBerdasarkanPrioritas($products_kapasitas_hdd, $prioritasStr); break;
                    case 4: $skor_kapasitas_ssd = hitungSkorBerdasarkanPrioritas($products_kapasitas_ssd, $prioritasStr); break;
                    case 5: $skor_kapasitas_vram = hitungSkorBerdasarkanPrioritas($products_kapasitas_vram, $prioritasStr); break;
                    case 6: $skor_kapasitas_maxram = hitungSkorBerdasarkanPrioritas($products_kapasitas_maxram, $prioritasStr); break;
                    case 7: $skor_berat = hitungSkorBerdasarkanPrioritas($products_berat, $prioritasStr); break;
                    case 8: $skor_ukuran_layar = hitungSkorBerdasarkanPrioritas($products_ukuran_layar, $prioritasStr); break;
                    case 9: $skor_jenis_layar = hitungSkorBerdasarkanPrioritas($products_jenis_layar, $prioritasStr); break;
                    case 10: $skor_refresh_rate = hitungSkorBerdasarkanPrioritas($products_refresh_rate, $prioritasStr); break;
                    case 11: $skor_resolusi_layar = hitungSkorBerdasarkanPrioritas($products_resolusi_layar, $prioritasStr); break;
                }
            }
        }

        // kode dibawah mulai pengambilan bobot antar kriteria (dari Pembobotan Langsung atau AHP)
        $this_user_id = Auth::id();
        $this_user = User::where('id', $this_user_id)->first();
        

        $bobot_ahp = null;

        // jika menggunakan pembobotan AHP
        if ($input->jenis_pembobotan) {
            
            $is_bobot_dipilih = AHP::where('is_konsisten', '=', 1)->where('id_perhitungan', $this_user->id_perhitungan_aktif)->first();
            if (empty($is_bobot_dipilih)) {
                return redirect()->back()->with('error', 'Pastikan Anda telah mengaktifkan satu opsi pembobotan AHP yang KONSISTEN')
                ;}
            
            $bobot_ahp = Bobot::where('id_perhitungan', '=', $is_bobot_dipilih->id_perhitungan)->first();
            
        
        // jika menggunakan pembobotan Langsung
        } else{

            $bobot_ahp = BobotLangsung::where('id_user', '=', $this_user_id)->first();

            // normalisasi
            $sum = $bobot_ahp->c1 + $bobot_ahp->c2 + $bobot_ahp->c3 + $bobot_ahp->c4 + $bobot_ahp->c5 + $bobot_ahp->c6
                    + $bobot_ahp->c7 + $bobot_ahp->c8 + $bobot_ahp->c9 + $bobot_ahp->c10 + $bobot_ahp->c11 + $bobot_ahp->c12;
            $bobot_ahp->c1 = $bobot_ahp->c1 / $sum;
            $bobot_ahp->c2 = $bobot_ahp->c2 / $sum;
            $bobot_ahp->c3 = $bobot_ahp->c3 / $sum;
            $bobot_ahp->c4 = $bobot_ahp->c4 / $sum;
            $bobot_ahp->c5 = $bobot_ahp->c5 / $sum;
            $bobot_ahp->c6 = $bobot_ahp->c6 / $sum;
            $bobot_ahp->c7 = $bobot_ahp->c7 / $sum;
            $bobot_ahp->c8 = $bobot_ahp->c8 / $sum;
            $bobot_ahp->c9 = $bobot_ahp->c9 / $sum;
            $bobot_ahp->c10 = $bobot_ahp->c10 / $sum;
            $bobot_ahp->c11 = $bobot_ahp->c11 / $sum;
            $bobot_ahp->c12 = $bobot_ahp->c12 / $sum;
        }
        // $bobot_ahp = Bobot::where('id_perhitungan', '=', $is_bobot_dipilih->id_perhitungan)->first();

        // kalikan skor hasil (PM) dan skor hasil interpolasi linear biaya dan keuntungan
        // dengan bobot_ahp (AHP) 
        // kemudian jumlahkan semua hasil perkalian => SAW
        // lakukan untuk setiap alternatif produk
        $arr_hasil_rekomendasi = array();
        
        foreach ($products as $key => $product) 
        {
            // kalikan skor kriteria hasil skoring metode PM dan Interpolasi Linear dengan bobot_ahp (AHP) 
            $temp_harga            = $skor_harga[$key] * $bobot_ahp->c1;
            $temp_prosesor         = $skor_prosesor[$key] * $bobot_ahp->c2;
            $temp_kapasitas_ram    = $skor_kapasitas_ram[$key] * $bobot_ahp->c3;
            $temp_kapasitas_hdd    = $skor_kapasitas_hdd[$key] * $bobot_ahp->c4;
            $temp_kapasitas_ssd    = $skor_kapasitas_ssd[$key] * $bobot_ahp->c5;
            $temp_kapasitas_vram   = $skor_kapasitas_vram[$key] * $bobot_ahp->c6;
            $temp_kapasitas_maxram = $skor_kapasitas_maxram[$key] * $bobot_ahp->c7;
            $temp_berat            = $skor_berat[$key] * $bobot_ahp->c8;
            $temp_ukuran_layar     = $skor_ukuran_layar[$key] * $bobot_ahp->c9;
            $temp_jenis_layar      = $skor_jenis_layar[$key] * $bobot_ahp->c10;
            $temp_refresh_rate     = $skor_refresh_rate[$key] * $bobot_ahp->c11;
            $temp_resolusi_layar   = $skor_resolusi_layar[$key] * $bobot_ahp->c12;
            // set nol (0) jika kriteria diabaikan
            foreach ($input->prioritas as $index => $prioritasStr) {
                if ($prioritasStr === "Kriteria Diabaikan") {
                    switch ($index) {
                        case 0: $temp_harga = 0; break;
                        case 1: $temp_prosesor = 0; break;
                        case 2: $temp_kapasitas_ram = 0; break;
                        case 3: $temp_kapasitas_hdd = 0; break;
                        case 4: $temp_kapasitas_ssd = 0; break;
                        case 5: $temp_kapasitas_vram = 0; break;
                        case 6: $temp_kapasitas_maxram = 0; break;
                        case 7: $temp_berat = 0; break;
                        case 8: $temp_ukuran_layar = 0; break;
                        case 9: $temp_jenis_layar = 0; break;
                        case 10: $temp_refresh_rate = 0; break;
                        case 11: $temp_resolusi_layar = 0; break;
                    }
                }
            }
            // kemudian jumlahkan semua hasil perkalian
            $sum = $temp_harga + $temp_prosesor + $temp_kapasitas_ram + $temp_kapasitas_hdd + $temp_kapasitas_ssd
                     + $temp_kapasitas_vram + $temp_kapasitas_maxram + $temp_berat + $temp_ukuran_layar + $temp_jenis_layar
                     + $temp_refresh_rate + $temp_resolusi_layar;
            
            $temp_hasil_rekomendasi = ['n_bobot' => $sum,'product' => $products[$key] ];
            array_push($arr_hasil_rekomendasi, $temp_hasil_rekomendasi);
        }

        // dd($arr_hasil_rekomendasi);

        // sort by n_bobot (nilai skor rekomendasi alternatif produk)
        $col = array_column( $arr_hasil_rekomendasi, 'n_bobot' );
        array_multisort( $col, SORT_DESC, $arr_hasil_rekomendasi );

        // dd($this_user_id);
        // dd($arr_for_sort_product);
        // delete dulu apabila pernah melakukan rekomendasi
        HasilRekomendasi::where('user_id', $this_user_id)->delete();

        // mulai memasukkan data ke Tabel hasil_rekomendasi
        $data = array();
        foreach ($arr_hasil_rekomendasi as $key => $arr) {
            $temp = array(
                'user_id'    => $this_user_id,
                'product_id' => $arr['product']->id,
                'n_bobot'    => $arr['n_bobot'],
            );
            array_push($data, $temp);
        }
        HasilRekomendasi::insert($data);
        // dd($data);

        // ambil column product dari array yang sudah di sort
        $hasil_rekomendasi = array_column( $arr_hasil_rekomendasi, 'product');
        $products = $hasil_rekomendasi;
        $n_bobot = array_column( $arr_hasil_rekomendasi, 'n_bobot');
        
        // add skor rekomendasi ke dalam objek produk
        foreach ($products as $key => $product) {
            $product->n_bobot = $n_bobot[$key];
        }
        
        // siapin data preferensi yang digunakan dalam perhitungan rekomendasi untuk dimasukkan ke dalam database
        if (true) {
            $pref_harga = $input->prioritas[0] === 'Prioritas Nilai Preferensi' ? $input->harga : $input->prioritas[0];
            $pref_prosesor = $input->prioritas[1] === 'Prioritas Nilai Preferensi' ? $input->prosesor : $input->prioritas[1];
            $pref_kapasitas_ram = $input->prioritas[2] === 'Prioritas Nilai Preferensi' ? $input->kapasitas_ram : $input->prioritas[2];
            $pref_kapasitas_hdd = $input->prioritas[3] === 'Prioritas Nilai Preferensi' ? $input->kapasitas_hdd : $input->prioritas[3];
            $pref_kapasitas_ssd = $input->prioritas[4] === 'Prioritas Nilai Preferensi' ? $input->kapasitas_ssd : $input->prioritas[4];
            $pref_kapasitas_vram = $input->prioritas[5] === 'Prioritas Nilai Preferensi' ? $input->kapasitas_vram : $input->prioritas[5];
            $pref_kapasitas_maxram = $input->prioritas[6] === 'Prioritas Nilai Preferensi' ? $input->kapasitas_maxram : $input->prioritas[6];
            $pref_berat = $input->prioritas[7] === 'Prioritas Nilai Preferensi' ? $input->berat : $input->prioritas[7];
            $pref_ukuran_layar = $input->prioritas[8] === 'Prioritas Nilai Preferensi' ? $input->ukuran_layar : $input->prioritas[8];
            $pref_jenis_layar = $input->prioritas[9] === 'Prioritas Nilai Preferensi' ? $input->jenis_layar : $input->prioritas[9];
            $pref_refresh_rate = $input->prioritas[10] === 'Prioritas Nilai Preferensi' ? $input->refresh_rate : $input->prioritas[10];
            $pref_resolusi_layar = $input->prioritas[11] === 'Prioritas Nilai Preferensi' ? $input->resolusi_layar : $input->prioritas[11];
        }
        

        AhpPmDigunakanHasilRekomendasi::where('user_id', $this_user_id)->delete();
        $bobotKriteriaDanPreferensiKriteria = AhpPmDigunakanHasilRekomendasi::create([
            'user_id' => $this_user_id,

            'bobot_harga' => $bobot_ahp->c1 ,
            'bobot_prosesor' => $bobot_ahp->c2 ,
            'bobot_kapasitas_ram' => $bobot_ahp->c3 ,
            'bobot_kapasitas_hdd' => $bobot_ahp->c4 ,
            'bobot_kapasitas_ssd' => $bobot_ahp->c5 ,
            'bobot_kapasitas_vram' => $bobot_ahp->c6 ,
            'bobot_kapasitas_maxram' => $bobot_ahp->c7 ,
            'bobot_berat' => $bobot_ahp->c8 ,
            'bobot_ukuran_layar' => $bobot_ahp->c9 ,
            'bobot_jenis_layar' => $bobot_ahp->c10 ,
            'bobot_refresh_rate' => $bobot_ahp->c11 ,
            'bobot_resolusi_layar' => $bobot_ahp->c12 ,
    
            'pref_harga' => $pref_harga,
            'pref_prosesor' => $pref_prosesor,
            'pref_kapasitas_ram' => $pref_kapasitas_ram,
            'pref_kapasitas_hdd' => $pref_kapasitas_hdd,
            'pref_kapasitas_ssd' => $pref_kapasitas_ssd,
            'pref_kapasitas_vram' => $pref_kapasitas_vram,
            'pref_kapasitas_maxram' => $pref_kapasitas_maxram,
            'pref_berat' => $pref_berat,
            'pref_ukuran_layar' => $pref_ukuran_layar,
            'pref_jenis_layar' => $pref_jenis_layar,
            'pref_refresh_rate' => $pref_refresh_rate,
            'pref_resolusi_layar' => $pref_resolusi_layar,
        ]);

        // $products[0]->n_bobot = 999;
        // dd($products[0]->n_bobot);

        // dd($n_bobot);
        
        // dd($result);
        $input->session()
            ->flash('success','Rekomendasi berhasil. Silakan pilih produk laptop yang tersedia'); 

        return view('rekomendasi.list_rekomendasi',compact('products', 'n_bobot', 'bobotKriteriaDanPreferensiKriteria'))
            ->with('success', 'Rekomendasi berhasil. Berikut hasil rekomendasi produk laptop');

    }

    // public function show(Product $product, $id)
    // {
    //     $this_user_id = Auth::id();

    //     // send data to view
    //     $product = Product::where('id', $id)->first();
    //     $is_favorite = Favorite::where([['user_id', $this_user_id], ['fav_product_id', $id]])->first();

    //     return view('carilaptop.show',compact('product', 'is_favorite'));
    // }


    public function product_detail(Product $product, $id)
    {
        $this_user_id = Auth::id();

        // send data to view
        $product = Product::where('id', $id)->first();
        $is_favorite = Favorite::where([['user_id', $this_user_id], ['fav_product_id', $id]])->first();

        return view('rekomendasi.product_detail',compact('product', 'is_favorite'));
    }
    
}
