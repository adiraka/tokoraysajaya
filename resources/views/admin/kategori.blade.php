@extends('layouts.app')

@section('content')

	<table class="display" id="tabel-buku">
		<thead>
			<tr>
				<th>ID</th>
				<th>Kategori</th>
			</tr>
		</thead>
	</table>

	<button data-target="modal1" class="btn modal-trigger" value="test">Modal</button>

	<div id="modal1" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Modal Header</h4>
			<p>A bunch of text</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
		</div>
	</div>


@endsection

@push('scripts')
	
	<script>
		$(document).ready(function() {
			$('#tabel-buku').DataTable({
				processing: true,
				serverside: true,
				responsive: true,
				autoWidth: false,
				ajax: '{!! route('datakategori') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nama', name: 'nama' },
				],
			});
		});
	</script>

@endpush