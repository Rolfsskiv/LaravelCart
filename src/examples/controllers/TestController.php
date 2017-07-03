<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LaravelRolf\Cart\Facades\Cart;

class TestController extends Controller
{
    public function index() {
        $items = Cart::content();

        return view('items', compact('items'));
    }

    public function add() {
        Cart::add([
            ['id' => '1', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00, 'options' => ['discountRate' => 5]],
            ['id' => '2', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => ['size' => 'large']],
            ['id' => '23', 'name' => 'Product 3', 'qty' => 11, 'price' => 10.00, 'options' => ['size' => 'large']],
        ]);

        return redirect()->back();
    }

    public function count(Request $request) {
        Cart::update($request->get('rowId'), $request->get('qty'));

        return redirect()->back();
    }

    public function destroy() {
        Cart::destroy();

        return redirect()->back();
    }

    public function remove(Request $request) {
        Cart::remove($request->get('rowId'));

        return redirect()->back();
    }

    public function discount(Request $request) {
        $rowId = $request->get('rowId');
        $discount = $request->get('discount');
        Cart::setDiscount($rowId, $discount);
        return redirect()->back();
    }

}
