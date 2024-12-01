// Fungsi untuk menampilkan dan menyembunyikan password
function togglePassword(element) {
    const $input = $(element).closest(".input-group").find("input");
    const $icon = $(element).find("i");

    if ($input.attr("type") === "password") {
        $input.attr("type", "text");
        $icon.removeClass("fa-eye-slash").addClass("fa-eye");
    } else {
        $input.attr("type", "password");
        $icon.removeClass("fa-eye").addClass("fa-eye-slash");
    }
}

// Fungsi untuk memformat input angka
function formatInputNumber(inputElement) {
    $(inputElement).on("input", function () {
        let inputVal = $(this).val();

        // Hilangkan karakter selain angka
        inputVal = inputVal.replace(/[^\d]/g, "");

        // Format angka saja
        $(this).val(inputVal);
    });
}

// Fungsi Sweetalert
function showAlert(alertType, message) {
    let title = '';

    switch (alertType) {
        case 'success':
            title = 'Berhasil!';
            break;
        case 'danger':
            title = 'Terhapus!';
            break;
        case 'info':
            title = 'Informasi!';
            break;
        default:
            title = '';
    }

    Swal.fire({
        title: title,
        text: message,
        icon: alertType,
        confirmButtonText: 'OK',
        // timer: 1500
    });
}

// Fungsi untuk menangani submit form dengan konfirmasi
function confirmDelete(form) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}

// Fungsi untuk memformat input dengan pemisah ribuan
function formatInputRibuan(inputElement) {
    $(inputElement).on('input', function() {
        let inputVal = $(this).val();
        
        // Hilangkan karakter selain angka
        inputVal = inputVal.replace(/[^\d]/g, '');
        
        // Format dengan pemisah ribuan (setiap 3 digit)
        inputVal = inputVal.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        
        // Set kembali nilai input dengan pemisah ribuan
        $(this).val(inputVal);
    });
}