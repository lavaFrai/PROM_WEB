<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function all(){
        $book_list = Book::all();
        return response()->json($book_list);
    }
    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function changeAvailabilty($id){
        $book = Book::find($id);
        $book->availability = !$book->availability;
        $book->save();
        return response()->json([
            'status' => 'ok'
        ]);
    }
    public function add(Request $req){
        $book = new Book();
        $book->author = $req->author;
        $book->title = $req->title;
        $book->availability = true;
        $book->save();
        return response()->json([
            'status' => 'ok'
        ]);
    }
}
