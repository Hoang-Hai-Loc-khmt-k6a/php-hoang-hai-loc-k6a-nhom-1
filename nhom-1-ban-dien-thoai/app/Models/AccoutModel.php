<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccoutModel extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "tblaccount";
    protected $primarykey='id';
    public $incrementing=false;
    protected $keyType = 'string';
}
?>
