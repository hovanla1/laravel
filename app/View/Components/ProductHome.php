<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\ProductStore;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductHome extends Component
{
    public $row_category;
    public function __construct($rowcat)
    {
        $this->row_category = $rowcat;
    }

    public function render(): View|Closure|string
    {
        $row_cat = $this->row_category;
        $list_category_id = array();
        array_push($list_category_id, $row_cat->id);
        //xet cap con
        $list_category1 = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', '1']])
            ->orderBy('updated_at', 'desc')
            ->get();
        if (count($list_category1) > 0) {
            foreach ($list_category1 as $row_cat1) {
                array_push($list_category_id, $row_cat1->id);
                $list_category2 = Category::where([['parent_id', '=', $row_cat1->id], ['status', '=', '1']])->get();
                if (count($list_category2) > 0) {
                    foreach ($list_category2 as $row_cat2) {
                        array_push($list_category_id, $row_cat2->id);
                        $list_category3 = Category::where([['parent_id', '=', $row_cat2->id], ['status', '=', '1']])->get();
                        if (count($list_category3) > 0) {
                            foreach ($list_category3 as $row_cat3) {
                                array_push($list_category_id, $row_cat3->id);
                            }
                        }
                    }
                }
            }
        }
        $product_list = Product::join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
        // ->join('httt_product_sale', 'httt_brand.id', '=', 'httt_product.brand_id')
            ->select('httt_product.*', 'httt_brand.name as brand_name','httt_brand.slug as brand_slug')
            ->orderBy('updated_at', 'desc')
            ->where('httt_product.status', 1)
            ->whereIn('category_id', $list_category_id)->take(8)->get();
        // $qty_buy = 0;
        // $qty_buy= OrderDetail::join('httt_order', 'httt_order.id', '=', 'httt_orderdetail.order_id')
        // ->where([['httt_order.status', '!=', 1], ['httt_order.status', '!=', 0]])
        // ->where('product_id','=', $product->id)
        // ->sum('httt_orderdetail.qty');
        // $qty_store=0;
        // $qty_store= ProductStore::where('product_id','=', $product->id)
        // ->sum('qty');

        return view('components.product-home', compact('row_cat', 'product_list'));
    }
}
