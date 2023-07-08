@extends('layouts.app')

@section('content')

  <form class="flex justify-start mx-9 my-4 items-center text-gray-700 @auth ml-32 @endauth" type="get" action="{{ route('clientsearchtrash') }}">
      <input type="text" class="border-2 border-gray-300 bg-white
      h-10 px-5 sm:pr-72 rounded-lg text-sm focus:outline-none" name="search" placeholder="Rechercher un abonné">
      <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
  </form>

  <table class="table-layout">
    <tr class="bg-gray-300 dark:bg-gray-900 text-indigo-800 dark:text-green-500">
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
        <form action="{{ route('client.restore', $client->id) }}" method="post">
          @csrf
          <button type="submit" onclick="return confirm('Are you sure?')" class="text-white bg-indigo-800 dark:bg-green-500 rounded font-medium p-2"><i class="fa fa-trash-restore"></i></button>
        </form>
      </td>
      <td>
        <form action="{{ route('client.delete', $client->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure?')" class="text-white bg-red-900 rounded font-medium p-2"><i class="fa fa-minus-circle"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

@endsection