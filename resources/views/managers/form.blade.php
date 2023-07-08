@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-indigo-800 dark:text-green-500 font-bold mb-8 text-2xl">Ajouter un gestionnaire</div>
      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="mb-4">
          <input type="text" name="name" id="name" placeholder="Nom"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('name') border-red-500 @enderror" value="{{ old('name') }}">

          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="username" id="username" placeholder="Pseudo"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('username') border-red-500 @enderror" value="{{ old('username') }}">

          @error('username')
            <div class="text-red-500 mt-2 text-sm">
             {{ $message }}
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="email" id="email" placeholder="Email"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('email') border-red-500 @enderror" value="{{ old('email') }}">
          
          @error('email')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <input type="password" name="password" id="password" placeholder="Mot de passe"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('password') border-red-500 @enderror">

          @error('password')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 
          
        </div>

        <div class="mb-4 dark:text-white">
          <label for="admin">Admin</label>
          <input type="checkbox" name="admin" id="admin" value=1>
        </div>

        <div class="div">
          <button type="submit" class="bg-indigo-900 dark:bg-green-700 text-white px-4 py-3 rounded
         font-medium w-full">Ajouter</button>
        </div>

      </form>
    </div>
  </div>

@endsection