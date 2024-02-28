<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_seminar extends CI_Model
{
    public function get()
    {
        $data   = array();
        $query  = $this->db->get('jadwal_seminar');
        $no     = 1;

        foreach ($query->result() as $key) {

            $tanggal      = tgl_bln_thn($key->tanggal);
            $jam_mulai    = jam_menit($key->jam_mulai);
            $jam_selesai  = jam_menit($key->jam_selesai);
            $nama_ruangan = $this->get_ruangan($key->id_ruangan);

            $data[] = array(
                'no'            => $no++,
                'id_seminar'    => $key->id,
                'nim'           => $key->nim,
                'nama'          => $key->nama,
                'tanggal'       => $tanggal,
                'jam_mulai'     => $jam_mulai,
                'jam_selesai'   => $jam_selesai,
                'ruangan'       => $nama_ruangan
            );
        }

        return $data;
    }

    public function select2_ruangan()
    {
        $data   = array();
        $query  = $this->db->get('p_ruangan');
        foreach ($query->result() as $ruangan) {
            $data[] = array(
                'id'    => $ruangan->id,
                'text'  => $ruangan->nama
            );
        }

        return $data;
    }


    public function simpan_seminar($posts)
    {
        $status   = false;
        $pesan    = 'Gagal menyimpan data seminar';

        if (!empty($posts)) {
            $nim            = $posts['nim'];
            $nama           = $posts['nama'];
            $tanggal        = tgl_sql($posts['tanggal']);
            $jam_mulai      = time_sql($posts['jam_mulai']);
            $jam_selesai    = time_sql($posts['jam_selesai']);
            $id_ruangan     = $posts['ruangan'];

            // cek existing
            $query_cek_seminar = $this->db->select('*')->from('jadwal_seminar')->where('nim', $nim)->where('tanggal', $tanggal)->where('jam_mulai', $jam_mulai)->get();
            if ($query_cek_seminar->num_rows() > 0) {
                return ['status' => false, 'pesan' => 'Data seminar sudah ada!'];
            }

            $this->db->trans_start();
            $data = [
                'nim'           => $nim,
                'nama'          => $nama,
                'tanggal'       => $tanggal,
                'jam_mulai'     => $jam_mulai,
                'jam_selesai'   => $jam_selesai,
                'id_ruangan'    => $id_ruangan
            ];
            $this->db->insert("jadwal_seminar", $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $status = true;
                $pesan     = 'Berhasil menyimpan data seminar';
            }
        }

        $result = ['status' => $status, 'pesan' => $pesan];
        return $result;
    }

    public function get_seminar_by_id($id)
    {
        $data_seminar = NULL;

        if (!empty($id)) {
            $query_seminar = $this->db->select('*')->from('jadwal_seminar')->where('id', $id)->get();

            $level = $query_seminar->row();
            if ($query_seminar->num_rows() > 0) {

                $tanggal      = tgl_bln_thn($level->tanggal);
                $jam_mulai    = jam_menit($level->jam_mulai);
                $jam_selesai  = jam_menit($level->jam_selesai);

                $data_seminar = array(
                    'id_seminar'    => $level->id,
                    'nim'           => $level->nim,
                    'nama'          => $level->nama,
                    'tanggal'       => $tanggal,
                    'jam_mulai'     => $jam_mulai,
                    'jam_selesai'   => $jam_selesai,
                    'ruangan'       => $level->id_ruangan
                );
            }
        }

        return $data_seminar;
    }

    public function update_seminar($posts)
    {
        $status   = false;
        $pesan    = 'Gagal memperbarui data seminar';

        if (!empty($posts)) {
            $seminar_id     = $posts['seminar_id'];
            $nim            = $posts['nim'];
            $nama           = $posts['nama'];
            $tanggal        = tgl_sql($posts['tanggal']);
            $jam_mulai      = time_sql($posts['jam_mulai']);
            $jam_selesai    = time_sql($posts['jam_selesai']);
            $id_ruangan     = $posts['ruangan'];

            $data = [
                'nim'           => $nim,
                'nama'          => $nama,
                'tanggal'       => $tanggal,
                'jam_mulai'     => $jam_mulai,
                'jam_selesai'   => $jam_selesai,
                'id_ruangan'    => $id_ruangan
            ];

            $this->db->trans_start();
            $this->db->update('jadwal_seminar', $data, ['id' => $seminar_id]);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $status   = true;
                $pesan    = 'Berhasil memperbarui data seminar';
            }
        };

        $result = ['status' => $status, 'pesan' => $pesan];
        return $result;
    }

    public function hapus_seminar($posts)
    {
        $status = false;
        $pesan  = 'Gagal menghapus data seminar';

        if (!empty($posts)) {
            $seminar_id = $posts['seminar_id'];

            $this->db->trans_start();
            $this->db->delete('jadwal_seminar', ['id' => $seminar_id]);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $status = true;
                $pesan  = 'Berhasil menghapus data seminar';
            }
        }

        $result = ['status' => $status, 'pesan' => $pesan];
        return $result;
    }

    public function get_ruangan($id)
    {
        $nama_ruangan = NULL;

        if (!empty($id)) {
            $query_ruangan = $this->db->select('*')->from('p_ruangan')->where('id', $id)->get();

            $level = $query_ruangan->row();
            if ($query_ruangan->num_rows() > 0) {
                $nama_ruangan = $level->nama;
            }
        }

        return $nama_ruangan;
    }
}
