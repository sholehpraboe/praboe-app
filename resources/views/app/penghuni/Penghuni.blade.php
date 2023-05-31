@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="content-body"><!-- Description -->
		<section id="configuration">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Data Penghuni</h4>
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
									<a href="{{route('create.Penghuni')}}">
									<button type="button" class="btn btn-success round">Tambah</button>
									</a>
								</p>
								<table class="table table-striped table-bordered zero-configuration">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th width="30%">Nama</th>
											<th width="10%">Kode Blok</th>
											<th width="10%">No Blok</th>
											<th width="25%">Humas</th>
											<th width="15%">Status Aktif</th>
											<th width="10%"></th>
										</tr>
									</thead>
									<tbody>
										@foreach($ref_penghuni as $key => $row)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$row->nama_lengkap}}</td>
											<td>{{$row->kd_blok}}</td>
											<td>{{$row->no_blok}}</td>
											<td>{{$row->humas->nama }}</td>
											<td>{{$row->sts_aktif}}</td>
											<td>tes</td>
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

@endsection


