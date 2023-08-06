<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact;




class DashboardController extends Controller
{
    function index()
    {
        $product_count = Product::count();
        $order_count = Order::count();
        $customer_count = User::where('roles', '=', 2)->count();
        $contact_count = Contact::where([['email', '!=', null], ['replay_id', '=', null]])->count();
        return view('backend.dashboard.index', compact('product_count', 'order_count', 'customer_count', 'contact_count'));
    }
}
