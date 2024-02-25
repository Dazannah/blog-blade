<x-app-layout>
  <x-slot name="title">{{ $title ?? __('My blog') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New post') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">                  
                  <form method="POST" action="/new-post">
                    @csrf
                    <label for="title">Title</label><br>
                    <input id="title" name="title" type="text" class="text-black sm:rounded-lg"><br>

                    <label for="post-body" class="py-2">Post body</label><br>
                    <textarea name="post-body" id="post-body" cols="30" rows="10" class="text-black resize-none rounded-md"></textarea><br>

                    <input type="submit" value="Submit">
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>