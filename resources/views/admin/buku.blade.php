@extends('layouts.app')

@section('content')

	<button id="btn-add" class="cyan btn waves-effect waves-light"><i class="mdi mdi-library-plus"></i>&nbsp;Tambah Buku</button>
	
	<table class="display" id="tabel-buku">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Kategori</th>
				<th>Stok</th>
				<th>Aksi</th>
			</tr>
		</thead>
	</table>

	<div id="modalBuku" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h5>Buku</h5>
			<p>Spesifikasi Data Buku</p>
			<div class="row">
				<form  enctype="multipart/form-data" class="col s12" id="formBuku" name="formBuku" novalidate="">
					<div class="row">
						<div class="input-field col m6 s12">
							<input placeholder="Kode Buku" id="kode_buku" type="text" class="validate">
							<label for="kode_buku"></label>
						</div>
						<div class="input-field col m6 s12">
							<input placeholder="Judul Buku" id="judul" type="text" class="validate">
							<label for="judul"></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<select name="kategori_id" id="kategori_id" class="kategori validate">
								<!-- <option value="" disabled selected>Pilih Kategori Buku</option> -->
							</select>
						</div>
						<div class="input-field col m6 s12">
							<input placeholder="Pengarang" id="pengarang" type="text" class="validate">
							<label for="pengarang"></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<input placeholder="Tahun Terbit" id="tahun" type="text" class="validate">
							<label for="tahun"></label>
						</div>
						<div class="input-field col m6 s12">
							<input placeholder="ISBN" id="isbn" type="text" class="validate">
							<label for="isbn"></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m6 s12">
							<input placeholder="Harga Jual" id="harga" type="text" class="validate">
							<label for="harga"></label>
						</div>
						<div class="input-field col m6 s12">
							<input placeholder="Stok" id="stock" type="number" class="validate">
							<label for="stock"></label>
						</div>
					</div>
					<div class="row">
						<div class="img-preview col m8 offset-m2 s12">
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field col m8 offset-m2 s12">
							<div class="btn cyan">
								<span>Foto</span>
								<input type="file" id="foto" class="validate">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" placeholder="Nama File" type="text" class="validate">
							</div>
						</div>
					</div><br><br><br><br>
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
		var url = "{!! url('bukus') !!}";

		function go_modal(id) {
			$.get(url + '/' + id, function(data){
				$('#frmKtgr').trigger('reset');
				$(".kategori").empty().trigger('change')
				$('#id').val(data.id);
				$('#kode_buku').val(data.kode_buku);
				$('#judul').val(data.judul);
				$('#pengarang').val(data.pengarang);
				$('#tahun').val(data.tahun);
				$('#isbn').val(data.isbn);
				$('#harga').val(data.harga);
				$('#stock').val(data.stock);
				$('.foto-preview').remove();
				$('.img-preview').append('<img class="foto-preview responsive-img" alt="No Image Preview" src="foto/'+ data.foto +'">');
				var kategori_id = 0;
				kategori_id = data.kategori_id;
				$.get("{!! url('kategoris') !!}" + '/' + kategori_id, function(data2){
					$('.kategori').append('<option value="'+  data2.id +'" selected="selected">'+ data2.nama +'</option>');
					$('.kategori').trigger('change');
				});	
				$('#btn-save').val("update");
				$('#modalBuku').openModal();
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

		$(function() {
			$('.kategori').select2({
				placeholder: 'Pilih Kategori Buku',
				allowClear: true,
				ajax: {
					url: '{!! route('carikategori') !!}',
					dataType: 'json',
					type: 'POST',
					beforeSend: function (xhr) {
						return xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="_token"]').attr('content'));
					},
					delay: 250,
					data: function(params) {
						return {
							term: params.term
						};
					},
					processResults: function (data, page) {
						return { results: data };
					},
				},
				width: "100%",
				minimumInputLength: 1,
			});
			var tabel = $('#tabel-buku').DataTable({
				processing: true,
				serverside: true,
				responsive: true,
				autoWidth: false,
				lengthChange: false,
				ajax: '{!! route('databuku') !!}',
				columns: [
					{ data: 'kode_buku', name: 'kode_buku' },
					{ data: 'judul', name: 'judul' },
					{ data: 'pengarang', name: 'pengarang' },
					{ data: 'kategori_id', name: 'kategori_id' },
					{ data: 'stock', name: 'stock' },
					{
						data: null,
						sortable: false,
						searchable: false,
						render: function (o) { return '<button type="button" onclick="go_modal('+ o.id +')" class="green btn btn-detail go-modal"><i class="mdi mdi-pencil-box"></i></button>&nbsp;<button type="button" onclick="go_hapus('+ o.id +')" class="red btn btn-delete"><i class="mdi mdi-delete"></i></button>'; }
					}
				]
			});

			var url = "{!! url('bukus') !!}";

			$('#btn-add').click( function(){
				$('#btn-save').val("add");
				$('#formBuku').trigger('reset');
				$('.foto-preview').remove();
				$(".kategori").empty().trigger('change')
				$('#modalBuku').openModal();
			});

			$('#btn-save').click(function(e){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});

				e.preventDefault();

				var formData = new FormData();
        		jQuery.each(jQuery('#foto')[0].files, function(i, file) {
					formData.append('foto', file);
				});

        		formData.append('kode_buku', $('#kode_buku').val());
        		formData.append('judul', $('#judul').val());
        		formData.append('pengarang', $('#pengarang').val());
        		formData.append('kategori_id', $('#kategori_id').val());
        		formData.append('tahun', $('#tahun').val());
        		formData.append('isbn', $('#isbn').val());
        		formData.append('harga', $('#harga').val());
        		formData.append('stock', $('#stock').val());

				var state = $('#btn-save').val();

				var type = "POST";
				var id = $('#id').val();
				var my_url = url;

				if(state == "update") {
					// type = "PUT";
					my_url += '/' + id;
				}

				$.ajax({
					type: type,
					url: my_url,
					data: formData,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function(data){

						$('#formBuku').trigger("reset");
						$('#modalBuku').closeModal();
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