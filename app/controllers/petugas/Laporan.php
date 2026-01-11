<?php 

class Laporan extends Controller {
   
    public function index ()
    {
        $data['judul'] = 'Laporan';
        $data['laporan'] = $this->model('LaporanModel')->getAllLaporan();
        $data['pasien'] = $this->model('PasienModel')->getAllPasien();
        $data['dokter'] = $this->model('DokterModel')->getAllDokter();
        $data['sampel'] = $this->model('SampelModel')->getAllSampel();
        $data['user'] = $this->model('AkunModel')->getAllAkun();

        $this->view('templates/petugas/header', $data);
        $this->view('pages/laporan/index', $data);
        $this->view('templates/petugas/footer');
    } 

    public function tambah ()
    {
        if ( $this->model('LaporanModel')->tambahDataLaporan($_POST) > 0) {
            Flasher::setFlash('Data laporan', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/admin/laporan');
            exit;
        }else {
            Flasher::setFlash('Data laporan','gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/admin/laporan');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('LaporanModel')->ubahDataLaporan($_POST) > 0) {
            Flasher::setFlash('Data laporan', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/admin/laporan');
            exit;
        }else {
            Flasher::setFlash('Data laporan', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/admin/laporan');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('LaporanModel')->hapusDataLaporan($id) > 0) {
            Flasher::setFlash('Data laporan', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/admin/laporan');
            exit;
        }else {
            Flasher::setFlash('Data laporan', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/admin/laporan');
            exit;
        };
    }

    public function getubah () 
    {
        echo json_encode($this->model('LaporanModel')->getLaporanById($_POST['id']));
    }

    public function cari ()
    {
        $data['judul'] = 'Data Laporan';
        $data['laporan'] = $this->model('LaporanModel')->cariDataLaporan();

        $this->view('templates/admin/header', $data);
        $this->view('pages/laporan/index', $data);
        $this->view('templates/admin/footer');
    }
}