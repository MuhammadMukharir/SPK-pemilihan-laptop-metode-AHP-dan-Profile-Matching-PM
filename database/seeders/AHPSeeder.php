<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\AHP;
use App\Models\PerbandinganBerpasangan;
use App\Models\Bobot;

class AHPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ahp = AHP::create([
            'nama_perhitungan' => 'Coba ahp 1',
            'is_konsisten'     => 1,
            'is_dipilih'       => 1,
            'detail'           => 'ini adalah pembobotan AHP 1'
        ]);

        $kriterias = 
        [
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C1',
                'c1'  => '1.0',
                'c2'  => '4.0',
                'c3'  => '0.5',
                'c4'  => '7.0',
                'c5'  => '0.5',
                'c6'  => '4.0',
                'c7'  => '0.5',
                'c8'  => '2.0',
                'c9'  => '4.0',
                'c10' => '6.0',
                'c11' => '4.0',
                'c12' => '6.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C2',
                'c1'  => '0.25',
                'c2'  => '1.0',
                'c3'  => '0.17',
                'c4'  => '6.0',
                'c5'  => '0.25',
                'c6'  => '1.0',
                'c7'  => '0.17',
                'c8'  => '0.25',
                'c9'  => '0.5',
                'c10' => '2.0',
                'c11' => '0.5',
                'c12' => '2.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C3',
                'c1'  => '2.0',
                'c2'  => '6.0',
                'c3'  => '1.0',
                'c4'  => '9.0',
                'c5'  => '2.0',
                'c6'  => '6.0',
                'c7'  => '1.0',
                'c8'  => '3.0',
                'c9'  => '5.0',
                'c10' => '7.0',
                'c11' => '5.0',
                'c12' => '7.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C4',
                'c1'  => '0.14',
                'c2'  => '0.17',
                'c3'  => '0.11',
                'c4'  => '1.0',
                'c5'  => '0.14',
                'c6'  => '0.25',
                'c7'  => '0.11',
                'c8'  => '0.14',
                'c9'  => '0.2',
                'c10' => '0.33',
                'c11' => '0.2',
                'c12' => '0.33',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C5',
                'c1'  => '2.0',
                'c2'  => '4.0',
                'c3'  => '0.5',
                'c4'  => '7.0',
                'c5'  => '1.0',
                'c6'  => '4.0',
                'c7'  => '1.0',
                'c8'  => '2.0',
                'c9'  => '4.0',
                'c10' => '6.0',
                'c11' => '4.0',
                'c12' => '6.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C6',
                'c1'  => '0.25',
                'c2'  => '1.0',
                'c3'  => '0.17',
                'c4'  => '4.0',
                'c5'  => '0.25',
                'c6'  => '1.0',
                'c7'  => '0.25',
                'c8'  => '0.25',
                'c9'  => '0.5',
                'c10' => '2.0',
                'c11' => '0.5',
                'c12' => '2.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C7',
                'c1'  => '2.0',
                'c2'  => '6.0',
                'c3'  => '1.0',
                'c4'  => '9.0',
                'c5'  => '1.0',
                'c6'  => '4.0',
                'c7'  => '1.0',
                'c8'  => '3.0',
                'c9'  => '5.0',
                'c10' => '7.0',
                'c11' => '5.0',
                'c12' => '7.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C8',
                'c1'  => '0.5',
                'c2'  => '4.0',
                'c3'  => '0.33',
                'c4'  => '7.0',
                'c5'  => '0.5',
                'c6'  => '4.0',
                'c7'  => '0.33',
                'c8'  => '1.0',
                'c9'  => '3.0',
                'c10' => '5.0',
                'c11' => '3.0',
                'c12' => '5.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C9',
                'c1'  => '0.25',
                'c2'  => '2.0',
                'c3'  => '0.2',
                'c4'  => '5.0',
                'c5'  => '0.25',
                'c6'  => '2.0',
                'c7'  => '0.2',
                'c8'  => '0.33',
                'c9'  => '1.0',
                'c10' => '3.0',
                'c11' => '1.0',
                'c12' => '3.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C10',
                'c1'  => '0.17',
                'c2'  => '0.5',
                'c3'  => '0.14',
                'c4'  => '3.0',
                'c5'  => '0.17',
                'c6'  => '0.5',
                'c7'  => '0.14',
                'c8'  => '0.2',
                'c9'  => '0.33',
                'c10' => '1.0',
                'c11' => '0.33',
                'c12' => '1.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C11',
                'c1'  => '0.25',
                'c2'  => '2.0',
                'c3'  => '0.2',
                'c4'  => '5.0',
                'c5'  => '0.25',
                'c6'  => '2.0',
                'c7'  => '0.2',
                'c8'  => '0.33',
                'c9'  => '1.0',
                'c10' => '3.0',
                'c11' => '1.0',
                'c12' => '3.0',
            ],
            [
                'id_perhitungan' => $ahp->id,
                'nama_kriteria'  => 'C12',
                'c1'  => '0.17',
                'c2'  => '0.5',
                'c3'  => '0.14',
                'c4'  => '3.0',
                'c5'  => '0.17',
                'c6'  => '0.5',
                'c7'  => '0.14',
                'c8'  => '0.2',
                'c9'  => '0.33',
                'c10' => '1.0',
                'c11' => '0.33',
                'c12' => '1.0',
            ],
        ];

        foreach ($kriterias as $kriteria) {
            PerbandinganBerpasangan::create(
                [
                    'id_perhitungan'    => $kriteria['id_perhitungan'],
                    'nama_kriteria'     => $kriteria['nama_kriteria'],
                    'c1'                => $kriteria['c1'],
                    'c2'                => $kriteria['c2'],
                    'c3'                => $kriteria['c3'],
                    'c4'                => $kriteria['c4'],
                    'c5'                => $kriteria['c5'],
                    'c6'                => $kriteria['c6'],
                    'c7'                => $kriteria['c7'],
                    'c8'                => $kriteria['c8'],
                    'c9'                => $kriteria['c9'],
                    'c10'               => $kriteria['c10'],
                    'c11'               => $kriteria['c11'],
                    'c12'               => $kriteria['c12'],
                ]
            );
        }

        Bobot::create([
            'id_perhitungan' => $ahp->id,
            // 'nama_kriteria'  => 'c12',
            'c1'  => '0.13',
            'c2'  => '0.04',
            'c3'  => '0.2',
            'c4'  => '0.01',
            'c5'  => '0.15',
            'c6'  => '0.04',
            'c7'  => '0.19',
            'c8'  => '0.1',
            'c9'  => '0.05',
            'c10' => '0.02',
            'c11' => '0.05',
            'c12' => '0.02',

            'lamda_max' => '12.56',
            'consistency_index' => '0.05',
            'consistency_ratio' => '0.033',
        ]);

    }
}