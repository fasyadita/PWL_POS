<?php
 
 namespace App\Http\Controllers;
 
 use App\Models\UserModel;
 use App\Models\LevelModel;
 use Laravolt\Avatar\avatar;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Storage;
 
    class ProfileController extends Controller
    {
    public function index()
    {
         $user = UserModel::with('level')->find(Auth::id());
 
         if (!$user->pp) {
             $pp = new avatar();
             $filename = md5($user->username) . '.png';
             $path = 'pps/' . $filename;
             $fullPath = public_path($path);
 
             if (!file_exists(public_path('pps'))) {
                 mkdir(public_path('pps'), 0755, true);
             }
 
             $pp->create($user->nama)
                 ->setDimension(209)
                 ->setFontSize(100)
                 ->save($fullPath);
 
             $user->update(['pp' => $path]);
             $user->refresh();
         }
 
         $breadcrumb = (object) [
             'title' => 'Profile Pengguna',
             'list' => ['Home', 'User', 'Profile Setting'],
         ];
 
         $page = (object) [
             'title' => 'Profile Setting',
         ];
 
         $activeMenu = 'profile';
 
         return view('profile.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page, 'user' => $user]);
    }
 
    public function updatepp(Request $request)
    {
    $request->validate([
        'foto_profil' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ]);

    $user = UserModel::find(Auth::id());

    if ($request->hasFile('foto_profil')) {
        // Hapus foto lama kalau ada
        if ($user->foto_profil && file_exists(public_path($user->foto_profil))) {
            unlink(public_path($user->foto_profil));
        }

        // Simpan foto baru
        $filename = md5($user->username) . '.' . $request->foto_profil->extension();
        $path = 'images/' . $filename; // simpan di folder public/images
        $request->foto_profil->move(public_path('images'), $filename);

        // Update database
        $user->update(['foto_profil' => $filename]);

        return redirect('/profile')->with('success', 'Foto profil berhasil diubah');
    }

    return redirect('/profile')->with('error', 'Foto profil gagal diubah');
    }

 }