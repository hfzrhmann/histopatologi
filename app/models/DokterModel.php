<?php 

class DokterModel {
    private $table = 'dokter';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDokter () 
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getDokterById ($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDataDokter ($data) 
    {
        $query = "INSERT INTO dokter (id, nip, nama, jenis_kelamin, spesialis, no_hp, email) 
                    VALUES
                    ('', :nip, :nama, :jenis_kelamin, :spesialis, :no_hp, :email)";

        $this->db->query($query);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('spesialis', $data['spesialis']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataDokter ($data) 
    {
        $query = "UPDATE dokter SET
                     nip = :nip, 
                     nama = :nama, 
                     jenis_kelamin = :jenis_kelamin, 
                     spesialis = :spesialis, 
                     no_hp = :no_hp, 
                     email = :email
                     WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('spesialis', $data['spesialis']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataDokter ($id) 
    {
        $query = 'DELETE FROM dokter WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataDokter ()
    {
        $keyword = $_POST['keyword']?? '';
        $query = 'SELECT *  FROM dokter WHERE nama LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getJumlahDokter ()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM dokter");
        return $this->db->single()['total'];
    }
}