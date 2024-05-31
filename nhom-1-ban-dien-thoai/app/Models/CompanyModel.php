<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "company";
    protected $primarykey='id';
    public $incrementing=false;
    protected $keyType = 'string';
}
?>
