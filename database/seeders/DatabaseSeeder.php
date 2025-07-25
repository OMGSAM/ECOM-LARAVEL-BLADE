<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ShipmentSeeder;
use Database\Seeders\OrderItemSeeder;
use Database\Seeders\OrderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(ShipmentSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(OrderSeeder::class);
 

    }
}
