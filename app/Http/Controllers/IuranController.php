<?php

namespace App\Http\Controllers;

use App\Models\RefPenghuni;
use App\Models\RefHumas;
use App\Models\DatIuran;
use App\Models\DatPenomoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Throwable;
use Response;

class IuranController extends Controller
{

    public DatIuran $datIuran;
    public DatIuranDetail $datIuranDetail;
    

    public $rules = [
        'datIuran.kd_penghuni' => 'required',
        'datIuran.kewajiban_bayar' => 'required|integer|min:0',
		'datIuran.sudah_bayar' => 'nullable',
		'datIuran.selisih_bayar' => 'nullable',
        'datIuran.catatan' => 'nullable|string',
		'datIuranDetail.bulan' => 'required|integer|min:0',
		'datIuranDetail.jumlah' => 'required|integer|min:0',
       
    ];

    protected $validationAttributes = [
        'datIuran.kd_penghuni' => 'Nama Penghuni',
        'datIuran.kewajiban_bayar' => 'Kewajiban bayar',
		'datIuran.sudah_bayar' => 'Sudah bayar',
		'datIuran.selisih_bayar' => 'Selisih bayar',
		'datIuranDetail.bulan' => 'Bulan',
		'datIuranDetail.jumlah' => 'Jumlah bayar',
       
    ];

    protected $messages = [
        'required' => ':attribute tidak boleh kosong',
        'date' => ':attribute bukan tanggal yang valid',
        'integer' => ':attribute harus berupa angka',
    ];

	
	 /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $dat_iuran = DatIuran::get();
		$ref_humas =  RefHumas::where('sts_aktif', '1')->pluck('nama','kd_humas');
		
        return view ('app.iuran.Iuran', compact('dat_iuran', 'ref_humas'));
    }
	
	 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	public function show($id){
		
		try {
            \DB::beginTransaction();
            \DB::setDateFormat('DD-MM-YYYY HH24:MI:SS');
			
			$kd_iuran = $id;
            $iurans = DatIuran::where('kd_iuran', $kd_iuran)->first();
			
			// dd($iurans);
			
            \DB::commit();

            return response()->json($iurans);
        } catch (Throwable $e) {
            \DB::rollback();
            dd($e);
        }
		
		
	}
	
	public function create(){

		$ref_bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret', 
			'04' => 'April', 
			'05' => 'Mei', 
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus', 
			'09' => 'September', 
			'10' => 'Oktober', 
			'11' => 'November', 
			'12' => 'Desember'
		);
			


		
		$ref_humas =  RefHumas::where('sts_aktif', '1')->pluck('nama','kd_humas');
		$ref_penghuni =  RefPenghuni::where('sts_aktif', '1')->get();
        return view('app.iuran.CreateIuran', compact('ref_humas', 'ref_penghuni', 'ref_bulan'));
    }
	
	
	
	public function store(Request $request){
        
		$messages = [
			'required' => ':attribute wajib diisi cuy!!!',
			'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
			'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
		];
 
		$this->validate($request,[
			'kd_humas' => 'required',
			'kd_penghuni' => 'required'
		],$messages);
		
		$kd_penghuni 	= explode(",",$request['kd_penghuni'][0]);
		$kd_humas 		= $request['kd_humas'];
		$format 		= date('Ym');
		$tahun_iuran 	= date('Y');
		$data_penghuni = RefPenghuni::select('kd_penghuni')
									->where('kd_humas', '=', $kd_humas)
									->whereIn('kd_penghuni', $kd_penghuni)
									->get();
		
		$data = [];
		foreach($data_penghuni as $key => $val){
			
			$kd_iuran = DatPenomoran::generateNomor('iuran_ipl', $format, 4);
			$data[] = array(
					'kd_iuran' => $kd_iuran,
					'kd_penghuni' => $val['kd_penghuni'],
					'tahun_iuran' => $tahun_iuran
				);
		
		}
		
		\DB::table('dat_iuran')->insert($data);

        return redirect('Iuran');

    }
	
	public function edit($id){
		$dat_iuran = DatIuran::where('kd_iuran', $id)->with('penghuni')->first();
		//  dd($dat_iuran->penghuni);

		// $ref_humas =  RefHumas::where('sts_aktif', '1')->pluck('nama','kd_humas');
		
        return view ('app.iuran.IuranDetail', compact('dat_iuran'));
	}

    

}
