@extends('layouts.scd.scd')

@section('title')
Success
@endsection


@section('content')
<main class="success mt-5">
    <section class="success-container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ url('frontend/assets/image/icons/ticketOke.png') }}" class="animated jackInTheBox">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="success-text animated heartBeat" style="font-size: 1.2rem;">
                    Your Order is Confirmed. Check your email for further instruction.
                    <a href="{{ route('travelPackages') }}">Back To Home</a>
                </p>
            </div>
        </div>

    </section>
</main>
@endsection

@push('append-style')
<style>
    nav .navbar-nav span {
        color: #1D1919 !important;
    }

</style>
@endpush
