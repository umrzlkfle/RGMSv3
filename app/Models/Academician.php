<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    protected $fillable = ['name', 'staffNo', 'email', 'college', 'department', 'position'];

    public function grants() {
        return $this->belongsToMany(Grant::class, 'academician_grant', 'academician_id', 'grant_id')
            ->using(AcademicianGrant::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}
