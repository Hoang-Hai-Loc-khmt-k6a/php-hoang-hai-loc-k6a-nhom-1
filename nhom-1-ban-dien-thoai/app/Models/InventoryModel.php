<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "inventory";
    protected $primarykey='id';
    public $incrementing=false;
    protected $keyType = 'string';
}
?>
