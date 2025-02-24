<?php

class Siswa extends Controller{

    public function index()
    {
        $data['judul'] = 'Daftar Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getAllsiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->view('templates/header', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location:' . BASEURL . '/siswa');
            exit;
        } else {
                Flasher::setFlash('berhasil', 'ditambahkan', 'danger');
                header('location:' . BASEURL . '/siswa');
                exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Siswa_model')->hapusDataSiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location:' . BASEURL . '/siswa');
            exit;
        } else {
                Flasher::setFlash('berhasil', 'dihapus', 'danger');
                header('location:' . BASEURL . '/siswa');
                exit;
        }
    }
}

?>                                                                          