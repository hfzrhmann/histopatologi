<?php 

class AkunModel {
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAkun () 
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getAkunById ($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDataAkun ($data) 
    {
        $password = password_hash($data['password'], PASSWORD_DEFAULT); 
        $query = "INSERT INTO users (id, nama, username, password, email, role) 
                    VALUES
                    ('', :nama, :username, :password, :email, :role)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $password);
        $this->db->bind('email', $data['email']);
        $this->db->bind('role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataAkun ($data) 
    {

        if (!empty($data['password'])) {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            
            $query = "UPDATE users SET
                        nama = :nama, 
                        username = :username, 
                        password = :password, 
                        email = :email, 
                        role = :role
                        WHERE id = :id";
        }else {
            $query = "UPDATE users SET
                     nama = :nama, 
                     username = :username,
                     email = :email, 
                     role = :role
                     WHERE id = :id";
        }

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('id', $data['id']);
        
        if (!empty ($data['password'])) {
            $this->db->bind('password', $password);
        }
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataAkun ($id) 
    {
        $query = 'DELETE FROM users WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataAkun ()
    {
        $keyword = $_POST['keyword']?? '';
        $query = 'SELECT *  FROM users WHERE nama LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getJumlahAkun ()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM users");
        return $this->db->single()['total'];
    }

    public function getAkunByEmail ($email)
    {
        $this->db->query("SELECT * FROM ". $this->table ." WHERE email = :email");
        $this->db->bind(":email", trim($email));

        return $this->db->single();
    }
}