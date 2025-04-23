<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index() {
        return response()->json(Book::all());
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable'
        ]);
        $book = Book::create($data);
        return response()->json($book, 201);
    }

    public function show($id) {
        return response()->json(Book::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['message' => 'Book deleted']);
    }
}
