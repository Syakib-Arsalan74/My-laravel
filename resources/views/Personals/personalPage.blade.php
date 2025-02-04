<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
<div class="pb-4 flex justify-between">
  <label for="table-search" class="sr-only">Search</label>
    <div class="relative mt-1">
      <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
      </div>
      <input type="text" id="table-search" class="block py-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
    </div>
    <a href="{{ route('create.view') }}" class="text-white rounded-md px-2 py-2.5 text-sm bg-blue-700 hover:bg-blue-500">Create New Blog</a>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    created
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $blog)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="/blog/{{$blog->slug}}">{{ $blog->title }}</a>
                </th>
                <td class="px-6 py-4">
                    {{ $blog->category->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $blog->created_at }}
                </td>
                <td class="p-4">
                    <a href="{{ route('edit.view', $blog->slug) }}" class=" rounded-md p-1 bg-yellow-600 font-medium text-white dark:text-white hover:underline">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog) }}" method="post">
                      @method('DELETE')
                      @csrf
                    <button type="submit"class="rounded-md p-1 bg-red-600 font-medium text-white dark:text-white hover:underline" onclick="return confirm('Are You Sure to Delete this Blog?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-layout>