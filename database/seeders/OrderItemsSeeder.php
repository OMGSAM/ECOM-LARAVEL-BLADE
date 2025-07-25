<?php

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            $qty = rand(1, 5);
            $basePrice = rand(1000, 10000) / 100; // prix unitaire
            $baseTotal = $qty * $basePrice;
            $taxPercent = 20.00;
            $taxAmount = $baseTotal * $taxPercent / 100;

            $discountPercent = rand(0, 30);
            $discountAmount = $baseTotal * $discountPercent / 100;

            $subTotal = $baseTotal + $taxAmount - $discountAmount;

            OrderItem::create([
                'qty'               => $qty,
                'base_price'        => $basePrice,
                'base_total'        => $baseTotal,
                'tax_amount'        => $taxAmount,
                'tax_percent'       => $taxPercent,
                'discount_amount'   => $discountAmount,
                'discount_percent'  => $discountPercent,
                'sub_total'         => $subTotal,
                'name'              => 'Produit ' . $i,
                'weight'            => rand(100, 2000) . 'g',
                'order_id'          => rand(1, 5),    // Assure-toi que les commandes existent
                'product_id'        => rand(1, 10),   // Assure-toi que les produits existent
            ]);
        }
    }
}
