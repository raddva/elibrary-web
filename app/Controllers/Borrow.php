<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\BorrowDetail;
use App\Models\BorrowsModel;
use App\Models\HistoryModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;

class Borrow extends ResourceController
{
    protected $model;
    protected $detail;
    protected $book;
    protected $history;
    
    public function __construct()
    {
        $this->model = new BorrowsModel();
        $this->detail = new BorrowDetail();
        $this->book = new BooksModel();
        $this->history = new HistoryModel();
        $this->user = new UserModel();
    }
    
    public function index()
    {
        //
    }
    
    public function create($id = null)
    {
        $idPinjam = $this->model->getBorrowID();
        $user = session()->get('id_user');
        $dataExist = $this->model->where('id_user', $user)
            ->where('tgl_kembali', null)
            ->first();
        if ($dataExist) {
            $id_pinjam = $dataExist['id_pinjam'];
        } else {
            $id_pinjam = $idPinjam;
            $this->model->insert([
                'id_pinjam'     => $id_pinjam,
                'id_user'       => $user,
                'tgl_pinjam'    => Time::today(),
                'tenggat'       => Time::today()->addDays(7)
            ]); 
        }
            
            $this->detail->insert([
                'id_pinjam' => $id_pinjam,
                'id_buku'   => $id
            ]);
            
            $this->book->borrowed($id);
            session()->setFlashdata('pesan', 'Buku telah dipinjam.');
            return redirect()->to('buku/rak');
    }

    public function update($id = null)
    {
        $buku = $this->detail->select('id_buku')->where('id_pinjam', $id)->get()->getResult();
        $user = $this->model->select('id_user')->where('id_pinjam', $id)->get()->getRow();
        if ($this->model->update($id, [
            'id_user' => $user->id_user,
            'tgl_kembali' => Time::today()
        ])) {
            foreach ($buku as $b) {
                $this->book->returned($b->id_buku);
                $this->history->insert([
                    'id_user' => $user->id_user,
                    'id_buku' => $b->id_buku,
                    'id_pinjam' => $id
                ]);
            }
            return redirect()->to('buku/rak');
        } 
    }

    public function getBorrowsData()
    {
        return $this->respond(['data' => $this->model->getBorrows()], 200);
    }
    
    public function getDetailPinjam($id)
    {
        return $this->respond(['data' => $this->model->getBorrowData($id)], 200);
    }
}