<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = "location_id";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $table = 'locations';
    protected $fillable = ['name','fromlocation','goinglocation','pricelocation'];
}
