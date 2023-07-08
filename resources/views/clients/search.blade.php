@extends('layouts.app')

@section('content')

  <form class="flex justify-start mx-9 my-4 items-center text-gray-700 @auth ml-32 @endauth" type="get" action="{{ route('clientsearch') }}">
      <input type="text" class="border-2 border-gray-300 bg-white
      h-10 px-5 sm:pr-72 rounded-lg text-sm focus:outline-none" name="search" placeholder="Rechercher un abonné">
      <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
  </form>

  <div class="ml-48 mt-16">
    <a href="{{ route('addclient') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                             font-medium w-24">Ajouter</a>
  </div>

  <table class="table-layout">
    <tr class="bg-gray-300 dark:bg-black text-indigo-800 dark:text-green-500">
      <td class="text-center p-2">#</td>
      <td class="text-center p-2">Nom</td>
      <td class="text-center p-2">Prénom</td>
      <td class="text-center p-2">Date de naissance</td>
      <td></td>
      <td></td>
    </tr>
    @foreach($clients as $client)
    <tr class="row">
      <td>{{$client->id}}</td>
      <td>{{$client->lastname}}</td>
      <td>{{$client->firstname}}</td>
      <td>{{$client->birth}}</td>
      <td>
        <form action="{{ route('clients.destroy', $client->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-white bg-red-700 rounded font-medium p-2"><i class="fa fa-trash-alt"></i></button>
        </form>
      </td>
      <td>
        <a href="{{ route('clients.edit', $client->id) }}" class="text-white bg-indigo-500 rounded font-medium p-2"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </table>

@endsection