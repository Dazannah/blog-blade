<x-app-layout>
  <x-slot:pageTitle>{{$pageTitle ?? __('My blog') }}</x-slot:pageTitle>

  <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{$pageTitle}}
    </h2>
  </x-slot>
  @include('components.posts')
  @include('components.pagination')
</x-app-layout>