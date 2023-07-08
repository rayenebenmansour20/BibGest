@extends('layouts.app')

@section('content')

<form class="flex justify-start mx-9 my-4 items-center text-gray-700 @auth ml-32 @endauth" type="get" action="{{ route('homesearch') }}">
    <input type="text" class="border-2 border-gray-300 bg-white dark:bg-gray-800
     h-10 px-5 sm:pr-72 dark:text-white rounded-lg text-sm focus:outline-none" name="search" placeholder="Rechercher un livre">
     <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
</form>

<div class="text-center @auth ml-24 @endauth">
  <button class="lg:hidden text-indigo-800 dark:text-green-500" id="menu-button">
    <i class="fas fa-ellipsis-h fa-3x"></i>
  </button>
</div>

<div class="hidden lg:flex mx-8 @auth ml-32 @endauth" id="menu">
  <nav class="flex flex-wrap text-sm font-bold">
      @foreach($cats as $cat)
      <li class="shadow-lg shadow-red-500 block px-3 py-2 m-2 rounded-md bg-white hover:bg-indigo-300 
                dark:bg-black dark:text-white dark:hover:bg-green-500 transition-all">
        <a href="{{ route('bycats', $cat->id) }}">{{ $cat->label }}</a>
      </li>
      @endforeach
  </nav>
</div>

<div class="flex justify-center flex-wrap gap-6 mx-6 my-12 @auth ml-32 @endauth"> 
  @foreach($books as $book)
    <a href="{{ route('book', $book->id) }}" class="h-screen sm:h-96 lg:h-80 w-full sm:w-1/3 lg:w-1/6 flex items-end rounded-2xl transition-all bg-cover bg-center"
                                                    style="background-image: url('storage/{{ $book->image }}')" >
      <div class="mx-auto my-2">
        <p class="text-indigo-800 dark:text-green-500 font-extrabold text-base">{{ $book->category['label'] }}</p>
      </div>
    </a>
  @endforeach
</div>

  <div class="flex justify-center @auth ml-32 @endauth my-6">
    {{ $books->links() }}
  </div>

<script>
  const button = document.querySelector('#menu-button'); // Hamburger Icon
  const menu = document.querySelector('#menu'); // Menu

  button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>

@endsection