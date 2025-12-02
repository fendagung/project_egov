<!doctype html> 
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title') - Admin</title>

  {{-- Vite File --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Tailwind CDN (optional, jika tidak pakai CDN bisa dihapus) --}}
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">
    @include('layouts.sidebar') 
    <main class="flex-1 p-6 md:pl-72">
      <div class="mb-4">
        @if(session('success'))
          <div class="p-3 bg-green-500 text-white rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
          <div class="p-3 bg-red-500 text-white rounded">{{ session('error') }}</div>
        @endif
      </div>

      <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-semibold mb-4">@yield('title')</h1>
        @yield('content')
      </div>
    </main>
  </div>

</body>
</html>
