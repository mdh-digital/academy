<?php

namespace App\Models\Master;

use App\Models\Academy\MapelUserAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Mapel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pic_id',
        'name',
        'slug',
        'image',
        'background',
        'description',
        'days_schedule',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded          = ['id'];
    protected $primaryKey       = 'id';
    protected $keyType          = 'string';
    public $incrementing        = false;

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    public function silabus()
    {
        return $this->hasMany(Silabus::class, 'mapel_id');
    }

    public function students()
    {
        return $this->hasMany(MapelUserAccess::class, 'mapel_id');
    }
}
