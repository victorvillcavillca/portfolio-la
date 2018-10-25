<?php

namespace Tests\Feature;

use App\Specialty;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpecialtyPageTest extends TestCase
{
    /** @test */
    function it_loads_the_specialities_list_page()
    {
        $this->get('/specialties')
            ->assertStatus(200)
            ->assertSee('Especialidades del Club Conquistadores')
            ->assertSee('Especialidades')
            ->assertSee('Especialidades por Áreas');

       $specialties = Specialty::orderBy('id','DESC')->get();

       foreach ($specialties as $specialty) {

       }
    }
}
