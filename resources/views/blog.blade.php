<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @foreach
  <article>
    <div>
      <a href="/post">
      <h2>{{$post["judul"]}}</h2>
    </a>
    </div>
    <p>{{$post["article"]}}</p>
  </article>
  @endforeach
</x-layout>