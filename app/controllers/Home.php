<?php

class Home extends Controller {

    public function index () 
    {
        $data['judul'] = 'Login';
        $this->view('home/index', $data);
    }

    public function prosesLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = strtolower(trim($_POST['email']));
                $password = $_POST['password'];
                $user = $this->model('AkunModel')->getAkunByEmail($email);
                if ($user) {
                    if (password_verify($password, $user['password'])) {

                        $_SESSION['is_login'] = true;
                        $_SESSION['nama']  = $user['nama'];
                        $_SESSION['username']  = $user['username'];
                        $_SESSION['role']  = $user['role'];
                        $_SESSION['email'] = $user['email'];

                        if ($user['role'] === 'admin') {
                            header('Location: ' . BASEURL . '/admin');
                        }elseif ($user['role'] === 'petugas') {
                            header('Location:'. BASEURL .'/petugas');
                        }else {
                            session_destroy();
                            Flasher::setFlash('Login Gagal!', '', 'Role tidak valid', 'danger');
                            header('Location: ' . BASEURL);
                        }
                        exit;

                    } else {
                        Flasher::setFlash('Login Gagal!', '', 'Password salah', 'danger');
                        header('Location: ' . BASEURL);
                        exit;
                    }
                    
                } else {
                    Flasher::setFlash('Login Gagal!', '', 'Akun Tidak Ditemukan', 'danger');
                    header('Location: ' . BASEURL);
                    exit;
                }
            }
        }

        public function logout () 
        {
            if (isset($_POST['logout'])) {
                session_start();
                session_destroy();
                header('location:'. BASEURL);
                exit();
            }
        }
    }