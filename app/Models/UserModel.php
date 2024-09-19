<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'm_user'; 
    
    // Kolom primary key
    protected $primaryKey = 'user_id'; 
    
    // Jika kunci utama tidak auto-incrementing, tambahkan:
    public $incrementing = false;
    
    // Format primary key (jika bukan integer, misalnya string)
    protected $keyType = 'string'; // Ganti sesuai tipe data user_id (misalnya integer)
    
    // Aktifkan timestamps jika menggunakan created_at dan updated_at
    public $timestamps = true;

    //Jobsheet 4-Prartikum 1
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

        public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

}