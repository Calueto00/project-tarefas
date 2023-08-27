<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'is_done',
        'title',
        'description',
        'due_date',
        'user_id',
        'category_id'
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    use HasFactory;
}
