@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="content-body"><!-- Description -->
		<section id="configuration">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title text-success">Tambah Data Penghuni</h4>
							<hr>
							<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
							<div class="heading-elements">
								<ul class="list-inline mb-0">
									<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
									<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
									<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
									<li><a data-action="close"><i class="ft-x"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body card-dashboard">
							
								{{-- menampilkan error validasi --}}
								@if (count($errors) > 0)
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
								
								<form action="{{route('store.Penghuni')}}" method="post">
								 {{ csrf_field() }}
								  <div class="form-group row">
									<label for="nama_lengkap" class="col-sm-3 col-form-label" required>Nama Lengkap</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="nama_lengkap" id="nama_lengkap" value="{{old('nama_lengkap')}}">
									</div>
								  </div>
								  <div class="form-group row">
									<label for="nama_panggilan" class="col-sm-3 col-form-label" required>Nama Panggilan</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="nama_panggilan" id="nama_panggilan" value="{{old('nama_panggilan')}}">
									</div>
								  </div>
								  <div class="form-group row">
									<label for="tempat_lahir" class="col-sm-3 col-form-label" required>Tempat Lahir</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="tempat_lahir" id="tempat_lahir" value="{{old('tempat_lahir')}}">
									</div>
								  </div>
								  <div class="form-group row">
									<label for="tanggal_lahir" class="col-sm-3 col-form-label" required>Tanggal Lahir</label>
									<div class="col-sm-7">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="tgl_lahir"><i class="icon-calendar"></i></span>
											</div>
										  <input type="text" class="form-control border-success round datepicker" name="tgl_lahir" id="tgl_lahir" aria-describedby="tgl_lahir" value="{{old('tgl_lahir')}}">
										</div>
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label class="col-sm-3 col-form-label" required>Jenis Kelamin</label>
									<div class="col-sm-7">
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" @if(old('jenis_kelamin')) checked @endif>
										  <label class="form-check-label" for="laki-laki">Laki-Laki</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"@if(old('jenis_kelamin')) checked @endif>
										  <label class="form-check-label" for="perempuan">Perempuan</label>
										</div>
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label for="agama" class="col-sm-3 col-form-label" required>Agama</label>
									<div class="col-sm-7">
										<select id="agama" name="agama" class="custom-select border-success round">
										
											<option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
											<option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }} >Protestan</option>
											<option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }} >Katholik</option>
											<option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }} >Hindu</option>
											<option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }} >Budha</option>
											<option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }} >Konghucu</option>
										</select>
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label for="alamat_ktp" class="col-sm-3 col-form-label" required>Alamat KTP</label>
									<div class="col-sm-7">
									  <textarea class="form-control border-success round" name="alamat_ktp" id="alamat_ktp" rows="3" style="height: 86px;"value="">{{old('alamat_ktp')}}</textarea>
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label for="no_hp" class="col-sm-3 col-form-label" required>No Hp</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="no_hp" id="no_hp" value={{old('no_hp')}} >
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label for="inputPassword3" class="col-sm-3 col-form-label" required>Kode Blok</label>
									<div class="col-sm-7" id="blok">
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok1" value="C1" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok1">C1</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok2" value="C2" @if(old('kode_blok')) checked @endif >
										  <label class="form-check-label" for="kodeblok2" >C2</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok3" value="C3" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok3">C3</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok4" value="C4" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok4">C4</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok5" value="C5" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok5">C5</label>
										</div>
									</div>
									
									<div class="col-sm-7 offset-sm-3"  >
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok6" value="C6" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok6">C6</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok7" value="C7" @if(old('kode_blok')) checked @endif >
										  <label class="form-check-label" for="kodeblok7" >C7</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok8" value="C8" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok8">C8</label>
										</div>
										&nbsp;&nbsp;&nbsp;
										<div class="form-check form-check-inline">
										  <input class="form-check-input radioblok" type="radio" name="kode_blok" id="kodeblok9" value="C9" @if(old('kode_blok')) checked @endif>
										  <label class="form-check-label" for="kodeblok9">C9</label>
										</div>
										
									</div>
									
								  </div>
								  
								  <div class="form-group row">
									<label class="col-sm-3 col-form-label" required>No Blok</label>
									<div class="col-sm-7">
										<select id="no_blok" name="no_blok" class="custom-select border-success round">
											
										</select>
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label class="col-sm-3 col-form-label" required>Nama Humas</label>
									<div class="col-sm-7">
										<select id="kd_humas" name="kd_humas" class="custom-select border-success round">
											<option value="">Silahkan Pilih Humas</option>
											@foreach ($ref_humas as $kd_humas => $nama)
												<option value="{{$kd_humas}}">[{{ $kd_humas }}] {{ $nama }}</option>
											@endforeach
											
										</select>
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
									<div class="col-sm-7">
									  <textarea class="form-control border-success round" name="keterangan" id="keterangan" rows="3" style="height: 150px;" value="">{{old('keterangan')}}</textarea>
									</div>
								  </div>
								  
								  
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-info round">Simpan</button>
									</div>
								  </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min')}}"></script>
<script>
$(document).ready(function(){
	
	$( ".radioblok" ).on( "click", function() {
		$( "#no_blok" ).empty();
		let kode_blok = $('input[name="kode_blok"]:checked').val();
	  
		let jml = "";
		let value = "";
		let text = "";
		
		if(kode_blok == 'C1'){
			jml = 7;
		}else{
			jml = 25;
		}
		
		for (let i = 0; i <= jml; i++) {
			if (i == 13) {
				continue; 
			}
			
			value = i;
			text = i;
			if (i == 0) {
				value = "";					
				text = "Silahkan pilih No Rumah";
			}
			
		  $("#no_blok").append(new Option(text, value));
		}
		
	});
});

</script>

@endsection


