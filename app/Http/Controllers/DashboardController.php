<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $cats = Category::all();
        $items_rec = array();
        $books_date = Book::all()->pluck('created_at')->toArray();
        $loaned = Loan::all()->pluck('created_at')->toArray();
        $returned = Loan::all()->pluck('returned_at')->toArray();
        $books_count = Book::all()->count();
        $years = array();
        $monthsLoaned = array();
        $monthsReturned = array();
        
        for($x = 1; $x <= $cats->count(); $x++) {
            $books = Book::where('category_id', $x)->get()->count();
            $items_rec[] = $books;
        }

        for($x = 0; $x < $books_count; $x++) {
            $date = new Carbon($books_date[$x]);
            $years[] = $date->year;
        }
        sort($years);
        $books_years = array_count_values($years);

        foreach($loaned as $loan) {
            $date = new Carbon($loan);
            $monthsLoaned[] = $date->monthName;
        }
        sort($monthsLoaned);
        $loans = array_count_values($monthsLoaned);

        foreach($returned as $return) {
            if($return != null) {
                $date = new Carbon($return);
                $monthsReturned[] = $date->monthName;
            }
        }
        sort($monthsReturned);
        $returns = array_count_values($monthsReturned);

        return view('dashboard', ['cats'=>json_encode($cats), 'items'=>$items_rec, 'books_years'=>$books_years, 'loans'=>$loans, 'returns'=>$returns]);
    }

    public function contact() {
        return view('contact');
    }
}
