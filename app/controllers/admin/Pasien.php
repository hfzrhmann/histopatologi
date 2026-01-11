<?php 

class Pasien extends Controller {

    public function index ()
    {
        $data['judul'] = 'Pasien';
        $data['pasien'] = $this->model('PasienModel')->getAllPasien();

        $this->view('templates/admin/header', $data);
        $this->view('pages/pasien/index', $data);
        $this->view('templates/admin/footer');
    }

    // public function detail ($id)
    // {
    //     $data['judul'] = 'Detail Pasien';
    //     $data['pasien'] = $this->model('PasienModel')->getPasienById($id);

    //     $this->view('templates/admin/header', $data);
    //     $this->view('pages/pasien/detail', $data);
    //     $this->view('templates/admin/footer');
    // }

    public function tambah ()
    {
        if ( $this->model('PasienModel')->tambahDataPasien($_POST) > 0) {
            Flasher::setFlash('Data dokter', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/admin/pasien');
            exit;
        }else {
            Flasher::setFlash('Data dokter', 'gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/admin/pasien');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('PasienModel')->ubahDataPasien($_POST) > 0) {
            Flasher::setFlash('Data dokter', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/admin/pasien');
            exit;
        }else {
            Flasher::setFlash('Data dokter', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/admin/pasien');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('PasienModel')->hapusDataPasien($id) > 0) {
            Flasher::setFlash('Data dokter', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/admin/pasien');
            exit;
        }else {
            Flasher::setFlash('Data dokter', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/admin/pasien');
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

        $this->view('templates/admin/header', $data);
        $this->view('pages/pasien/index', $data);
        $this->view('templates/admin/footer');
    }
}