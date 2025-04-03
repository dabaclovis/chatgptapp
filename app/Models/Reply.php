<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'repliesable_id', 'repliesable_type'];

    // Define polymorphic relationship
    public function repliesable()
    {
        return $this->morphTo();
    }
}
