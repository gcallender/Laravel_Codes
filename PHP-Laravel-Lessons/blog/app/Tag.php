<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = ['name'];

    public function articles() {
    	return $this->belongsToMany("App\Article")->withTimestamps();
    }

    // Incorporacion de Scope para busquedas
    public function scopeSearch($query, $nombre) {
    	return $query->where('name', 'LIKE', '%' . $nombre . '%');
    }

}
