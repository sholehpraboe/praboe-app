@extends('layouts.admin')
@section('content')

<div> 
	<style>
	.dtHorizontalExampleWrapper {
	  max-width: 100px;
	  margin: 0 auto;
	}
	#dtHorizontalExample th, td {
	  white-space: nowrap;
	}

	table.dataTable thead .sorting:after,
	table.dataTable thead .sorting:before,
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_asc_disabled:after,
	table.dataTable thead .sorting_asc_disabled:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before,
	table.dataTable thead .sorting_desc_disabled:after,
	table.dataTable thead .sorting_desc_disabled:before {
	 bottom: .5em;
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
							<h4 class="card-title">Data Iuran IPL</h4>
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
								<p class="card-text"> 
									<a href="{{route('create.Iuran')}}">
									<button type="button" class="btn btn-success round">Tambah</button>
									</a>
								</p>
								<table class="table table-striped table-bordered table-sm zero-configuration">
									<thead>
										<tr>
											<th width="3%">No</th>
											<th width="28%">Nama</th>
											<th width="10%">Alamat</th>
											<th width="10%">Tahun</th>
											<th width="13%">Wajib Bayar</th>
											<th width="13%">Sudah Bayar</th>
											<th width="13%">Selisih Bayar</th>
											<th width="10%">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($dat_iuran as $key => $row)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$row->penghuni->nama_lengkap}}</td>
											<td>{{$row->penghuni->kd_blok.'/'.$row->penghuni->no_blok}}</td>
											<td>{{$row->tahun_iuran}}</td>
											<td>{{$row->kewajiban_bayar}}</td>
											<td>{{$row->sudah_bayar}}</td>
											<td>{{$row->selisih_bayar}}</td>
											
											<td style="text-align:center"> 
												<a href="javascript:void(0)" data-toggle="modal"  data-target="#target_detail" ><i class="ft-eye blue" title="Detail"></i></a>&nbsp;
												<!-- <a href="javascript:void(0)" data-toggle="modal"  data-target="#target_edit"  id="edit_data" data-id="{{$row->kd_iuran}}"><i class="ft-edit"  title="Update Data Iuran"></i></a> -->
												<a href="{{ route('edit.Iuran', $row->kd_iuran) }}" ><i class="ft-edit"  title="Update Data Iuran"></i></a>
											</td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


<!-- Modal Detail Iuran-->
<div  class="modal fade" id="target_detail" tabindex="-1" role="dialog" aria-labelledby="nomor_tahun_sk_label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="nomor_tahun_sk_label">Info Detail Iuran IPL Penghuni</h4>
			</div>
			<div class="modal-body">
				<form>
					<input type="hidden" class="form-control" name="tes_tahun_rkpt"  />
					<div class="form-group">
						<label for="exampleFormControlInput1">Nomor SK</label>
						<input type="text" class="form-control" name="nomor_sk"  />
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Tahun SK</label>
						<input type="text"  class="form-control" name="tahun_sk"  />
					</div>
				</form>
			</div>
		
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-primary close-btn" data-dismiss="modal">Tutup</button>
			</div>
			
		</div>
	</div>
</div>



<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		// $('#dtHorizontalExample').DataTable({
			// "scrollX": true
		// });
		// $('.dataTables_length').addClass('bs-select');
	
		//Edit modal window
		$('#edit_data').on('click',  function (e) {
		
			var id = $(this).data('id');
			console.log(id);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: 'GET',
				dataType: "json",
				url: '/Iuran/'+id,
				cache: false,
				success:function(data){
					console.log(data);
					
					var data_iuran = data;
					
				},
				
			});
		});
	});
	
</script>

@endsection



