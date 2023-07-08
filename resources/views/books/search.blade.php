@extends('layouts.app')

@section('content')

  <form class="flex justify-start mx-9 my-4 items-center text-gray-700 @auth ml-32 @endauth" type="get" action="{{ route('booksearch') }}">
      <input type="text" class="border-2 border-gray-300 bg-white
      h-10 px-5 sm:pr-72 rounded-lg text-sm focus:outline-none" name="search" placeholder="Rechercher un livre">
      <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
  </form>

  <div class="ml-48 mt-16">
    <a href="{{ route('addbook') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                             font-medium w-24">Ajouter</a>
  </div>

  <table class="table-layout">
    <tr class="bg-white dark:bg-black text-indigo-800 dark:text-green-500">
      <td class="text-center p-2">#</td>
      <td class="text-center p-2">Titre</td>
      <td class="text-center p-2">Auteur</td>
      <td class="text-center p-2">Catégorie</td>
      <td class="text-center p-2">Editeur</td>
      <td class="text-center p-2">Langue</td>
      <td class="text-center p-2">Année</td>
      <td></td>
      <td></td>
    </tr>
    @foreach($books as $book)
    <tr class="row">
      <td>{{$book->id}}</td>
      <td>{{$book->title}}</td>
      <td>{{$book->author}}</td>
      <td>{{$book->category['label']}}</td>
      <td>{{$book->editor}}</td>
      <td>{{$book->language}}</td>
      <td>{{$book->year}}</td>
      
      <td>
        <form action="{{ route('books.destroy', $book->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-white bg-red-700 rounded font-medium p-2"><i class="fa fa-trash-alt"></i></button>
        </form>
      </td>
      <td>
        <a href="{{ route('books.edit', $book->id) }}" class="text-white bg-indigo-500 rounded font-medium p-2"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </table>

@endsection