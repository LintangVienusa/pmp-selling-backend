<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'customer_id' => 'CS0001',
                'customer_name' => 'MAJU JAYA/TEGUH',
                'address' => 'Jl.Yukum Jaya No.99 BANDAR JAYA',
                'tax_address' => null,
                'city' => 'BANDAR JAYA',
                'phone' => '(0725) 529695',
                'notes' => 'BANDAR JAYA',
            ],
            [
                'customer_id' => 'CS0002',
                'customer_name' => 'PT.EKA PRIMA JAYA',
                'address' => 'Jl.Negara Yukum Jaya Komplek',
                'tax_address' => null,
                'city' => 'BANDAR JAYA',
                'phone' => '0812-74581098',
                'notes' => 'Ruko Yola No.5 Yukum Jaya Terbanggi Besar',
            ],
            [
                'customer_id' => 'CS0003',
                'customer_name' => 'ACC, TOKO',
                'address' => 'PS.MANDALA KEC. BANDAR MATARAM',
                'tax_address' => null,
                'city' => 'BANDAR LAMPUNG',
                'phone' => '0821-79852225',
                'notes' => 'LAMPUNG TENGAH',
            ],
            [
                'customer_id' => 'CS0004',
                'customer_name' => 'AGUNG MULIA',
                'address' => 'PANJANG',
                'tax_address' => null,
                'city' => 'BANDAR LAMPUNG',
                'phone' => null,
                'notes' => null,
            ],
        ];

        foreach ($customers as $data) {
            Customer::create($data);
        }
    }
}
