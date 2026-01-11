<?php 

class laporanModel {
    private $table = 'laporan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLaporan () 
    {
        // $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->query('SELECT '. $this->table . '.*,
                            pasien.nama AS nama_pasien,
                            dokter.nama AS nama_dokter,
                            sampel.no_lab AS no_lab,
                            sampel.anatomi AS anatomi,
                            users.nama AS nama_user
                            FROM '. $this->table
                            .' LEFT JOIN pasien ON pasien.id = laporan.id_pasien
                            LEFT JOIN sampel ON sampel.id = laporan.id_sampel
                            LEFT JOIN dokter ON dokter.id = laporan.id_dokter
                            LEFT JOIN users ON users.id = laporan.id_users');
        return $this->db->resultSet();
    }

    public function getLaporaById ($id)
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

    public function getAllSampel () 
    {
        $query = "SELECT sampel.id, 
                         sampel.no_lab, 
                         sampel.anatomi, 
                         dokter.id AS id_dokter, 
                         dokter.nama AS nama_dokter
                         FROM sampel
                         JOIN dokter ON dokter.id = sampel.id_dokter";                 
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllUser ()
    {
        $query = "SELECT id, nama FROM users";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataLaporan ($data) 
    {
        $query = "INSERT INTO laporan (id, id_pasien, id_dokter, id_sampel, id_users, makroskopis, mikroskopis, kesimpulan) 
                    VALUES
                    ('', :id_pasien, :id_dokter, :id_sampel, :id_users, :makroskopis, :mikroskopis, :kesimpulan)";

        $this->db->query($query);
        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('id_sampel', $data['id_sampel']);
        $this->db->bind('id_users', $data['id_users']);
        $this->db->bind('makroskopis', $data['makroskopis']);
        $this->db->bind('mikroskopis', $data['mikroskopis']);
        $this->db->bind('kesimpulan', $data['kesimpulan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataLaporan ($data) 
    {
        $query = "UPDATE laporan SET
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

    public function hapusDataLaporan ($id) 
    {
        $query = 'DELETE FROM laporan WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataLaporan ()
    {
        $keyword = $_POST['keyword']?? '';
        $query = 'SELECT *  FROM laporan WHERE nama LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getJumlahLaporan ()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM laporan");
        return $this->db->single()['total'];
    }
}