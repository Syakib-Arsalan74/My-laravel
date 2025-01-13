<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  
  <article>
    <div>
      <h2>{{$post["judul"]}}</h2>
    </div>
    <p>{{$post["article"]}}</p>
  </article>
  
</x-layout>