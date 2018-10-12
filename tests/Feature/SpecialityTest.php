<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecialityTest extends TestCase
{
	/** @test */
    function it_loads_the_specialities_list_page()
    {
        $this->get('/specialties')
            ->assertStatus(200)
            ->assertSee('Lista de Especialidades')
            ->assertSee('Consequatur aut omnis eius.');

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $response = $this->get('/specialties');

        $response->assertStatus(200);
    }
}
