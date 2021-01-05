@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <!-- Main Content goes here -->

    <form action="{{ route('mycart.konfirmasi_store', $productcheckout->kode) }}" method="post" enctype="multipart/form-data">@csrf
        <div class="form-group">
          <label>Total Amount</label>
          <input type="text" class="form-control" placeholder="Rp. {{ number_format($productcheckout->jumlah, 0, ',', '.') }}" disabled readonly>
        </div>
        <div class="form-group">
          <label for="product_pay_method_id">Payment Methods</label>
          <select class="form-control" name="product_pay_method_id" id="product_pay_method_id" required>
            <option value="">Pilih</option>
            @foreach($methods as $m)
            <option value="{{ $m->id }}">{{ $m->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="note">Note</label>
          <textarea class="form-control" name="note" id="note" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="bukti">Payment Proof</label>
          <input type="file" class="form-control-file" name="bukti" id="bukti" placeholder="Proof" aria-describedby="bukti" required>
          <small id="bukti" class="form-text text-muted">Sertakan bukti pembayaran yang sah</small>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('mycart.index') }}" class="btn btn-default">Back</a>
    </form>

    <!-- End of Main Content -->
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endpush
