<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Cashier App')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">
    @include('pages.frontend.partials.sidebar')

    <main class="flex-1 p-6">
      @yield('main')
    </main>

    @include('pages.frontend.partials.cart')
  </div>
</body>
</html>
