<?php

namespace App\Models\Academy;

use App\Models\User;
use App\Models\User\Portfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UserTask extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'task_id',
        'user_id',
        'answer_type',
        'answer',
        'pic_check_id',
        'grade'
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

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function pic()
    {
        return $this->belongsTo(User::class,'pic_check_id');
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class,'task_id');
    }
}
