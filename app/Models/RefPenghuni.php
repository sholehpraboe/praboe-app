<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RefPenghuni extends Model
{
    public $table = 'ref_penghuni';

    public $timestamps = false;

    protected $primaryKey = 'kd_penghuni';

    protected $guarded = [];
	
	public function humas()
    {
        return $this->hasOne(\App\Models\RefHumas::class, 'kd_humas', 'kd_humas');
    }

}