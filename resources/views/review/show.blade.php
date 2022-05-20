@extends('layouts.app')

@section('content')
    <div class="flex mt-15 sm:w-full lg:w-3/5 m-auto bg-black">
        <div class="w-1/3">
            <img src="{{ asset('images/' . $post->image_path) }}" width="100%" height="auto"
                alt={{ $post->image_path }}>
        </div>
        <div class="w-2/3">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ substr($post->video_url, -11) }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>

    <div class="text-gray-200 sm:w-full lg:w-3/5 m-auto mb-4">
        <div class="flex w-full items-center mb-4 bg-black">
            <div class="flex w-32 h-32 bg-red-600 items-center">
                <p class="text-6xl font-bold text-center m-auto">{{ $post->rating }}</p>
            </div>
            <div class="m-auto text-gray-200 text-center">
                <h1 class="mb-4 sm:text-2xl lg:text-4xl font-bold pb-4 border-b-4 border-red-600">
                    {{ $post->title }} &#40;{{ $post->year }}&#41;
                </h1>
                <div class="grid grid-cols-3 gap-4 w-full m-auto items-center">
                    @foreach ($post->casts as $cast)
                        <p class="font-bold text-center">{{ $cast }}</p>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="text-gray-200 sm:w-4/5 lg:w-3/5 m-auto mb-4">
        <div class="flex gap-4 justify-end items-center my-8">
            @if (isset(Auth::user()->id) && Auth::user()->id === $post->user_id)
                <div class="flex justify-end gap-2">
                    <a href="/review/{{ $post->slug }}/edit"
                        class="uppercase button text-lg px-4 py-2 bg-green-500 rounded-full hover:bg-green-800 cursor-pointer">
                        Edit
                    </a>
                    <form action="/review/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="uppercase button text-lg px-4 py-2 bg-red-500 rounded-full hover:bg-red-800 cursor-pointer"
                            type="submit">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
            <span class="flex text-xl text-gray-400 text-right">
                By&nbsp;
                <span class="font-bold italic text-red-500">
                    @if (strlen($post->user->name) < 27)
                        {{ $post->user->name }}
                    @else
                        {{ substr($post->user->name, 0, 25) }}..
                    @endif
                </span>
                , posted on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
        </div>
        <p class="text-xl leading-relaxed mb-4">{{ $post->description }}</p>
    </div>
@endsection
