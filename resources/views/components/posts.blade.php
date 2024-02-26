<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
    @if($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="bg-white my-3 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>{{$post->title}}</h1><br>
                        <span>{{$post->post_body}}</span><br><br>
                        <span>Created: {{$post->created_at}}</span>
                        @if($post->updated_at != null)
                        <br><span>Edited: {{$post->updated_at}}</span>
                        @endif
                </div>
            </div>
        @endforeach
    @else
    <div class="bg-white my-3 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            You dont have any post yet.
        </div>
    </div>
    @endif
</div>