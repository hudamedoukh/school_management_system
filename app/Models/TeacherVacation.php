<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherVacation extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id','vacation_purpose_id','start_date','end_date'];

    public function teachers(){

        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function purposes(){

        return $this->belongsTo(VacationPurpose::class,'vacation_purpose_id');
    }
}
