<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  
  <article class="py-8 max-w-screen-md">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
    <div class="text-base ">
      <a href="/authors/{{ $post->author->id }}" class="text-gray-500 hover:underline">{{ $post->author->name }}</a>
      <a href="/categories/{{ $post->category->slug }}" class="text-gray-500 hover:underline">{{ $post->category->name }}</a>
      | {{ $post->created_at->diffForHumans() }}
    </div>
    <p class="my-4 font-light">
      {{ $post->body }}
    </p>
    <a href="/blog" class="font-medium text-blue-500 hover:underline">&laquo; Read More</a>
  </article>
  
</x-layout>