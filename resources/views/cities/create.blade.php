@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('cities.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('cities.form')
        </form>


    </div>
@endsection
