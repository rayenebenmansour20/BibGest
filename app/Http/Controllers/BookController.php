<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Loan;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    public function list() {
        $books = Book::paginate(5);
        return view('books.index', ['books'=>$books]);
    }

    public function listguest() {
        $books = Book::paginate(10);
        $cats = Category::all();
        return view('home', ['books'=>$books], ['cats'=>$cats]);
    }

    public function listbyCat($id) {
        $books = Book::where('category_id', $id)->paginate(10);
        $cats = Category::all();
        return view('books.bycats', ['books'=>$books], ['cats'=>$cats]);
    }

    public function singlebook($id) {
        $book = Book::find($id);
        $loans = Loan::where('book_id', $id)->get();
        return view('books.book', ['book'=>$book, 'loans'=>$loans]);
    }

    public function index() {
        $cats = Category::all();
        $tags = Tag::all();
        return view('books.form', ['cats'=>$cats], ['tags'=>$tags]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'max:255',
            'editor' => 'max:255',
            'category' => 'required',
            'ISBN' => 'required|unique:books,ISBN|max:255',
            'language' => 'required|max:255',
            'year' => 'max:4',
            'copies' => 'required',
            'image' => 'required|image',
        ]);
        
        $imagePath = $request->file('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(350,500);
        $image->save();
        
        $book = new Book();
        
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category;
        $book->editor = $request->editor;
        $book->ISBN = $request->ISBN;
        $book->language = $request->language;
        $book->year = $request->year;
        $book->copies = $request->copies;
        $book->image = $imagePath;
        $book->resume = $request->resume;
        $book->save();
        $book->tags()->attach($request->tags);
            
        return redirect()->route('books');
    }

    public function destroy($id) {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('books');
    }

    public function editview($id) {
        $book = Book::find($id);
        $cats = Category::all();
        $tags = Tag::all();

        return view('books.editform', ['book'=>$book, 'cats'=>$cats, 'tags'=>$tags]);
    }

    public function edit(Request $request, $id) {
        $book = Book::find($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'max:255',
            'editor' => 'max:255',
            'category' => 'required',
            'ISBN' => 'required|max:255',
            'language' => 'required|max:255',
            'year' => 'max:4',
            'copies' => 'required|integer',
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(350,500);
            $image->save();
            $book->image = $imagePath;
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category;
        $book->editor = $request->editor;
        $book->ISBN = $request->ISBN;
        $book->language = $request->language;
        $book->year = $request->year;
        $book->copies = $request->copies;
        $book->resume = $request->resume;
        $book->save();
        $book->tags()->attach($request->tags);

        return redirect()->route('books');
    }

    public function search() {
        $cats = Category::all();
        $search_text = $_GET['search'];
        $books = Book::where('title', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('author', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('editor', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('ISBN', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('year', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('language', 'LIKE', '%'.$search_text.'%')
                        ->orWhereHas('tags', function(Builder $query) {   
                            $search_text = $_GET['search'];
                            $query->where('label', 'LIKE', '%'.$search_text.'%');
                        })
                        ->paginate(10);

              
        return view('search', compact('books'), ['cats'=>$cats]);
    }

    public function booksearch() {
        $search_text = $_GET['search'];
        $books = Book::where('title', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('author', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('editor', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('ISBN', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('year', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('language', 'LIKE', '%'.$search_text.'%')
                        ->orWhereHas('tags', function(Builder $query) {   
                            $search_text = $_GET['search'];
                            $query->where('label', 'LIKE', '%'.$search_text.'%');
                        })
                        ->get();

        return view('books.search', compact('books'));
    }

    public function booksearchtrash() {
        $search_text = $_GET['search'];
        $books = Book::where('title', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('author', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('editor', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('ISBN', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('year', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('language', 'LIKE', '%'.$search_text.'%')
                        ->orWhereHas('tags', function(Builder $query) {   
                            $search_text = $_GET['search'];
                            $query->where('label', 'LIKE', '%'.$search_text.'%');
                        })
                        ->get();

        return view('books.searchtrash', compact('books'));
    }

    public function restoreview() {
        $books = Book::onlyTrashed()->get();

        return view('books.restore', ['books'=>$books]);
    }

    public function restore($id) {
        $book = Book::onlyTrashed()->find($id);
        $book->restore();

        return redirect()->route('books.restore');
    }

    public function delete($id) {
        $book = Book::onlyTrashed()->find($id);
        $book->forceDelete();

        return redirect()->route('books.restore');
    }

}

