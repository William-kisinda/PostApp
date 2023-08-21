@extends('layouts.app')

@section('content')
    <div class=" flex justify-center">
        <div class="w-8/12 bg-white rounded-lg p-6">
            @if (session('status'))
                <div class=" bg-red-500 p-4 mb-6 rounded-lg text-white mt-2 text-sm text-center">
                    {{ session('status') }}
                </div>
            @endif
             <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class=" sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" 
                    class=" bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-500 @enderror" value="{{ old('email')}}">
                    @error('email')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class=" sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" 
                    class=" bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-500 @enderror">
                    @error('password')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4 content-center">
                    <button type="submit" class=" bg-blue-600 text-white px-4 py-3 rounded font-medium w-[14rem]">Login</button>
                </div>
             </form>
        </div> 
    </div>
   
@endsection