<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'body',
    ];

    public function substrTitle()
    {
        return substr($this->title, 0, 30);
    }

    public function substrBody()
    {
        return substr($this->body, 0, 30);
    }
    
    public function created_at()
    {
        return $this->created_at->format('Y-m-d');
    }
}
