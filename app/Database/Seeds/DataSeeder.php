<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        // Entry data kota
        $kota1 = ['kota_nama' => 'Jakarta'];
        $kota2 = ['kota_nama' => 'Bandung'];
        $kota3 = ['kota_nama' => 'Surabaya'];

        $pengguna1 = ['pengguna_email' => 'amir@gmail.com', 'pengguna_sandi' => 'amir123', 'kota_id' => 1];
        $pengguna2 = ['pengguna_email' => 'zane@gmail.com', 'pengguna_sandi' => 'zane', 'kota_id' => 2];
        $pengguna3 = ['pengguna_email' => 'yugi@gmail.com', 'pengguna_sandi' => 'yugi', 'kota_id' => 3];

        $this->db->table('kota')->insert($kota1); // Insert kota 1
        $this->db->table('kota')->insert($kota2); // Insert kota 2
        $this->db->table('kota')->insert($kota3); // Insert kota 3

        $this->db->table('pengguna')->insert($pengguna1); // Insert pengguna 1
        $this->db->table('pengguna')->insert($pengguna2); // Insert pengguna 2
        $this->db->table('pengguna')->insert($pengguna3); // Insert pengguna 3
    }

}
