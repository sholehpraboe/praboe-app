<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DatPenomoran extends Model
{
    public $table = 'dat_penomoran';

    public $timestamps = false;

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = array('jenis', 'format', 'nomor');

    public static function generateNomor($jenis, $format, $length)
    {
        
        $nomor = "";
        $getData = DatPenomoran::whereRaw("jenis='$jenis' AND format='$format'")->first();
        if ($getData) {
            $no = $getData->nomor + 1;
            DatPenomoran::whereRaw("jenis='$jenis' AND format='$format'")->update(['nomor' => $no]);
            $nomor = $format . str_pad($no, $length, 0, STR_PAD_LEFT);
        } else {
            $data = array(
                'jenis' => $jenis,
                'format' => $format,
                'nomor' => 1
            );
            DatPenomoran::create($data);
            $nomor = $format . str_pad(1, $length, 0, STR_PAD_LEFT);
        }

        return $nomor;
    }
}
