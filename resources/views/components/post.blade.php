@props(['post'])

<div class=" mb-4">
    <a class=" font-bold" href="{{ route('users.posts', $post->user)}}">{{ $post->user->name }}</a><span class=" text-gray-600">
        {{ $post->created_at->diffForHumans() }}</span>
    <p>{{ $post->body }}</p>
    @can('delete', $post)
        <form action="{{route('posts.destroy', $post)}}" method="post" class="mr-2">
            @csrf
            @method('DELETE')
            <button type="submit" class=" text-blue-500">Delete</button>
        </form>     
    @endcan
    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-2">
                    @csrf
                    <button type="submit" class=" text-blue-500">Like</button>
                </form>
                @else
                <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-2">
                    @csrf
                    {{-- This is called Method Spoofing --}}
                    @method('DELETE')
                    <button type="submit" class=" text-blue-500">Unlike</button>
                </form>
            @endif 
        @endauth
        <span class="">{{ $post->likes->count()}} {{ Str::plural('like', $post->likes->count())}}</span>
    </div> 
</div>
