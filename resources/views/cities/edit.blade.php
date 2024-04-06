@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('cities.update', $city) }}" method="POST">
            @csrf
            @method('PUT')
            @include('cities.form')


        </form>


    </div>
@endsection
