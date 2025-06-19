<aside class="w-20 md:w-60 bg-white border-r p-4 flex flex-col gap-6 items-center md:items-start">
  <div class="text-pink-500 text-3xl font-bold">🍔</div>
  <nav class="flex flex-col gap-4 text-gray-600 w-full">
    <a href="#" class="flex items-center gap-3 px-4 py-2 bg-pink-100 rounded-md text-pink-600">
      <span class="material-icons">home</span> <span class="hidden md:inline">Home</span>
    </a>
    <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md">
      <span class="material-icons">dashboard</span> <span class="hidden md:inline">Dashboard</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md">
      <span class="material-icons">settings</span> <span class="hidden md:inline">Setting</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md">
      <span class="material-icons">logout</span> <span class="hidden md:inline">Logout</span>
    </a>
  </nav>
</aside>
