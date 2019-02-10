<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/inicioSesion#pantallaReportes')
            ->assertStatus(500)
            ->assertSee('Reportes');

        $this->get('/inicioSesion#pantallaReportes')
            ->assertStatus(500)
            ->assertSee('Ventas Producto');

        $this->get('/inicioSesion#pantallaReportes')
            ->assertStatus(500)
            ->assertSee('Ventas Tour');
    }
}
