<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>RABib</title>
</head>
<body class="bg-gray-300 min-h-screen font-mono dark:bg-gray-900">
  <nav class="z-10 bg-white dark:bg-black flex justify-between p-4 mb-6 shadow-xl">
    <a href="{{ route('home') }}" class="font-bold text-xl text-indigo-800 dark:text-green-500">BibTech</a>
    <ul class="flex items-center font-semibold text-indigo-800 dark:text-green-500">
      <li class="px-4">
        <div class="cursor-pointer" onclick="toggledarkmode()"><i class="fas fa-adjust"></i></div>
      </li>
      <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
      <li><a href="{{ route('contact') }}" class="p-3">Contact</a></li>
      @auth
      <li>
        <a href="{{ route('user.update', auth()->user()) }}">
          <img src="{{ auth()->user()->profileImage() }}" class="w-8 mx-2 rounded-xl" alt="profil">
        </a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="post" class="p-3 inline text-red-500">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </li>
      @endauth

      @guest
      <li><a href="{{ route('login') }}" class="p-3">Log in</a></li>
      @endguest
    </ul>
  </nav>
  
  @auth 
  <div class="fixed top-0 left-0 h-screen w-24 flex flex-col
  bg-white dark:bg-black shadow-lg">
  <a href="{{ route('home') }}" class="font-bold text-xl text-indigo-800 dark:text-green-500 my-6 mx-auto">
    BibTech
  </a>
    <a href="{{ route('dashboard') }}" class="sidebar-icon group">
      <i class="fas fa-chart-line"></i><span class="sidebar-tooltip group-hover:opacity-100">Dashboard</span>
    </a>
    <a href="{{ route('books') }}" class="sidebar-icon group">
      <i class="fas fa-book"></i><span class="sidebar-tooltip group-hover:opacity-100">Livres</span>
    </a>
    <a href="{{ route('clients') }}" class="sidebar-icon group">
      <i class="fas fa-users"></i><span class="sidebar-tooltip group-hover:opacity-100">Abonnés</span>
    </a>
    <a href="{{ route('cats') }}" class="sidebar-icon group">
      <i class="fas fa-align-right"></i><span class="sidebar-tooltip group-hover:opacity-100">Catégories</span>
    </a>
    <a href="{{ route('tags') }}" class="sidebar-icon group">
      <i class="fas fa-quote-right"></i><span class="sidebar-tooltip group-hover:opacity-100">Mots-clés</span>
    </a>
    <a href="{{ route('loans') }}" class="sidebar-icon group">
      <i class="fas fa-address-book"></i><span class="sidebar-tooltip group-hover:opacity-100">Emprunts/Retours</span>
    </a>
    @if (auth()->user()->admin)
    <a href="{{ route('managers') }}" class="sidebar-icon group">
      <i class="fas fa-user-shield"></i><span class="sidebar-tooltip group-hover:opacity-100">Gestionnaires</span>
    </a>
    @endif

  </div>
  @endauth

  @yield('content')
  
  <script>
      if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        localStorage.setItem('theme', 'dark')
        document.documentElement.classList.add('dark')
      } else {
        localStorage.setItem('theme', 'light')
        document.documentElement.classList.remove('dark')
      }
    function toggledarkmode() {
      if(localStorage.theme === 'dark'){
        localStorage.setItem('theme', 'light')
        document.documentElement.classList.remove('dark')
      } else {
        localStorage.setItem('theme', 'dark')
        document.documentElement.classList.add('dark')
      }
    }
  </script>
</body>
</html>