<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\Books\Book;
use App\Http\Requests\Backend\Books\BookRequest;
use App\Http\Requests\Backend\Books\BookUpdate;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $books = Book::where('featured', true)->get();
        return view('backend.dashboard', ['books' => $books]);
    }

    public function addBooks()
    {
        return view('backend.addBooks');
    }

    public function save(BookRequest $request)
    {
        $books              = new Book;
        $books->title       = $request->input('title');
        $books->description = $request->input('description');
        $books->price       = $request->input('price');

        if ($request->hasFile('image')) {
            $picture         = $request->file('image');
            $name            = date('d-m-y-h-i-s-').preg_replace('/\s+/', '-',
                    trim($picture->getClientOriginalName()));
            $destinationPath = public_path('/uploads');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $picture->move($destinationPath, $name);
            $books->image = $name;
        }

        $books->instock  = $request->input('instock');
        $books->featured = $request->input('featured');
        $books->save();

        return redirect()->route('admin.dashboard');
    }

    public function edit(int $id)
    {
        $books = Book::find($id);

        return view('backend.bookEdit', ['books' => $books]);
    }

    public function update(BookUpdate $request)
    {

        $books              = Book::findOrFail($request->id);
        $books->title       = $request->input('title');
        $books->description = $request->input('description');
        $books->price       = $request->input('price');

        if ($request->hasFile('image')) {
            $picture         = $request->file('image');
            $name            = date('d-m-y-h-i-s-').preg_replace('/\s+/', '-',
                    trim($picture->getClientOriginalName()));
            $destinationPath = public_path('/uploads');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $picture->move($destinationPath, $name);
            $books->image = $name;
        }

        $books->instock  = $request->input('instock');
        $books->featured = $request->input('featured');
        $books->save();

        return redirect()->route('admin.dashboard');
    }

    public function delete(int $id)
    {
        Book::where('id', $id)
            ->delete();
        return redirect()->route('admin.dashboard')
                ->withFlashSuccess('deleted successfully.');
    }
}