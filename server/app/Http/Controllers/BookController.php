<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function list() {
        return Book::all();
    }

    private function pairing($newBook, $newBookData) {
        $newBook->title = $newBookData->title;
        $newBook->author = $newBookData->author;
        $newBook->ISBN = $newBookData->ISBN;
        $newBook->img = $newBookData->img;
        $newBook->genre = $newBookData->genre;
        $newBook->stars = $newBookData->stars;
        //$newBook->updated_at = $newBookData->updated_at;

        $newBook->save();
        return $newBook;
    }

    public function create(Request $request) {
        $newBookData = json_decode($request->getContent());
        $newBook = new Book();

        $newBook = $this->pairing($newBook, $newBookData);
        return $newBook;
    }

    public function edit(Request $request, $id) {
        $book = Book::find($id);
        $newBookData = json_decode($request->getContent());

        $book = $this->pairing($book, $newBookData);
        return $book;
    }

    public function delete(Request $request, $id) {
        $book = Book::where("id", $id)->delete();

        return $book;
    }

    public function view(Request $request, $id) {
        return Book::find($id);
    }
}
