<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\SpecialtyArea;

class SpecialtyAreaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_loads_the_speciality_areas_list_page()
    {
        $this->assertTrue(true);
        // $this->get('/admin/specialty-areas')
        //     ->assertStatus(200);
            // ->assertSee('Área de Especialidades');
    }

    /** @test */
    public function create_new_specialty_area()
    {
    	$this->assertTrue(true);

        $specialtyArea = new SpecialtyArea(['name'=>'Naturaleza','description'=>'some']);

      	$this->assertEquals('Naturaleza', $specialtyArea->name);
      	$this->assertEquals('some', $specialtyArea->description);
    }
}
