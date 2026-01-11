<?php 

class Dokter extends Controller {
        
    public function index ()
    {
        $data['judul'] = 'Data Dokter';
        $data['dokter'] = $this->model('DokterModel')->getAllDokter();
        $this->view('templates/admin/header', $data);
        $this->view('pages/dokter/index', $data);
        $this->view('templates/admin/footer');
    }

    public function tambah ()
    {
        if ( $this->model('DokterModel')->tambahDataDokter($_POST) > 0) {
            Flasher::setFlash('Data dokter', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/admin/dokter');
            exit;
        }else {
            Flasher::setFlash('Data Dokter','gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/admin/dokter');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('DokterModel')->ubahDataDokter($_POST) > 0) {
            Flasher::setFlash('Data dokter', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/admin/dokter');
            exit;
        }else {
            Flasher::setFlash('Data dokter', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/admin/dokter');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('DokterModel')->hapusDataDokter($id) > 0) {
            Flasher::setFlash('Data dokter', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/admin/dokter');
            exit;
        }else {
            Flasher::setFlash('Data dokter', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/admin/dokter');
            exit;
        };
    }

    public function getubah () 
    {
        echo json_encode($this->model('DokterModel')->getDokterById($_POST['id']));
    }

    public function cari ()
    {
        $data['judul'] = 'Data Dokter';
        $data['dokter'] = $this->model('DokterModel')->cariDataDokter();

        $this->view('templates/admin/header', $data);
        $this->view('pages/dokter/index', $data);
        $this->view('templates/admin/footer');
    }
}