@extends('component.layout.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/frontend/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/home-3.scss') }}">
@endpush
@section('content')
    <section class="banner">
        @include('frontend.component.banner')
    </section>
    @include('frontend.component.footer')
@endsection
@push('scripts')
    <script src="{{ asset('js/frontend/select2.min.js') }}"></script>
@endpush