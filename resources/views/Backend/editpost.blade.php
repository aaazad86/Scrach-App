<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>This is for New post entry</h1>
						<form method="POST" action="{{route('update-post', $post->id)}}">
                                @csrf
                                <p class="mb-4"> <input class="w-full px-4 py-2 border border-gray-200" type="text" name="title" value="{{$post->title}}" placeholder="post title">
                                	@error('title') <span class="text-red-500 text-sm"> {{$message}}</span>@enderror

                                </p>
                                <p class="mb-4"> <input class="w-full px-4 py-2 border border-gray-200" type="text" name="writer" value ="{{$post->writer}}" placeholder="writer name"> 
                                @error('writer')<span class="text-red-500 text-sm">{{$message}}</span>@enderror
                                </p>
                                <p class="mb-4"> <textarea name="contentbody" class="w-full px-4 py-2 border border-gray-200" cols="30" rows="7"> {{$post->contentbody}}</textarea>
                                @error('contentbody')<span class="text-red-500 text-sm">{{$message}}</span>@enderror
                            	</p>
                                    
                                <p class="mb-4"> <textarea name="seodes" class="w-full px-4 py-2 border border-gray-200" cols="30" rows="3"> {{$post->seodes}} </textarea> </p>
                                    <button class="rounded px-4 py-2 bg-black text-white " type="submit"> Update</button>
                            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
