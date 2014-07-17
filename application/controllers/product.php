<?php
class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
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
	public function View_all()
	{
		$data['prds'] = $this->product_model->get_prds();
		$data['title'] = 'Product - Readmoo';

		$this->load->view('templates/header', $data);
		$this->load->view('product_all', $data);
		$this->load->view('templates/footer');
	}
	/*------產品單頁------*/
	public function view($pid)
	{
		$data['prds'] = $this->product_model->get_prds($pid);
		if (empty($data['prds']))
		{
			show_404();
		}
			$data['title'] = $data['prds']['pname'].' - Readmoo';

			$this->load->view('templates/header', $data);
			$this->load->view('product_one', $data);
			$this->load->view('templates/footer');
	}
	/*------新增------*/
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$data_tit['title'] = '新增產品';
		$pid = url_title($this->input->post('pid'), 'dash', TRUE);
		$data = array(
			'pname' => $this->input->post('pname'),
			'pinfo' => $this->input->post('pinfo'),
			'pdes' => $this->input->post('pdes'),
			'pprice' => $this->input->post('pprice')
		);

		$this->form_validation->set_rules('pname', '產品名稱', 'required');
		$this->form_validation->set_rules('pprice', '產品價格', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_prd');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->product_model->set_prds($data);
			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_success');
			$this->load->view('templates/footer');
		}

	}
	/*------刪除------*/
	public function delete($pid)
	{
		$this->product_model->del_prds($pid);
		$data['title'] = '刪除產品';
		$this->load->view('templates/header', $data);
		$this->load->view('delete_success');
		$this->load->view('templates/footer');
	}
	/*------修改------*/
	public function update_edit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$data = array(
			'pid' => $this->input->post('pid'),
			'pname' => $this->input->post('pname'),
			'pinfo' => $this->input->post('pinfo'),
			'pdes' => $this->input->post('pdes'),
			'pprice' => $this->input->post('pprice')
		);

		$data_tit['title'] = '商品資訊更新成功';

		$this->form_validation->set_rules('pname', '產品名稱', 'required');
		$this->form_validation->set_rules('pprice', '產品價格', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$pid = $data['pid'];
			$this->update_get($pid);
		}
		else
		{
			$this->product_model->up_prds($data);

			$this->load->view('templates/header', $data_tit);
			$this->load->view('create_success');
			$this->load->view('templates/footer');
		}
		
	}
	public function update_get($pid)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['prds'] = $this->product_model->get_prds($pid);
		$data['title'] = '更新商品資訊';
		
		$this->load->view('templates/header', $data);
		$this->load->view('up_prd');
		$this->load->view('templates/footer');
	}
}