<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Import;
use App\Models\Importdetail;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ImportController extends Controller
{
    public function history() {
        $data = Import::with('admin:id,name')->get();
        return view('admin.import.history',['data'=>$data]);
    }

    public function detail($id) {
    $data = Importdetail::with(['import:id,code_import,importdate,supplier,status,unit_price,quantity','product:id,name'])->where('id_import',$id)->get();
        return view('admin.import.detail',['data'=>$data]);
    }

    public function import() {
        $data = Product::get();
        $data1 = Admin::get();
        return view('admin.import.import',[
            'data'=>$data,
            'data1'=>$data1,
        ]);
    }

    public function importform(Request $req) {
        $import = new Import();
        $import->code_import = $req->import_code;
        $import->importdate = $req->importdate;
        $import->supplier = $req->supplier;
        $import->status = $req->status;
        $import->unit_price = $req->unit_price;
        $import->quantity = $req->quantity;
        $import->id_admin = $req->id_admin;
        $import->save();

        $importdetail = new Importdetail();
        $importdetail->id_import = $import->id;
        $importdetail->id_product = $req->id_product;
        $importdetail->quantity = $req->quantity;
        $importdetail->save();

        return redirect()->route('admin.import.list')->with('success','Nhập kho thành công');
    }

    public function status($id) {
        $status = Import::find($id);
        if($status->status == 1){
            $status->status = '2';
        }
        else {
            $status->status = '1';
        }
        $status->save();

        return redirect()->route('admin.import.list');
    }

    public function importpdf($id) {
       $data1 = Importdetail::with(['import:id,code_import,importdate,supplier,status,unit_price,quantity','product:id,name'])->where('id_import',$id)->get();
       $data2 = Import::with('admin:id,name')->where('id',$id)->get();
        $pdf = PDF::loadview('admin.import.importPDF',[
            'data1'=>$data1,
            'data2'=>$data2,
        ]);
        return $pdf->download('import.pdf');
    }

    public function productlist() {
        $data1 = Importdetail::select(DB::raw('id_product, SUM(quantity) as sum'))->groupBy('id_product')->with('product:id,name')->get();
        $data2 = Orderdetail::select(DB::raw('product_id, SUM(single_quantity) as sum'))->groupBy('product_id')->with('product:id,name,status')->get();
        return view('admin.import.product',[
            'data1' => $data1,
            'data2' => $data2,
        ]);
        //  return response()->json($product, 200);
    }

    public function updateimport($id) {
        $pro = Product::find($id);
        if($pro->status == 1) {
            $pro->status = 0;
        }
        else {
            $pro->status = 1;
        }
        $pro->save();
        return redirect()->route('admin.import.listproduct')->with('success','Cập nhật thành công');
    }
}
