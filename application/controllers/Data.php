<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct(){
		parent::__construct();
        // $this->load->library('encrypt');
		$this->load->model('M_global');
		 $this->load->library('pagination');
		$this->title = 'beranda';
	}

	public function index()
	{
		$data['biro'] = $this->M_global->get('*','t_biro','');

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/body',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}

	public function konten($id = '',$semua='')
	{

		$semua 	= stripslashes(strip_tags(htmlspecialchars($semua, ENT_QUOTES)));


        $data['topik'] = $this->M_global->get('*','t_topik',array('id_biro'=>$id));

        if ($semua == '') 
        {
	        $data['konten'] = $this->M_global->get_limit("*","t_publikasi",array('id_biro'=>$id),'10','id_publikasi');
        }
        else if ($semua == 'all')
        {        
	        $data['konten'] = $this->M_global->get("*","t_publikasi",array('id_biro'=>$id));
        }
        else
        {
        	redirect(base_url());
        }

        	$data['biro'] = $id;


        foreach ($data['konten'] as $key => $value)
        {
            $data['konten'][$key]['file'] = $this->M_global->detailPublikasi($value['id_publikasi']);
        }

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/konten',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}	
	public function bagian($id = '',$bagian='')
	{

        $data['bagian'] = $this->M_global->get('*','t_subbag',array('id_biro'=>$id,'id_bagian'=>$bagian));

        $data['topik'] = $this->M_global->get('*','t_topik','');
        $data['tag'] = $this->M_global->get('*','t_tag','');
        $data['format'] = $this->M_global->get('*','t_format','');

        $data['konten'] = $this->M_global->get('*','t_publikasi',array('id_biro'=>$id,'id_bagian'=>$bagian));

        foreach ($data['konten'] as $key => $value)
        {
            $data['konten'][$key]['file'] = $this->M_global->get('*','t_format_publikasi',array('id_publikasi'=>$value['id_publikasi']));
        }

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('konten_bagian',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}	

	public function subbag($id = '',$bagian='',$subbag='')
	{


        $data['konten'] = $this->M_global->get('*','t_publikasi',array('id_biro'=>$id,'id_bagian'=>$bagian,'id_subbag'=>$subbag));

        foreach ($data['konten'] as $key => $value)
        {
            $data['konten'][$key]['file'] = $this->M_global->get('*','t_format_publikasi',array('id_publikasi'=>$value['id_publikasi']));
        }

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('konten_subbag',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}	

	public function detail($id = '')
	{


        $data['konten'] = $this->M_global->get('*','t_publikasi',array('id_publikasi'=>$id));

        foreach ($data['konten'] as $key => $value)
        {
            $data['konten'][$key]['file'] = $this->M_global->detailPublikasi($value['id_publikasi']);
        }

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('detail',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}	

/*	public function cari()
	{


		$cari 	= stripslashes(strip_tags(htmlspecialchars($this->input->post('cari'), ENT_QUOTES)));
        $data['konten'] = $this->M_global->getLike('*','t_publikasi',$cari);

        foreach ($data['konten'] as $key => $value)
        {
            $data['konten'][$key]['file'] = $this->M_global->detailPublikasi($value['id_publikasi']);
        }

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('cari',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}*/	


		public function cari($rowno=0)
	{


		$cari = "";

		if ($this->input->post('cari') !=NULL)
		{

		$cari = $this->input->post('cari');
		$this->session->set_userdata(array("cari"=>$cari));
		
		}else{
			if($this->session->userdata('cari') !=NULL)
			{
			$cari = $this->session->userdata("cari");
			}

 		}	
		
        $rowperpage = 5;
        if($rowno != 0 )
        {
        	$rowno = ($rowno-1) * $rowperpage;

        }


        $allcount = $this->M_global->getrecordCount($cari);

        $users_record = $this->M_global->getcari($rowno,$rowperpage,$cari);

        $config['base_url'] = base_url().'data/cari';
    	$config['use_page_numbers'] = TRUE;
   	 	$config['total_rows'] = $allcount;
   		$config['per_page'] = $rowperpage;

   		//style botstrap
   		$config['full_tag_open'] = '<nav"><ul class="pagination">';
   		$config['full_tag_close'] = '</ul></nav>';

   		$config['first_link']  = 'First';
   		$config['first_tag_open'] = '<li class="page-item">';
   		$config['first_tag_close'] = '</li>';

   		$config['last_link']  = 'Last';
   		$config['last_tag_open'] = '<li class="page-item">';
   		$config['last_tag_close'] = '</li>';

   		$config['next_link']  = '&raquo';
   		$config['next_tag_open'] = '<li class="page-item">';
   		$config['next_tag_close'] = '</li>';

   		$config['prev_link']  = '&laquo';
   		$config['prev_tag_open'] = '<li class="page-item">';
   		$config['prev_tag_close'] = '</li>';

   		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
   		$config['cur_tag_close'] = '</a></li>';

   		$config['num_tag_open'] = '<li class="page-item">';
   		$config['num_tag_close'] = '</li>';

   		$config['attributes'] =  array('class' => 'page-link');


        $this->pagination->initialize($config);
 
   		$data['pagination'] = $this->pagination->create_links();
   		$data['result'] = $users_record;
    	$data['row'] = $rowno;
    	$data['search'] = $cari;


		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('cari',$data);
		$this->load->view('layout/footer');
		
		// $this->load->view('layout/main');
	}

	public function topik($id = '')
	{

        $data['konten'] = $this->M_global->topikPublikasi($id);

        foreach ($data['konten'] as $key => $value)
        {
            $data['konten'][$key]['file'] = $this->M_global->detailPublikasi($value['id_publikasi']);
        }

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('cari',$data);
		$this->load->view('layout/footer');
		// $this->load->view('layout/main');
	}			
}
