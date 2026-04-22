<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

        protected $fillable = [
            'name', 'email', 'password', 'username', 'picture', 'bio', 'type', 'status'
            ];


     protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status'=> UserStatus::class,
            'type'=> UserType::class
        ];
    }

        public function getPictureAttribute($value){
        return $value ?asset('images/users/'.$value) : asset('images/users/default-avatar.jpg');
    }

    public function getTypeAttribute($value){
        return $value;
    }




    public function tours(){
        return $this->hasMany(Tour::class, 'author_id', 'id');
    }
}
