<x-app-layout>
  <x-slot:title>{{ $pageTitle ?? __('My blog') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New post') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div class="py-3">
      <div class="max-w-fit mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">Post created successfully.</strong>
      </div>
    </div>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">                  
                  <form method="POST" action="/new-post">
                    @csrf

                    <label for="title">Title</label><br>
                    <input id="title" name="title" type="text" class="text-black sm:rounded-lg" value="{{ old('title') }}"><br>
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="post-body">Post body</label><br>
                    <textarea name="post-body" id="post-body" cols="30" rows="10" class="text-black resize-none rounded-md">{{ old('post-body') }}</textarea><br>           
                    @error('post-body')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="py-2 bg-transparent border border-gray-400 hover:border-transparent hover:bg-gray-900  text-xl text-gray-800 dark:text-gray-200 font-bold py-2 px-4 rounded">
                      Submit
                    </button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>