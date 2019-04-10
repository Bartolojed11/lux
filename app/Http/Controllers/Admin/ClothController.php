<?php
namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Cloth_cat as category;
use App\Cloth as cloth;
use App\cloth_img as cloth_img;
use App\Cloth_avlbty as cloth_avlbty;
use DB;

class ClothController extends Controller {
    public function __construct() {
        date_default_timezone_set("Singapore");
    }
    public function index() {
        $customers = DB::table('users')
        ->join('user_cart as uc','uc.user_id','users.id')
        ->select(DB::raw("concat_ws(' ', users.fname, users.mname, users.lname) as fullname"),'users.email','uc.created_at','users.id')
        ->distinct()
        ->where('uc.cart_stat_id', '=' , '1')
        ->get();
        return view('admin.pages.index')->with(['customers' => $customers]);
    }

    public function create()
    {
        $categories = category::orderBy('description','asc')->get();
        // return $categories->id;
        return view('admin.pages.add_clothes', compact('categories'));
    }

    public function store(Request $request)
    {
        $cloth = new cloth;
        $categories = category::all();
        $sale = $request->input('sale');
        $sale_ends = '';
        $sale_days = $request->input('days_sale');
        if($request->input('gender') == 'male' || $request->input('gender') == 'female') {
            $gen_path = $request->input('gender');
        } else {
            $gen_path = 'male';
        }
        $cat_id = $request->input('category');
        if($cat_id > 0 && $cat_id < 9) {
            $category = category::find($cat_id);
            $cat_path = $category->description;
        } else {
            $category = category::find(1);
            $cat_path = $category->description;
        }

        if(isset($sale) && $sale > 0) {
            $d = strtotime("+$sale_days days");
            $sale_ends = date("Y-m-d h:i:sa", $d);
        }
        $request->input('desc');

        if($request->hasFile('clothes_images')) {
            $cloth->description = $request->input('desc');
            $cloth->cl_cat_id = $cat_id;
            $cloth->price = $request->input('price');
            $cloth->sale = '.'.$sale;
            $cloth->sale_end = $sale_ends;
            $cloth->gender = $gen_path;
            if($cloth->save()) {
                foreach($request->file('clothes_images') as $image) {
                    $ext = $image->getClientOriginalExtension();
                    $file_name = $image->getClientOriginalName();
                    $path = $gen_path . '/' . $cat_path . '/';
                    $file_storage = pathinfo($file_name, PATHINFO_FILENAME) . '.' . $ext;
                    if(!file_exists($file_storage)) {
                        $image->move("public/storage/$path", $file_storage);
                    }

                    $cloth_img = new cloth_img;
                    $cloth_img->img = $path.$file_storage;
                    $cloth_img->cl_id = $cloth->id;
                    $cloth_img->save();
                }

                for($i = 0 ; $i < count($request->input('size')) ; $i++) {
                    $cloth_av = new cloth_avlbty;
                    $cloth_av->cl_id = $cloth->id;
                    $cloth_av->av_size = $request->input('size')[$i];
                    $cloth_av->qty = $request->input('qty')[$i];
                    $cloth_av->save();
                }
            }
        }
        return back()->with('success','Item Saved!');
    }

    public function show($item)
    {
        $categories = category::select('id')->where('description',$item)->get();
        $cloths = cloth::with('cloth_img')
                ->where('cl_cat_id',$categories[0]->id)->orderBy('updated_at','desc')->get();
        $cloths = cloth::select('id' , 'description' , 'price' , 'sale', 'sale_end')
                ->where('cl_cat_id',$categories[0]->id)
                ->orderBy('updated_at','desc')->get();
        return view('admin.pages.clothes')->with(['item'=>$item , 'cloths' => $cloths]);
    }

