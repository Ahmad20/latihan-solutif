<?php

namespace App\Models;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $guarded = 'id';
    protected $with = 'matkul';
    // protected $withCount = 'matkul';

    public function matkul(){
        return $this->belongsToMany(MataKuliah::class);
    }
}
