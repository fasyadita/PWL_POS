<html>
    <body>
        <h1>Form Ubah Data User</h1>
        <a href="/user">Kembali</a>
        <br><br>

        <form method="POST" action="/user/ubah_simpan/{{ $data->user_id}}">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <label>Username</label>
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username">
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukka Nama">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password">
            <br>
            <label>Level ID</label>
            <input type="number" name="level_id" placeholder="Masukkan ID Level">
            <br><br>
            <input type="submit" class="btn btn-success" value="Simpan">
        </form>
    </body>
</html>