<?php
class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('product_model','gbook_model'));
		$this->load->helper('url');
		$this->load->driver('cache');
		$this->cache->clean();
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
		$config['base_url'] = site_url('/view_all');
		$config['total_rows'] = $this->product_model->db_count();

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
		$data['query'] = $this->gbook_model->g_show($pid);
		
		$this->load->view('templates/header', $data);
		$this->load->view('product_one', $data);
		$this->load->view('gbook',$data);
		$this->load->view('templates/footer');
	}
	/*------新增留言------*/
	public function Addgbook()
	{
		$this->load->helper('date');
		date_default_timezone_set("Asia/Taipei");
		$datetime = date("Y-m-d H:i:s");

		$all = array(
			'pid' => $this->input->post('pid'),
			'gname' => $this->input->post('gname'),
			'gtime' => $datetime,
			'gcontent' => $this->input->post('gcontent')
			);
		$this->gbook_model->g_add($all);
	}
	/*------新增------*/
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->helper('url');
		date_default_timezone_set("Asia/Taipei");
		$datetime = date("YmdHis");

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
			$name = $datetime.$_FILES['pimg']['name'];
			$this->up_img($name);

			$pid = url_title($this->input->post('pid'), 'dash', TRUE);
			$data = $this->input->post();
			$data['pimg'] = $name;
			$this->product_model->set_prds($data);

			$total = $this->product_model->db_count();
			$this->config->load('product', TRUE);
			$config = $this->config->item('product');
			$data['last_page_link'] = ceil($total/$config['per_page']);

			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_success', $data);
			$this->load->view('templates/footer');
		}
	}
	/*------刪除------*/
	public function del_gbook($gid)
	{
		$this->gbook_model->g_del($gid);
	}
	public function delete($pid)
	{
		$data = $this->product_model->get_prds($pid);
		unlink('./image/'.$data['pimg']);

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
		$datetime = date("YmdHis");

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
				$name = $datetime.$_FILES['pimg']['name'];
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
	/*------圖片上傳------*/
	public function up_img($name)
	{
		move_uploaded_file($_FILES['pimg']['tmp_name'], './image/'.$name);
	}
}