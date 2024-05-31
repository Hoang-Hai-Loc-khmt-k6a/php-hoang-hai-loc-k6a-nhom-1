<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandModel extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "band";
    protected $primarykey='id';
    public $incrementing=false;
    protected $keyType = 'string';
}
