<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowsModel extends Model
{
    protected $table            = 'pinjam';
    protected $primaryKey       = 'id_pinjam';
    protected $allowedFields    = ['id_pinjam', 'id_user', 'tgl_pinjam', 'tgl_kembali', 'tenggat'];
    protected $useTimestamps = false;
    protected $dateFormat    = 'date';
    
    public function getBorrowID()
    {
        $query = $this->db->query('SELECT MAX(id_pinjam) AS id_pinjam FROM pinjam');
        $row = $query->getRow();
        $pinjamID = $row->id_pinjam;

        return $pinjamID ? $pinjamID + 1 : 1;
    }

    public function getBorrows()
    {
        $query = $this->table('pinjam')->select('*')->where('tgl_kembali', null);
        $results = $query->countAllResults();
        return $results;
    }

    public function getBorrowData($id)
    {
        $sql = "SELECT buku.judul, buku.gambar, detail_pinjam.id_buku, pinjam.id_pinjam, pinjam.id_user, pinjam.tenggat FROM buku 
        INNER JOIN detail_pinjam ON detail_pinjam.id_buku = buku.id_buku 
        INNER JOIN pinjam ON pinjam.id_pinjam = detail_pinjam.id_pinjam 
        INNER JOIN t_user ON t_user.id_user = pinjam.id_user 
        WHERE pinjam.id_user = '$id' AND tgl_kembali IS NULL";
        $query = $this->db->query($sql);
        $results = $query->getResultArray();
        return $results;
    }
}