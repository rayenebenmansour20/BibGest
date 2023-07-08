@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-indigo-800 dark:text-green-500 font-bold mb-8 text-2xl">Modifier le livre</div>
      <form action="{{ route('books.edit', $book->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="title" id="title" placeholder="Titre"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('title') border-red-500 @enderror" value="{{ $book->title }}">

          @error('title')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="author" id="author" placeholder="Auteur"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('author') border-red-500 @enderror" value="{{ $book->author }}">

          @error('author')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 
        </div>
        
        <div class="mb-4">
          <select name="category" id="category" placeholder="Categorie"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('category') border-red-500 @enderror">
          @foreach($cats as $cat)
          <option value="{{ $cat->id }}" {{ $cat->id == $book->category_id ? 'selected' : '' }}>
            {{$cat->label}}</option>
          @endforeach

          @error('category')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
          </select> 
        </div>

        <div class="mb-4">
          <input type="text" name="editor" id="editor" placeholder="Editeur"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('editor') border-red-500 @enderror" value="{{ $book->editor }}">
          
          @error('editor')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <input type="text" name="ISBN" id="ISBN" placeholder="ISBN"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('ISBN') border-red-500 @enderror" value="{{ $book->ISBN }}">
          
          @error('ISBN')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="text" name="language" id="language" placeholder="Langue"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('language') border-red-500 @enderror" value="{{ $book->language }}">
          
          @error('language')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>

        
        <div class="mb-4">
          <input type="text" name="year" id="year" placeholder="Année"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('year') border-red-500 @enderror" value="{{ $book->year }}">
          
          @error('year')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="number" name="copies" id="copies" placeholder="Nombre d'exemplaires"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('copies') border-red-500 @enderror" value="{{ $book->copies }}">
          
          @error('copies')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 

        </div>

        <div class="mb-4 flex flex-wrap">
          @foreach($tags as $tag)
          <div>
            <label class="m-4 dark:text-white" for="tags">{{ $tag->label }}</label>
            <input class="mr-4" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}">
          </div>
          @endforeach
        </div>
        
        <div class="mb-4">
          <input type="file" name="image" id="image"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('image') border-red-500 @enderror" value="{{ $book->image }}">
      
        </div>

        <div class="mb-4">
          <textarea name="resume" id="resume" placeholder="Resumé"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg dark:bg-gray-800 dark:text-white
          @error('resume') border-red-500 @enderror" value="{{ $book->resume }}">
          
          @error('resume')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror 
          </textarea>
        </div>

        <div class="div">
          <button type="submit" class="bg-indigo-900 dark:bg-green-700 text-white px-4 py-3 rounded
         font-medium w-full">Modifier</button>
        </div>

      </form>
    </div>
  </div>

@endsection