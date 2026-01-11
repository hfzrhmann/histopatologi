<?php 

class Pasien extends Controller {

    public function index ()
    {
        $data['judul'] = 'Pasien';
        $data['pasien'] = $this->model('PasienModel')->getAllPasien();

        $this->view('templates/petugas/header', $data);
        $this->view('pages/pasien/index', $data);
        $this->view('templates/petugas/footer');
    }

    public function tambah ()
    {
        if ( $this->model('PasienModel')->tambahDataPasien($_POST) > 0) {
            Flasher::setFlash('Data pasien', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/petugas/pasien');
            exit;
        }else {
            Flasher::setFlash('Data pasien', 'gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/petugas/pasien');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('PasienModel')->ubahDataPasien($_POST) > 0) {
            Flasher::setFlash('Data pasien', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/petugas/pasien');
            exit;
        }else {
            Flasher::setFlash('Data pasien', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/petugas/pasien');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('PasienModel')->hapusDataPasien($id) > 0) {
            Flasher::setFlash('Data pasien', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/petugas/pasien');
            exit;
        }else {
            Flasher::setFlash('Data pasien', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/petugas/pasien');
            exit;
        };
    }

    public function getubah () 
    {
        echo json_encode($this->model('PasienModel')->getPasienById($_POST['id']));
    }

    public function cari ()
    {
        $data['judul'] = 'Pasien';
        $data['pasien'] = $this->model('PasienModel')->cariDataPasien();

        $this->view('templates/petugas/header', $data);
        $this->view('pages/pasien/index', $data);
        $this->view('templates/petugas/footer');
    }
}