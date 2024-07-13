<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Academy\Attendance;
use App\Models\Academy\Learning;
use App\Models\Academy\MapelUserAccess;
use App\Models\Academy\UserTask;
use App\Models\Master\Mapel;
use App\Models\User\UserLink;
use App\Notifications\User\EmailVerificationNotification;
use App\Notifications\User\ForgetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'background',
        'role',
        'bio',
        'description',
        'email_verified_at',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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

    /**
     * Send the email verification notification.
     *
     * @return void
     */

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ForgetPasswordNotification($token));
    }

    public function mapels()
    {
        return $this->hasMany(Mapel::class, 'pic_id');
    }

    public function open_classes()
    {
        return $this->hasMany(Learning::class, 'user_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(UserTask::class, 'user_id');
    }

    public function links()
    {
        return $this->hasMany(UserLink::class, 'user_id');
    }

    public function mapel_access()
    {
        return $this->hasMany(MapelUserAccess::class, 'user_id');
    }

    public function getImageDataAttribute()
    {

        $image = $this->avatar;

        if (file_exists($image)) {
            return $image;
        } else {
            return 'img/p-icon.png';
        }
        return $image;
    }
}
