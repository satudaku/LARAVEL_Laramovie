@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="w-full m-auto text-xl text-center text-gray-900 bg-gray-200 py-4 px-8">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif

    <div class="w-4/5 m-auto text-gray-200 text-center py-15">
        <h1 class="mb-4 text-5xl font-bold">
            Movie Reviews
        </h1>

        @if (Auth::check())
            <div class="pt-8 w-4/5 m-auto">
                <a href="/review/create"
                    class="button uppercase font-bold text-lg px-8 py-4 bg-green-500 rounded-full hover:bg-green-800 cursor-pointer">
                    Create a review
                </a>
            </div>
        @endif
    </div>

    @foreach ($posts as $post)
        <div class="text-gray-200 md:w-4/5 lg:w-3/5 m-auto mb-4">
            <div class="flex items-center">
                <img src="{{ asset('images/' . $post->image_path) }}" width="300" height="450"
                    alt={{ $post->image_path }}>
                <div class="pl-4">
                    <div class="flex m-auto items-center mb-4">
                        <div>
                            <a href="/review/{{ $post->slug }}" class="cursor-pointer">
                                <h2 class="text-2xl font-bold mb-2 pl-1 border-l-4 border-red-600">{{ $post->title }}
                                    &#40;{{ $post->year }}&#41;</h2>
                            </a>
                            <span class="text-md text-gray-400">
                                By
                                <span class="font-bold italic text-red-500">
                                    @if (strlen($post->user->name) < 15)
                                        {{ $post->user->name }}
                                    @else
                                        {{ substr($post->user->name, 0, 12) }}..
                                    @endif
                                </span>, posted on {{ date('jS M Y', strtotime($post->updated_at)) }}
                            </span>
                        </div>
                        <div class="flex w-15 h-15 ml-4 bg-red-600 items-center">
                            <p class="text-2xl font-bold text-center m-auto">{{ $post->rating }}</p>
                        </div>
                    </div>

                    <p class="text-xl leading-relaxed">
                        {{ substr($post->description, 0, 150) }}
                        <a href="/review/{{ $post->slug }}" class="text-lg font-bold my-2 text-red-600 cursor-pointer">
                            ..Read more
                        </a>
                    </p>

                    @if (isset(Auth::user()->id) && Auth::user()->id === $post->user_id)
                        <div class="flex justify-end gap-2 my-10">
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
                </div>
            </div>
        </div>
    @endforeach
@endsection
