<?php 

class Pemeriksaan extends Controller {

    public function index ()
    {
        $data['judul'] = 'Pemeriksaan';
        $data['pemeriksaan'] = $this->model('PemeriksaanModel')->getAllPemeriksaan();
        $data['pasien'] = $this->model('PasienModel')->getAllPasien();
        $data['dokter'] = $this->model('DokterModel')->getAllDokter();
        $data['sampel'] = $this->model('SampelModel')->getAllSampel();

        $this->view('templates/petugas/header', $data);
        $this->view('pages/pemeriksaan/index', $data);
        $this->view('templates/petugas/footer');
    }

    public function tambah ()
    {
        if ( $this->model('PemeriksaanModel')->tambahDataPemeriksaan($_POST) > 0) {
            Flasher::setFlash('Data Pemeriksaan', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/petugas/pemeriksaan');
            exit;
        }else {
            Flasher::setFlash('Data Pemeriksaan', 'gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/petugas/pemeriksaan');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('PemeriksaanModel')->ubahDataPemeriksaan($_POST) > 0) {
            Flasher::setFlash('Data Pemeriksaan', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/petugas/pemeriksaan');
            exit;
        }else {
            Flasher::setFlash('Data Pemeriksaan', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/petugas/pemeriksaan');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('PemeriksaanModel')->hapusDataPemeriksaan($id) > 0) {
            Flasher::setFlash('Data Pemeriksaan', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/petugas/pemeriksaan');
            exit;
        }else {
            Flasher::setFlash('Data Pemeriksaan', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/petugas/pemeriksaan');
            exit;
        };
    }

    public function getubah () 
    {
        echo json_encode($this->model('PemeriksaanModel')->getPemeriksaanById($_POST['id']));
    }

    public function cari ()
    {
        $data['judul'] = 'pemeriksaan';
        $data['pemeriksaan'] = $this->model('PemeriksaanModel')->cariDataPemeriksaan();

        $this->view('templates/petugas/header', $data);
        $this->view('pages/pemeriksaan/index', $data);
        $this->view('templates/petugas/footer');
    }
}