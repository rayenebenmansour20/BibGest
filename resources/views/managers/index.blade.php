@extends('layouts.app')

@section('content')

  <div class="ml-48 mt-16">
    <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                             font-medium w-24">Ajouter</a>
  </div>

  <table class="table-layout">
    <tr class="bg-gray-300 dark:bg-gray-900 text-indigo-800 dark:text-green-500">
      <td class="text-center p-2">#</td>
      <td class="text-center p-2">Nom</td>
      <td class="text-center p-2">Nom d'utilisateur</td>
      <td class="text-center p-2">Email</td>
      <td></td>
      <td></td>
    </tr>
    @foreach($managers as $manager)
    <tr class="row">
      <td>{{$manager->id}}</td>
      <td>{{$manager->name}}</td>
      <td>{{$manager->username}}</td>
      <td>{{$manager->email}}</td>
      <td>
        <form action="{{ route('managers.destroy', $manager->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-white bg-red-700 rounded font-medium p-2"><i class="fa fa-trash-alt"></i></button>
        </form>
      </td>
      <td>
        <a href="{{ route('managers.edit', $manager->id) }}" class="text-white bg-indigo-500 rounded font-medium p-2"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </table>
  
  <div class="flex justify-center ml-32 my-6">
    {{ $managers->links() }}
  </div>

@endsection