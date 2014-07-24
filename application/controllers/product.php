<?php
class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('gbook_model');
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

		$config['base_url'] = site_url().'/view_all';
		$config['total_rows'] = $this->db->count_all_results('prds');;
		$config['per_page'] = 8;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '&laquo;';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '下一頁 >';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '< 上一頁';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
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
		$data['query'] = $this->gbook_model->all($pid);

		$this->load->view('templates/header', $data);
		$this->load->view('product_one', $data);
		$this->load->view('gbook',$data);
		$this->load->view('templates/footer');
	}
	/*------新增------*/
	public function AddGbook()
	{
		$all = $this->input->post();
		$this->gbook_model->add($all);
		redirect(site_url().'/'.$all['pid']);
	}
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data_tit['title'] = '新增產品 - Readmoo';
		$this->warn();
		if (empty($_FILES['pimg']['name']))
		{
			$this->form_validation->set_rules('pimg', '*產品圖片', 'required');
		}

		if ($this->form_validation->run() === FALSE)
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
			$data = array(
				'pname' => $this->input->post('pname'),
				'pimg' => $name,
				'pinfo' => $this->input->post('pinfo'),
				'pdes' => $this->input->post('pdes'),
				'pprice' => $this->input->post('pprice')
			);
			$this->product_model->set_prds($data);

			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_success', $pid);
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
		
		$this->warn();

		if ($this->form_validation->run() === FALSE)
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
	/*------共用------*/
	public function up_img($name)
	{
		move_uploaded_file($_FILES['pimg']['tmp_name'], './image/'.$name);
	}
	public function warn()
	{
		$this->form_validation->set_message('required', ' %s為必填');
		$this->form_validation->set_error_delimiters('<p class="err">', '</p>');

		$this->form_validation->set_rules('pname', '*產品名稱', 'required');
		$this->form_validation->set_rules('pprice', '*產品價格', 'required');
	}
}