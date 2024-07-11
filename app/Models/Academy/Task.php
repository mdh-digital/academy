<?php

namespace App\Models\Academy;

use App\Models\Master\Silabus; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'silabus_id',
        'name',
        'description',
        'due_date',
        'requirement_learning_id',
        'type',
        'thumbnail',
        'file'
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

    public function learning()
    {
        return $this->belongsTo(Learning::class,'requirement_learning_id');
    }

    public function user_tasks()
    {
        return $this->hasMany(UserTask::class,'task_id');
    }

   
}
