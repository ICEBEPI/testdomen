@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('typeEngines.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('typeEngines.form')
        </form>


    </div>
@endsection
