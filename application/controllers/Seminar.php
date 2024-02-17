<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_seminar', 'seminar');
    }

    public function index()
    {
        $this->layout
            ->title('Jadwal Seminar Mahasiswa')
            ->view('seminar/index');
    }

    public function get()
    {
        $data     = $this->seminar->get();
        responseJson(['aaData' => $data]);
    }

    public function select2_ruangan()
    {
        $data     = $this->seminar->select2_ruangan();
        responseJson($data);
    }

    public function simpan()
    {
        $posts    = $this->input->post(NULL, TRUE);
        $result   = $this->seminar->simpan_seminar($posts);
        responseJson($result);
    }
}

/* End of file Seminar.php */
/* Location: ./controllers/Seminar.php */
