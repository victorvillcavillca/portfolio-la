<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

        $product = new Product(['name'=>'Tesla','description'=>'some']);
        // $product->save();
      	$this->assertEquals('Tesla', $product->name);
      	$this->assertEquals('some', $product->description);
    }
}
