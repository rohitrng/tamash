<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyattandence extends Model
{
    use HasFactory;
    protected $table="dailattandence";
    protected $primarykey="id";
    protected $fillable = ['Teacher_Name','json_str','period_meeting','Section','Attandence_Name','Class'];
}
