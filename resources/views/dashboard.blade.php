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
                    <div class="flex">
                        <div class="flex-1">
                            <h1>This is for New post entry</h1>
                            <form method="POST" action="{{route('new-post')}}">
                                @csrf
                                <p> <input type="text" name="title" value="{{old('title')}}" placeholder="post title"></p>
                                <p> <input type="text" name="writer" value ="{{old('writer')}}" placeholder="writer name">  </p>
                                <p> <textarea name="contentbody"  cols="30" rows="10"> {{old('contentbody')}}</textarea></p>
                                    
                                <p> <textarea name="seodes" cols="30" rows="3"> {{old('seodes')}} </textarea> </p>
                                    <button type="submit"> Add post</button>
                            </form>
                        </div>
                        <div class="flex-2">
                            <h1> All post list here </h1>
                            <ul>
                                @foreach($posts as $post)
                                <li class="flex">
                                    <div class="flex-1"> <a href="#">{{$post->title}} </a> </div>
                                    <div class="flex-2"> <a href="#">{{$post->writer}} </a> </div>
                                    <div class="flex-3"> <a href="#">{{$post->contentbody}} </a> </div>
                                    <div class="flex-4"> <a href="#">{{$post->seodes}} </a> </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
