@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="content-body"><!-- Description -->
		<section id="configuration">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title text-success">Tambah Data Iuran IPL</h4>
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
								
								<form action="{{route('store.Iuran')}}" method="post">
								
								 {{ csrf_field() }}

							
								 <div class="form-group row">
									<label class="col-sm-3 col-form-label" required>Nama Humas</label>
									<div class="col-sm-7">
										<select id="kd_humas" name="kd_humas" class="custom-select border-success round">
											<option value="">Silahkan Pilih Humas</option>
											@foreach ($ref_humas as $kd_humas => $nama)
												<option value="{{$kd_humas}}">{{ $nama }}</option>
											@endforeach
											
										</select>
									</div>
								  </div>

								  <div class="form-group row">
									<label class="col-sm-3 col-form-label" required>Nama penghuni</label>
									<div class="col-sm-7">
										<select id="kd_humas" name="kd_humas" class="custom-select border-success round">
											<option value="">Silahkan Pilih Warga</option>
											@foreach ($ref_penghuni as $row)
												<option value="{{$row->kd_penghuni}}">[{{ $row->kd_blok }}/{{$row->no_blok}}] {{ $row->nama_lengkap }}</option>
											@endforeach
											
										</select>
									</div>
								  </div>

								  <div class="form-group row">
									<label for="no_hp" class="col-sm-3 col-form-label" required>Kewajiban bayar</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="datIuran.kewajiban_bayar" id="datIuran.kewajiban_bayar" value={{old('datIuran.kewajiban_bayar')}} >
									</div>
								  </div>

								  <div class="form-group row">
									<label for="no_hp" class="col-sm-3 col-form-label" required>Sudah bayar</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="datIuran.sudah_bayar" id="datIuran.sudah_bayar" readonly="readonly"  value={{old('datIuran.sudah_bayar')}} >
									</div>
								  </div>

								  <div class="form-group row">
									<label for="no_hp" class="col-sm-3 col-form-label" required>Selisih bayar</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control border-success round" name="datIuran.selisih_bayar" id="datIuran.selisih_bayar" readonly="readonly"  value={{old('datIuran.selisih_bayar')}}>
									</div>
								  </div>

								  <div class="form-group row">
									<label for="no_hp" class="col-sm-3 col-form-label" required>Bayar</label>
									<div class="col-sm-7">
										<table class="table table-striped table-bordered table-sm">
											<thead class="text-center">
												<tr>
													<th width="40%">Bulan</th>
													<th width="40%">Jumlah Bayar</th>
													<th width="20%">Aksi</th>
												</tr>
											</thead>
											<tbody>
											@for ($i = 1; $i < 13; $i++)
											@php
												$kode_bulan = $i;
												if(strlen($i) == 1){
													$kode_bulan = '0'.$i;
												}
											@endphp
												<tr>
													<td>{{$ref_bulan[$kode_bulan]}}</td>
													<td>100.000</td>
													<td style="text-align:center"> 
														<a href="" ><i class="ft-edit"  title="Update Data Iuran"></i></a>
													</td>
												</tr>
											@endfor
											</tbody>
										</table>
									</div>
								
								  </div>
								  
								  <!--
								  <input type="hidden" name="kd_penghuni[]" id="kd_penghuni">
								  <div class="form-group row">
									<label for="nama_lengkap" class="col-sm-3 col-form-label" required>Nama Penghuni</label>
									<div class="col-sm-7">
										<ol id="data_penghuni">
									  
										</ol>
										<div class="alert alert-danger round" role="alert" id="alert">
										  Tidak Ada Data Penghuni !!!
										</div>
									</div>
								  </div>
									-->
					
								  <div class="form-group row">
									<div class="col-sm-10" id="simpan">
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

	$(document).ready(function() {
		$("#alert").show();
		$("#simpan").hide();
		
		$('#kd_humas').on('change', function (e) {
			
			var kd_humas = $('#kd_humas').val();
			console.log(kd_humas);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: 'GET',
				dataType: "json",
				url: '/Penghuni/Humas/'+kd_humas,
				cache: false,
				success:function(data){
					var kd_penghuni = [];
					var ref_penghuni = "";
					var data_penghuni = data;
					
					console.log(data_penghuni);
					
						
					for (var i = 0; i < data_penghuni.length; i++) {
						ref_penghuni += "<li>" + '[' + data_penghuni[i].kd_blok + '/' + data_penghuni[i].no_blok + '] '  + data_penghuni[i].nama_lengkap + "  </li>";
						kd_penghuni[i]=  data_penghuni[i].kd_penghuni ;
					}
					
					console.log(kd_penghuni);
					
					if (data_penghuni.length > 0) {
						$('#kd_penghuni').val(kd_penghuni);
						$("#data_penghuni").html("");
						$("#data_penghuni").append(ref_penghuni);
						$("#alert").hide();
						$("#simpan").show();
					}
				},
				
			});

		});
	});


</script>

@endsection


