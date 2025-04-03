<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['addr', 'city', 'state', 'zip', 'nation', 'contactsable_id', 'contactsable_type'];

    // Define the polymorphic relationship
    public function contactsable()
    {
        return $this->morphTo();
    }

}
