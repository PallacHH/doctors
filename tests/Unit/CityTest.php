<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function search_city_id_by_city_name()
    {
        $city = create('App\City');
        $findCity = $city->findByName($city->name);

        $this->assertEquals($city->id, $findCity->id);
    }
}
