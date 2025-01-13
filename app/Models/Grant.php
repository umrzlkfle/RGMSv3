<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = ['grantAmount', 'grantProvider', 'projectTitle', 'startDate', 'durationMonth'];

    public function milestones() {
        return $this->hasMany(Milestone::class);
    }

    public function academicians() {
        return $this->belongsToMany(Academician::class, 'academician_grant', 'academician_id', 'grant_id')
            ->using(AcademicianGrant::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}
