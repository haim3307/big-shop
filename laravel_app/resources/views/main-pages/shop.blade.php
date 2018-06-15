@extends('layouts.master')
@section('title')
    {{$store_name}} | Shop
@endsection
@section('content')
    <div class="container-1112">
        <div class="shopPage" id="app">
            <h1 class="d-none">Shop</h1>
            <main>
                @include('compontents.categories-display')
            </main>
        </div>
    </div>
@endsection
@section('script')

    <style>
        .container-1112 {
            max-width: 1111px;
        }

        .shopPage {
            min-height: 100vh;
            display: grid;
        }

        @media (min-width: 910px) {
            .shopPage {
                /*
                                grid-template-columns: 250px 1fr;
                */
            }

        }

    </style>

@endsection
