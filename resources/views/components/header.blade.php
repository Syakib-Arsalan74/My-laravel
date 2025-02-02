<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
      @auth
      <a href="/generate-pdf" class="bg-blue-600 text-white p-2 rounded-md">Download as PDF</a>
      @endauth
    </div>
  </header>