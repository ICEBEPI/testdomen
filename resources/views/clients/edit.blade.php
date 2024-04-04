@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')
            @include('clients.form')


        </form>


    </div>
@endsection
