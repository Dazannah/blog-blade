<x-app-layout>
  <x-slot:pageTitle>{{$pageTitle}}</x-slot:pageTitle>

  <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('All posts') }}
    </h2>
  </x-slot>
  @include('components.filter-posts')
  @include('components.posts')
  @include('components.pagination')
</x-app-layout>