@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-3/4 lg:w-4/12 bg-dark p-6 rounded-lg">
      <div class="text-indigo-800 dark:text-green-500 font-bold mb-8 text-2xl">
        Login
      </div>
      @if (session('status'))
        <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
          {{ session('status') }}
        </div>
      @endif

      <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="mb-4">
          <input type="text" name="email" id="email" placeholder="Email"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('name') border-red-500 @enderror" value="{{ old('email') }}">
          
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
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="mb-4 flex flex-wrap justify-between">
          <div class="text-indigo-800 dark:text-green-500">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Se rappeler de moi</label>
          </div>
          
          <div class="text-indigo-800 dark:text-green-500">
            <a href="{{ route('password.request') }}">Mot de passe oublié</a>
          </div>
        </div>

        <div>
          <button type="submit" class="bg-indigo-900 dark:bg-green-700 text-white px-4 py-3 rounded
         font-medium w-full">Login</button>
        </div>

      </form>
    </div>
  </div>

@endsection