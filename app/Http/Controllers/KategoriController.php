<?php

namespace App\Http\Controllers;

use KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\KategoriModel as ModelsKategoriModel;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama'=>'Camilan']);
        // return 'Update data berhasil. Jumlah data yang di update: ' .$row. 'baris';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Update data berhasil. Jumlah data yang di hapus: ' .$row. 'baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori',['data' => $data]);
        $breadcrumb = (object)[
            'title' => 'Daftar Kategori ',
            'list' => ['Home', 'kategori']
        ];

        $page = (object)[
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; //set menu yang aktif

        $kategori = ModelsKategoriModel::all(); //set menu yang sedang aktif

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $kategori = ModelsKategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        // filter data user brdasarkan kategori_id
        if ($request->kategori_id) {
            $kategori->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategori)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
                //                 $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                //                 $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                //                 $btn .= '<form class="d-inline-block" method="POST" action="' .
                //                     url('/kategori/' . $kategori->kategori_id) . '">'
                //                     . csrf_field() . method_field('DELETE') .
                //                     '<button type="submit" class="btn btn-danger btn-sm" onclick="return
                // confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';

                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';

                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';

                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    // Menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah kategori baru'
        ];

        $activeMenu = 'Kategori'; // set menu yang sedang aktif

        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:5',
            'kategori_nama' => 'required|string|max:100'
        ]);

        ModelsKategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id)
    {
        $kategori = ModelsKategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail kategori',
            'list'  => ['Home', 'kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Kategori'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'kategori'       => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $kategori = ModelsKategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit kategori',
            'list'  => ['Home', 'kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kategori'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:5',
            'kategori_nama' => 'required|string|max:100'
        ]);

        ModelsKategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data  berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = ModelsKategoriModel::find($id);
        if (!$check) {
            // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/kategori')->with('error', 'Data user tidak ditemukan');
        }

        try {
            ModelskategoriModel::destroy($id); // Hapus data kategori
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax()
     {
         return view('kategori.create_ajax');
     }

     public function store_ajax(Request $request)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'kategori_kode' => 'required|string|max:5',
                 'kategori_nama' => 'required|string|max:100',
             ];
 
             $validator = Validator::make($request->all(), $rules);
 
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(),
                 ]);
             }
 
             ModelsKategoriModel::create($request->all());
 
             return response()->json([
                 'status' => true,
                 'message' => 'Data kategori berhasil disimpan',
             ]);
         }
         return redirect('/');
     }
 
     public function edit_ajax(string $id)
     {
         $kategori = ModelsKategoriModel::find($id);
 
         return view('kategori.edit_ajax', ['kategori' => $kategori]);
     }

     public function update_ajax(Request $request, string $id)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'kategori_kode' => 'required|string|max:5',
                 'kategori_nama' => 'required|string|max:100',
             ];
 
             $validator = Validator::make($request->all(), $rules);
 
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(),
                 ]);
             }
             $check = ModelsKategoriModel::find($id);
             if ($check) {
                 $check->update($request->all());
                 return response()->json([
                     'status' => true,
                     'message' => 'Data kategori berhasil diubah',
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Data kategori tidak ditemukan',
                 ]);
             }
         }
         return redirect('/');
     }
 
     public function confirm_ajax(string $id)
     {
         $kategori = ModelsKategoriModel::find($id);
 
         return view('kategori.confirm_ajax', ['kategori' => $kategori]);
     }
 
     public function delete_ajax(Request $request, string $id)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $kategori = ModelsKategoriModel::find($id);
             if ($kategori) {
                 $kategori->delete();
                 return response()->json([
                     'status' => true,
                     'message' => 'Data kategori berhasil dihapus',
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Data kategori tidak ditemukan',
                 ]);
             }
         }
         return redirect('/');
     }
 
 
}
