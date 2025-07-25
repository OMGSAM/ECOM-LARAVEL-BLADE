<?php
use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $orderDate = Carbon::now()->subDays(rand(0, 30));
            $paymentDue = (clone $orderDate)->addDays(7);

            $baseTotalPrice = rand(10000, 50000) / 100;
            $taxPercent = 20.0;
            $taxAmount = $baseTotalPrice * $taxPercent / 100;
            $discountPercent = rand(0, 30);
            $discountAmount = $baseTotalPrice * $discountPercent / 100;
            $shippingCost = rand(500, 2000) / 100;
            $grandTotal = $baseTotalPrice + $taxAmount - $discountAmount + $shippingCost;

            $statusOptions = ['pending', 'approved', 'cancelled', 'completed'];
            $status = $statusOptions[array_rand($statusOptions)];

            $paymentStatusOptions = ['pending', 'paid', 'failed'];
            $paymentStatus = $paymentStatusOptions[array_rand($paymentStatusOptions)];

            $approvedBy = $status === 'approved' ? rand(1, 5) : null;
            $approvedAt = $approvedBy ? $orderDate->copy()->addDays(rand(1,3)) : null;

            $cancelledBy = $status === 'cancelled' ? rand(1, 5) : null;
            $cancelledAt = $cancelledBy ? $orderDate->copy()->addDays(rand(1,3)) : null;

            Order::create([
                'user_id'              => rand(1, 5), // Assure-toi que ces users existent
                'code'                 => 'ORD' . strtoupper(Str::random(8)),
                'status'               => $status,
                'order_date'           => $orderDate,
                'payment_due'          => $paymentDue,
                'payment_status'       => $paymentStatus,
                'payment_token'        => Str::random(20),
                'payment_url'          => 'https://payment.example.com/' . Str::random(10),
                'base_total_price'     => $baseTotalPrice,
                'tax_amount'           => $taxAmount,
                'tax_percent'          => $taxPercent,
                'discount_amount'      => $discountAmount,
                'discount_percent'     => $discountPercent,
                'shipping_cost'        => $shippingCost,
                'grand_total'          => $grandTotal,
                'notes'                => $i % 2 == 0 ? 'Commande urgente' : null,
                'customer_first_name'  => ['Ahmed', 'Sara', 'Youssef', 'Lina', 'Omar'][array_rand(['Ahmed', 'Sara', 'Youssef', 'Lina', 'Omar'])],
                'customer_address'     => '123 rue Exemple',
                'customer_address2'    => 'Appartement ' . rand(1, 50),
                'customer_phone'       => '06' . rand(10000000, 99999999),
                'customer_email'       => 'client' . $i . '@example.com',
                'customer_city_id'     => 'C' . rand(1, 20),
                'customer_province_id' => 'P' . rand(1, 10),
                'customer_postcode'    => rand(10000, 99999),
                'shipping_courier'     => ['DHL', 'FedEx', 'UPS'][rand(0,2)],
                'shipping_service_name'=> ['Express', 'Standard', 'Economy'][rand(0,2)],
                'approved_by'          => $approvedBy,
                'approved_at'          => $approvedAt,
                'cancelled_by'         => $cancelledBy,
                'cancelled_at'         => $cancelledAt,
                'cancellation_note'    => $status === 'cancelled' ? 'Client a annulé la commande' : null,
            ]);
        }
    }
}
