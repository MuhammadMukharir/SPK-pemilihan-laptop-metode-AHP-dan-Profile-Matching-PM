<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PresetPreference;
use App\Models\Product;

use App\Models\AHP;
use App\Models\Bobot;
use Auth;

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

    

    public function index(PresetPreference $presetpreference)
    {
        // $presetpreference = PresetPreference::all();

        // $presetpreference = PresetPreference::first();
        // $presetpreference = [[]];
        // dd($presetpreference[0]->name);
        // $presetpreference = null;
        // return view('rekomendasi.index');
        return view('rekomendasi.index',compact('presetpreference'));
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

    public function hasil(Request $input)
    {
        request()->validate($this->preference_atribute_required);

        // dd($input->harga);

        $products = Product::latest()->get();

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

        // hitung gap lalu masukkan data gap ke array sebanyak banyak product
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
        }


        function hitungBobotBerdasarkanTabelGAP(Array $kriteria)
        {
            foreach ($kriteria as $key => $value) 
            {
                // dd($kriteria);
                switch ($value) {
                    case 0:
                        $kriteria[$key] = 5;
                        break;
                    case 1:
                        $kriteria[$key] = 4.5;
                        break;
                    case -1:
                        $kriteria[$key] = 4;
                        break;
                    case 2:
                        $kriteria[$key] = 3.5;
                        break;
                    case -2:
                        $kriteria[$key] = 3;
                        break;
                    case 3:
                        $kriteria[$key] = 2.5;
                        break;
                    case -3:
                        $kriteria[$key] = 2;
                        break;
                    case 4:
                        $kriteria[$key] = 1.5;
                        break;
                    case -4:
                        $kriteria[$key] = 1;
                        break;
    
                    // default:
                    //     # code...
                    //     # this is default
                    //     $kriteria[$key] = 999;
                    //     break;
                }
            }
            return $kriteria;
        }

        $gap_jenis_layar = hitungBobotBerdasarkanTabelGAP($gap_jenis_layar);
        $gap_ukuran_layar = hitungBobotBerdasarkanTabelGAP($gap_ukuran_layar);


        function hitungBobotBerdasarkanInterpolasiLinearGAP(Array $kriteria)
        {
            $batasInterpolasi = max($kriteria) > abs(min($kriteria)) ? max($kriteria) : abs(min($kriteria));
            // dd(-$batasInterpolasi);
            foreach ($kriteria as $key => $value) 
            {
                if ($value >= 0 && $value <= $batasInterpolasi) 
                {
                    $kriteria[$key] = ($value - 0) / 
                                      ($batasInterpolasi - 0) * (1 - 5) + 5;
                }
                elseif ($value < 0 && $value >= -$batasInterpolasi)
                // else
                {
                    $kriteria[$key] = ($value - ( -$batasInterpolasi)) / 
                                      (0 - ( -$batasInterpolasi)) * (5 - 1) + 1;
                }
            }
            return $kriteria;
        }

        $gap_harga            = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_harga);
        $gap_prosesor         = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_prosesor);
        $gap_kapasitas_ram    = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_kapasitas_ram);
        $gap_kapasitas_hdd    = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_kapasitas_hdd);
        $gap_kapasitas_ssd    = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_kapasitas_ssd);
        $gap_kapasitas_vram   = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_kapasitas_vram);
        $gap_kapasitas_maxram = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_kapasitas_maxram);
        $gap_berat            = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_berat);
        $gap_ukuran_layar     = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_ukuran_layar);
        $gap_jenis_layar      = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_jenis_layar);
        $gap_refresh_rate     = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_refresh_rate);
        $gap_resolusi_layar   = hitungBobotBerdasarkanInterpolasiLinearGAP($gap_resolusi_layar);
        
        $is_bobot_dipilih = AHP::where('is_konsisten', '=', 1)->where('is_dipilih', '=' , 1)->first();

        $bobot_ahp = Bobot::where('id_perhitungan', '=', $is_bobot_dipilih->id_perhitungan)->first();

        // kalikan bobot_gap (PM) dengan bobot_ahp (AHP) => SAW
        $arr_for_sort_product = array();
        
        foreach ($products as $key => $product) 
        {
            $gap_harga[$key]            = $gap_harga[$key] * $bobot_ahp->c1;
            $gap_prosesor[$key]         = $gap_prosesor[$key] * $bobot_ahp->c2;
            $gap_kapasitas_ram[$key]    = $gap_kapasitas_ram[$key] * $bobot_ahp->c3;
            $gap_kapasitas_hdd[$key]    = $gap_kapasitas_hdd[$key] * $bobot_ahp->c4;
            $gap_kapasitas_ssd[$key]    = $gap_kapasitas_ssd[$key] * $bobot_ahp->c5;
            $gap_kapasitas_vram[$key]   = $gap_kapasitas_vram[$key] * $bobot_ahp->c6;
            $gap_kapasitas_maxram[$key] = $gap_kapasitas_maxram[$key] * $bobot_ahp->c7;
            $gap_berat[$key]            = $gap_berat[$key] * $bobot_ahp->c8;
            $gap_ukuran_layar[$key]     = $gap_ukuran_layar[$key] * $bobot_ahp->c9;
            $gap_jenis_layar[$key]      = $gap_jenis_layar[$key] * $bobot_ahp->c10;
            $gap_refresh_rate[$key]     = $gap_refresh_rate[$key] * $bobot_ahp->c11;
            $gap_resolusi_layar[$key]   = $gap_resolusi_layar[$key] * $bobot_ahp->c12;

            $temp = 
                [
                    'urutan' => $key,
                    'n_bobot' => 
                        $gap_harga[$key] + 
                        $gap_prosesor[$key] +
                        $gap_kapasitas_ram[$key] +
                        $gap_kapasitas_hdd[$key] +
                        $gap_kapasitas_ssd[$key] +
                        $gap_kapasitas_vram[$key] +
                        $gap_kapasitas_maxram[$key] +
                        $gap_berat[$key] +
                        $gap_ukuran_layar[$key] +
                        $gap_jenis_layar[$key] +
                        $gap_refresh_rate[$key] +
                        $gap_resolusi_layar[$key]
                    ,
                    'product' => $products[$key]
                
                ]
                ;

            array_push($arr_for_sort_product, $temp);
        }

        // sort by n_bobot (nilai akhir alternatif)
        $col = array_column( $arr_for_sort_product, 'n_bobot' );
        array_multisort( $col, SORT_DESC, $arr_for_sort_product );

        // ambil column product dari array yang sudah di sort
        $hasil_rekomendasi = array_column( $arr_for_sort_product, 'product');
        $n_bobot = array_column( $arr_for_sort_product, 'n_bobot');
        $products = $hasil_rekomendasi;

        // dd($n_bobot);
        
        // dd($result);

        return view('rekomendasi.list_rekomendasi',compact('products', 'n_bobot'));

    }


    
}
