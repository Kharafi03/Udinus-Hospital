@extends('component.layout.app')
@push('title')
    <title>Detail Periksa - Poliklinik Udinus</title>
@endpush
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3>Detail Periksa</h3>
                            <a href="{{ route('dokter.periksa.index') }}" class="btn btn-success shadow-sm float-right">
                                <i class="fa fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body pt-0">
                            @include('component.alert')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row border-bottom pb-4 mx-1">
                                        <label for="nama" class="col-form-label">Nama Pasien</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" value="{{ old('nama', $daftarpoli->pasien->nama) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row border-bottom pb-4 mx-1">
                                        <label for="tgl_periksa" class="col-form-label">Tanggal Periksa</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control @error('tgl_periksa') is-invalid @enderror"
                                                name="tgl_periksa" id="tgl_periksa" value="{{ old('tgl_periksa', $daftarpoli->tgl_periksa) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row border-bottom pb-4 mx-1">
                                        <label for="keluhan" class="col-form-label">Keluhan</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control @error('keluhan') is-invalid @enderror"
                                                name="keluhan" id="keluhan" readonly>{{ old('keluhan', $daftarpoli->keluhan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('dokter.periksa.store', $daftarpoli->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group row border-bottom pb-4 mx-1">
                                            <label for="catatan" class="col-form-label">Catatan</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control @error('catatan') is-invalid @enderror"
                                                    name="catatan" id="catatan" required>{{ old('catatan', $periksa ? $periksa->catatan : '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row border-bottom pb-4 mx-1">
                                            <label for="obat" class="col-form-label">Obat</label>
                                            <div class="col-sm-12">
                                                <select class="form-control select2 @error('obat') is-invalid @enderror" name="obat[]" id="obat" multiple>
                                                    @foreach ($obats as $obat)
                                                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}"
                                                            {{ in_array($obat->id, $daftarObat) ? 'selected' : '' }}>
                                                            {{ $obat->nama_obat }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('obat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>                                        
                                        <div class="form-group row border-bottom pb-4 mx-1">
                                            <label for="biaya_periksa" class="col-form-label">Biaya Periksa</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control @error('biaya_periksa') is-invalid @enderror" 
                                                    name="biaya_periksa" id="biaya_periksa" readonly>
                                            </div>
                                        </div>                                        
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa-solid fa-download me-1"></i> Simpan
                                            </button>
                                        </div>
                                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // format input number
            formatInputNumber('#no_hp');

            $('#obat').select2({
                placeholder: "Pilih Obat", // Placeholder ketika tidak ada pilihan
                allowClear: true, // Menambahkan tombol untuk menghapus pilihan
                width: '100%' // Agar dropdown menggunakan lebar penuh
            });

            // Fungsi untuk menghitung total harga
        function hitungTotalHarga() {
            let totalHarga = 0;

            // Menghitung total harga berdasarkan obat yang dipilih
            $('#obat').find('option:selected').each(function () {
                let harga = $(this).data('harga');
                totalHarga += parseFloat(harga);
            });

            // Mengubah nilai input dengan total harga
            $('#biaya_periksa').val(totalHarga);
        }

        // Panggil fungsi hitungTotalHarga saat halaman dimuat
        hitungTotalHarga();

        // Event listener untuk perubahan pilihan pada select
        $('#obat').on('change', function () {
            hitungTotalHarga();
        });

        });
    </script>

    
@endpush