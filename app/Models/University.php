<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    public const TABLE = 'universities';

    public const ID = 'id';
    public const NAME = 'name';
    public const EVALUATION = 'evaluation';

    protected $table = self::TABLE;

    protected $guarded = [
        self::ID,
    ];

    public function cvs(): HasMany
    {
        return $this->hasMany(
            CV::class,
            CV::UNIVERSITY_ID,
            self::ID
        );
    }
}
