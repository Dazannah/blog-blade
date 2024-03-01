@if($maxPage > 0)
<div class="max-w-min mx-auto pb-6">
  <nav>
    <ul class="flex items-center -space-x-px h-8 text-sm">
      <li
      @if((Request::get('page') ?? 1) == 1)
        style="pointer-events:none;"
      @endif
      >
        <a href="?page={{ Request::get('page',1) - 1 }} {{Request::get('author') ? '&author=' . Request::get('author') : '' }} {{Request::get('post-title') ? '&post-title=' . Request::get('post-title') : '' }} {{Request::get('post-body') ? '&post-body=' . Request::get('post-bod') : '' }} {{Request::get('date') ? '&date=' . Request::get('date') : '' }}"
        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Previous</span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
        </a>
      </li>
      @for($i=1; $i < $maxPage + 1; $i++)
        <li>
          <a href="?page={{$i}} {{Request::get('author') ? '&author=' . Request::get('author') : '' }} {{Request::get('post-title') ? '&post-title=' . Request::get('post-title') : '' }} {{Request::get('post-body') ? '&post-body=' . Request::get('post-bod') : '' }} {{Request::get('date') ? '&date=' . Request::get('date') : '' }}"
          @if((Request::get('page') ?? 1) == $i)
            aria-current="page" aria-current="page" class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
          @else
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          @endif >{{$i}}</a>
        </li>
      @endfor
      <li
      @if((Request::get('page') ?? 1 )== $maxPage)
        style="pointer-events:none;"
      @endif
      >
        <a href="?page={{ Request::get('page',1) + 1 }} {{Request::get('author') ? '&author=' . Request::get('author') : '' }} {{Request::get('post-title') ? '&post-title=' . Request::get('post-title') : '' }} {{Request::get('post-body') ? '&post-body=' . Request::get('post-bod') : '' }} {{Request::get('date') ? '&date=' . Request::get('date') : '' }}"
        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Next</span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </li>
    </ul>
  </nav>
</div>
@endif
