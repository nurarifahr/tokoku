<?php

namespace App\Http\Controllers;

use App\Models\PembelianDetail;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    public function index()
    {
        $id_pembelian = session('id_pembelian');
        $produk = Produk::orderBy('nama_produk')->get();
        $supplier = Supplier::find(session('id_supplier'));

        if(!$supplier){
            abort(404);
        }

        return view('pembelian_detail.index', compact('id_pembelian', 'produk', 'supplier'));
    }

    public function store(Request $request)
    {
        $produk = Produk::where('id_produk', $request->id_produk)->first();
        if(!$produk){
            return response()->json('Data gagal disimpan', 400);
        }
        $detail = new PembelianDetail();
        $detail->id_pembelian = $request->id_pembelian;
        $detail->id_produk = $produk->id_produk;
        $detail->harga_beli = $produk->harga_beli;
        $detail->jumlah =1;
        $detail->subtotal = $produk->harga_beli;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);

    }

    public function data($id)
    {
        $detail = PembelianDetail::with('produk')
        ->where('id_pembelian', $id)
        ->get();
        
        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('nama_produk', function($detail){
                return $detail->produk['nama_produk'];
            })
            ->addColumn('kode_produk', function($detail){
                return '<span class="label label-success">'.$detail->produk['kode_produk'].'</span>';
            })
            ->addColumn('harga_beli', function($detail){
                return 'Rp. '. $detail->harga_beli;
            })
            ->addColumn('jumlah', function($detail){
                return '<input type="number" class="form-control input-sm quantity" data-id="'.$detail->id_pembelian_detail.'" value="'.$detail->jumlah.'">';
            })
            ->addColumn('subtotal', function($detail){
                return 'Rp. '. $detail->subtotal;
            })
            ->addColumn('aksi', function($detail){
                return '<div class="btn-group">
                <button onclick ="deleteData(`'. route('pembelian_detail.destroy', $detail->id_pembelian_detail).'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
            })
            ->rawColumns(['aksi', 'kode_produk', 'jumlah'])
            ->make(true);
    }

    public function destroy($id)
    {
        $detail = PembelianDetail::find($id);
        $detail->delete();
        return response(null,204);
    }

    public function update(Request $request, $id)
    {
        $detail = PembelianDetail::find($id);
        $detail->jumlah = $request->jumlah;
        $detail->subtotal = $detail->harga_beli * $request->jumlah;
        $detail->update();
    }
}
