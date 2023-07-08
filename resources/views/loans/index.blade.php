@extends('layouts.app')

@section('content')

  <div class="ml-48 mt-16">
    <a href="{{ route('addloan') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                             font-medium w-24">Ajouter</a>
  </div>

  <table class="table-layout">
    <tr class="bg-gray-300 dark:bg-gray-900 dark:text-green-500">
      <td class="text-center p-2">#</td>
      <td class="text-center p-2">Abonné</td>
      <td class="text-center p-2">Livre</td>
      <td class="text-center p-2">Emprunté</td>
      <td class="text-center p-2">Retour</td>
      <td></td>
      
    </tr>
    @foreach($loans as $loan)
    <tr class="row">
      <td>{{$loan->id}}</td>
      <td>{{$loan->client['lastname']}}, {{$loan->client['firstname']}}</td>
      <td>{{$loan->book['title']}}</td>
      <td>{{$loan->loaned_at}}</td>
      <td>{{$loan->returned_at}}</td>
      @if($loan->returned == 1)
      <td>
        <div class="text-white bg-green-500 rounded font-medium py-2 px-4">
          <i class="fa fa-check"></i>
        </div>
      </td>
      @else
      <td>
        <a href="{{ route('returnloan', $loan->id) }}"
        onclick="return confirm('Confirmer le retour')"
        class="text-white bg-red-500 rounded font-medium py-2 px-4">
          Retourné
        </a>
      </td>
      @endif
    </tr>
    @endforeach
  </table>

  <div class="flex justify-center ml-32 my-6">
    {{ $loans->links() }}
  </div>

@endsection