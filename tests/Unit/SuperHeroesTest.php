<?php

namespace Tests\Unit;

use App\SuperHeroesModel;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;


class SuperHeroesTest extends TestCase
{
    public $model;

    public function setUp()
    {
        parent::setUp();
        $this->model = new SuperHeroesModel;
    }


    public function testObjectType()
    {
        $this->assertInstanceOf("app\SuperHeroesModel", $this->model);
    }

    public function testCreateSuperHero()
    {
        $data = [
            'real_name' => 'Teste',
            'nickname' => 'Nickname',
            'origin_description' => 'Origin',
            'superpowers' => 'Super Powers',
            'catch_phrase' => 'Phrase'
        ];

        $this->model->create($data);
        $this->assertDatabaseHas('superheroes', [
            'nickname' => 'Nickname'
        ]);
    }

    /**
     * @depends testCreateSuperHero
     */

    public function testFindSuperHero()
    {
        $data = [
            'real_name' => 'Teste',
            'nickname' => 'Nickname',
            'origin_description' => 'Origin',
            'superpowers' => 'Super Powers',
            'catch_phrase' => 'Phrase'
        ];

        $this->model = $this->model->create($data);
        $this->model->find(1);

        $this->assertEquals(1, $this->model->id);
    }

    public function testEditSuperHero()
    {
        $data = [
            'real_name' => 'Teste',
            'nickname' => 'Nickname',
            'origin_description' => 'Origin',
            'superpowers' => 'Super Powers',
            'catch_phrase' => 'Phrase'
        ];

        $this->model->create($data);

        $hero = $this->model->find(1);

        $data = [
            'real_name' => 'Teste',
            'nickname' => 'Superman',
            'origin_description' => 'Origin',
            'superpowers' => 'Super Powers',
            'catch_phrase' => 'Phrase'
        ];

        $hero->update($data);
        
        $this->assertDatabaseHas('superheroes', [
            'nickname' => 'Superman'
        ]);
    }

    /**
     * @depends testCreateSuperHero
     */

    public function testDeleteSuperHero()
    {
        $data = [
            'real_name' => 'Teste',
            'nickname' => 'Nickname',
            'origin_description' => 'Origin',
            'superpowers' => 'Super Powers',
            'catch_phrase' => 'Phrase'
        ];
        $this->model = $this->model->create($data);
        $this->assertTrue($this->model->delete());
    }
}