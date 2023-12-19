<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    // Relasi Many-to-Many dengan model Buku
    public function bukukategori()
    {
        return $this->belongsToMany(Buku::class);
    }
}
