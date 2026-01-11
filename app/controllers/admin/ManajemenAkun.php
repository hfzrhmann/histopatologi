<?php 

class ManajemenAkun extends Controller {

    public function index ()
    {
        $data['judul'] = 'Manajemen Akun';
        $data['akun'] = $this->model('AkunModel')->getAllAkun();
        $this->view('templates/admin/header', $data);
        $this->view('pages/manajemen/index', $data);
        $this->view('templates/admin/footer');
    }

    public function tambah ()
    {
        if ( $this->model('AkunModel')->tambahDataAkun($_POST) > 0) {
            Flasher::setFlash('Data akun', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/admin/manajemenAkun');
            exit;
        }else {
            Flasher::setFlash('Data akun','gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/admin/manajemenAkun');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('AkunModel')->ubahDataAkun($_POST) > 0) {
            Flasher::setFlash('Data akun', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/admin/manajemenAkun');
            exit;
        }else {
            Flasher::setFlash('Data akun', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/admin/manajemenAkun');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('AkunModel')->hapusDataAkun($id) > 0) {
            Flasher::setFlash('Data akun', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/admin/manajemenAkun');
            exit;
        }else {
            Flasher::setFlash('Data akun', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/admin/manajemenAkun');
            exit;
        };
    }

    public function getubah () 
    {
        echo json_encode($this->model('AkunModel')->getAkunById($_POST['id']));
    }

    public function cari ()
    {
        $data['judul'] = 'Data Akun';
        $data['akun'] = $this->model('AkunModel')->cariDataAkun();

        $this->view('templates/admin/header', $data);
        $this->view('pages/manajemen/index', $data);
        $this->view('templates/admin/footer');
    }
}