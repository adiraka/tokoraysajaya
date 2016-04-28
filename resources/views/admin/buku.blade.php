@extends('layouts.app')

@section('content')
	
	<table class="display" id="tabel-buku">
		<thead>
			<tr>
				<th>ID</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Kategori</th>
				<th>Tahun</th>
				<th>ISBN</th>
				<th>Harga</th>
				<th>Stok</th>
			</tr>
		</thead>
	</table>

@endsection

@push('scripts')
	
	<script>
		$(function() {
			$('#tabel-buku').DataTable({
				processing: true,
				serverside: true,
				responsive: true,
				autoWidth: false,
				ajax: '{!! route('databuku') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'judul', name: 'judul' },
					{ data: 'pengarang', name: 'pengarang' },
					{ data: 'kategori_id', name: 'kategori_id' },
					{ data: 'tahun', name: 'tahun' },
					{ data: 'isbn', name: 'isbn' },
					{ data: 'harga', name: 'harga' },
					{ data: 'stock', name: 'stock' },
				]
			});
		});
	</script>

@endpush