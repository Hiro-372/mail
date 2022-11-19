<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Maildata;

class Category extends Model
{
    use HasFactory;
    
    public function maildatas()
    {
        return $this -> hasMany(Maildata::class,'categories_id');
    }
    
    public function user()
    {
        return $this -> belongsTo(User::class,'users_id');
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this -> maildatas() -> with('category') -> orderBy('updated_at', 'DESC') -> paginate($limit_count);
    }
    
    protected $fillable = [
        'name',
        'explanatory',
        'users_id',
    ];
}
?>