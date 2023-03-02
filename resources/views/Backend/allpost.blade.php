
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
                    <h1>All Post Display here</h1>
                    <div>
                        <ul>
                                @foreach($posts as $post)
                                <li class="flex py-2">
                                    <div class="flex-1">{{$post->id}}</div>
                                    <div class="flex-1" style="padding: 0 5px"> <a href="#">{{$post->title}} </a> </div>
                                    <div class="flex-2" style="padding: 0 5px"> <span> <a class="rounded ml-2 py-1 bg-green-500 text-white" href="{{route('single-post', $post->id)}}"> View </a> </span> <span> <a class="rounded ml-2 py-1 bg-yellow-500 text-white" href="{{route('edit-post', $post->id)}}"> Edit </a> </span>
                                    
                                    <span> 
                                        <form method="post" action="{{route('delete-post', $post->id)}}"> @csrf                                      
                                        <button class="rounded ml-2 py-1 bg-red-500 text-white" type="submit" > Delete </button> 
                                        </form>
                                    </span> 
                                    
                                    </div>
                                    <div class="flex-1" style="padding: 0 15px"> <a href="#">{{$post->writer}} </a> </div>
                                    <div class="flex-1" style="padding: 0 15px"> <a href="#">{{$post->contentbody}} </a> </div>
                                    <div class="flex-1" style="padding: 0 15px"> <a href="#">{{$post->seodes}} </a> </div>
                                    <div class="flex-1" style="padding: 0 15px"> <a href="#">{{$post->date}} </a> </div>
                                </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>