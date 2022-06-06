<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
protected $fillable=['section_id','mark','teacher_id','quiz_id','classroom_id','subject_id','grade_id','student_id'];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
