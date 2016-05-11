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
  				<input type="date" class="datepicker validate" id="tanggal"> 				
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
				<button type="button" class="cyan btn waves-effect waves-light btn-large col s12">SIMPAN TRANSAKSI</button>
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
			var qty = $(this).val();
			var harga = $(this).parent().prev().children().val();
			var subtotal = qty * harga;
			$(this).parent().next().children().val(subtotal);
			var total = 0;
			$('.subtot').each(function(){
				total += 1*($(this).val());
			});
			$('.totalbay').val(total);
		};

		function kembali_uang() {
			var tot = $('.totalbay').val();
			var dib = $('.dibayar').val();
			var kem = dib - tot;
			$('.kembalian').val(kem);
		};
		
		$(function() {

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
						'<tr>'+
						'<td><input type="hidden" id="id'+ data.id +'" class="center-align" value="'+ data.id +'"></td>'+
						'<td>'+ data.kode_buku +'</td>'+
						'<td>'+ data.judul +'</td>'+
						'<td><input type="text" id="stock'+ data.id +'" class="center-align" value="'+ data.stock +'" readonly></td>'+
						'<td><input type="text" id="harga'+ data.id +'" class="center-align" value="'+ data.harga +'" readonly></td>'+
						'<td><input type="text" id="jumlah'+ data.id +'" class="center-align qty"></td>'+
						'<td><input type="text" id="subtotal'+ data.id +'" class="center-align subtot"></td>'+
						'<td><button type="button" class="red btn btn-delete"><i class="mdi mdi-delete"></i></button></td>'+
						'</tr>'
					);
					$('.btn-delete').bind("click", hapus_row);
					$('.qty').bind("change", kali_qty);
				});
			});

		});

	</script>

@endpush