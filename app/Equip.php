<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equip extends Model
{
    protected $fillable = [
        'name', 'p1_distance', 'p2_weight', 'p3_speed', 'p4_time', 'p4_penalties'
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'equips';
}
