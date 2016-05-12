@extends('layouts.app')

@section('content')

	<table class="display" cellspacing="0" width="100%" id="tabel-laporan">
		<thead>
			<tr>
				<th>ID Transaksi</th>
				<th>Tanggal</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Total</th>
				<th>Detail</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<div id="modalDetail" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h5>Detail Transaksi</h5><br><br>
			<table id="tabel-detail" class="centered bordered striped">
				<thead>
					<tr>
						<th>Kode Buku</th>
						<th>Judul Buku</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody class="subdetail"></tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="red modal-close modal-action btn waves-effect waves-light "><i class="mdi mdi-close-box"></i>&nbsp;TUTUP</button>&nbsp;
		</div>
	</div>

	<meta name="_token" content="{!! csrf_token() !!}" />
	
@endsection

@push('scripts')

	<script src="{{ URL::asset('js/datatables.js') }}"></script>
	<script>

		function go_modal(id) {
			$('.xxx').each(function(){
				$(this).remove();
			});
			$.get('detailtransaksi/' + id, function(data){
				$.each(data, function(i, e){
					$('#tabel-detail .subdetail').append(
						'<tr class="xxx">'+
						'<td>'+e.kode_buku+'</td>'+
						'<td>'+e.judul+'</td>'+
						'<td>'+e.harga+'</td>'+
						'<td>'+e.jumlah+'</td>'+
						'<td>'+e.subtotal+'</td>'+
						'</tr>'
					);
				});
				$('#modalDetail').openModal();
			});	
		}

		function go_hapus(id) {
			var tabel = $('#tabel-laporan').DataTable();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			})
			$.ajax({
				type: "DELETE",
				url: 'transaksi/' + id,
				success: function() {
					tabel.ajax.reload();
					Materialize.toast('Transaksi Berhasil Di Hapus.', 4000);
				},
				error: function() {
					Materialize.toast('Telah Terjadi Kesalahan.', 4000);
				}
			});
		}
		
		$(function() {

			$('#tabel-laporan').DataTable({
				processing: true,
				serverside: true,
				responsive: true,
				autoWidth: false,
				lengthChange: false,
				ajax: '{!! route('datatransaksi') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'tanggal', name: 'tanggal' },
					{ data: 'nama_pelanggan', name: 'nama_pelanggan' },
					{ data: 'telepon', name: 'telepon' },
					{ data: 'total', name: 'total' },
					{
						data: null,
						sortable: false,
						searchable: false,
						render: function (o) { return '<button type="button" onclick="go_modal('+ o.id +')" class="green btn btn-detail go-modal"><i class="mdi mdi-pencil-box"></i></button>&nbsp;<button type="button" onclick="go_hapus('+ o.id +')" class="red btn btn-delete"><i class="mdi mdi-delete"></i></button>'; }
					}
				]
			});

		});

	</script>

@endpush