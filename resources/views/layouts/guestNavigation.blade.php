<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="sm:top-0 sm:right-0 space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
          {{ __('Main page') }}
        </x-nav-link>
      </div>
      <!--<div class="sm:fixed sm:top-0 sm:left-0 p-6 text-right z-10">
        <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Main Page</a>
      </div>-->
      <div class="sm:top-0 sm:right-0 space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
          {{ __('Log in') }}
        </x-nav-link>
        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
          {{ __('Register') }}
        </x-nav-link>
      </div>
      <!--<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
      </div>-->
  </div>
</nav>