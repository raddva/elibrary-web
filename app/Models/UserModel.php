<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "t_user";
    protected $primaryKey = "id_user";
    protected $allowedFields = ['id_user', 'name', 'username', 'password', 'email'];
    protected $useTimestamps = false;
    protected $validationRules = [
        'name' => ['rules' => 'required'],
        'username' => ['rules' => 'required'],
        'email' => ['rules' => 'required|valid_email'],
        'password' => ['rules' => 'required'],
        // 'confirm_password'  => ['rules' => 'matches[password]']
    ];
    public function getIDUser()
    {
        $lastUser = $this->select('id_user')->orderBy('id_user', 'DESC')->first();
        if ($lastUser) {
            $lastNumber = (int)substr($lastUser['id_user'], 1);
            $newNumber = $lastNumber + 1;
            $newUserID = 'U' . sprintf('%04d', $newNumber);
        } else {
            $newUserID = 'U0001';
        }
        return $newUserID;
    }

    public function getUser($name = false)
    {
        if ($name == false) {
            return $this->findAll();
        }
        return $this->where(['name' => $name])->first();
    }
    public function search($word)
    {
        return $this->like('name', $word)->orLike('username', $word)->get()->getResultArray();
    }

    function add($data)
    {
        return $this->db
            ->table('t_user')
            ->insert($data);
    }
}