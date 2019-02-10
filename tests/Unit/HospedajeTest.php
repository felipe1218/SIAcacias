<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospedajeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/inicioSesion#pantallaHospedajes')
            ->assertStatus(500)
            ->assertSee('Registro y gestión de hospedajes');
    }
}
