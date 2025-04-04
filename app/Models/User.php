<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fname',
        'lname',
        'roles',
        'person_id',
        'username',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Define the polymorphic relationship
    public function abouts()
    {
        return $this->morphOne(About::class, 'aboutsable');
    }
    // Define the polymorphic relationship
    public function images()
    {
        return $this->morphOne(Image::class, 'imagesable');
    }
    // Define the polymorphic relationship
    public function posts()
    {
        return $this->morphMany(Post::class,'postsable');
    }
    // Define the polymorphic relationship
    public function contacts()
    {
        return $this->morphOne(Contact::class,'contactsable');
    }
    //
    public function categories()
    {
        return $this->morphOne(Category::class,'categoriesable');
    }

}
