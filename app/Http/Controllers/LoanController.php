<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Client;
use App\Models\Book;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function list() {
        $loans = Loan::paginate(5);
        return view('loans.index', ['loans'=>$loans]);
    }

    public function index() {
        $books = Book::where('copies', '>', 0)->get();
        $clients = Client::all();
        return view('loans.form', ['clients'=>$clients], ['books'=>$books]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'ISBN' => 'exclude_unless:book,null|exists:books,ISBN',
            'book' => 'exclude_unless:ISBN,null',
            'client' => 'required',
        ]);

        $loan = new Loan();
        $currentdate = Carbon::now();
        if($request->ISBN == null) {            
            $book = $request->book;
        }
        else {
            $book = $request->ISBN;
        }
        $client = $request->client;

        $bookmod = Book::where('ISBN', $book)->first();
        $bookmod->copies = $bookmod->copies - 1;
        $bookmod->save();
        
        $loan->book()->associate($bookmod);
        $loan->client()->associate($client);
        $loan->loaned_at = $currentdate;
        $loan->save();

        return redirect()->route('loans');
    }

    public function return($id) {
        $loan = Loan::find($id);
        $currentdate = Carbon::now();

        $book = Book::where('id', $loan->book['id'])->first();
        $book->copies = $book->copies + 1;
        $book->save();

        $loan->returned = 1;
        $loan->returned_at = $currentdate;
        $loan->save();

        return redirect()->route('loans');
    }

}
