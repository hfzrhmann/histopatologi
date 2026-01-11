<?php

class Admin extends Controller {
    
    public function index () 
    {
        $data['judul'] = 'Dashboard';
        $data['jumlahPasien'] = $this->model('PasienModel')->getJumlahPasien();
        $data['jumlahDokter'] = $this->model('DokterModel')->getJumlahDokter();
        $this->view('templates/admin/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/admin/footer');
    }
}