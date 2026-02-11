<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AboutProfileModel;
use App\Models\AboutTeamModel;
use App\Models\AboutMitraModel;

class About extends BaseController
{
    protected $profileModel;
    protected $teamModel;
    protected $mitraModel;

    public function __construct()
    {
        $this->profileModel = new AboutProfileModel();
        $this->teamModel = new AboutTeamModel();
        $this->mitraModel = new AboutMitraModel(); 
    }

    public function index()
    {
        $data = [
            'title'   => 'Admin - Kelola Tentang Kami',
            'profile' => $this->profileModel->first(),
            'teams'   => $this->teamModel->findAll(),
            'mitra'   => $this->mitraModel->findAll() 
        ];
        return view('admin/about/index', $data);
    }

    // --- LOGIKA UPDATE PROFIL ---
    public function updateProfile()
    {
        $id = 1; 
        
        $data = [
            'slogan'         => $this->request->getPost('slogan'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
            'visi'           => $this->request->getPost('visi'),
            'misi'           => $this->request->getPost('misi'),
            'tahun_berdiri'  => $this->request->getPost('tahun_berdiri'),
            'jumlah_mitra'   => $this->request->getPost('jumlah_mitra'),
            'luas_lahan'     => $this->request->getPost('luas_lahan'),
            'persen_organik' => $this->request->getPost('persen_organik'),
        ];

        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->profileModel->update($id, $data);
        return redirect()->to('/admin/about')->with('success', 'Data Profil Berhasil Diperbarui!');
    }

    // --- LOGIKA TIM MANAJEMEN ---
    public function storeTeam()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File harus berupa gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/about')->with('error', 'Gagal upload foto. Pastikan format JPG/PNG.');
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('img/team', $namaFoto);

        $this->teamModel->save([
            'nama'      => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'linkedin'  => $this->request->getPost('linkedin'),
            'email'     => $this->request->getPost('email'),
            'instagram' => $this->request->getPost('instagram'),
            'foto'      => $namaFoto
        ]);

        return redirect()->to('/admin/about')->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function updateTeam()
    {
        $id = $this->request->getPost('id');
        $fileFoto = $this->request->getFile('foto');
        
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            if (!$this->validate([
                'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
            ])) {
                return redirect()->to('/admin/about')->with('error', 'Format foto salah atau terlalu besar.');
            }

            $fotoLama = $this->request->getPost('foto_lama');
            if ($fotoLama != 'default.jpg' && file_exists('img/team/' . $fotoLama)) {
                unlink('img/team/' . $fotoLama);
            }

            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/team', $namaFoto);
        } else {
            $namaFoto = $this->request->getPost('foto_lama');
        }

        $this->teamModel->save([
            'id'        => $id,
            'nama'      => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'email'     => $this->request->getPost('email'),
            'instagram' => $this->request->getPost('instagram'),
            'linkedin'  => $this->request->getPost('linkedin'),
            'foto'      => $namaFoto
        ]);

        return redirect()->to('/admin/about')->with('success', 'Data anggota tim berhasil diperbarui!');
    }

    public function deleteTeam($id)
    {
        $team = $this->teamModel->find($id);
        if ($team['foto'] != 'default.jpg' && file_exists('img/team/' . $team['foto'])) {
            unlink('img/team/' . $team['foto']);
        }

        $this->teamModel->delete($id);
        return redirect()->to('/admin/about')->with('success', 'Anggota tim dihapus!');
    }

    // --- LOGIKA BARU: MITRA STRATEGIS ---

    public function storeMitra()
    {
        // Validasi Upload Logo
        if (!$this->validate([
            'logo' => [
                'rules' => 'uploaded[logo]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]',
                'errors' => [
                    'uploaded' => 'Logo harus diunggah.',
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran file maksimal 2MB.'
                ]
            ],
            'nama' => 'required'
        ])) {
            return redirect()->to('/admin/about')->with('error', 'Gagal menyimpan mitra. Cek format file dan nama.');
        }

        // Proses Upload
        $fileLogo = $this->request->getFile('logo');
        $namaLogo = $fileLogo->getRandomName();
        $fileLogo->move('img/mitra', $namaLogo);

        // Simpan ke Database
        $this->mitraModel->save([
            'nama' => $this->request->getPost('nama'),
            'logo' => $namaLogo
        ]);

        return redirect()->to('/admin/about')->with('success', 'Mitra baru berhasil ditambahkan!');
    }

    public function deleteMitra($id)
    {
        $mitra = $this->mitraModel->find($id);

        if ($mitra) {
            // Hapus file logo dari folder
            if (file_exists('img/mitra/' . $mitra['logo'])) {
                unlink('img/mitra/' . $mitra['logo']);
            }
            
            $this->mitraModel->delete($id);
            return redirect()->to('/admin/about')->with('success', 'Data mitra berhasil dihapus!');
        }

        return redirect()->to('/admin/about')->with('error', 'Data mitra tidak ditemukan.');
    }
}