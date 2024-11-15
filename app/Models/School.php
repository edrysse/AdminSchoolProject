<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'logo',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
