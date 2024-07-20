<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvSkill extends Model
{
    use HasFactory;

    public const TABLE = 'cv_skill';

    public const CV_ID = 'cv_id';
    public const SKILL_ID = 'skill_id';
}
