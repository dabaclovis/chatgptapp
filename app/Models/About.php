<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'aboutsable_id', 'aboutsable_type'];

    // Define the polymorphic relationship
    public function aboutsable()
    {
        return $this->morphTo();
    }
}
