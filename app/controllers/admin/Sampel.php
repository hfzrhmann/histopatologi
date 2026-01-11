<?php 

class Sampel extends Controller {

    public function index ($id = null)
    {
        $data['judul'] = 'Data Sampel';
        $data['sampel'] = $this->model('SampelModel')->getAllSampel();
        $data['pasien'] = $this->model('SampelModel')->getAllPasien();
        $data['dokter'] = $this->model('SampelModel')->getAllDokter();
        // if ($id !== null) {
        // $data['pasien'] = $this->model('SampelModel')->getPasienId($id);
        // }else {
        //     $data['pasien'] = null;
        // };
        $this->view('templates/admin/header', $data);
        $this->view('pages/sampel/index', $data);
        $this->view('templates/admin/footer');
    }

    public function tambah ()
    {
        if ( $this->model('SampelModel')->tambahDataSampel($_POST) > 0) {
            Flasher::setFlash('Data sampel', 'berhasil', 'ditambahkan', 'primary');
            header('Location:' . BASEURL . '/admin/sampel');
            exit;
        }else {
            Flasher::setFlash('Data sample','gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/admin/sampel');
            exit;
        };
    }

    public function ubah ()
    {
        if ( $this->model('SampelModel')->ubahDataSampel($_POST) > 0) {
            Flasher::setFlash('Data sampel', 'berhasil', 'diubahkan', 'primary');
            header('Location:' . BASEURL . '/admin/sampel');
            exit;
        }else {
            Flasher::setFlash('Data sampel', 'gagal', 'diubahkan', 'danger');
            header('Location:' . BASEURL . '/admin/sampel');
            exit;
        };
    }

    public function hapus ($id)
    {
        if ( $this->model('SampelModel')->hapusDataSampel($id) > 0) {
            Flasher::setFlash('Data sampel', 'berhasil', 'dihapuskan', 'primary');
            header('Location:' . BASEURL . '/admin/sampel');
            exit;
        }else {
            Flasher::setFlash('Data sampel', 'gagal', 'dihapuskan', 'danger');
            header('Location:' . BASEURL . '/admin/sampel');
            exit;
        };
    }

    public function getubah () 
    {
        echo json_encode($this->model('SampelModel')->getSampelById($_POST['id']));
    }

    public function cari ()
    {
        $data['judul'] = 'Data Sampel';
        $data['sampel'] = $this->model('SampelModel')->cariDataSampel();

        $this->view('templates/admin/header', $data);
        $this->view('pages/sampel/index', $data);
        $this->view('templates/admin/footer');
    }
}
