@extends('master')
@section('content')
    <div class="p-20">
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')
            @include('clients.form')

            
        </form>


    </div>
@endsection
