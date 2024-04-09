@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('orders.update', $order) }}" method="POST">
            @csrf
            @method('PUT')
            @include('orders.form')


        </form>


    </div>
@endsection
