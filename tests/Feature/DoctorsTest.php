<?php

namespace Tests\Feature;

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
    public function a_user_can_view_all_doctors_in_single_city()
    {
        $city = create('App\City');
        $doctor =  create('App\Doctor', ['city_id' => $city->id]);
        $doctorsCity = $doctor->city()->first();
        $this->get('/' . $doctorsCity->name . '/doctors/')
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
    public function user_with_role_admin_can_see_create_doctor_page()
    {
        $user = create('App\User', ['role' => 'admin']);
        auth()->setUser($user);
        $city = create('App\City', ['name' => 'Kiev']);
        $this->get('/' . $city->name . '/doctor/create')
            ->assertStatus(200)
            ->assertSee('Добавление нового доктора');
        $doctor = create('App\Doctor');

        $this->get($doctor->path())
            ->assertSee($doctor->name);
        auth()->logout();

        $notAdmin = create('App\User', ['role' => 'user']);
        auth()->setUser($notAdmin);
        $this->get('/' . $city->name . '/doctor/create')
            ->assertStatus(403)
            ->assertSee('Добавлять доктора может только администрация сайта');
    }
}
