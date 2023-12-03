<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BooksModel;
use App\Models\PenulisModel;
use App\Models\PenerbitModel;

class User extends BaseController
{
  protected $model, $buku, $penulis, $penerbit;
  public function __construct()
  {
    $this->model = new UserModel();
    $this->buku = new BooksModel();
    $this->penulis = new PenulisModel();
    $this->penerbit = new PenerbitModel();
  }

  public function index()
  {
    if (!$this->session->has('userIsLogin')) {
      return redirect()->to('/user/login');
    }
    $data = [
      'title'  => "Users | E-Library",
      'bukupopuler' => $this->buku->findAll(),
      'penulis' => $this->penulis->findAll(),
      'penerbit' => $this->penerbit->findAll(),
      'bukurekomen' => $this->buku->findAll(),
    ];
    return view('user/dashboard', $data);
  }

  public function login()
  {
    if ($this->session->has('userIsLogin')) {
      return redirect()->to('/user');
    }
    $data = [
      'title'  => "Login | E-Library"
    ];
    return view('user/login', $data);
  }

  public function auth()
  {
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $user = $this->model->where('username', $username)->first();

    if (is_null($user)) {
      session()->setFlashdata('msg', "User tidak ditemukan!");
      return redirect()->to('user/login')->withInput();
    }
    if (!password_verify($password, $user['password'])) {
      session()->setFlashdata('msg', "Password salah!");
      return redirect()->to('user/login')->withInput();
    }

    $loginSession = [
      'userIsLogin' => true,
      'userName' => $user['name'],
      'id_user' => $user['id_user'],
    ];

    $this->session->set($loginSession);
    return redirect()->to('user');
  }
  public function delete($id = null)
  {
    $user = $this->model->find($id);
    if ($user) {
      $this->model->delete($id);
      session()->setFlashdata('pesan', 'Data user berhasil dihapus.');
      return redirect()->to('admin/user');
    } else {
      return;
    }
  }
  public function logout()
  {
    $this->session->destroy();
    return redirect()->to(base_url());
  }

  public function register()
  {
    if ($this->validate($this->model->validationRules)) {
      $data = [
        'id_user' => $this->model->getIDUser(),
        'name' => $this->request->getVar('name'),
        'username' => $this->request->getVar('username'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ];
      $this->model->add($data);
      return redirect()->to('user/login');
    } else {
      session()->setFlashdata('pesan', '');
      return redirect()->to(base_url());
    }
  }
  public function detail($slug)
  {
    $data = [
      'title'  => "Detail | E-Library",
      'dataBuku' => $this->buku->where('slug', $slug)->first()
    ];
    return view('user/product_detail_modal', $data);
  }
  public function edit()
  {
    $data = [
      'title'  => "Edit User | E-Library",
      'user' => $this->model->getUser(session()->get('userName'))
    ];
    return view('user/edit_user', $data);
  }
  public function update($id)
  {
    if ($this->validate($this->model->validationRules)) {
      $this->model->update($id, [
        'name' => $this->request->getVar("name"),
        'username' => $this->request->getVar("username"),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'email' => $this->request->getVar("email"),
      ]);
      session()->set('userName', $this->request->getVar('name'));
      session()->setFlashdata('msg', 'Profil berhasil diubah.');
      return redirect()->to('/user');
    } else {
      session()->setFlashdata('name', $this->validator->getError('name'));
      session()->setFlashdata('username', $this->validator->getError('username'));
      session()->setFlashdata('email', $this->validator->getError('email'));
      session()->setFlashdata('password', $this->validator->getError('password'));

      return redirect()->to('/user/edit')->withInput();
    }
  }
  public function profile()
  {
    $data = [
      'title'  => "Account | E-Library",
      'user' => $this->model->getUser(session()->get('userName'))
    ];
    return view('user/profil_page', $data);
  }
}