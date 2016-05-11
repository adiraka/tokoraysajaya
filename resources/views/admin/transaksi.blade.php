@extends('layouts.app')

@section('content')

	<form accept-charset="utf-8">
		<strong>Data Konsumen :</strong><br><br>
		<div class="row">
			<div class="col m3">
				<label for="nama_pembeli">Nama Pembeli</label>
				<input id="nama_pembeli" type="text" class="validate">		
			</div>
			<div class="col m3 offset-m1">
				<label for="telepon">Telepon</label>
				<input id="telepon" type="text" class="validate">		
			</div>
			<div class="col m3 offset-m1">	
				<label for="tanggal">Tanggal Transaksi</label>			
  				<input type="date" class="validate" id="tanggal" value="{{ date("Y-m-d") }}" readonly> 				
			</div>			
		</div>
		<br><hr>
		<strong>Daftar Pembelian :</strong>
		<div class="row">
			<div class="input-field col m4">
				<select name="buku_id" id="buku_id" class="kategori validate"></select>
			</div>
			<div class="input-field col m3">
				<button id="tmb-buku" type="button" class="cyan btn waves-effect waves-light"><i class="mdi mdi-library-plus"></i>&nbsp;Tambah</button>
			</div>
		</div>
		<br><br><br>
		<table id="tabel-buku" class="centered bordered striped">
			<thead>
				<tr>
					<th></th>
					<th>Kode Buku</th>
					<th>Judul Buku</th>
					<th width="5%">Stock</th>
					<th width="10%">Harga</th>
					<th width="10%">Qty</th>
					<th width="15%">Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
		<br><br><br><hr>
		<strong>Nominal Transaksi :</strong><br><br>
		<div class="row">
			<div class="col m3">
				<label for="totbay">Total Bayar</label>
				<input id="totbay" type="text" class="totalbay" readonly="">		
			</div>
			<div class="col m3">
				<label for="dibayar">Dibayar</label>
				<input id="dibayar" onchange="kembali_uang()" type="text" class="validate dibayar">		
			</div>
			<div class="col m3">
				<label for="kembalian">Kembalian</label>
				<input id="kembalian" type="text" class="kembalian" readonly="">		
			</div>
			<div class="col m3">
				<button type="button" id="smpn-trans" class="cyan btn waves-effect waves-light btn-large col s12">SIMPAN TRANSAKSI</button>
			</div>
		</div>
	</form>

	<meta name="_token" content="{!! csrf_token() !!}" />

@endsection

@push('scripts')
	
	<script src="{{ URL::asset('js/select2.min.js') }}"></script>
	<script>

		function hapus_row() {
			var par = $(this).parent().parent();
			par.remove();
			var total = 0;
			$('.subtot').each(function(){
				total += 1*($(this).val());
			});
			$('.totalbay').val(total);
		};

		function kali_qty() {
			$('totalbay').val(0);
			var qty = Number($(this).val());
			var harga = $(this).parent().prev().children().val();
			var subtotal = qty * harga;
			$(this).parent().next().children().val(subtotal);
			var total = 0;
			$('.subtot').each(function(){
				total += 1*($(this).val());
			});
			$('.totalbay').val(total);
			var sth = Number($(this).parent().prev().prev().children('.stokh').val());
			if(sth >= qty) {
				var nst = sth - qty;
				$(this).parent().prev().prev().children('.stokbar').val(nst);
			}
			else {
				$(this).parent().prev().prev().children('.stokbar').val(sth);
				$(this).val(0);
				alert("Maaf Stok Buku Tidak Mencukupi");
			}
		};

		function kembali_uang() {
			var tot = $('.totalbay').val();
			var dib = $('.dibayar').val();
			var kem = dib - tot;
			$('.kembalian').val(kem);
		};
		
		$(function() {
			$('#nama_pembeli').val("");
			$('#telepon').val("");
			$('.totalbay').val(0);
			$('.dibayar').val("");
			$('.kembalian').val(0);

			$('.datepicker').pickadate({
				selectMonths: true,
    			selectYears: 15
			});

			$('.kategori').select2({
				placeholder: 'Pilih Buku',
				allowClear: true,
				width: "100%",
				ajax: {
					url: '{!! route('caribuku') !!}',
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
				minimumInputLength: 1,
			});

			$('#tmb-buku').click(function(){
				var id = $('#buku_id').val();
				$.get('bukus/' + id, function(data){
					$('#tabel-buku tbody').append(
						'<tr class="subdata">'+
						'<td><input type="hidden" id="id" class="center-align" value="'+ data.id +'"></td>'+
						'<td>'+ data.kode_buku +'</td>'+
						'<td>'+ data.judul +'</td>'+
						'<td><input type="text" id="stock" class="center-align stokbar" value="'+ data.stock +'" readonly><input type="hidden" class="center-align stokh" value="'+ data.stock +'" readonly disabled></td>'+
						'<td><input type="text" id="harga" class="center-align" value="'+ data.harga +'" readonly></td>'+
						'<td><input type="text" id="jumlah" class="center-align qty"></td>'+
						'<td><input type="text" id="subtotal" class="center-align subtot"></td>'+
						'<td><button type="button" class="red btn btn-delete"><i class="mdi mdi-delete"></i></button></td>'+
						'</tr>'
					);
					$('.btn-delete').bind("click", hapus_row);
					$('.qty').bind("change", kali_qty);
				});
			});

			$('#smpn-trans').click(function(e){

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});

				e.preventDefault();

				var data1 = [];
				var transData = {
					"nama" : $('#nama_pembeli').val(), 
					"telepon" : $('#telepon').val(), 
					"tanggal" : $('#tanggal').val(),
					"total" : $('#totbay').val()
				};
				data1.push(transData);
				var dataOK1 = JSON.stringify(data1);

				var data2 = [];
				$('#tabel-buku tbody .subdata').each(function(){
					var detailData = {};
					detailData["buku_id"] = $(this).find('#id').val();
					detailData["jumlah"] = $(this).find('#jumlah').val();
					detailData["stock"] = $(this).find('#stock').val();
					detailData["subtotal"] = $(this).find('#subtotal').val();
					data2.push(detailData);
				});
				var dataOK2 = JSON.stringify(data2);

				$.ajax({
					type: 'POST',
					url: 'transaksi',
					data: {"dataTransaksi" : dataOK1, "detailTransaksi" : dataOK2},
					dataType: 'json',
					// processData: false,
					// contentType: false,
					success: function(data){
						Materialize.toast('Data Berhasil Di Tambahkan.', 4000);
						location.reload();
					},
					error: function (data){
						Materialize.toast('Telah Terjadi Kesalahan.', 4000);
					}
				});

			});

		});

	</script>

@endpush