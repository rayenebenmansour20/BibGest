@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-6/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-indigo-800 dark:text-green-500 font-bold mb-8 text-2xl">Ajouter un livre</div>
      <form action="{{ route('addloan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="ISBN" id="ISBN" placeholder="ISBN"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('ISBN') border-red-500 @enderror" value="{{ old('ISBN') }}" autofocus>
          
          @error('ISBN')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <select name="book" id="book" placeholder="Livre"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('book') border-red-500 @enderror" value="{{ old('book') }}">
          <option selected disabled>Livre</option>
          @foreach($books as $book)
          <option value="{{ $book->ISBN }}">{{$book->title}}</option>
          @endforeach

          @error('book')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
          </select> 
        </div>
    
        <div class="mb-4">
          <select name="client" id="client" placeholder="Abonné"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('client') border-red-500 @enderror" value="{{ old('client') }}">
          <option selected disabled>Abonné</option>
          @foreach($clients as $client)
          <option value="{{ $client->id }}">{{$client->lastname}}, {{$client->firstname}}</option>
          @endforeach

          @error('client')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
          </select> 
        </div>

        <div class="div">
          <button type="submit" onclick="return confirm('Confirmer l\'emprunt')" class="bg-indigo-900 dark:bg-green-700 text-white px-4 py-3 rounded
         font-medium w-full">Ajouter</button>
        </div>

      </form>
    </div>
  </div>

@endsection