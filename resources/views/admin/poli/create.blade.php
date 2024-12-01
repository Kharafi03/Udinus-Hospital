@extends('component.layout.app')
@section('content')
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3>Tambah Poli</h3>
                            <a href="{{ route('admin.pasien.index') }}" class="btn btn-success shadow-sm float-right">
                                <i class="fa fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body pt-0">
                            @include('component.alert')
                            <form method="POST" action="{{ route('admin.poli.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row border-bottom pb-4 mx-1">
                                            <label for="nama_poli" class="col-form-label">Nama Poli</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control @error('nama_poli') is-invalid @enderror"
                                                    name="nama_poli" id="nama_poli" required>
                                                @error('nama_poli')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row border-bottom pb-4 mx-1">
                                            <label for="keterangan" class="col-form-label">Keterangan</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                                    name="keterangan" id="keterangan" required></textarea>
                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa-solid fa-download me-1"></i> Simpan
                                            </button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection