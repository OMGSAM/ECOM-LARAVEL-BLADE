<?php
use Illuminate\Database\Seeder;
use App\Models\Shipment;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Shipment::create([
                'user_id'      => rand(1, 5), // Assure-toi que les users existent
                'order_id'     => rand(1, 5), // Assure-toi que les orders existent
                'track_number' => 'TRK' . strtoupper(Str::random(10)),
                'status'       => ['pending', 'shipped', 'delivered'][rand(0, 2)],
                'total_qty'    => rand(1, 10),
                'total_weight' => rand(500, 5000), // en grammes par exemple
                'first_name'   => ['Ahmed', 'Sara', 'Youssef', 'Lina', 'Omar'][rand(0, 4)],
                'address1'     => '123 rue principale',
                'address2'     => 'Appartement ' . rand(1, 100),
                'phone'        => '06' . rand(10000000, 99999999),
                'email'        => 'client' . $i . '@example.com',
                'city_id'      => 'C' . rand(1, 20),
                'province_id'  => 'P' . rand(1, 10),
                'postcode'     => rand(10000, 99999),
                'shipped_at'   => rand(0, 1) ? Carbon::now()->subDays(rand(0, 10)) : null,
                'shipped_by'   => rand(1, 5), // Assure-toi que ces users existent
            ]);
        }
    }
}
