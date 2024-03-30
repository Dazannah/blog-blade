<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
  <div class="font-semibold text-xl leading-tight">
    <form id="filterPostForm" onsubmit="return submitFilter();">
      <input class="rounded" type="text" name="author" id="author" placeholder="Author" value="{{ Request::get('author') ?? '' }}">
      <input class="rounded" type="text" name="post-title" id="post-title-search" placeholder="Post title" value="{{ Request::get('post-title') ?? '' }}">
      <input class="rounded" type="text" name="post-body" id="post-body-search" placeholder="Post body" value="{{ Request::get('post-body') ?? '' }}">
      <input class="rounded cursor-pointer" type="date" name="date" id="date" value="{{ Request::get('date') ?? '' }}">
      <button id="filterPostFormSubmit" class="bg-transparent border border-gray-400 hover:border-transparent hover:bg-gray-200 dark:hover:bg-gray-800 text-xl text-gray-800 dark:text-gray-200 font-bold py-1 px-2 rounded" >
        <!--<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>-->
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
        <a href="/all-posts" class="bg-transparent border border-gray-400 hover:border-transparent hover:bg-gray-200 dark:hover:bg-gray-800 text-xl text-gray-800 dark:text-gray-200 font-bold py-1 px-2 rounded">
          <i class="fa fa-remove"></i>
        </a>
    </form>
  </div>
</div>