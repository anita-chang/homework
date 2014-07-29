<?php
class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('gbook_model');
		$this->load->library('session');
		$this->load->helper('url');
	}
	/*------首頁------*/
	public function index()
	{
		$data['prds'] = $this->product_model->get_prds();
		$data['title'] = 'Readmoo';

		$this->load->view('templates/header', $data);
		$this->load->view('product_view', $data);
		$this->load->view('templates/footer');
	}
	/*------商品總覽------*/
	public function View_all($page = FALSE)
	{
		$this->load->library('pagination');
		$this->config->load('product', TRUE);

		$config = $this->config->item('product');
		$config['base_url'] = site_url().'/view_all';
		$config['total_rows'] = $this->db->count_all_results('prds');

		$this->pagination->initialize($config);

		$data['pagelist'] = $this->pagination->create_links();
		$data['prds'] = $this->product_model->get_prds_page($page,$config['per_page']);
		$data['title'] = 'Product - Readmoo';

		if (empty($data['prds']))
		{
			show_404();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('product_all', $data);
		$this->load->view('templates/footer');
	}
	/*------產品單頁------*/
	public function view($pid)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['prds'] = $this->product_model->get_prds($pid);

		if (empty($data['prds']))
		{
			show_404();
		}
		$data['title'] = $data['prds']['pname'].' - Readmoo';
		/*----------------------*/
		$this->load->helper('date');
		date_default_timezone_set("Asia/Taipei");
		$datetime = date("Y-m-d H:i:s");

		$chck = $this->input->post('chck');
		$checknum = $this->session->userdata('Checknum');

		if ($this->form_validation->run('gbook') === TRUE)
		{
			if($chck == $checknum)
			{
				$all = array(
					'pid' => $this->input->post('pid'),
					'gname' => $this->input->post('gname'),
					'gtime' => $datetime,
					'gcontent' => $this->input->post('gcontent')
					);
				$this->gbook_model->g_add($all);
			}
		}
		/*----------------------*/
		$data['query'] = $this->gbook_model->g_show($pid);
		$this->load->view('templates/header', $data);
		$this->load->view('product_one', $data);
		$this->load->view('gbook',$data);
		$this->load->view('templates/footer');
	}
	/*----新增-gbook----*/
	public function AddGbook()
	{
		$this->load->helper('date');
		date_default_timezone_set("Asia/Taipei");
		$datetime = date("Y-m-d H:i:s");

		$chck = $this->input->post('chck');
		$checknum = $this->session->userdata('Checknum');

		if($chck == $checknum)
		{
			$all = array(
				'pid' => $this->input->post('pid'),
				'gname' => $this->input->post('gname'),
				'gtime' => $datetime,
				'gcontent' => $this->input->post('gcontent')
			);
			$this->gbook_model->g_add($all);
			redirect(site_url().'/'.$all['pid']);
		}
		else
		{
			$pid = $this->input->post('pid');
			redirect(site_url().'/'.$pid);
		}
	}
	/*------新增------*/
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data_tit['title'] = '新增產品 - Readmoo';

		if (empty($_FILES['pimg']['name']))
		{
			$this->form_validation->run('img');
		}

		if ($this->form_validation->run('normal') === FALSE)
		{
			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_prd');
			$this->load->view('templates/footer');
		}
		else
		{
			$name = time().$_FILES['pimg']['name'];
			$this->up_img($name);

			$pid = url_title($this->input->post('pid'), 'dash', TRUE);
			$data = $this->input->post();
			$data['pimg'] = $name;
			$this->product_model->set_prds($data);

			$total = $this->db->count_all_results('prds');
			$this->config->load('product', TRUE);
			$config = $this->config->item('product');
			$data['last_page_link'] = ceil($total/$config['per_page']);

			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_success', $data);
			$this->load->view('templates/footer');
		}

	}
	/*------刪除------*/
	public function delete($pid)
	{
		$this->product_model->del_prds($pid);
		$data['title'] = '刪除產品 - Readmoo';
		$this->load->view('templates/header', $data);
		$this->load->view('delete_success');
		$this->load->view('templates/footer');
	}
	/*------修改------*/
	public function update_edit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($this->form_validation->run('normal') === FALSE)
		{
			$pid = $this->input->post('pid');
			$this->update_get($pid);
		}
		else
		{
			$data = array(
				'pid' => $this->input->post('pid'),
				'pname' => $this->input->post('pname'),
				'pinfo' => $this->input->post('pinfo'),
				'pdes' => $this->input->post('pdes'),
				'pprice' => $this->input->post('pprice')
			);
			if (!empty($_FILES['pimg']['name']))
			{
				$name = time().$_FILES['pimg']['name'];
				$this->up_img($name);
				$data['pimg'] =  $name;
			}
			
			$this->product_model->up_prds($data);
			$data_tit['title'] = $data['pname'].'更新成功 - Readmoo';
			
			$this->load->view('templates/header', $data_tit);
			$this->load->view('up_success');
			$this->load->view('templates/footer');
		}
		
	}
	public function update_get($pid)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['prds'] = $this->product_model->get_prds($pid);
		$data['title'] = $data['prds']['pname'].'商品資訊更新 - Readmoo';
		
		$this->load->view('templates/header', $data);
		$this->load->view('up_prd');
		$this->load->view('templates/footer');
	}
	/*-----圖片驗證-----*/
	public function Keycik()
	{
		$img_height = 30;  // 圖形高度
		$img_width = 65;   // 圖形寬度
		$mass = 0;        // 雜點的數量，數字愈大愈不容易辨識
		$num="";              // rand後所存的地方
		$num_max = 5;      // 產生6個驗證碼
		for( $i=0; $i<$num_max; $i++ )
		{
			$num .= rand(0,9);
		} 
		//把驗證碼存進session
		$this->session->set_userdata('Checknum',$num);
		// 創造圖片，定義圖形和文字顏色
		Header("Content-type: image/PNG");
		srand((double)microtime()*1000000);
		$im = imagecreate($img_width,$img_height);
		$black = ImageColorAllocate($im, 0,0,0);         // (0,0,0)文字為黑色
		$gray = ImageColorAllocate($im, 255,255,255); // (200,200,200)背景是灰色
		imagefill($im,0,0,$gray);
		// 在圖形產上黑點，起干擾作用;
		for( $i=0; $i<$mass; $i++ )
		{
			imagesetpixel($im, rand(0,$img_width), rand(0,$img_height), $black);
		}
		// 將數字隨機顯示在圖形上,文字的位置都按一定波動範圍隨機生成
		$strx=rand(3,8);
		for( $i=0; $i<$num_max; $i++ )
		{
			$strpos=rand(1,8);
			imagestring($im,5,$strx,$strpos, substr($num,$i,1), $black);
			$strx+=rand(8,14);
		}
		ImagePNG($im);
		ImageDestroy($im);
	}
	/*------共用------*/
	public function up_img($name)
	{
		move_uploaded_file($_FILES['pimg']['tmp_name'], './image/'.$name);
	}
}