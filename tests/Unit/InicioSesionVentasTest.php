<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InicioSesionVentasTestCase extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/inicio')
            ->assertStatus(200)
            ->assertSee('Ingrese su nombre de usuario');
    }
}
