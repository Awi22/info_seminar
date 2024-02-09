<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_ruangan extends CI_Model
{
    public function get()
    {
        $data   = array();
        $query  = $this->db->get('p_ruangan');
        $no     = 1;

        foreach ($query->result() as $key) {
            $data[] = array(
                'no'            => $no++,
                'ruangan_id'    => $key->id,
                'ruangan_name'  => $key->nama,
            );
        }

        return $data;
    }

    public function simpan_ruangan($posts)
    {
        $status   = false;
        $pesan    = 'Gagal menyimpan ruangan';

        if (!empty($posts)) {
            $ruangan_name = $posts['ruangan_name'];

            //cek existing
            $query_cek_ruangan = $this->db->select('*')->from('p_ruangan')->where('nama', $ruangan_name)->get();
            if ($query_cek_ruangan->num_rows() > 0) {
                return ['status' => false, 'pesan' => 'Nama Ruangan sudah ada!'];
            }

            $this->db->trans_start();
            $data = [
                'nama'     => $ruangan_name
            ];
            $this->db->insert("p_ruangan", $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $status = true;
                $pesan     = 'Berhasil menyimpan role';
            }
        }

        $result = ['status' => $status, 'pesan' => $pesan];
        return $result;
    }

    public function get_ruangan_by_id($id)
    {
        $data_ruangan = NULL;

        if (!empty($id)) {
            $query_ruangan = $this->db->select('*')->from('p_ruangan')->where('id', $id)->get();

            $level = $query_ruangan->row();
            if ($query_ruangan->num_rows() > 0) {
                $data_ruangan = array(
                    'ruangan_id'    => $level->id,
                    'ruangan_name'  => $level->nama,
                );
            }
        }

        return $data_ruangan;
    }

    public function update_ruangan($posts)
    {
        $status   = false;
        $pesan    = 'Gagal memperbarui ruangan';

        if (!empty($posts)) {
            $ruangan_id   = $posts['ruangan_id'];
            $ruangan_name = $posts['ruangan_name'];

            $data = [
                'nama'     => $ruangan_name
            ];

            $this->db->trans_start();
            $this->db->update('p_ruangan', $data, ['id' => $ruangan_id]);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $status   = true;
                $pesan    = 'Berhasil memperbarui ruangan';
            }
        };

        $result = ['status' => $status, 'pesan' => $pesan];
        return $result;
    }

    public function hapus_ruangan($posts)
    {
        $status = false;
        $pesan  = 'Gagal menghapus ruangan';

        if (!empty($posts)) {
            $ruangan_id = $posts['ruangan_id'];

            $this->db->trans_start();
            $this->db->delete('p_ruangan', ['id' => $ruangan_id]);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $status = true;
                $pesan  = 'Berhasil menghapus ruangan';
            }
        }

        $result = ['status' => $status, 'pesan' => $pesan];
        return $result;
    }
}
