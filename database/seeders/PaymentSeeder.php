<?php
use Illuminate\Database\Seeder;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        // Créons 10 paiements fictifs
        for ($i = 1; $i <= 10; $i++) {
            Payment::create([
                'order_id'      => $i, // Suppose que tu as déjà des commandes avec ces IDs
                'number'        => strtoupper(Str::random(10)),
                'amount'        => rand(1000, 100000) / 100,
                'method'        => ['credit_card', 'paypal', 'bank_transfer'][rand(0, 2)],
                'status'        => ['pending', 'paid', 'failed'][rand(0, 2)],
                'token'         => Str::random(20),
                'payloads'      => json_encode(['example' => 'data', 'id' => $i]),
                'payment_type'  => ['va', 'qris', 'echannel'][rand(0, 2)],
                'va_number'     => rand(1000000000, 9999999999),
                'vendor_name'   => ['BCA', 'Mandiri', 'BNI'][rand(0, 2)],
                'biller_code'   => 'BILL' . rand(1000, 9999),
                'bill_key'      => 'KEY' . rand(10000, 99999),
            ]);
        }
    }
}
