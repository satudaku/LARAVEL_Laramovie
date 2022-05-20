@extends('layouts.app')

@section('content')
    <div class="sm:w-4/5 lg:w-3/5 m-auto text-gray-200">
        <div class="w-full text-left">
            <div class="py-15">
                <h1 class="text-6xl">
                    Update Review Post
                </h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="w-full m-auto">
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
            <form action="/review/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="title" value="{{ $post->title }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" />

                <input type="text" name="year" value="{{ $post->year }}"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="casts[]" value="{{ $post->casts[0] }}"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="casts[]" value="{{ $post->casts[0] }}"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="casts[]" value="{{ $post->casts[0] }}"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <textarea name="description" placeholder="Review here"
                    class="py-5 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">
                    {{ $post->description }}  
                </textarea>

                <input type="float" name="rating" value="{{ $post->rating }}"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <input type="text" name="videoUrl" value="{{ $post->video_url }}"
                    class="bg-transparent block border-b-2 w-full h-15 text-xl outline-none" />

                <div class="flex justify-end mt-10">
                    <button type="submit"
                        class="uppercase font-bold text-lg px-8 py-4 bg-green-500 rounded-full hover:bg-green-800 cursor-pointer">
                        Update Review
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
