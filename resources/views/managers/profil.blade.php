@extends('layouts.app')

@section('content')
  <div class="text-center text-xl mx-auto w-2/4 lg:w-4/12">
    <form action="{{ route('user.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <img src="{{ auth()->user()->profileImage() }}" class="mx-auto my-4 rounded-3xl w-40">
      <div class="mb-12">
        <input type="file" id="image" name="image" class="hidden">
        <label for="image" class="bg-gray-800 text-sm text-white px-2 py-3 rounded
           font-medium w-full">Choisir une photo</label>
      </div>
      <div class="my-4">
            <input type="text" name="username" id="username" placeholder="Username"
            class="bg-gray-100 border-2 w-full p-4 rounded-lg
            @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">
  
            @error('username')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror 
      <div>
      <div class="my-4">
            <input type="text" name="name" id="name" placeholder="Nom"
            class="bg-gray-100 border-2 w-full p-4 rounded-lg
            @error('name') border-red-500 @enderror" value="{{ auth()->user()->name }}">
  
            @error('name')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror 
      <div>
      <div class="my-4">
            <input type="password" name="password" id="password" placeholder="Changer de mot de passe"
            class="bg-gray-100 border-2 w-full p-4 rounded-lg
            @error('password') border-red-500 @enderror">
  
            @error('password')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror 
      <div>
      <button type="submit" class="bg-gray-800 text-white my-6 px-4 py-3 rounded
         font-medium w-full">Sauvegarder</button>
    </form>
  </div>


@endsection