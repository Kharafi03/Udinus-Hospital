@extends('component.layout.app')
@push('title')
    <title>Riwayat Pasien - Poliklinik Udinus</title>
@endpush
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
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Poli</h3>
                        </div>
                        <form action="{{ route('pasien.daftar_poli') }}" method="POST">
                            @csrf
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
                                <label for="tgl_periksa" class="col-form-label">Tanggal Periksa <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="date" 
                                        class="form-control @error('tgl_periksa') is-invalid @enderror" 
                                        name="tgl_periksa" 
                                        id="tgl_periksa" 
                                        min="{{ now()->addDays(1)->format('Y-m-d') }}" 
                                        max="{{ now()->addDays(30)->format('Y-m-d') }}" 
                                        required>
                                    @error('tgl_periksa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="keluhan" class="col-form-label">Keluhan <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <textarea class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" id="keluhan" rows="3" required></textarea>
                                    @error('keluhan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mx-1">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary w-100">Daftar Poli</button>
                                </div>
                            </div>                            
                        </form>                        
                    </div>
                </div>
                <div class="col-md-9 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-hover table-responsive align-items-center align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Poli</th>
                                            <th scope="col">Antrian</th>
                                            <th scope="col">Tanggal Periksa</th>
                                            <th scope="col">Jadwal</th>
                                            <th scope="col">Keluhan</th>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayats as $riwayat)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->jadwalPraktik->dokter->poli->nama_poli }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->no_antrian }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->jadwalPraktik->hari }} 
                                                    ({{ \Carbon\Carbon::parse($riwayat->jadwalPraktik->jam_mulai)->format('H:i') }} - 
                                                    {{ \Carbon\Carbon::parse($riwayat->jadwalPraktik->jam_selesai)->format('H:i') }})
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->keluhan }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->jadwalPraktik->dokter->nama }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->status }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('component.datatable')
@push('scripts')
<script>
    $('#poli').on('change', function () {
        const poliId = $(this).val();
        const jadwalSelect = $('#jadwal');
        jadwalSelect.html('<option value="" disabled selected>Loading...</option>');

        $.get(`/pasien/get-jadwal/${poliId}`)
            .done(function (data) {
                jadwalSelect.html('<option value="" disabled selected>Pilih Jadwal</option>');
                data.forEach(function (jadwal) {
                    const option = $('<option></option>')
                        .val(jadwal.id)
                        .text(`${jadwal.hari} (${jadwal.jam_mulai} - ${jadwal.jam_selesai}) - ${jadwal.dokter.nama}`);
                    jadwalSelect.append(option);
                });
            })
            .fail(function (error) {
                console.error('Error fetching jadwal:', error);
                jadwalSelect.html('<option value="" disabled selected>Error loading data</option>');
            });
    });
</script>

@endpush
