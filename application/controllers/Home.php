<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('wuling_admin/model_adm_setting');
    }

    public function index()
    {
        $data = [
            'judul'    => 'JADWAL SEMINAR MAHASISWA',
            'nama'     => 'Munawir Djamaluddin'
        ];

        $this->load->view('home/index', $data);
    }
}

/* End of file Home.php */
/* Location: ./controllers/Home.php */
