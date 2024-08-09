<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MateriModel;
use App\Models\KursusModel;

class MateriController extends BaseController
{
    protected $MateriModel;
    protected $KursusModel;
    public function __construct()
    {
        $this->MateriModel = new MateriModel();
        $this->KursusModel = new KursusModel();
    }
    public function index($id)
    {
        $kursus = $this->KursusModel->find($id); // Mengambil data kursus berdasarkan ID
        $materi = $this->MateriModel->where('id_kursus', $id)->findAll(); // Mengambil materi berdasarkan ID kursus

        $data = [
            'kursus' => $kursus,
            'materi' => $materi,
        ];
        return view('materi/index', $data);
    }
    public function add($id)
    {
        $data = [
            'kursus' => $this->KursusModel->getKursus($id),
        ];
        return view('materi/add', $data);
    }    
    public function save($id)
    {
        $validate = $this->validate([
            'judul_materi' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'deskripsi_materi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'link_materi' => [
                'label' => 'Link',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        if ($validate) {
            $this->MateriModel->save([
                'judul_materi' => esc($this->request->getVar('judul_materi')),
                'deskripsi_materi' => esc($this->request->getVar('deskripsi_materi')),
                'link_materi' => esc($this->request->getVar('link_materi')),
                'id_kursus' => $id,
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('/kursus/detail/'.$id));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
    public function delete($id)
    {
        $id_kursus = $this->MateriModel->find($id)['id_kursus'];
        $this->MateriModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('/kursus/detail/'.$id_kursus));
    }
    public function edit($id)
    {
        $data = [
            'materi' => $this->MateriModel->getMateri($id),
            'kursus' => $this->KursusModel->getKursus($id),
        ];

        return view('materi/edit', $data);
    }

    public function update($id)
    {
        $validate = $this->validate([
            'judul_materi' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'deskripsi_materi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'link_materi' => [
                'label' => 'Link',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        $id_kursus = $this->MateriModel->find($id)['id_kursus'];

        if ($validate) {
            $this->MateriModel->save([
                'id_materi' => $id,
                'judul_materi' => esc($this->request->getVar('judul_materi')),
                'deskripsi_materi' => esc($this->request->getVar('deskripsi_materi')),
                'link_materi' => esc($this->request->getVar('link_materi')),
                'id_kursus' => $id_kursus,
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
            return redirect()->to(base_url('/kursus/detail/'.$id_kursus));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
