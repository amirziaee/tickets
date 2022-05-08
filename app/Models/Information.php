<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = ['age','phone','country','city','image_name','image_size','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
