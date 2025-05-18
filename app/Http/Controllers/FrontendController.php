<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailContact;
use App\Mail\MailResponse;
use App\Models\Order;
use App\Models\OrderDetail;

class FrontendController extends Controller
{

    public function home()
    {
        $category = Category::where('status', '1')->limit(3)->get();
        $banner = Banner::where('status', '1')->limit(3)->get();
        $brand = Brand::where('status', '1')->limit(5)->get();
        $productnew = Product::where('status', '1')->where('condition', '1')->where('discount', '=', '0')->orderBy('id', 'ASC')->limit(5)->get();
        $products = Product::where('status', '1')->where('is_featured', 1)->where('discount', '=', '0')->orderBy('id', 'DESC')->limit(5)->get();
        $posts = Post::where('status', '1')->limit(3)->get();
        return view('frontend.index')->with('banner', $banner)->with('productnew', $productnew)
            ->with('products', $products)->with('posts', $posts)->with('brand', $brand)
            ->with('category', $category);
    }

    public function productDetail($slug, Request $request)
    {
        $url = $request->url();
        $productDetail = Product::getProductBySlug($slug);
        $product_relate = Product::where('cat_id', $productDetail->id)->limit(5)->get();
        return view('frontend.pages.product-detail')->with('product_detail', $productDetail)
            ->with('product_relate', $product_relate)->with('url', $url);
    }

    public function contact()
    {
        $setting = Settings::first();
        return view('frontend.pages.contact')->with('setting', $setting);
    }

    public function postContact(Request $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'phone' => $request['phone'],
            'message' => $request['message'],
        ];
        Mail::to('hoang7620345@gmail.com')->send(new MailContact($data));

