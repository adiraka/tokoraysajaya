@extends('layouts.app')

@section('content')

	<button id="btn-add" class="cyan btn waves-effect waves-light"><i class="mdi mdi-library-plus"></i>&nbsp;Tambah Pelanggan</button>
	
	<table class="display" id="tabel-pelanggan">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Aksi</th>
			</tr>
		</thead>
	</table>

	<div id="modalPelanggan" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h5>Pelanggan</h5>
			<p>Detail Data Pelanggan</p>
			<div class="row">
				<form class="col s12" id="formPelanggan" name="formPelanggan" novalidate="">
					<div class="row">
						<div class="input-field col m8">
							<input placeholder="Nama Lengkap" id="nama" type="text" class="validate">
							<label for="nama"></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m8">
							<input placeholder="Telepon/HP" id="telepon" type="text" class="validate">
							<label for="telepon"></label>
						</div>	
					</div>
					<div class="row">
						<div class="input-field col m8">
							<select class="browser-default" name="jenis_kelamin" id="jenis_kelamin">
								<option value="" disabled selected>Jenis Kelamin</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m8">
							<textarea id="alamat" class="materialize-textarea">Alamat</textarea>
          					<label for="alamat"></label>
						</div>
						<br><br><br><br><br><br><br><br><br>
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

	<script src="{{ URL::asset('js/datatables.js') }}"></script>
	<script>
		var url = "{!! url('pelanggans') !!}";

		function go_modal(id) {
			$.get(url + '/' + id, function(data){
				$('#formPelanggan').trigger('reset');
				$('#vjekel').remove();
				$('#id').val(data.id);
				$('#nama').val(data.nama);
				$('#telepon').val(data.telepon);
				$('#alamat').val(data.alamat);
				$('#jenis_kelamin').append('<option id="vjekel" value="'+  data.jenis_kelamin +'" selected="selected">'+ data.jenis_kelamin +'</option>');
				$('#btn-save').val("update");
				$('#modalPelanggan').openModal();
			});	
		}

		function go_hapus(id) {
			var tabel = $('#tabel-pelanggan').DataTable();
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

		$(function() {
			var tabel = $('#tabel-pelanggan').DataTable({
				processing: true,
				serverside: true,
				responsive: true,
				autoWidth: false,
				lengthChange: false,
				ajax: '{!! route('datapelanggan') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nama', name: 'nama' },
					{ data: 'jenis_kelamin', name: 'jenis_kelamin' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'telepon', name: 'telepon' },
					{
						data: null,
						sortable: false,
						searchable: false,
						render: function (o) { return '<button type="button" onclick="go_modal('+ o.id +')" class="green btn btn-detail go-modal"><i class="mdi mdi-pencil-box"></i></button>&nbsp;<button type="button" onclick="go_hapus('+ o.id +')" class="red btn btn-delete"><i class="mdi mdi-delete"></i></button>'; }
					}
				]
			});

			var url = "{!! url('pelanggans') !!}";

			$('#btn-add').click( function(){
				$('#btn-save').val("add");
				$('#formPelanggan').trigger('reset');
				$('#vjekel').remove();
				$('#modalPelanggan').openModal();
			});

			$('#btn-save').click(function(e){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});

				e.preventDefault();

				var formData = {
					nama: $('#nama').val(),
					jenis_kelamin: $('#jenis_kelamin').val(),
					telepon: $('#telepon').val(),
					alamat: $('#alamat').val()
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

						$('#formPelanggan').trigger("reset");
						$('#modalPelanggan').closeModal();
						tabel.ajax.reload();
						Materialize.toast('Data Berhasil Di Tambahkan.', 4000);

					},
					error: function (data){

						Materialize.toast('Telah Terjadi Kesalahan.', 4000);

					}
				});

			});
		});
	</script>
@endpush