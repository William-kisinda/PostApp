@extends('layouts.app')

@section('content')
    <div class=" flex justify-center">
        <div class="w-8/12 bg-white rounded-lg p-6">
            <form action="{{ route('posts')}}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class=" bg-gray-100 
                    rounded-lg border-2 w-full p-4 @error('body')
                    border-red-500 @enderror" placeholder="Post something"></textarea>
                    @error('body')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4 content-center">
                    <button type="submit" class=" bg-blue-600 text-white px-4 py-3 rounded 
                    font-medium w-[14rem]">Post</button>
                </div>
            </form>

            {{-- Lists of Posts --}}
            @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <x-post :post="$post"/>
            @endforeach

            {{ $posts->links()}}
            @else
                <div class="">there are no posts</div>
            @endif
        </div> 
    </div>
   
@endsection