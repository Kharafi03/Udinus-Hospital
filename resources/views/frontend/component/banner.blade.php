@push('styles')
    <style>
        .doctor-search-section {
            padding-top: 95px;
            position: relative;
            background: url('/img/frontend/banner/doctor-banner-01.jpg') no-repeat center top;
            background-size: cover;
            z-index: 1;
        }

        .doctor-search-section .banner-header {
            margin-bottom: 1rem;
        }

        .doctor-search-section .banner-header h2 {
            color: #002578;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .doctor-search-section .banner-header h2 span {
            display: block;
            color: #0E82FD;
        }

        .doctor-search-section .banner-header p {
            font-size: 18px;
            color: #374151;
            margin-bottom: 0;
        }

        /* Styling untuk input select */
        .search-input select {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            border: 1px solid #344767;
            background-color: #fff;
            color: #344767;
            border-radius: 8px;
            transition: border 0.3s ease, background-color 0.3s ease;
        }

        /* Hover effect untuk select */
        .search-input select:hover {
            border-color: #2d3e54;
            background-color: #f0f5f9;
        }

        /* Fokus effect untuk select */
        .search-input select:focus {
            border-color: #344767;
            background-color: #f0f5f9;
            outline: none;
        }

        /* Tambahkan padding untuk form */
        .doctor-search {
            margin: 0;
        }

        /* Styling untuk form doctor */
        .doctor-form {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 3rem;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Responsif untuk tampilan mobile */
        @media (max-width: 991.98px) {
            .doctor-search-section .dr-img {
                display: none;
            }

            .search-input select {
                font-size: 14px;
                /* Adjust font size for better readability on smaller screens */
            }
        }

        /* Additional mobile responsiveness for small devices */
        @media (max-width: 767px) {
            .search-input select {
                margin-bottom: 20px;
            }
        }
    </style>
@endpush

<!-- Home Banner -->
<section class="doctor-search-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="doctor-search">
                    <div class="banner-header">
                        <h2><span>Search Doctor,</span> Make an Appointment</h2>
                        <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery
                            facilities right here.</p>
                    </div>
                    <div class="doctor-form">
                        <form action="" class="doctor-search">
                            <div class="row align-items-center" style="height: 100%;">
                                <!-- Menambahkan style tinggi agar Flexbox bekerja lebih baik -->
                                <!-- Kolom untuk dropdown select -->
                                <div class="col-md-8">
                                    <div class="search-input input-block">
                                        <select class="form-control form-control-lg">
                                            <option>Pilih Poli</option>
                                            <option>Cardiology</option>
                                            <option>Neurology</option>
                                            <option>Urology</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Kolom untuk tombol Cari -->
                                <div class="col-md-4">
                                    <button type="submit"
                                        class="btn btn-dark btn-lg w-100 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-search me-2"></i> Cari
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-lg-0 mb-4">
                <img src="https://doccure.dreamstechnologies.com/html/template/assets/img/banner/doctor-banner.png"
                    class="img-fluid dr-img" alt="doctor-image">
            </div>
        </div>
    </div>
</section>
