@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('brands.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('brands.form')
        </form>


    </div>
@endsection
