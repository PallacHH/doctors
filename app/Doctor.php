<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    /**
     * Получение url`а для страницы доктора
     *
     * @return string
     */
    public function path()
    {
        return '/' . $this->city->name . '/doctors/' . $this->id;
    }

    /**
     * Получить специальности, которые ассоциируются с переданным доктором
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function specialties()
    {
        return $this->belongsToMany(Speciality::class, 'doctor_speciality')->withTimestamps();
    }

    /**
     * Получить город, который ассоциируется с доктором
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Получаем всех докторов по городу
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $cityId
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeDoctorsByCity(\Illuminate\Database\Eloquent\Builder $query, $cityId)
    {
        return $query->where('city_id', $cityId)->get();
    }
}
