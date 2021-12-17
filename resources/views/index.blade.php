@extends('layouts.app')
@section('title','Homepage')
@section('content')
<section class="banner_section mt-lg-150">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="sub_heading">LAUNCHING Q1 2022</h4>
                <h2 class="section_title">Buy and sell real<br>people as NFTs.</h2>
                <p class="mb-3">Yes, you read that right. The most<br>unique marketplace in the metaverse.
                </p>
                <div class="email_section">
                    <div class="row">
                        @if (session('status'))
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                        @elseif(session('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failed') }}
                        </div>
                        @endif
                        <div class="col-12">
                            <form method="POST" action="{{ route('create') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-1">Email</p>
                                    </div>
                                    <div class="col-6 pe-0">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="email@email.com" name="email">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary theme-btn">Sign up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box w-75 mx-auto">
                    <div class="box_img">
                        <img src="{{ asset('assets/img/Bitmap.png') }}">
                    </div>
                    <div class="box_overlay d-flex">
                        <div class="row align-items-center w-100">
                            <div class="col-2">
                                <img src="{{ asset('assets/img/Bitmap-1.png') }}" alt="Avatar" class="avatar ms-3">
                            </div>
                            <div class="col-6">
                                <p class="p-0"><b>Diplo</b> (Thomas Pentz)</p>
                                <p class="text-theme p-0">leesfer</p>
                            </div>
                            <div class="col-4 text-end">
                                <a href="#" class="icon_link text-secondary">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
