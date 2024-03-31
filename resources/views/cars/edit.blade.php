@extends('master')
@section('content')
    <div class="p-20">
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <form action="{{ route('cars.update', $car) }}" method="POST">
            @csrf
            @method('PUT')
            @include('cars.form')

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>


    </div>
@endsection
