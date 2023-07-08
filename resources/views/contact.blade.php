@extends('layouts.app')

@section('content')

<div class="flex flex-wrap justify-evenly items-center m-12 @auth ml-36 @endauth">
  <div class="flow-root mx-8 dark:text-white">
    <div class="text-5xl my-6 animate-bounce">Contactez-nous</div>
    <div class="text-xl animate-pulse">+213 555 23 44 35</div>
    <div class="text-xl animate-pulse">quoiquequiquand@gmail.com</div>
    <div class="text-xl animate-pulse">rayenebenmansour20@gmail.com</div>
    <div class="text-xl my-4">
      <a href="" class="hover:text-indigo-500 duration-300 ease-in-out"><i class="fab fa-facebook fa-3x"></i></a>
      <a href="" class="hover:text-indigo-500 duration-300 ease-in-out"><i class="fab fa-twitter fa-3x"></i></a>
      <a href="" class="hover:text-indigo-500 duration-300 ease-in-out"><i class="fab fa-instagram fa-3x"></i></a>
    </div>
  </div>

  <form action="https://formsubmit.co/quoiquequiquand@gmail.com" method="POST">
    @csrf
    <input type="hidden" name="_captcha" value="false">
    <input type="hidden" name="_next" value="{{ route('contact') }}">
    <div class="m-4 font-bold text-center text-indigo-800 dark:text-green-500">Ecrivez-nous</div>
    <div class="mb-4">
        <input type="text" name="Nom" id="Nom" placeholder="Nom"
        class="bg-gray-100 dark:bg-gray-800 dark:text-white border-2 w-full px-8 py-4 rounded-lg" required>

      </div>
      <div class="mb-4">
        <input type="email" name="email" id="Email" placeholder="Email"
        class="bg-gray-100 dark:bg-gray-800 dark:text-white border-2 w-full px-8 py-4 rounded-lg" required>
      </div>
      <div class="mb-4">
          <textarea name="Message" id="Message" placeholder="Message"
          class="bg-gray-100 dark:bg-gray-800 dark:text-white border-2 w-full px-8 py-4 rounded-lg" required>
          </textarea>
        </div>

        <div class="div">
          <button type="submit" class="bg-indigo-900 dark:bg-green-700 text-white px-4 py-3 rounded
         font-medium w-full" onclick="return confirm('Voulez-vous envoyer ce message?')">Envoyer</button>
        </div>
  </form>
</div>

@endsection