<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DoctorsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->doctor = create('App\Doctor');
    }

    /** @test */
    public function a_user_can_view_all_doctors_in_single_city()
    {
        $city = create('App\City');
        $doctor =  create('App\Doctor', ['city_id' => $city->id]);
        $doctorsCity = $doctor->city()->first();

        $this->get('/doctors/' . $doctorsCity->name)
            ->assertSee($doctor->name)
            ->assertDontSee($this->doctor->name);

    }

    /** @test */
    public function a_user_can_view_single_doctor()
    {
        $city = create('App\City');
        $doctor =  create('App\Doctor', ['city_id' => $city->id]);
        $this->get($doctor->path())
            ->assertSee($doctor->name);
    }

    /** @test */
    public function doctor_can_have_speciality()
    {
        $speciality = create('App\Speciality');
        $this->doctor->specialties()->attach($speciality->id);
        $this->get($this->doctor->path())
            ->assertSee($speciality->name);

    }
}
