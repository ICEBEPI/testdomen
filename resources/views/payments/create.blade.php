@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('payments.form')
        </form>


    </div>
@endsection
