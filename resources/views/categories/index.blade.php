@extends('layouts.app')

@section('content')

  <div class="ml-48 mt-16">
    <a href="{{ route('addcat') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                             font-medium w-24">Ajouter</a>
  </div>

  <table class="table-layout">
    <tr class="bg-gray-300 dark:bg-gray-900 text-indigo-800 dark:text-green-500">
      <td class="text-center p-2">#</td>
      <td class="text-center p-2">Libellé</td>
      <td></td>
      <td></td>
    </tr>
    @foreach($cats as $cat)
    <tr class="row">
      <td>{{$cat->id}}</td>
      <td><a href="{{ route('bycats', $cat->id) }}">{{$cat->label}}</a></td>
      <td>
        <form action="{{ route('cats.destroy', $cat->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-white bg-red-700 rounded font-medium p-2"><i class="fa fa-trash-alt"></i></button>
        </form>
      </td>
      <td>
        <a href="{{ route('cats.edit', $cat->id) }}" class="text-white bg-indigo-500 rounded font-medium p-2"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </table>
  
  <div class="flex justify-center ml-32 my-6">
    {{ $cats->links() }}
  </div>

@endsection