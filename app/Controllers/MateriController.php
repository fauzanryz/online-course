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
    public function index()
    {
        $data = [
            'materi' => $this->MateriModel->getMateri()
        ];
        return view('materi/index', $data);
    }
    public function add()
    {
        $data = [
            'kursus' => $this->KursusModel->getKursus(),
        ];
        return view('materi/add', $data);
    }
    public function save()
    {
        $validate = $this->validate([
            'link' => [
                'label' => 'Link',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        if ($validate) {
            $this->MateriModel->save([
                'link' => esc($this->request->getVar('link')),
                'id_kursus' => esc($this->request->getVar('id_kursus')),
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('/materi'));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
    public function delete($id)
    {
        $this->MateriModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('/materi'));
    }
    public function edit($id)
    {
        $data = [
            'materi' => $this->MateriModel->getMateri($id),
            'kursus' => $this->KursusModel->getKursus(),
        ];
        return view('materi/edit', $data);
    }
    public function update($id)
    {
        $validate = $this->validate([
            'link' => [
                'label' => 'Link',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ]);

        if ($validate) {
            $this->MateriModel->save([
                'id_materi' => $id,
                'link' => esc($this->request->getVar('link'))
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
            return redirect()->to(base_url('/materi'));
        } else {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
