<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\Books\Book;
use App\Models\Books\UserCart;
use App\Models\OrderBook\Order;

//use Session;

/**
 * Class BooksController.
 */
class BooksController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $search = \Request::get('search');
        $books  = Book::where('featured', 1)->where('title', 'LIKE',
                '%'.$search.'%')->get();
        return view('frontend.user.bookDashboard', ['books' => $books]);
    }

    public function cart()
    {
        return view('frontend.user.cart');
    }

    public function addtoCart(int $id)
    {
        $book = UserCart::where('user_id', access()->id())->get(['book_id'])->toArray();
        if (!empty($book)) {
            $newArr = [];
            foreach ($book as $data) {
                array_push($newArr, $data['book_id']);
            }
            if (in_array($id, $newArr)) {
                return redirect()->route('frontend.user.dashboard')->withFlashDanger('Item Already in your cart');
            } else {
                $book          = new UserCart;
                $book->user_id = access()->id();
                $book->book_id = $id;
                $book->save();
                return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Item Add your cart');
            }
        } else {
            $book          = new UserCart;
            $book->user_id = access()->id();
            $book->book_id = $id;
            $book->save();
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess('item Add your cart');
        }


//        $book   = Book::where('id', $id)->get();
//         $cart[] = [
//            "id" => $book[0]->id,
//            "title" => $book[0]->title,
////            "qty" => 1,
//            "price" => $book[0]->price,];
//        $cart = Session::get('cart');
//        if ($cart == null) {
//            $cart['id'][] = $id;
//            Session::put('cart', $cart);
//        } else {
//            if (in_array($id, $cart['id'])) {
//                return redirect()->route('frontend.user.dashboard')->withFlashDanger('Already in your cart');
//            } else {
//                $cart['id'][] = $id;
//                Session::put('cart', $cart);
//            }
//        }
//
//         return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Add your cart');
//
    }

    public function showCart()
    {
        $cart    = UserCart::where('user_id', access()->id())->get()->toArray();
        $bookArr = [];
        foreach ($cart as $item) {
            array_push($bookArr, $item['book_id']);
        }
        $book = Book::whereIn('id', $bookArr)->get(['id', 'title', 'price']);
        return view('frontend.user.cart', compact('book'));
    }

    public function orderPlace($rate)
    {
        $cart    = UserCart::where('user_id', access()->id())->get()->toArray();
        $bookArr = [];
        foreach ($cart as $item) {
            array_push($bookArr, $item['book_id']);
        }
        $order          = new Order;
        $order->user_id = access()->id();
        $order->total   = $rate;
        if ($order->save()) {
            $order->book()->attach($bookArr);
            $user = UserCart::where('user_id', access()->id())->delete();
            return redirect()->route('frontend.user.cart')->withFlashSuccess('Your Books are Successfully Ordered.');
        }
    }
}