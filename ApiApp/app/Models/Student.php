<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name','course','email','phone','creator_id'];

    public  function creator():BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