    public function edit($id)
    {
$cloth = cloth::find($id);
        $cloth_av = DB::table('cloth_avlbty as cloth_av')
                ->where('cloth_av.cl_id' ,  $id)
                ->select('cloth_av.*')
                ->get();
        $imgs = cloth_img::select('img')->where('cl_id',$id)->limit(3)->get();

        $cloth = cloth::with('cloth_img')->where('id',$id)->get();
        $categories = category::where('id','!=',$cloth[0]->cl_cat_id)->get();
        $sel_cloth_cath = category::find($cloth[0]->cl_cat_id);
        return view('admin.pages.edit_clothes', compact(['cloth','categories', 'sel_cloth_cath', 'cloth_av']));
    }

    public function update(Request $request, $id)
    {
        $cloth = cloth::find($id);
        $categories = category::all();
        $sale = $request->input('sale');
        $sale_ends = '';
        $sale_days = $request->input('days_sale');

        cloth_avlbty::where('cl_id',$id)->delete();

        $img_hidden = isset($request->input('img_hidden')[0]) ? $request->input('img_hidden') : array();
        if($request->input('gender') == 'male' || $request->input('gender') == 'female') {
            $gen_path = $request->input('gender');
        } else {
            $gen_path = 'male';
        }
        $cat_id = $request->input('category');
        if($cat_id > 0 && $cat_id < 9) {
            $category = category::find($cat_id);
            $cat_path = $category->description;
        } else {
            $category = category::find(1);
            $cat_path = $category->description;
        }

        if(isset($sale) && $sale > 0) {
            $d = strtotime("+$sale_days days");
            $sale_ends = date("Y-m-d h:i:sa", $d);
        }
        $request->input('desc');

        if($request->hasFile('clothes_images') || count($img_hidden) > 0) {
            $cloth->description = $request->input('desc');
            $cloth->cl_cat_id = $cat_id;
            $cloth->price = $request->input('price');
            $cloth->sale = $sale;
            if($sale_days > 0) {
                $cloth->sale_end = $sale_ends;
            }
            $cloth->gender = $gen_path;
            if($cloth->save()) {
                if($request->hasFile('clothes_images')) {
                    foreach($request->file('clothes_images') as $image) {
                        $ext = $image->getClientOriginalExtension();
                        $file_name = $image->getClientOriginalName();
                        $path = $gen_path . '/' . $cat_path . '/';
                        $file_storage = pathinfo($file_name, PATHINFO_FILENAME) . '.' . $ext;
                        if(!file_exists($file_storage)) {
                            $image->move("public/storage/$path", $file_storage);
                        }
    
                        $cloth_img = new cloth_img;
                        $cloth_img->img = $path.$file_storage;
                        $cloth_img->cl_id = $cloth->id;
                        $cloth_img->save();
                    }
                }
                

                for($i = 0 ; $i < count($request->input('size')) ; $i++) {
                    $cloth_av = new cloth_avlbty;
                    $cloth_av->cl_id = $cloth->id;
                    $cloth_av->av_size = $request->input('size')[$i];
                    $cloth_av->qty = $request->input('qty')[$i];
                    $cloth_av->save();
                }

                return back()->with('updated','Updated Successfully!!');
            }
        } else {
            return back()->with('error','Failed To Update!!');
        }
        
    }

    public function destroy($id)
    {
        cloth_img::where('cl_id',$id)->delete();
        $cloth = cloth::where('id',$id)->delete();
        $mess = 'deleted';
        return back()->with('mess',$mess);
    }

    public function showClothInfo($id) {
        $cloth = cloth::find($id);
        $cloth_av = DB::table('cloth_avlbty as cloth_av')
                ->where('cloth_av.cl_id' ,  $id)
                ->select('cloth_av.av_size' , 'cloth_av.qty')
                ->get();
        $imgs = cloth_img::select('img')->where('cl_id',$id)->limit(3)->get();
        return view('admin.pages.cloth-info')->with(['cloth' => $cloth , 'cloth_av' => $cloth_av , 'imgs' => $imgs]);
    }

    public function remove_avlbty($id) {
        cloth_avlbty::where('id',$id)->delete();
    }

    public function remove_item($id) {
        $cloth = cloth_img::where('id',$id)->delete();
    }

}
