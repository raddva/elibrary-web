<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = "buku";
    protected $primaryKey = "id_buku";
    protected $allowedFields = ['id_buku', 'judul', 'slug', 'id_penulis', 'id_penerbit', 'kategori', 'genre', 'gambar', 'stok', 'deskripsi', 'file'];
    protected $useTimestamps = false;
 
    protected $validationRules = [
        'judul' => ['rules' => 'required|is_unique[buku.judul]'],
        'id_penulis' => ['rules' => 'required'],
        'id_penerbit' => ['rules' => 'required'],
        'kategori' => ['rules' => 'required'],
        'genre' => ['rules' => 'required'],
        // 'gambar' => ['rules' => 'required|mime_in[gambar,jpg,jpeg,png]|is_image[gambar]'],
        'stok' => ['rules' => 'required'],
        'deskripsi' => ['rules' => 'required'],
        // 'file' => ['rules' => 'required'],
    ];

    public function getIDBuku()
    {
        $lastBook = $this->selectMax('id_buku')->get()->getRow();
        if ($lastBook) {
            $lastNumber = (int) substr($lastBook->id_buku, 1);
            $newNumber = $lastNumber + 1;
            $newBookID = 'B' . sprintf('%04d', $newNumber);
        } else {
            $newBookID = 'B0001';
        }
        return $newBookID;
    }

    public function getBuku($id) 
    {
        return $this->where(['id_buku' => $id])->get()->getResultArray();
    }

    public function search($word)
    {
        return $this->like('judul', $word)->orLike('id_penulis', $word)->get()->getResultArray();
    }

    public function borrowed($id)
    {
        $this->set('stok', 'stok - 1', FALSE);
        $this->where('id_buku', $id);

        return $this->update();
    }

    public function returned($id)
    {
        $this->set('stok', 'stok + 1', FALSE);
        $this->where('id_buku', $id);
        return $this->update();
    }
}