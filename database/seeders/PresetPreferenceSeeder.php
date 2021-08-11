<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PresetPreference;

class PresetPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presetpreferences = 
        [
            // A1
            [
                'nama'             => 'LAPTOP GAMING',
                'detail'           => 'Cari Laptop gaming, 15-jutaan',
                'harga'            => '15000000',
                'prosesor'         => '26.4',
                'kapasitas_ram'    => '16',
                'kapasitas_hdd'    => '1000',
                'kapasitas_ssd'    => '512',
                'kapasitas_vram'   => '6',
                'kapasitas_maxram' => '32',
                'berat'            => '2000',
                'ukuran_layar'     => '15',
                'jenis_layar'      => '3',
                'refresh_rate'     => '144',
                'resolusi_layar'   => '2073600',
            ],
            [
                'nama'             => 'LAPTOP EDITING 3D',
                'detail'           => 'Cari Laptop editing 3D, 13-jutaan',
                'harga'            => '13000000',
                'prosesor'         => '24',
                'kapasitas_ram'    => '16',
                'kapasitas_hdd'    => '1000',
                'kapasitas_ssd'    => '512',
                'kapasitas_vram'   => '6',
                'kapasitas_maxram' => '20',
                'berat'            => '1400',
                'ukuran_layar'     => '14',
                'jenis_layar'      => '3',
                'refresh_rate'     => '60',
                'resolusi_layar'   => '2073600',
            ],
            // [
            //     'nama'             => 'LAPTOP EDITING 2D',
            //     'detail'           => 'Laptop editing 2D',
            //     'harga'            => '13000000',
            //     'prosesor'         => '20',
            //     'kapasitas_ram'    => '8',
            //     'kapasitas_hdd'    => '0',
            //     'kapasitas_ssd'    => '512',
            //     'kapasitas_vram'   => '4',
            //     'kapasitas_maxram' => '20',
            //     'berat'            => '1100',
            //     'ukuran_layar'     => '14',
            //     'jenis_layar'      => '3',
            //     'refresh_rate'     => '60',
            //     'resolusi_layar'   => '2073600',
            // ],
            [
                'nama'             => 'LAPTOP EDITING 2D',
                'detail'           => 'Cari Laptop editing 2D, 7-jutaan',
                'harga'            => '7000000',
                'prosesor'         => '20',
                'kapasitas_ram'    => '16',
                'kapasitas_hdd'    => '1000',
                'kapasitas_ssd'    => '512',
                'kapasitas_vram'   => '4',
                'kapasitas_maxram' => '20',
                'berat'            => '1400',
                'ukuran_layar'     => '14',
                'jenis_layar'      => '3',
                'refresh_rate'     => '60',
                'resolusi_layar'   => '2073600',
            ],
            [
                'nama'             => 'LAPTOP OFFICE',
                'detail'           => 'Cari Laptop office, 3-jutaan',
                'harga'            => '3000000',
                'prosesor'         => '8',
                'kapasitas_ram'    => '8',
                'kapasitas_hdd'    => '0',
                'kapasitas_ssd'    => '256',
                'kapasitas_vram'   => '1',
                'kapasitas_maxram' => '12',
                'berat'            => '1200',
                'ukuran_layar'     => '14',
                'jenis_layar'      => '3',
                'refresh_rate'     => '60',
                'resolusi_layar'   => '2073600',
            ],
            [
                'nama'             => 'LAPTOP EDITING 2D v2',
                'detail'           => 'Cari Laptop editing 2D, 11-jutaan',
                'harga'            => '11000000',
                'prosesor'         => '20',
                'kapasitas_ram'    => '8',
                'kapasitas_hdd'    => '0',
                'kapasitas_ssd'    => '512',
                'kapasitas_vram'   => '4',
                'kapasitas_maxram' => '20',
                'berat'            => '1100',
                'ukuran_layar'     => '14',
                'jenis_layar'      => '3',
                'refresh_rate'     => '60',
                'resolusi_layar'   => '2073600',
            ],
            // demo proposal
            // [
            //     'nama'             => 'LAPTOP EDITING 2D v2',
            //     'detail'           => 'Cari Laptop editing 2D, 13-jutaan',
            //     'harga'            => '13000000',
            //     'prosesor'         => '20',
            //     'kapasitas_ram'    => '8',
            //     'kapasitas_hdd'    => '0',
            //     'kapasitas_ssd'    => '512',
            //     'kapasitas_vram'   => '4',
            //     'kapasitas_maxram' => '20',
            //     'berat'            => '1100',
            //     'ukuran_layar'     => '14',
            //     'jenis_layar'      => '3',
            //     'refresh_rate'     => '60',
            //     'resolusi_layar'   => '2073600',
            // ],
        ];

        foreach ($presetpreferences as $presetpreference) {
            PresetPreference::create(
                [
                    'name'              => $presetpreference['nama'],
                    'detail'            => $presetpreference['detail'],
                    'harga'             => $presetpreference['harga'],
                    'prosesor'          => $presetpreference['prosesor'],
                    'kapasitas_ram'     => $presetpreference['kapasitas_ram'],
                    'kapasitas_hdd'     => $presetpreference['kapasitas_hdd'],
                    'kapasitas_ssd'     => $presetpreference['kapasitas_ssd'],
                    'kapasitas_vram'    => $presetpreference['kapasitas_vram'],
                    'kapasitas_maxram'  => $presetpreference['kapasitas_maxram'],
                    'berat'             => $presetpreference['berat'],
                    'ukuran_layar'      => $presetpreference['ukuran_layar'],
                    'jenis_layar'       => $presetpreference['jenis_layar'],
                    'refresh_rate'      => $presetpreference['refresh_rate'],
                    'resolusi_layar'    => $presetpreference['resolusi_layar']
                ]
            );
        }
    }
}
