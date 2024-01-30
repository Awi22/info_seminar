<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('wuling_admin/model_adm_setting');
    }

    public function index()
    {
        $data = [
            'judul'    => 'Seminar',
            'konten'   => 'admin/seminar'
        ];

        $this->load->view('_template/index', $data);
    }
}

/* End of file Seminar.php */
/* Location: ./controllers/Seminar.php */
