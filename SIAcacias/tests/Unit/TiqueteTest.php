<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TiqueteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/inicioSesion#pantallaTiquetes')
            ->assertStatus(500)
            ->assertSee('Registro y gestión de tiquetes');
    }
}
