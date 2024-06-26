<x-app-layout>
  <x-slot:pageTitle>{{ $pageTitle ?? __('My blog') }}</x-slot>

  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $pageTitle ?? __('Single post') }}
        </h2>
    </x-slot>
    
  @if(session('updated'))
    <div class="py-3">
      <div class="max-w-fit mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">Post <span class="text-orange-500">edited</span> successfully.</strong>
      </div>
    </div>
  @elseif (!session('update') && session('error'))
    <div class="py-3">
      <div class="max-w-fit mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">{{session('error')}}</strong>
      </div>
    </div>
  @elseif (session('created'))
    <div class="py-3">
      <div class="max-w-fit mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">Post successfully creted.</strong>
      </div>
    </div>
  @endif

  @include('components.posts')

</x-app-layout>