<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CV extends Model
{
    use HasFactory;

    public const TABLE = 'cvs';

    public const ID = 'id';
    public const FIRST_NAME = 'first_name';
    public const FATHER_NAME = 'father_name';
    public const SURNAME = 'surname';
    public const BIRTH_DATE = 'birth_date';
    public const UNIVERSITY_ID = 'university_id';

    protected $table = self::TABLE;

    protected $guarded = [
        self::ID,
    ];

    public function techSkill(): BelongsToMany
    {
        return $this->belongsToMany(
                TechSkill::class,
                CvSkill::TABLE,
                CvSkill::CV_ID,
                CvSkill::SKILL_ID,
                self::ID,
                TechSkill::ID,
            );
    }

    public function universities(): BelongsTo
    {
        return $this->belongsTo(
                University::class,
            self::UNIVERSITY_ID,
            University::ID,
            );
    }
}
