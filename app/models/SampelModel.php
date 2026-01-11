<?php 

class SampelModel {
    private $table = 'sampel';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSampel () 
    {
        $this->db->query('SELECT '. $this->table. 
                            '.*, 
                            pasien.nama AS nama_pasien,
                            dokter.nama AS nama_dokter 
                            FROM '. $this->table .
                            ' JOIN pasien on pasien.id = sampel.id_pasien
                            JOIN dokter on dokter.id = sampel.id_dokter');
        return $this->db->resultSet();
    }

    public function getsampelById ($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getAllPasien ()
    {
        $query = "SELECT id, nama FROM pasien";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllDokter ()
    {
        $query = "SELECT id, nama FROM dokter";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataSampel ($data) 
    {

        $query = "INSERT INTO sampel (id, no_lab, id_pasien, id_dokter, jenis_sampel, anatomi, tanggal_masuk, kondisi_sampel) 
                    VALUES
                    ('', :no_lab, :id_pasien, :id_dokter, :jenis_sampel, :anatomi,:tanggal_masuk, :kondisi_sampel)";

        $this->db->query($query);
        $this->db->bind('no_lab', $data['no_lab']);
        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('jenis_sampel', $data['jenis_sampel']);
        $this->db->bind('anatomi', $data['anatomi']);
        $this->db->bind('tanggal_masuk', $data['tanggal_masuk']);
        $this->db->bind('kondisi_sampel', $data['kondisi_sampel']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataSampel ($data) 
    {
        $query = "UPDATE sampel SET
                     no_lab = :no_lab, 
                     id_pasien = :id_pasien, 
                     id_dokter = :id_dokter, 
                     jenis_sampel = :jenis_sampel, 
                     anatomi = :anatomi,
                     tanggal_masuk = :tanggal_masuk, 
                     kondisi_sampel = :kondisi_sampel
                     WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('no_lab', $data['no_lab']);
        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('jenis_sampel', $data['jenis_sampel']);
        $this->db->bind('anatomi', $data['anatomi']);
        $this->db->bind('tanggal_masuk', $data['tanggal_masuk']);
        $this->db->bind('kondisi_sampel', $data['kondisi_sampel']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSampel ($id) 
    {
        $query = 'DELETE FROM sampel WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataSampel ()
    {
        $keyword = $_POST['keyword']?? '';
        $query = 'SELECT *  FROM sampel WHERE nama LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getJumlahSampel ()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM sampel");
        return $this->db->single()['total'];
    }

    public function getPasienId ($id)
    {
        $query = "SELECT pasien.nama 
                    FROM sampel 
                    JOIN sampel ON pasien.id = sampel.id_pasien
                    WHERE paien.id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->resultSet();
    }
}