<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Orders',
            'active' => 'orders',
            'order' => Order::with('order_item.product'),
        ];
        return view('order.index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Place New Order',
            'active' => 'orders',
            'cartItems' => \Cart::session(Auth()->user())->getContent(),
            'total' => \Cart::session(Auth()->user())->getTotal(),
            'products' => Product::get()
        ];
        return view('order.create', $data);
    }

    public function addToCart(Request $request)
    {
        $item = Product::find($request->product_id);
        \Cart::session(Auth()->user())->add(array(
            'id' => $item->id, // inique row ID
            'name' => $item->name,
            'price' => $item->selling_price,
            'quantity' => 1,
        ));
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $value = 0;
        $id = null;
        if ($request->add) {
            $id = $request->add;
            $value = \Cart::session(Auth()->user())->get($id)->quantity + 1;
        }
        if ($request->subtract) {
            $id = $request->subtract;
            $value =  \Cart::session(Auth()->user())->get($id)->quantity - 1;
            if ($value < 1) {
                \Cart::session(Auth()->user())->remove($id);
                return redirect()->back();
            }
        }
        \Cart::update(
            $id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $value,
                ],
            ]
        );
        return redirect()->back();
    }

    public function clearAllCart()
    {
        \Cart::session(Auth()->user())->clear();
        return redirect()->back();
    }

    public function save(Request $request)
    {

        $id = $this->generateId();
        $cart = \Cart::session(Auth()->user());
        $date = date('Y/m/d');

        Order::create(array(
            'id' => $id,
            'total' => $cart->getTotal(),
            'date' => $date,
            'cashier_id' => Auth()->user()->id,
        ));

        $items = [];

        foreach ($cart->getContent() as $item) {
            $items[] = [
                'order_id' => $id,
                'product_id' => $item->id,
                'qty' => $item->quantity,
                'price' => $item->price,
                'total' => $item->quantity * $item->price,
            ];
        }

        // OrderItems
        // foreach ($data as $items) {
        // }
        DB::table('order_items')->insert($items);
        $this->clearAllCart();
        return redirect("/orders/$id");
    }

    public function detailOrder(Order $order)
    {
        $data = [
            'title' => 'Order#' . $order->id,
            'active' => 'orders',
            'order' => $order->load(['order_item.product', 'employee'])
        ];
        return view('order.order-detail.index', $data);
    }

    private function generateId()
    {
        $id = null;
        $validator = null;
        do {
            $id = rand(0, 999999);
            $validator = Validator::make(['id' => $id], [
                'id' => 'unique:orders',
            ]);
        } while ($validator->fails());
        return $id;
    }
}
