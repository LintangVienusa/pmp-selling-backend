<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SalesRoute;

class SalesRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(3);

        if (!$user) {
            $this->command->error('User not found!');
            return;
        }

        $salesmanName = $user->name;

        $routes = [
            ['customer' => 'Toko Mekar Abadi', 'day' => 'Monday', 'area' => 'Jakarta Barat'],
            ['customer' => 'UD Sumber Jaya', 'day' => 'Tuesday', 'area' => 'Jakarta Utara'],
            ['customer' => 'CV Maju Terus', 'day' => 'Wednesday', 'area' => 'Tangerang'],
            ['customer' => 'PT Sinar Cahaya', 'day' => 'Thursday', 'area' => 'Jakarta Selatan'],
            ['customer' => 'Toko Amanah', 'day' => 'Friday', 'area' => 'Bekasi'],
        ];

        foreach ($routes as $route) {
            SalesRoute::create([
                'user_id' => $user->id,
                'salesman_name' => $salesmanName,
                'customer' => $route['customer'],
                'day' => $route['day'],
                'area' => $route['area'],
            ]);
        }
    }
}
