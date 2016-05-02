@extends('layouts.app')

@section('content')

	<button id="btn-add" data-target="" class="cyan btn waves-effect waves-light"><i class="mdi mdi-library-plus"></i>&nbsp;Tambah Kategori</button>

	<table class="display dt-responsive nowrap" cellspacing="0" width="100%" id="tabel-buku">
		<thead>
			<tr>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<div id="modalKategori" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h5>Kategori</h5>
			<div class="row">
				<form class="col s12" id="frmKtgr" name="frmKtgr" novalidate="">
					<div class="row">
						<div class="input-field col s12">
							<i class="mdi mdi-tag-multiple prefix"></i>
							<input placeholder="Nama Kategori" id="nama" type="text" class="validate">
							<label for="nama"></label>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
			<button class="cyan modal-action btn waves-effect waves-light " id="btn-save" value="add"><i class="mdi mdi-content-save-all"></i>&nbsp;SIMPAN</button>&nbsp;
			<a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Batal</a>			
			<input type="hidden" id="id" name="id" value="0">
		</div>
	</div>
	
	<meta name="_token" content="{!! csrf_token() !!}" />
	
@endsection

@push('scripts')
	
	<script>

		var url = "{!! url('kategoris') !!}";

		function go_modal(id) {
			$.get(url + '/' + id, function(data){
				$('#frmKtgr').trigger('reset');
				$('#id').val(data.id);
				$('#nama').val(data.nama);
				$('#btn-save').val("update");
				$('#modalKategori').openModal();
			});	
		}

		function go_hapus(id) {
			var tabel = $('#tabel-buku').DataTable();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			})
			$.ajax({
				type: "DELETE",
				url: url + '/' + id,
				success: function() {
					tabel.ajax.reload();
					Materialize.toast('Data Berhasil Di Hapus.', 4000);
				},
				error: function() {
					Materialize.toast('Telah Terjadi Kesalahan.', 4000);
				}
			});
		}

		$(document).ready(function() {

			var tabel = $('#tabel-buku').DataTable({
				processing: true,
				serverside: true,
				responsive: true,
				autoWidth: false,
				lengthChange: false,
				ajax: '{!! route('datakategori') !!}',
				columns: [
					{ data: 'nama', name: 'nama' },
					{
						data: null,
						sortAble: false,
						render: function (o) { return '<button type="button" onclick="go_modal('+ o.id +')" class="green btn btn-detail go-modal"><i class="mdi mdi-pencil-box"></i></button>&nbsp;<button type="button" onclick="go_hapus('+ o.id +')" class="red btn btn-delete"><i class="mdi mdi-delete"></i></button>'; }
					}
				],
			});

			var url = "{!! url('kategoris') !!}";
			
			tabel.button( 0).action('click', function( e, dt, button, config ) {
				console.log( 'Button '+this.text()+' activated' );
				this.disable();
			} );

			$('#btn-add').click(function() {
				$('#btn-save').val("add");
				$('#frmKtgr').trigger('reset');
				$('#modalKategori').openModal();
			});

			$('#btn-save').click(function(e){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				})

				e.preventDefault();

				var formData = {
					nama: $('#nama').val()
				}

				var state = $('#btn-save').val();

				var type = "POST";
				var id = $('#id').val();
				var my_url = url;

				if(state == "update") {
					type = "PUT";
					my_url += '/' + id;
				}

				$.ajax({
					type: type,
					url: my_url,
					data: formData,
					dataType: 'json',
					success: function(data){

						$('#frmKtgr').trigger("reset");
						$('#modalKategori').closeModal();
						tabel.ajax.reload();
						Materialize.toast('Data Berhasil Di Tambahkan.', 4000);

					},
					error: function (data){

						$('#frmKtgr').trigger("reset");
						Materialize.toast('Telah Terjadi Kesalahan.', 4000);

					}
				});

			});

		});
	</script>

@endpush