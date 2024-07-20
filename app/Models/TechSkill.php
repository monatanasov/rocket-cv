<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TechSkill extends Model
{
    use HasFactory;

    public const TABLE = 'tech_skills';

    public const ID = 'id';
    public const NAME = 'name';

    protected $table = self::TABLE;

    protected $guarded = [
        self::ID,
    ];

    public function cvs(): BelongsToMany
    {
        return $this->belongsToMany(
                CV::class,
                CvSkill::TABLE,
                CvSkill::SKILL_ID,
                CvSkill::CV_ID,
                self::ID,
                CV::ID,
            );
    }
}
