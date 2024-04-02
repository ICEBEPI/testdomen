@extends('master')
@section('content')
    <div class="p-20">
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            @method('POST')
            @include('clients.form')
        </form>


    </div>
@endsection
