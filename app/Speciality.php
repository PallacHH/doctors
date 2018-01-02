<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    /**
     * Получить докторов, которые ассоциируются с переданной специальностью
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_speciality');
    }
}
