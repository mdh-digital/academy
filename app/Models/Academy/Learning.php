<?php

namespace App\Models\Academy;

use App\Models\Master\Silabus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Learning extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'silabus_id',
        'user_id',
        'name',
        'date',
        'time',
        'thumbnail',
        'youtube_link',
        'meet_link',
        'description'
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
        return $this->belongsTo(Silabus::class,'silabus_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class,'learning_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'requirement_learning_id');
    }
}
