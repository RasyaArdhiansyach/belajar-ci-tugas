<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        $tanggalAwal = date('Y-m-d');

        for ($i = 0; $i < 10; $i++) {

            $data[] = [
                'tanggal'    => date('Y-m-d', strtotime("+$i day", strtotime($tanggalAwal))),
                'nominal'    => rand(50000,300000),

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null
            ];
        }

        $this->db->table('discount')->insertBatch($data);
    }
}