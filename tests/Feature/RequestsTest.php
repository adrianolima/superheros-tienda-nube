<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequestsTest extends TestCase
{


    public function testRequestIndexNotAllowed()
    {
        $response = $this->post('/');
        $response->assertStatus(405);
    }

    public function testRequestIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testRequestHeroesListNotAllowed()
    {
        $response = $this->post('/superheroes/list');
        $response->assertStatus(405);
    }

    public function testRequestHeroesList()
    {
        $response = $this->get('superheroes/list');
        $response->assertStatus(200);
    }

    public function testRequestHeroesCreateAllowed()
    {
        $response = $this->post('/superheroes');
        $response->assertStatus(405);
    }

    public function testRequestHeroesCreate()
    {
        $response = $this->get('/superheroes');
        $response->assertStatus(200);
    }
}
