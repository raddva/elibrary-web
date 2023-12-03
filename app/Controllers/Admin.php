<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use App\Models\AdminModel;
use App\Models\BooksModel;
use App\Models\UserModel;
use App\Models\BorrowsModel;
use App\Models\BorrowDetail;
use App\Models\HistoryModel;

class Admin extends BaseController
{
  use ResponseTrait;
  protected $model, $books, $user, $pinjam, $detail, $history;

  public function __construct()
  {
    $this->model = new AdminModel();
    $this->books = new BooksModel();
    $this->user = new UserModel();
    $this->pinjam = new BorrowsModel();
    $this->detail = new BorrowDetail();
    $this->history = new HistoryModel();
  }

  public function find($id)
  {
    return $this->respond(['admin' => $this->model->find($id)], 200);
  }

  public function index()
  {
    if (!$this->session->has('isLogin')) {
      return redirect()->to('/admin/login');
    }
    $data = [
      'title'  => "Admin | E-Library",
      'jbuku' => $this->books->countAll(),
      'juser' => $this->user->countAll(),
      'jpinjam' => $this->pinjam->getBorrows()
    ];
    return view('admin/index', $data);
  }

  public function login()
  {
    if (!$this->session->has('isLogin')) {
      $data = [
        'title'  => "Login Admin | E-Library",
      ];
      return view('admin/login', $data);
    } else {
      return redirect()->to('admin');
    }
  }

  public function auth()
  {
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    $admin = $this->model->where('username', $username)->first();

    if (is_null($admin)) {
      return $this->respond(['error' => 'Admin not found'], 401);
    }

    $pwd_verify = password_verify($password, $admin['password']);

    if (!$pwd_verify) {
      return $this->respond(['error' => 'Invalid password'], 401);
    }

    $loginSession = [
      'isLogin' => true,
      'adminName' => $admin['nama'],
    ];

    $this->session->set($loginSession);
    return redirect()->to('admin');
  }

  public function logout()
  {
    $this->session->destroy();
    return redirect()->to('admin/login');
  }

  public function getAdmins()
  {
    return $this->respond(['admin' => $this->model->findAll()], 200);
  }

  public function buku()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $buku = $this->books->search($keyword);
    } else {
      $buku = $this->books->findAll();
    }
    $data = [
      'title' => 'Books | E-Library',
      'buku' => $buku
    ];
    return view('admin/buku', $data);
  }
  public function pinjambuku()
  {
    $data = [
      'title'  => "Borrowed Books Details | E-Library",
      'pinjam' => $this->pinjam->findAll() 
    ];
    return view('admin/pinjambuku', $data);
  } 
  public function detailpinjam($id)
  {
    $data = [
      'title'  => "Borrow List | E-Library",
      'detail' => $this->detail->getBorrowDetails($id)
    ];
    return view('admin/detail_pinjam', $data);
  }

  public function returnBuku($id = null)
    {
        $buku = $this->detail->select('id_buku')->where('id_pinjam', $id)->get()->getResult();
        $user = $this->pinjam->select('id_user')->where('id_pinjam', $id)->get()->getRow();
        if ($this->pinjam->update($id, [
            'id_user' => $user->id_user,
            'tgl_kembali' => Time::today()
        ])) {
            foreach ($buku as $b) {
                $this->books->returned($b->id_buku);
                $this->history->insert([
                    'id_user' => $user->id_user,
                    'id_buku' => $b->id_buku,
                    'id_pinjam' => $id
                ]);
            }
            return redirect()->to('admin/pinjambuku');
        } 
    }
    
  public function user()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $user = $this->user->search($keyword);
    } else {
      $user = $this->user->findAll();
    }
    $data = [
      'title'  => "Users | E-Library",
      'user' => $user
    ];
    return view('admin/user', $data);
  }
}