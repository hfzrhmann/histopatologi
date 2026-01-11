<?php 

class PemeriksaanModel {
    private $table = 'pemeriksaan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPemeriksaan () 
    {
        $this->db->query('SELECT '. $this->table .'.*,
                            pasien.nama AS namaPasien,
                            dokter.nama AS namaDokter,
                            sampel.no_lab AS noLab,
                            sampel.created_at AS tanggalMasuk
                            FROM '. $this->table . ' 
                            LEFT JOIN pasien ON pasien.id = pemeriksaan.id_pasien
                            LEFT JOIN dokter ON dokter.id = pemeriksaan.id_dokter
                            LEFT JOIN sampel ON sampel.id = pemeriksaan.id_sampel');
        return $this->db->resultSet();
    }

    public function getPemeriksaanById ($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDataPemeriksaan ($data) 
    {
        $query = "INSERT INTO ". $this->table ." (id, id_pasien, id_dokter, id_sampel, gambar, status) 
                    VALUES
                    ('', :id_pasien, :id_dokter, :id_sampel, :gambar, :status)";

        $this->db->query($query);
        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('id_sampel', $data['id_sampel']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPemeriksaan ($data) 
    {
        $query = 'UPDATE '. $this->table .' SET
                     id_pasien = :id_pasien, 
                     id_dokter = :id_dokter, 
                     id_sampel = :id_sampel, 
                     gambar = :gambar, 
                     status = :status
                     WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('id_sampel', $data['id_sampel']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPemeriksaan ($id) 
    {
        $query = 'DELETE FROM '. $this->table .' WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataPemeriksaan ()
    {
        $keyword = $_POST['keyword']?? '';
        $query = 'SELECT '. $this->table .'.*,
                            pasien.nama AS namaPasien,
                            dokter.nama AS namaDokter,
                            sampel.no_lab AS noLab,
                            sampel.created_at AS tanggalMasuk
                            FROM '. $this->table . ' 
                            LEFT JOIN pasien ON pasien.id = pemeriksaan.id_pasien
                            LEFT JOIN dokter ON dokter.id = pemeriksaan.id_dokter
                            LEFT JOIN sampel ON sampel.id = pemeriksaan.id_sampel
                            WHERE status LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getJumlahPemeriksaan ()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM ". $this->table);
        return $this->db->single()['total'];
    }

}