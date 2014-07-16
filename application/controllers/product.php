<?php
class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{
		$data['prds'] = $this->product_model->get_prds();
		$data['title'] = 'Readmoo';

		$this->load->view('templates/header', $data);
		$this->load->view('product_view', $data);
		$this->load->view('templates/footer');
	}
	public function View_all()
	{
		$data['prds'] = $this->product_model->get_prds();
		$data['title'] = 'Product - Readmoo';

		$this->load->view('templates/header', $data);
		$this->load->view('product_all', $data);
		$this->load->view('templates/footer');
	}
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
}