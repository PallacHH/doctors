<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DoctorsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->doctor = create('App\Doctor');
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
