<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KursusModel;

class KursusController extends BaseController
{
    protected $KursusModel;
    public function __construct()
    {
        $this->KursusModel = new KursusModel();
    }
    public function index()
    {
        $data = [
            'kursus' => $this->KursusModel->getKursus()
        ];
        return view('kursus/index', $data);
    }
    public function add()
    {
        return view('kursus/add');
    }
    public function save()
    {
        $validate = $this->validate([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'durasi' => [
                'label' => 'Durasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        if ($validate) {
            $this->KursusModel->save([
                'judul' => esc($this->request->getVar('judul')),
                'deskripsi' => esc($this->request->getVar('deskripsi')),
                'durasi' => esc($this->request->getVar('durasi'))
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('/kursus'));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
    public function delete($id)
    {
        $this->KursusModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('/kursus'));
    }
    public function edit($id)
    {
        $data = [
            'kursus' => $this->KursusModel->getKursus($id),
        ];
        return view('kursus/edit', $data);
    }
    public function update($id)
    {
        $validate = $this->validate([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'durasi' => [
                'label' => 'Durasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        if ($validate) {
            $this->KursusModel->save([
                'id_kursus' => $id,
                'judul' => esc($this->request->getVar('judul')),
                'deskripsi' => esc($this->request->getVar('deskripsi')),
                'durasi' => esc($this->request->getVar('durasi'))
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
            return redirect()->to(base_url('/kursus'));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
