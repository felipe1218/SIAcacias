<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InicioSesionAdminTestCase extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function testExample()
    {
        $this->visit('/')
         ->type('admin@lasAcacias', 'email')
         ->type('lasAcacias_1234', 'password')
         ->press('Iniciar sesion')
         ->seePageIs('/inicioAdministracion');
    }
}
