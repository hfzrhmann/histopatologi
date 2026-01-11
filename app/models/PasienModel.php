<?php 

class PasienModel {
    private $table = 'pasien';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPasien () 
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getPasienById ($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDataPasien ($data) 
    {
        $query = "INSERT INTO pasien (id, nama, nik, jenis_kelamin, umur, no_hp, alamat) 
                    VALUES
                    ('', :nama, :nik, :jenis_kelamin, :umur, :no_hp, :alamat)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('alamat', $data['alamat']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPasien ($data) 
    {
        $query = "UPDATE pasien SET
                     nama = :nama, 
                     nik = :nik, 
                     jenis_kelamin = :jenis_kelamin, 
                     umur = :umur, 
                     no_hp = :no_hp, 
                     alamat = :alamat
                     WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPasien ($id) 
    {
        $query = 'DELETE FROM pasien WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataPasien ()
    {
        $keyword = $_POST['keyword']?? '';
        $query = 'SELECT *  FROM pasien WHERE nama LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getJumlahPasien ()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM pasien");
        return $this->db->single()['total'];
    }

}