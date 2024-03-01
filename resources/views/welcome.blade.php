<x-app-layout>
  <x-slot:pageTitle>{{$pageTitle}}</x-slot:pageTitle>

  <div class="sm:justify-center sm:items-center min-h-screen bg-darker bg-center bg-gray-100 dark:bg-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="font-semibold text-gray-600 dark:text-gray-400 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-8">
                Welcome to "My blog", feel free to register and try out the site with a new account, or try it with teszt@davidfabian.hu/Teszt1234.
            </div>

            <div class="text-gray-600 dark:text-gray-400 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-8">
                Latest 10 new blog posts:
            </div>

            @include('components.posts')
        </div>
</x-app-layout>