<x-app-layout>
  <x-slot:pageTitle>{{ $pageTitle ?? __('My blog') }}</x-slot>

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
                    @include('components.post-form-fields')
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>