@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('clients.form')
        </form>


    </div>
@endsection
