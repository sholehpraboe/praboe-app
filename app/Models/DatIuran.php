<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DatIuran extends Model
{
    public $table = 'dat_iuran';

    public $timestamps = false;

    protected $primaryKey = 'kd_iuran';

    protected $guarded = [];
	
	public function penghuni()
    {
        return $this->hasOne(\App\Models\RefPenghuni::class, 'kd_penghuni', 'kd_penghuni');
    }

}