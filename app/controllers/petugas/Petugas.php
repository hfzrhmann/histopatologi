<?php

class Petugas extends Controller {
    
    public function index () 
    {
        $data['judul'] = 'Dashboard';
        $data['jumlahPasien'] = $this->model('PasienModel')->getJumlahPasien();
        $data['jumlahSampel'] = $this->model('SampelModel')->getJumlahSampel();
        // $data['jumlahPemeriksa'] = $this->model('PemeriksaanModel')->getJumlahPemeriksaan();
        $data['jumlahLaporan'] = $this->model('LaporanModel')->getJumlahLaporan();
        $this->view('templates/petugas/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/petugas/footer');
    }
}