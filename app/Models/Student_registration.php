<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_registration extends Model
{
    use HasFactory;
    protected $table="student_registration";
    protected $primarykey="id";
    protected $fillable = ['application_for','form_number','date_of_birth','class_name','student_name','session_name','staff_name','json_str','phone_number','mobile_number','inq_mode','status','created_at','updated_at'];
}
