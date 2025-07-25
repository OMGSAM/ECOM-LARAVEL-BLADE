<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
         $product = Product::create([
            'name' => 'Chaussures',
            'price' => 99.99 ,
            'weight' => 200 ,
            'slug' => 900 ,
            'description' => "ok",
            'details' => "mama"  ,
            'category_id' => 1 ,
            'quantity' => 222

        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Chaussures',
        ]);


      

    }
}
