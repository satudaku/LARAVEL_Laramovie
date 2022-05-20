@extends('layouts.app')

@section('content')
    <div class="sm:w-4/5 lg:w-3/5 m-auto text-gray-200">
        <div class="w-full text-left">
            <div class="py-15">
                <h1 class="text-6xl">
                    Create Movie Review
                </h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="w-full">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="w-2/5 mb-4 text-xl text-gray-200 bg-red-600 rounded-xl py-4 px-8">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="w-full">
            <form action="/review" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="title" placeholder="Movie title"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" />

                <input type="text" name="year" placeholder="Released year"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="casts[]" placeholder="Cast's name"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="casts[]" placeholder="Cast's name"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="casts[]" placeholder="Cast's name"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <textarea name="description" placeholder="Review here"
                    class="py-5 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

                <input type="float" name="rating" placeholder="Your personal rating out of 100"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="videoUrl" placeholder="Trailer Youtube video URL"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <div class="flex items-center justify-between mt-10">
                    <div>
                        <label
                            class="w-44 flex flex-col items-center px-2 py-3 tracking-wide border-2 border-gray-300 cursor-pointer">
                            <span class="text-xl leading-normal text-gray-300">
                                Select a file
                            </span>
                            <input type="file" name="image" class="hidden" />
                        </label>
                    </div>

                    <button type="submit"
                        class="uppercase font-bold text-lg px-8 py-4 bg-green-500 rounded-full hover:bg-green-800 cursor-pointer">
                        Submit Review
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
