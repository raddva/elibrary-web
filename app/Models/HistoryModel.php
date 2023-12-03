<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table            = 'history';
    protected $allowedFields    = ['id_user', 'id_buku', 'id_pinjam'];
    protected $useTimestamps = false;

    public function getHistoryData($id)
    {
        $sql = "SELECT buku.id_buku, buku.judul, buku.gambar, history.id_pinjam, history.id_buku, pinjam.tgl_kembali, pinjam.tenggat
        FROM buku INNER JOIN history ON history.id_buku = buku.id_buku 
        INNER JOIN t_user ON t_user.id_user = history.id_user 
        INNER JOIN pinjam ON pinjam.id_pinjam = history.id_pinjam WHERE history.id_user = '$id'";
        $query = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
}