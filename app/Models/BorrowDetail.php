<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowDetail extends Model
{
    protected $table            = 'detail_pinjam';
    protected $allowedFields    = ['id_pinjam', 'id_buku', 'status'];
    protected $useTimestamps = false;
    protected $dateFormat    = 'date';

    public function getBorrowDetails($id){
        $sql = "SELECT * FROM buku INNER JOIN detail_pinjam ON buku.id_buku = detail_pinjam.id_buku 
        INNER JOIN pinjam ON pinjam.id_pinjam = detail_pinjam.id_pinjam WHERE pinjam.id_pinjam = $id";
        $query = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
}