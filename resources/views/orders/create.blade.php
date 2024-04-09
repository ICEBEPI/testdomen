@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('orders.form')
        </form>


    </div>
@endsection