        Mail::to($request->email)->send(new MailResponse());
        return redirect()->back();
    }

    public function cart(Request $request)
    {
        $newcart = $request->session()->get('cart');
        return view('frontend.pages.cart')->with('newcart', $newcart);
    }

    public function checkout(Request $request)
    {
        $newcart = $request->session()->get('cart');
        return view('frontend.pages.checkout')->with('newcart', $newcart);
    }

    public function potsDetail($slug)
    {
        $post = Post::getPostBySlug($slug);
        $rcnt_post = Post::where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $postcate = PostCategory::where('status', '1')->limit(5)->get();
        return view('frontend.pages.blog-detail')->with('post', $post)
            ->with('postcate', $postcate)->with('recent', $rcnt_post);
    }

    public function productCat(Request $request)
    {
        $staticBanner = Banner::where('status', '1')->first();
        $products = Category::getProductByCat($request->slug);
        $category = Category::where('status', '1')->where('is_parent', '1')->limit(8)->get();
        return view('frontend.pages.product-lists')->with('products', $products->products)->with('category', $category)
            ->with('staticbanner', $staticBanner);
    }

    public function productCateSubCat(Request $request)
    {
        $staticBanner = Banner::where('status', '1')->first();
        $products = Category::getProductBySubCat($request->sub_slug);
        return view('frontend.pages.product-lists')->with('products', $products->sub_products)
            ->with('staticbanner', $staticBanner);
    }

    public function productsGrids()
    {
        $staticBanner = Banner::where('status', '1')->first();
        $products = Product::where('status', '1')->paginate(12);
        return view('frontend.pages.product-grids')->with('banners', $staticBanner)
            ->with('products', $products);
    }

    public function productGridsFilter(Request $request)
    {
        $banners = Banner::where('status', '1')->first();
        if (!empty($_POST['sort_by'])) {
            if ($_POST['sort_by'] == 'priceAsc') {
                $products = Product::where('status', '1')->orderBy('price', 'ASC')->get();
            }
            if ($_POST['sort_by'] == 'priceDesc') {
                $products = Product::where('status', '1')->orderBy('price', 'DESC')->get();
            }
            if ($_POST['sort_by'] == 'AZ') {
                $products = Product::where('status', '1')->orderBy('title', 'ASC')->get();
            }
            if ($_POST['sort_by'] == 'ZA') {
                $products = Product::where('status', '1')->orderBy('title', 'DESC')->get();
            }
            if ($_POST['sort_by'] == 'best-selling') {
                $products = DB::table('orders_detail')->select('soluong', DB::raw('count(soluong)'))
                    ->groupBy('soluong')->limit(3)->orderBy('soluong', 'DESC')->join('products', 'products.id', '=', 'orders_detail.product_id')->select('*')
                    ->join('orders', 'orders.id', '=', 'orders_detail.id_donhang')->get();
            }
            if ($_POST['sort_by'] == 'quantity-descending') {
                $products = Product::where('status', '1')->orderBy('stock', 'DESC')->get();
            }
            return view('frontend.pages.product-grids')->with('products', $products)
                ->with('banners', $banners);
        }
    }

    public function productListsFilter()
    {
        $banners = Banner::where('status', '1')->first();
        if (!empty($_POST['sort_by'])) {
            if ($_POST['sort_by'] == 'priceAsc') {
                $products = Product::where('status', '1')->orderBy('price', 'ASC')->get();
            }
            if ($_POST['sort_by'] == 'priceDesc') {
                $products = Product::where('status', '1')->orderBy('price', 'DESC')->get();
            }
            if ($_POST['sort_by'] == 'AZ') {
                $products = Product::where('status', '1')->orderBy('title', 'ASC')->get();
            }
            if ($_POST['sort_by'] == 'ZA') {
                $products = Product::where('status', '1')->orderBy('title', 'DESC')->get();
            }
            if ($_POST['sort_by'] == 'best-selling') {
                $products = DB::table('orders_detail')->select('soluong', DB::raw('count(soluong)'))
                    ->groupBy('soluong')->limit(3)->orderBy('soluong', 'DESC')->join('products', 'products.id', '=', 'orders_detail.product_id')->select('*')
                    ->join('orders', 'orders.id', '=', 'orders_detail.id_donhang')->get();
            }
            if ($_POST['sort_by'] == 'quantity-descending') {
                $products = Product::where('status', '1')->orderBy('stock', 'DESC')->get();
            }
            return view('frontend.pages.product-lists')->with('products', $products)
                ->with('staticbanner', $banners);
        }
    }

    public function productPriceSortBy()
    {
        $banners = Banner::where('status', '1')->first();
        if (!empty($_POST['price_sort'])) {
            if ($_POST['price_sort'] == 'price_1') {
                $products = Product::where('status', '1')->where('price', '<', '300000')->get();
            }
            if ($_POST['price_sort'] == 'price_2') {
                $products = Product::where('status', '1')->where('price', '>=', '300000')->where('price', '<=', '400000')->get();
            }
            if ($_POST['price_sort'] == 'price_3') {
                $products = Product::where('status', '1')->where('price', '>=', '400000')->where('price', '<=', '500000')->get();
            }
            if ($_POST['price_sort'] == 'price_4') {
                $products = Product::where('status', '1')->where('price', '>=', '500000')->where('price', '<=', '600000')->get();
            }
            if ($_POST['price_sort'] == 'price_5') {
                $products = Product::where('status', '1')->where('price', '>', '6000000')->get();
            }
        }
        return view('frontend.pages.product-lists')->with('staticbanner', $banners)
            ->with('products', $products);
    }

    public function productListSortBy(Request $request)
    {
        $staticBanner = Banner::where('status', '1')->first();
        if (isset($_POST['sort_by'])) {
            $sort_by = $_POST['sort_by'];
            if ($sort_by == '1') {
                $products = Product::where('status', '1')->where('price', '<', '300000')->get();
            } else if ($sort_by == '2') {
                $products = Product::where('status', '1')->where('price', '>=', '300000')->where('price', '<=', '400000')->get();
            } else if ($sort_by == '3') {
                $products = Product::where('status', '1')->where('price', '>=', '400000')->where('price', '<=', '500000')->get();
            }
        }
        return view('frontend.pages.product-lists')->with('products', $products)
            ->with('staticbanner', $staticBanner);
    }

    public function sizeSortBy(Request $request)
    {
        $staticBanner = Banner::where('status', '1')->first();
        if (isset($_POST['sort_by'])) {
            $sort_by = $_POST['sort_by'];
            if ($sort_by == '1') {
                $products = Product::where('status', '1')->where('size', 'S,M,L')->get();
            }
            return view('frontend.pages.product-lists')->with('products', $products)
                ->with('staticbanner', $staticBanner);
        }
    }
    public function productSubCat(Request $request)
    {
        $products = Category::getProductBySubCat($request->sub_slug);
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        if (request()->is('e-shop.loc/product-grids')) {
            return view('frontend.pages.product-grids')->with('products', $products->sub_products)->with('recent_products', $recent_products);
        } else {
            return view('frontend.pages.product-lists')->with('products', $products->sub_products)->with('recent_products', $recent_products);
        }
    }

    public function productBrand(Request $request)
    {
        $products = Brand::getProductByBrand($request->slug);
        return view('frontend.pages.product-lists')->with('products', $products);
    }


    public function productLists()
    {
        $products = Product::query();;
        $banners = Banner::where('status', '1')->first();
        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            // dd($slug);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id', $cat_ids)->paginate;
            // return $products;
        }
        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id', $brand_ids);
        }
        if (!empty($_GET['sort_by'])) {
            if ($_POST['sort_by'] == 'priceDesc') {
                $products = $products->orderBy('price', 'DESC');
            }
            if ($_POST['sort_by'] == 'priceAsc') {
                $products = $products->orderBy('price', 'ASC');
            }
            if ($_POST['sort_by'] == 'AZ') {
                $products = $products->orderBy('title', 'ASC');
            }
            if ($_POST['sort_by'] == 'ZA') {
                $products = $products->orderBy('title', 'DESC');
            }
            if ($_POST['sort_by'] == 'best-selling') {
                $products = DB::table('orders_detail')->select('soluong', DB::raw('count(soluong)'))
                    ->groupBy('soluong')->limit(3)->orderBy('soluong', 'DESC')->join('products', 'products.id', '=', 'orders_detail.product_id')->select('*')
                    ->join('orders', 'orders.id', '=', 'orders_detail.id_donhang')->get();
            }
            if ($_GET['sort_by'] == 'quantity-descending') {
                $products = $products->orderBy('stock', 'DESC');
            }
        }

        if (!empty($_GET['price'])) {
            if ($_GET['price'] == '1') {
                $products = $products->where('price', '<', '300000');
            }
            // $price = explode('-', $_GET['price']);
            // $products->whereBetween('price', $price);
        }
        if (!empty($_GET['show'])) {
            $products = $products->where('status', '1')->paginate($_GET['show']);
        } else {
            $products = $products->where('status', '1')->paginate(6);
        }
        //Sort by name , price, category
        return view('frontend.pages.product-lists')->with('products', $products)
            ->with('staticbanner', $banners);
    }

    public function productGridss()
    {
        $banners = Banner::where('status', '1')->first();
        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            // dd($slug);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id', $cat_ids);
            // return $products;
        }
        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id', $brand_ids);
        }
        if (!empty($_GET['sort_by'])) {
            if ($_GET['sort_by'] == 'priceDesc') {
                $products = $products->where('status', '1')->orderBy('price', 'DESC');
            }
            if ($_GET['sort_by'] == 'priceAsc') {
                $products = $products->orderBy('price', 'ASC');
            }
        }

        if (!empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products->whereBetween('price', $price);
        }
        if (!empty($_GET['show'])) {
            $products = $products->where('status', '1')->paginate($_GET['show']);
        } else {
            $products = $products->where('status', '1')->paginate(10);
        }
        return view('frontend.pages.product-grids')->with('products', $products)->with('banners', $banners);
    }


    public function productFilter(Request $request)
    {
        $data = $request->all();
        // return $data;
        $showURL = "";
        if (!empty($data['show'])) {
            $showURL .= '&show=' . $data['show'];
        }

        $sortByURL = '';
        if (!empty($data['sort_by'])) {
            $sortByURL .= '&sort_by=' . $data['sort_by'];
        }

        $catURL = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catURL)) {
                    $catURL .= '&category=' . $category;
                } else {
                    $catURL .= ',' . $category;
                }
            }
        }

        $brandURL = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandURL)) {
                    $brandURL .= '&brand=' . $brand;
                } else {
                    $brandURL .= ',' . $brand;
                }
            }
        }
        // return $brandURL;

        $priceRangeURL = "";
        if (!empty($data['price_range'])) {
            $priceRangeURL .= '&price=' . $data['price_range'];
        }
        if (request()->is('e-shop.loc/product-grids')) {
            return redirect()->route('product-grids', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        } else {
            return redirect()->route('product-list', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        }
    }

    public function productSearch(Request $request)
    {
        $products = Product::orwhere('title', 'like', '%' . $request->search . '%')
            ->orwhere('slug', 'like', '%' . $request->search . '%')
            ->orwhere('description', 'like', '%' . $request->search . '%')
            ->orwhere('summary', 'like', '%' . $request->search . '%')
            ->orwhere('price', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate('9');
        $countProduct = $products->count();
        return view('frontend.pages.product-search')->with('products', $products)
            ->with('countProduct', $countProduct);
    }

    public function blog()
    {
        $post = Post::where('status', '1')->paginate(6);
        return view('frontend.pages.blog')->with('posts', $post);
    }

    public function productGirdFilter()
    {
        $banners = Banner::first();
        // $products=Product::query();
        // if (isset($_POST['sort_by'])) {
        //     $sort_by = $_POST['sort_by'];
        //     if ($sort_by == '1') {
        //         $products = Product::where('status', '1')->orderBy('price', 'ASC')->paginate(8);
        //     } else if ($sort_by == '2') {
        //         $products = Product::where('status', '1')->orderBy('price', 'DESC')->paginate(8);
        //     } else if ($sort_by == '3') {
        //         $products = Product::where('status', '1')->orderby('title', 'ASC')->paginate(8);
        //     } else if ($sort_by == '4') {
        //         $products = Product::where('status', '1')->orderby('title', 'DESC')->paginate(8);
        //     } else if ($sort_by == '5') {
        //         $products=DB::table('orders_detail')->select('soluong',DB::raw('count(soluong)'))
        //         ->groupBy('soluong')->limit(3)->orderBy('soluong','DESC')->join('products','products.id','=','orders_detail.product_id')->select('*')
        //         ->join('orders','orders.id','=','orders_detail.id_donhang')->get();

        //     } else if ($sort_by == '6') {
        //         $products = Product::where('status', '1')->orderby('stock', 'DESC')->paginate(8);
        //     }
        //     return view('frontend.pages.product-grids')->with('products', $products)->with('banners', $banners);      // dd($products);
        // }

        if (!empty($_GET['sort_by'])) {
            if ($_GET['sort_by'] == 'priceDesc') {
                $products = Product::where('status', '1')->orderBy('price', 'DESC')->paginate(8);
            }
            if ($_GET['sort_by'] == 'priceAsc') {
                $products = Product::where('status', '1')->orderBy('price', 'ASC')->paginate(8);
            }
        }
        return view('frontend.pages.product-grids')->with('banners', $banners)
            ->with('products', $products);
    }

    public function productSales()
    {
        $staticBanner = Banner::where('status', '1')->first();
        $products = Product::where('status', '1')->where('discount', '>', '0')->paginate(8);
        return view('frontend.pages.product-grids')->with('products', $products)
            ->with('banners', $staticBanner);
    }
    public function login()
    {
        return view('frontend.pages.login');
    }

    public function register()
    {
        return view('frontend.pages.register');
    }
}
