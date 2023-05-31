<?php

namespace App\Http\Controllers;

use App\Models\RefPenghuni;
use App\Models\RefHumas;
use App\Models\DatPenomoran;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index(){
		
        $ref_penghuni = RefPenghuni::where('sts_aktif', '1')->get();
		$ref_humas =  RefHumas::where('sts_aktif', '1')->pluck('nama','kd_humas');
	
        return view ('app.penghuni.Penghuni', compact('ref_humas', 'ref_penghuni'));
    }

	public function humas($kd_humas){
		
		$penghunis = \DB::table('ref_penghuni')
						->select('ref_penghuni.kd_penghuni','ref_penghuni.nama_lengkap', 'ref_penghuni.kd_blok', 'ref_penghuni.no_blok')
						->whereNotExists(function ($query) {
								$tahun_iuran = date('Y');
								$query->select(\DB::raw(1))
									->from('dat_iuran')
									->whereRaw("dat_iuran.kd_penghuni = ref_penghuni.kd_penghuni and dat_iuran.tahun_iuran  = '$tahun_iuran' ");
							})
						->where('ref_penghuni.kd_humas', '=', $kd_humas)->get();
						
	
		return response()->json($penghunis);
		
	}
	

	public function create(){
		
		$ref_humas =  RefHumas::where('sts_aktif', '1')->pluck('nama','kd_humas');
        return view('app.penghuni.CreatePenghuni', compact('ref_humas'));
		
    }
	
	public function store(Request $request){
        
		$messages = [
			'required' => ':attribute wajib diisi cuy!!!',
			'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
			'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
		];
 
		$this->validate($request,[
			'nama_lengkap' => 'required',
			'nama_panggilan' => 'required',
			'tempat_lahir' => 'required',
			'tgl_lahir' => 'required',
			'jenis_kelamin' => 'required',
			'agama' => 'required',
			'alamat_ktp' => 'required',
			'no_hp' => 'required:numeric',
			'kode_blok' => 'required',
			'no_blok' => 'required',
			'keterangan' => 'required',
			'kd_humas' => 'required'
			
		],$messages);
		
		$nama_lengkap 		= $request['nama_lengkap'];
		$nama_panggilan 	= $request['nama_panggilan'];
		$tempat_lahir 		= $request['tempat_lahir'];
		$tgl_lahir 			=  date('Y-m-d', strtotime($request['tgl_lahir']));
		$kelamin 			= $request['jenis_kelamin'];
		$agama 				= $request['agama'];
		$alamat_ktp 		= $request['alamat_ktp'];
		$no_hp 				= $request['no_hp'];
		$kd_blok 			= $request['kode_blok'];
		$no_blok 			= $request['no_blok'];
		$keterangan 		= $request['keterangan'];
		$kd_humas 			= $request['kd_humas'];
		
	
		$format = date('Ym');
        $kd_penghuni = DatPenomoran::generateNomor('penghuni', $format, 4);
		
        $penghuni = RefPenghuni::insert([
                        'kd_penghuni' => $kd_penghuni,
                        'nama_lengkap' => $nama_lengkap,
                        'nama_panggilan' => $nama_panggilan,
                        'tempat_lahir' => $tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'kelamin' => $kelamin,
                        'agama' => $agama,
                        'alamat_ktp' => $alamat_ktp,
                        'no_hp' => $no_hp,
                        'kd_blok' => $kd_blok,
                        'no_blok' => $no_blok,
                        'catatan' => $keterangan,
                        'kd_humas' => $kd_humas,
                        'sts_aktif' => '1'
                     ]);
        
        return redirect('Penghuni');

    }

    // public function detail($id){
        // $contacts = Contact::where('id', $id)->get();
        // return view('detailContact', compact('contacts'));
    // }

    // public function assign(Request $request, $id){
        // $update = Contact::where('id', $id)->update([
                            // 'status_assign' => '1'
                        // ]);
           
        // return redirect('contact');
    // }

    // public function create(){
        // return view('addContact');
    // }

    // public function store(Request $request){
        // $name = $request->input('name');
        // $phone = $request->input('phone');
        // $email = $request->input('email');
        
        // $create = Contact::insert([
                        // 'name' => $name,
                        // 'phone' => $phone,
                        // 'email' => $email,
                        // 'status_assign' => '0'
                     // ]);
        
        // return redirect('contact');

    // }
    
    // public function edit($id){
        // $contacts = Contact::where('id', $id)->get();
        // return view('editContact', compact('contacts'));
    // }

    // public function update(Request $request, $id){
        // $name = $request->input('name');
        // $phone = $request->input('phone');
        // $email = $request->input('email');
        
        // $update = Contact::where('id', $id)->update([
                            // 'name' => $name,
                            // 'phone' => $phone,
                            // 'email' => $email
                        // ]);
           
        // return redirect('contact');
    // }

    // public function destroy($id){
        // $contacts = Contact::where('id', $id)->delete();

        // return redirect('contact');
    // }

    


}
