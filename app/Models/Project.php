<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    // one project belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
