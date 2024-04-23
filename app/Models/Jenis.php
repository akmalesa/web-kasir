<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    public $table = 'jenis';
    protected $guarded = ['id'];


    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function menu(){
        return $this->hasMany(Menu::class, 'jenis_id', 'id');
    }
}
