<?php 

class Dokter extends Controller {
        
    public function index ()
    {
        $data['judul'] = 'Data Dokter';

        $this->view('templates/petugas/header', $data);
        $this->view('pages/dokter/index');
        $this->view('templates/petugas/footer');
    }
}