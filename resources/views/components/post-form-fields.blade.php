  @csrf

  <label for="title">Title</label><br>
  <input id="title" name="title" type="text" class="text-black sm:rounded-lg dark:bg-gray-200" value="{{ old('title') ?? $post->title ?? '' }}"><br>
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <label for="post-body">Post body</label><br>
  <textarea name="post-body" id="post-body" cols="30" rows="10" class="text-black resize-none rounded-md dark:bg-gray-200">{{ old('post-body')  ?? $post->post_body ?? '' }}</textarea><br>           
  @error('post-body')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <button type="submit" class="py-2 bg-transparent border border-gray-400 hover:border-transparent hover:bg-gray-200 dark:hover:bg-gray-900 text-xl text-gray-800 dark:text-gray-200 font-bold py-2 px-4 rounded">
    Submit
  </button>