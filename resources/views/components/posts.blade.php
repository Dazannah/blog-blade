<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
    @if($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="bg-white my-3 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h1>{{$post->title}}</h1><br>
                        <span>{{$post->post_body}}</span><br><br>
                        @if(isset($post->name))
                            <span>{{$post->name ?? ""}}</span><br>
                        @endif

                        <span>{{$post->created_at}}</span>

                        @if($post->updated_at != null)
                            <br><span>Edited: {{$post->updated_at}}</span>
                        @endif
                    </div>
                    @if(isset(Auth::user()->id) && $post->user_id == Auth::user()->id)
                        <div>
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div class="ms-1">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link href="/post/{{$post->id}}/edit">
                                        <span class="text-orange-500 dark:text-orange-500">Edit</span>
                                    </x-dropdown-link>

                                    <x-dropdown-link href="/post/{{$post->id}}/delete">
                                    <span class="text-red-500 dark:text-red-500">Delete</span>
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @else
    <div class="bg-white my-3 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            You don't have any post yet.
        </div>
    </div>
    @endif
</div>