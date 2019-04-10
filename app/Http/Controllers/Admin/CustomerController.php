<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use App\User as customers;
use App\message as message;
class CustomerController extends Controller {
    //show customers list and orders
    public function showCustomersList() {
        $customers = DB::table('users')
                        ->rightJoin('user_cart as cart' , 'cart.user_id', 'users.id')
                        ->select('users.id', 'users.profile_picture' , DB::raw("concat_ws(' ', users.fname, users.mname, users.lname) as fullname")
                            , 'users.contact_no', 'users.email')
                            ->where('users.role_id' , '=' ,'2')
                            ->groupBy('users.id')
                            // ->having('cart.cart_stat_id' , '=' , 3)
                            // ->havingRaw('cart.cart_stat_id > 2')
                            ->where('cart.cart_stat_id',3)
                            // ->groupBy('users.id')
                            ->get();
        return view('admin.pages.customers')->with(['customers' => $customers]);
    }

    //for customers orders and basic details
    public function showCustomer($id) {
        $customer = customers::find($id);
        $customer_orders = DB::table('user_cart as uc')
                        // ->rightJoin('user_cart as uc', 'uc.user_id','users.id')
                        ->join('user_cart_item as uci' , 'uci.user_cart_id', 'uc.id')
                        ->join('cloth' , 'cloth.id' , 'uci.cl_id')
                        ->select('uc.created_at', 'uci.quantity', 'cloth.description' , 'cloth.price','uc.user_id')
                        ->where('uc.user_id',$id)
                        ->where('uc.cart_stat_id','3')
                        ->get();
                        // $customer_orders = DB::table('user_cart_item')
                        //                     ->select('user_cart_item.*');
                        //                     ->where('user_cart_id')->get();
                        // return $custocustomer_ordersmer;
        return view('admin.pages.customer-info')
        ->with(['customer'=>$customer , 'customer_orders' => $customer_orders ,'page-type' => 'ORDERS']);
    }

    //for cart request
    public function showCustomerCart($id) {
        $customer = customers::find($id);
        $req = DB::table('user_cart as cart')
                    ->join('user_cart_item as uci' , 'uci.user_cart_id' , 'cart.id')
                    ->join('cloth','cloth.id','=','uci.cl_id')
                    ->leftJoin('cloth_img as img','img.cl_id','=','cloth.id')
                    ->select('uci.quantity','uci.size','img.img', 'cloth.description', 'cloth.sale', 'cloth.price')
                    ->where('uci.user_id', '=', $id)
                    ->where('cart.cart_stat_id','1')
                    ->groupBy('uci.cl_id')
                    ->get();
        return view('admin.pages.customer-cart')
                ->with(['customer' => $customer, 'req' => $req, 'page-type' => 'CART']);
    }

    public function confirmCustomerCart(Request $request) {
        DB::table('user_cart')
            ->where('user_id', $request->id)
            ->where('cart_stat_id','1')
            ->update(['cart_stat_id' => 2]);
        return redirect('/admin/pages');
    }

    public function messageCustomer(Request $request) {
        $admin_id = Auth::user()->id;
        $convo_code = "convolux-";
        $message = new message;
        $message->convo_code = $convo_code . $request->id.'-'. $admin_id;
        $message->user_id = $request->id;
        $message->message = $request->message;
        $message->save();
        
        return redirect('/pages/admin')->with(['users' => users::where('role_id', '!=' , '1')->get() ]);
    }

    public function showOrdersOnDelivery() {
        $customers = DB::table('users')
        ->join('user_cart as uc','uc.user_id','users.id')
        ->select(DB::raw("concat_ws(' ', users.fname, users.mname, users.lname) as fullname"),'users.email','uc.created_at','users.id')
        ->distinct()
        ->where('uc.cart_stat_id', '=' , '2')
        ->get();
        return view('admin.pages.on-delivery')->with(['customers' => $customers]);
    }

    public function delivered(Request $request) {
        DB::table('user_cart')
        ->where('user_id', $request->id)
        ->where('cart_stat_id','2')
        ->update(['cart_stat_id' => 3]);
        return back();
    }

}
