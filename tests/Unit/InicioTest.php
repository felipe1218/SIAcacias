<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InicioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Las Acacias Coffee Farm');

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Ven y conoce el maravilloso mundo del mejor café del mundo');

    }
}
