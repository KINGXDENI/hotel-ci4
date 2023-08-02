<?php

namespace App\Controllers;
use App\Models\HotelModel;

class Admin extends BaseController
{

    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!logged_in()) {
            // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
            return redirect()->to('login');
        }

        // Cek apakah pengguna memiliki role admin
        $isAdmin = service('authorization')->inGroup('admin', user_id());

        if (!$isAdmin) {
            // Jika tidak memiliki role admin, redirect ke halaman user/index atau halaman lain yang sesuai
            return redirect()->to('user/index');
        }

        $data['title'] = 'Admin List';
       
        $db     = \Config\Database::connect();
        $builder= $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('admin/listhotel', $data);
    }
    public function listUser()
    {
        // Cek apakah pengguna sudah login
        if (!logged_in()) {
            // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
            return redirect()->to('login');
        }

        // Cek apakah pengguna memiliki role admin
        $isAdmin = service('authorization')->inGroup('admin', user_id());

        if (!$isAdmin) {
            // Jika tidak memiliki role admin, redirect ke halaman user/index atau halaman lain yang sesuai
            return redirect()->to('user/index');
        }

        $data['title'] = 'Admin List';
       
        $db     = \Config\Database::connect();
        $builder= $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('admin/listuser', $data);
    }
    public function listHotel()
    {
        // Cek apakah pengguna sudah login
        if (!logged_in()) {
            // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
            return redirect()->to('login');
        }

        // Cek apakah pengguna memiliki role admin
        $isAdmin = service('authorization')->inGroup('admin', user_id());

        if (!$isAdmin) {
            // Jika tidak memiliki role admin, redirect ke halaman user/index atau halaman lain yang sesuai
            return redirect()->to('user/index');
        }
       
        $data['title'] = 'Admin List';
        $hotels = new HotelModel();
        $data['hotels'] = $hotels->findAll();
        return view('admin/listhotel', $data);
    }

    public function create()
    {
        // Cek apakah pengguna sudah login
        if (!logged_in()) {
            // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
            return redirect()->to('login');
        }

        // Cek apakah pengguna memiliki role admin
        $isAdmin = service('authorization')->inGroup('admin', user_id());

        if (!$isAdmin) {
            // Jika tidak memiliki role admin, redirect ke halaman user/index atau halaman lain yang sesuai
            return redirect()->to('user/index');
        }
       
        $data['title'] = 'Admin List';
        return view('admin/create', $data);
    }

     public function save()
{
    // Cek apakah pengguna sudah login
    if (!logged_in()) {
        // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->to('login');
    }

    // Cek apakah pengguna memiliki role admin
    $isAdmin = service('authorization')->inGroup('admin', user_id());

    if (!$isAdmin) {
        // Jika tidak memiliki role admin, redirect ke halaman user/index atau halaman lain yang sesuai
        return redirect()->to('user/index');
    }

    $data['title'] = 'Admin List';

    $filegambar = $this->request->getFile('gambar');

    if ($filegambar->isValid() && !$filegambar->hasMoved()) {
        $filegambar->move('upload');
        $namaGambar = $filegambar->getName();

        $hotels = new HotelModel();
        $hotels->save([
            'harga' => $this->request->getPost('harga'),
            'nama' => $this->request->getPost('nama'),
            'gambar' => $namaGambar,
            'lokasi' => $this->request->getPost('lokasi')
        ]);
    } else {
        // Penanganan kesalahan jika tidak ada file gambar yang dipilih
        // atau gagal memindahkan file gambar
        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengunggah file gambar.');
    }

    return redirect()->to('admin/listhotel')->with('status', 'Data hotel berhasil ditambah.');
}

     public function deleteHotel($id)
{
    // Cek apakah pengguna sudah login
    if (!logged_in()) {
        // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->to('login');
    }

    // Cek apakah pengguna memiliki role admin
    $isAdmin = service('authorization')->inGroup('admin', user_id());

    if (!$isAdmin) {
        // Jika tidak memiliki role admin, redirect ke halaman user/index atau halaman lain yang sesuai
        return redirect()->to('user/index');
    }

    // Hapus data hotel berdasarkan ID-nya
    $hotels = new HotelModel();
    $deleted = $hotels->delete($id);

    if ($deleted) {
        // Data berhasil dihapus
        // Tambahkan kode atau tampilkan pesan sukses sesuai kebutuhan
        return redirect()->to('admin/listhotel')->with('status', 'Data hotel berhasil dihapus.');
    } else {
        // Gagal menghapus data
        // Tambahkan kode atau tampilkan pesan error sesuai kebutuhan
        return redirect()->to('admin/listhotel')->with('error', 'Gagal menghapus data hotel.');
    }
}

public function edit($id)
{
    $data['title'] = 'Admin List';
    $model = new HotelModel();
    $data['hotel'] = $model->find($id);
    return view('admin/edit', $data);
}

public function update($id)
{
    $model = new HotelModel();
    $hotel = $model->find($id);

    if ($hotel) {
        $data = [
            'harga' => $this->request->getPost('harga'),
            'nama' => $this->request->getPost('nama'),
            'lokasi' => $this->request->getPost('lokasi')
        ];

        // Cek apakah ada file gambar baru yang diunggah
        $filegambar = $this->request->getFile('gambar');
        if ($filegambar->isValid() && !$filegambar->hasMoved()) {
            // Pindahkan file gambar baru ke direktori 'upload'
            $filegambar->move('upload');
            $namaGambar = $filegambar->getName();

            // Hapus file gambar lama jika ada
            if (!empty($hotel['gambar']) && file_exists('upload/' . $hotel['gambar'])) {
                unlink('upload/' . $hotel['gambar']);
            }

            // Update data hotel dengan file gambar baru
            $data['gambar'] = $namaGambar;
        }

        $model->update($id, $data);
        return redirect()->to('admin/listhotel')->with('status', 'Data hotel berhasil diedit.');
    } else {
        // Hotel tidak ditemukan, redirect atau tampilkan pesan kesalahan sesuai kebutuhan
        return redirect()->to('admin/listhotel')->with('error', 'Hotel not found.');
    }
}

}
