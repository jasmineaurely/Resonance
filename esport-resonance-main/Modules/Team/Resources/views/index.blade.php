@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? config('app.name') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-header text-primary font-weight-bold">
            Update Team
        </div>
        <div class="card-body">
            @if(is_null($team))
            <form action="{{ route('team.simpan') }}" method="post" enctype="multipart/form-data">@csrf
            @endif
                <div class="form-group">
                    <label for="name">Nama Team</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Team" value="{{ old('name') ?? $team->name ?? "" }}" @if(is_null($team)) required @else disabled @endif>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Logo Team</label>
                    <div class="row">
                        @if(is_null($team))
                        <div class="col-md-2">
                            <input type="file" class="form-control-file" id="image" name="image" required>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        <div class="col-md-4">
                            @if(!is_null($team))
                            <img src="{{ asset('storage/'.$team->image) }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="match_group_id">Turnamen</label>
                    <select class="form-control" name="match_group_id" id="match_group_id" @if(is_null($team)) required @else disabled @endif>
                        <option value="">Pilih Turnamen yang akan diikuti</option>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}" @if(!is_null($team)) @if($group->id == $team->match_group_id) selected @endif @endif>{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('match_group_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if(is_null($team))
                <button type="submit" class="btn btn-primary">Simpan</button>
                @endif
            </form>
        </div>
        <div class="card-footer text-muted">
            Isi dengan baik. Data ini hanya bisa diisi satu kali.
        </div>
    </div>

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
