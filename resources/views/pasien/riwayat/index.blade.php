@extends('component.layout.app')

@push('styles')
    <style>
        body {
            background: url('/img/frontend/poli/poli-background.jpg') no-repeat center center;
            background-size: cover;
            color: white;
        }

        .profil-section {
            padding-top: 95px;
            position: relative;
            z-index: 1;
        }
    </style>
@endpush

@section('content')
    <section class="profil-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Poli</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="poli" class="col-form-label">Poli <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <select class="form-select @error('poli') is-invalid @enderror" name="poli" id="poli" required>
                                            <option value="" disabled selected>Pilih Poli</option>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                            @endforeach
                                        </select>
                                        @error('poli')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="jadwal" class="col-form-label">Jadwal <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <select class="form-select @error('jadwal') is-invalid @enderror" name="jadwal" id="jadwal" required>
                                            <option value="" disabled selected>Pilih Jadwal</option>
                                        </select>
                                        @error('jadwal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush
