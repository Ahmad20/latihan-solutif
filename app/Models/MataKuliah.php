<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    use HasFactory;
    // nama table
    protected $table = 'mata_kuliah';
    // menentukan primary key
    protected $primaryKey = 'id';
    // menentukan kolom non fillable
    protected $guarded = ['id'];

    // relasi many to many Mata Kuliah - Mahasiswa
    public function mhs(){
        return $this->belongsToMany(Mahasiswa::class);
    }
}
