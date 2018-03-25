<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\City;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityName)
    {
        $doctors = [];
        $doctor = new Doctor();
        $city = new City();
        $city = $city->findByName($cityName);
        if (!empty($city)) {
            $doctors = $doctor->DoctorsByCity($city->id);
        }

        return view('doctors.index', compact('doctors', 'cityName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cityName)
    {
        if (auth()->user()->can('create', Doctor::class)) {
            return view('doctors.create', compact('cityName'));
        } else {
            abort('403', 'Добавлять доктора может только администрация сайта');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $cityName
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($cityName)
    {
        $city = new City();
        $data = request()->toArray();
        $city = $city->findByName($cityName);
        $data['city_id'] = $city->id;

        $doctor = Doctor::create($data);

        return redirect($doctor->path());
    }

    /**
     * Display the specified resource
     *
     * @param $cityName
     * @param Doctor $doctor
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($cityName, Doctor $doctor)
    {
        $specialties = $doctor->specialties()->get();

        return view('doctors.show', compact('doctor', 'specialties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
