<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RefHumas extends Model
{
    public $table = 'ref_humas';

    public $timestamps = false;

    protected $primaryKey = 'kd_humas';

    protected $guarded = [];
	

}