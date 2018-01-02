<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctorsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->doctor = create('App\Doctor');
    }

    /** @test */
    public function a_doctor_has_specialties()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsToMany', $this->doctor->specialties());
    }
}
