<?php

namespace App\Models;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    // nama table
    protected $table = 'mahasiswa';
    // menentukan primary key
    protected $primaryKey = 'id';
    // menentukan kolom non fillable
    protected $guarded = ['id'];
    // menentukan variable relasi
    protected $with = 'matkul';
    // protected $hidden = ['password'];


    // relasi many to many Mahasiswa - Mata Kuliah
    public function matkul(){
        return $this->belongsToMany(MataKuliah::class);
    }
}
