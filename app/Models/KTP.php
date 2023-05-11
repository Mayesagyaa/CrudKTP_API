<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KTP extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ktp';
    protected $fillable = ['nik','nama','ttl','jk','alamat','agama','status','pekerjaan','kewarganegaraan'];
}
