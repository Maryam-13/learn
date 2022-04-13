<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImage;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreBookRequest;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('give', 'false')->paginate(10);
        return Inertia::render('Book/Index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Book/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(StoreBookRequest $request)
    {

        $book = new Book($request->all());
        $book->user_id = Auth::id();
        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $book->image = $image_path;

        $book->save();

        /* Book::create(
            Request::validate([
                'title' => ['required', 'max:90'],
                'author' => ['required'],
                'annotation'=> ['required']
            ])
        );*/

        return Redirect::route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $books = Book::where('user_id', Auth::id())->paginate(10);
        return Inertia::render('Book/Show', ['books' => $books]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {

        if (Auth::id() !== $book->user_id) {
            abort(403); //Доступ запрещен
        }

        return Inertia::render('Book/Edit', [
            'book' => [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'image' => $book->image,
                'annotation' => $book->annotation
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        } else {
            $image_path = $book->image;
        }

        $book->image = $image_path;


        $book->save();

        $data = $request->validate([
            'title' => ['required', 'max:90'],
            'author' => ['required', 'max:90'],
        
            'annotation' => ['required'],
        ]);

        $book->update($data);
        //$book->update($request->all());

        return Redirect::route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            abort(403); //Доступ запрещен
        }
        $book->delete();

        return Redirect::route('books.index');
    }

    public function chek(Book $book)
    {
        $value = $book->give;

        if ($value == 'true') {
            $value = 'false';
        } else {
            $value = 'true';
        }

        $book->give = $value;
        $book->save();

        return Redirect::route('books.show');
    }
}
