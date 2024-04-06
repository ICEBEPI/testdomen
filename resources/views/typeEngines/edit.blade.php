@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <form action="{{ route('typeEngines.update', $typeEngine) }}" method="POST">
            @csrf
            @method('PUT')
            @include('typeEngines.form')


        </form>


    </div>
@endsection
