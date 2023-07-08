@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-indigo-800 dark:text-green-500 font-bold mb-8 text-2xl">Ajouter une catégorie</div>
      <form action="{{ route('addcat') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="label" id="label" placeholder="Libellé"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('label') border-red-500 @enderror" value="{{ old('label') }}">

          @error('label')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 
        </div>

        <div class="div">
          <button type="submit" class="bg-indigo-900 dark:bg-green-700 text-white px-4 py-3 rounded
         font-medium w-full">Ajouter</button>
        </div>

      </form>
    </div>
  </div>

@endsection