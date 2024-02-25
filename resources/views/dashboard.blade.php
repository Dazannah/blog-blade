<x-app-layout>
    <x-slot:title>{{ $title ?? __('My blog') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My posts') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
        <a href="{{ route('new-post') }}" :active="request()->routeIs('dashboard')">
            <button class="bg-transparent border border-gray-400 hover:border-transparent hover:bg-gray-800  text-xl text-gray-800 dark:text-gray-200 font-bold py-2 px-4 rounded">
                {{ __('New post') }}
            </button>
        </a>
    </div>

    @include('layouts.posts')
</x-app-layout>
