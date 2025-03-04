<?php
class Model_produk extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('produk');
    }
    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_produk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($id)
    {
        $result = $this->db->where('id_konten', $id)
            ->limit(1)
            ->get('konten');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detail_produk($produk_id)
    {
        $result = $this->db->where('produk_id', $produk_id)->get('produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function cari_produk($keyword)
    {
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('keterangan', $keyword);
        return $this->db->get('produk')->result();
    }
}
