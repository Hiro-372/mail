<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maildata extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function category()
    {
        return $this -> belongsTo(Category::class,'categories_id');
    }
    
    public function user()
    {
        return $this -> belongsTo(User::class,'users_id');
    }
    
    public function getByMaildata(int $limit_count = 5)
    {
        return $this -> orderBy('updated_at') -> paginate($limit_count);
    }
    
    public function getSearchByMaildata($keyword, int $limit_count = 5)
    {
        return $this -> orderBy('updated_at', 'DESC') -> where('title', 'LIKE', "%{$keyword}%") -> paginate($limit_count);
    }
    
    protected $fillable = [
        'title',
        'message',
        'date',
        'deadline',
        'link',
        'categories_id',
        'users_id',
        ];
}

?>