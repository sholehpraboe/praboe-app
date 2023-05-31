@extends('layouts.admin')
@section('content')


<div> 
	<style>
	.col-form-label{
		line-height: 0 !important;
	  
	}

	.list-group-item{
		padding:0.3rem !important;
	}

	.round {
		border-radius: 0.7rem !important;
	}
	.rounded {
		border-radius: 1rem !important;
	}

	input.form-control {
		height: 35px !important;
	}

	select.form-control {
		height: 35px !important;
	}


	</style>
</div>

<div class="content-wrapper">
	<div class="content-body"><!-- Description -->
		<section id="configuration">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title text-success">Data Iuran Detail IPL</h4>
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

								<div class="container">
									<div class="row">
									
										<div class="col-4">
											<div class="card" style="width: 20rem;">
												<img class="card-img-center rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="Card image">
												<div class="card-body">
													<h5 class="card-title text-center">{{$dat_iuran->penghuni->nama_lengkap}} [ {{$dat_iuran->penghuni->kd_blok.'/'.$dat_iuran->penghuni->no_blok}} ]</h5>
												</div>
											
												<table class="table table-striped table-bordered table-sm">
												
													<tbody>
														<tr>
															<td>Tahun</td>
															<td>{{$dat_iuran->tahun_iuran}}</td>
														</tr>
														<tr>
															<td>Kewajiban Bayar</td>
															<td>{{$dat_iuran->kewajiban_iuran}}</td>
														</tr>
														<tr>
															<td>Sudah Bayar</td>
															<td>{{$dat_iuran->sudah_bayar}}</td>
														</tr>
														<tr>
															<td>Selisih Bayar</td>
															<td>{{$dat_iuran->selisih_bayar}}</td>
														</tr>
														<tr>
															<td>#</td>
															<td style="text-align:center"> 
																<a href="{{ route('edit.Iuran', $dat_iuran->kd_iuran) }}" ><i class="ft-edit"  title="Update Data Iuran"></i></a>
															</td>
														</tr>
													
													</tbody>
												</table>

											</div>
										</div>

										

										<div class="col-8">
											<table class="table table-striped table-bordered table-sm">
												<thead class="text-center">
													<tr>
														<th width="30%">Bulan</th>
														<th width="30%">Jumlah Bayar</th>
														<th width="30%">Tanggal Bayar</th>
														<th width="10%">Aksi</th>
													</tr>
												</thead>
												<tbody>
												@for ($i = 1; $i < 13; $i++)
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td style="text-align:center"> 
															<a href="{{ route('edit.Iuran', $dat_iuran->kd_iuran) }}" ><i class="ft-edit"  title="Update Data Iuran"></i></a>
														</td>
													</tr>
												@endfor
												</tbody>
											</table>


											<form action="{{route('store.Iuran')}}" method="post">
									
												{{ csrf_field() }}
												
											
												<div class="form-group row mb-2">
													<label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-7">
													<input type="email" class="form-control round" id="colFormLabel" placeholder="col-form-label">
													</div>
												</div>

												<div class="form-group row  mb-2">
													<label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-7">
													<input type="email" class="form-control round" id="colFormLabel" placeholder="col-form-label">
													</div>
												</div>
												
											
								
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
					
					// console.log(data_penghuni);
					
						
					for (var i = 0; i < data_penghuni.length; i++) {
						ref_penghuni += "<li>" + '[' + data_penghuni[i].kd_blok + '/' + data_penghuni[i].no_blok + '] '  + data_penghuni[i].nama_lengkap + "  </li>";
						kd_penghuni[i]=  data_penghuni[i].kd_penghuni ;
					}
					
					// console.log(kd_penghuni);
					
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


