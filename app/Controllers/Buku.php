<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\BorrowsModel;
use App\Models\HistoryModel;
use App\Models\PenulisModel;
use App\Models\PenerbitModel;
 
class Buku extends BaseController
{
    protected $model, $buku, $penulis, $penerbit;

    public function __construct()
    {
        $this->model = new BooksModel();
        $this->pinjam = new BorrowsModel();
        $this->history = new HistoryModel();
        $this->penulis = new PenulisModel();
        $this->penerbit = new PenerbitModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->model->search($keyword);
        } else {
            $buku = $this->model->findAll();
        }
        $data = [
            'title'  => "Books | E-Library",
            'penulis' => $this->penulis->findAll(),
            'penerbit' => $this->penerbit->findAll(),
            'buku' => $buku
        ];
        return view('buku/index', $data);
    }

    public function show($id = null)
    {
        $book = $this->model->find($id);
        return $this->respond($book, 200);
    }

    public function save()
    {
        $coverFile = $this->request->getFile('gambar');
        if ($coverFile->getError() == 4) {
            $coverName = "default.png";
        } else {
            $coverName = $coverFile->getName();
            $coverFile->move('cover');
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $bookFile = $this->request->getFile('file');
        if ($bookFile->getError() == 4) {
            $fileName = "default.pdf";
        } else {
            $fileName = $bookFile->getName();
            $bookFile->move('files');
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);

        if ($this->validate($this->model->validationRules)) {
            $data = [
                'id_buku' => $this->model->getIDBuku(),
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'id_penulis' => $this->request->getVar('id_penulis'),
                'id_penerbit' => $this->request->getVar('id_penerbit'),
                'kategori' => $this->request->getVar('kategori'),
                'genre' => $this->request->getVar('genre'),
                'gambar' => $coverName,
                'stok' => $this->request->getVar('stok'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'file' => $fileName,
            ];
            $this->model->insert($data);

            session()->setFlashdata('msg', 'Buku berhasil ditambahkan.');
            return redirect()->to('/admin/buku');
        } else {
            session()->setFlashdata('judul', $this->validator->getError('judul'));
            session()->setFlashdata('id_penulis', $this->validator->getError('id_penulis'));
            session()->setFlashdata('id_penerbit', $this->validator->getError('id_penerbit'));
            session()->setFlashdata('kategori', $this->validator->getError('kategori'));
            session()->setFlashdata('genre', $this->validator->getError('genre'));
            session()->setFlashdata('stok', $this->validator->getError('stok'));
            session()->setFlashdata('deskripsi', $this->validator->getError('deskripsi'));

            return redirect()->to('/buku/create')->withInput();
        }
    }
    public function find($word)
    {
        $data = $this->model->search($word);
        if ($data) {
            return $this->respond(['buku' => $data], 200);
        } else {
            return $this->fail(['message' => "Data Not Found!"], 409);
        }
    }

    public function update($id)
    {
        $bukuLama = $this->model->getBuku($id);
        if ($bukuLama[0]['judul'] == $this->request->getVar('judul')) {
            $this->model->setValidationRule('judul', 'required');
        } else {
            $this->model->setValidationRule('judul', 'required|is_unique[buku.judul]');
        }

        $coverFile = $this->request->getFile('gambar');
        if ($coverFile->getError() == 4) {
            $coverName = $this->request->getVar('oldcover');
        } else {
            $coverName = $coverFile->getName();
            $coverFile->move('cover');
            if ($this->request->getVar('oldcover') != 'default.png') {
                unlink('cover/' . $this->request->getVar('oldcover'));
            }
        }

        $bookFile = $this->request->getFile('file');
        if ($bookFile->getError() == 4) {
            $fileName = $this->request->getVar('oldfile');
        } else {
            $fileName = $bookFile->getName();
            $bookFile->move('files');
            if ($this->request->getVar('oldfile') != 'default.pdf') {
                unlink('files/' . $this->request->getVar('oldfile'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'id_penulis' => $this->request->getVar('id_penulis'),
            'id_penerbit' => $this->request->getVar('id_penerbit'),
            'kategori' => $this->request->getVar('kategori'),
            'genre' => $this->request->getVar('genre'),
            'gambar' => $coverName,
            'stok' => $this->request->getVar('stok'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'file' => $fileName,
        ];
        if ($this->validate($this->model->validationRules)) {
            $this->model->update($id, $data);
            session()->setFlashdata('msg', 'Data buku berhasil diubah.');
            return redirect()->to('admin/buku');
        } else {
            session()->setFlashdata('judul', $this->validator->getError('judul'));
            session()->setFlashdata('id_penulis', $this->validator->getError('id_penulis'));
            session()->setFlashdata('id_penerbit', $this->validator->getError('id_penerbit'));
            session()->setFlashdata('kategori', $this->validator->getError('kategori'));
            session()->setFlashdata('genre', $this->validator->getError('genre'));
            session()->setFlashdata('stok', $this->validator->getError('stok'));
            session()->setFlashdata('deskripsi', $this->validator->getError('deskripsi'));
            
            return redirect()->to('/buku/edit/' . $id)->withInput();
        }
        // var_dump($data);
    }

    public function delete($id)
    {
        $book = $this->model->find($id);
        if ($book) {
            if ($book['gambar'] != "default.png" && $book['file'] != "default.pdf") {
                unlink('cover/' . $book['gambar']);
                unlink('files/' . $book['file']);
            } else if ($book['file'] != "default.pdf") {
                unlink('files/' . $book['file']);
            } else if ($book['gambar'] != "default.png") {
                unlink('cover/' . $book['gambar']);
            }
            $this->model->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus.');
            return redirect()->to('admin/buku');
        } else {
            return $this->fail(['message' => 'Book Data not found, can not be deleted'], 409);
        }
    }

    public function wishlist()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->model->search($keyword);
        } else {
            $buku = $this->model->findAll();
        }
        $data = [
            'title'  => "Wishlist | E-Library",
            'penulis' => $this->penulis->findAll(),
            'penerbit' => $this->penerbit->findAll(),
            'buku' => $buku
        ];
        return view('buku/wishlist', $data);
    }

    public function rak()
    {
        $select = $this->request->getVar('select');
        $user = session()->get('id_user');
        $buku = [];
        if($select == 'borrow'){ 
            $buku = $this->pinjam->getBorrowData($user);
        } else if($select == 'history'){
            $buku = $this->history->getHistoryData($user);
        } else {
            $buku = [];
        }
        $data = [
            'title'  => "Bookshelf | E-Library",
            'penulis' => $this->penulis->findAll(),
            'penerbit' => $this->penerbit->findAll(),
            'buku' => $buku,
            'select' => $select
        ];
        return view('buku/rak', $data);
    }
    public function create()
    {
        $data = [
            'title'  => "Tambah Buku | E-Library"
        ];
        return view('buku/create', $data);
    }
    public function edit($id)
    {
        $data = [
            'title'  => "Update Buku | E-Library",
            'buku' => $this->model->getBuku($id)
        ];
        return view('buku/edit', $data);
    }
    public function detail($id)
    {
        $user = session()->get('id_user');
        $buku = $this->model->getBuku($id);
        $pinjam = $this->pinjam->getBorrowData($user);
        $data = [
            'title' => "Detail Buku | E-Library",
            'penulis' => $this->penulis->findAll(),
            'penerbit' => $this->penerbit->findAll(),
            'buku' => $buku,
            'pinjam' => $pinjam,
        ];

        return view('buku/detail', $data);
    }
    public function read($id)
    {
        $data = [
            'title'  => "Baca Buku",
            'buku' => $this->model->getBuku($id)
        ];
        return view('buku/read', $data);
    }
}