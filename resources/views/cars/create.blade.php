@extends('master')
@section('content')
    <div class="p-20">
        <form action="{{ route('cars.store') }}" method="POST">
            @include('partials.alarm')
            @csrf
            @method('POST')
            @include('cars.form')

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>


    </div>
@endsection
