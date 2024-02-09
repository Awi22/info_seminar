<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_ruangan', 'ruangan');
    }

    public function index()
    {
        $this->layout
            ->title('Data Ruangan Seminar')
            ->view('ruangan/index');
    }

    public function get()
    {
        $data = $this->ruangan->get();
        responseJson(['aaData' => $data]);
    }

    public function simpan()
    {
        $posts    = $this->input->post(NULL, TRUE);
        $result   = $this->ruangan->simpan_ruangan($posts);
        responseJson($result);
    }

    public function get_ruangan_by_id()
    {
        $id       = $this->input->get("id");
        $result   = $this->ruangan->get_ruangan_by_id($id);
        responseJson($result);
    }

    public function update()
    {
        $posts    = $this->input->post(NULL, TRUE);
        $result   = $this->ruangan->update_ruangan($posts);
        responseJson($result);
    }

    public function hapus()
    {
        $posts    = $this->input->post(NULL, TRUE);
        $result   = $this->ruangan->hapus_ruangan($posts);
        responseJson($result);
    }
}

/* End of file Ruangan.php */
/* Location: ./controllers/Ruangan.php */
