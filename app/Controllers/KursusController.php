<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KursusModel;
use App\Models\MateriModel;

class KursusController extends BaseController
{
    protected $KursusModel;
    protected $MateriModel;
    public function __construct()
    {
        $this->KursusModel = new KursusModel();
        $this->MateriModel = new MateriModel();
    }
    public function index()
    {
        $kursus = $this->KursusModel->getKursus();
        $materi = $this->MateriModel->getMateri();
    
        $groupedMateri = [];
        foreach ($materi as $mtr) {
            $groupedMateri[$mtr['id_kursus']][] = $mtr;
        }
    
        $data = [
            'kursus' => $kursus,
            'groupedMateri' => $groupedMateri
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
            'judul_kursus' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'deskripsi_kursus' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'durasi_kursus' => [
                'label' => 'Durasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        if ($validate) {
            $this->KursusModel->save([
                'judul_kursus' => esc($this->request->getVar('judul_kursus')),
                'deskripsi_kursus' => esc($this->request->getVar('deskripsi_kursus')),
                'durasi_kursus' => esc($this->request->getVar('durasi_kursus'))
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
            'judul_kursus' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'deskripsi_kursus' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'durasi_kursus' => [
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
                'judul_kursus' => esc($this->request->getVar('judul_kursus')),
                'deskripsi_kursus' => esc($this->request->getVar('deskripsi_kursus')),
                'durasi_kursus' => esc($this->request->getVar('durasi_kursus'))
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
            return redirect()->to(base_url('/kursus'));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
