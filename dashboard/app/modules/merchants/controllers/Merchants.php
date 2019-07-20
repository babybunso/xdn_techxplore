<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Merchants Class
 *
 * @package		 DG
 * @version		1.0
 * @author 		CMS Admin <densetsu.ghem@gmail.com>
 * @copyright 	Copyright (c) 2019, DXN Team
 * @link		 http://densetsughem.com
 */
class Merchants extends MX_Controller {
	
	/**
	 * Constructor
	 *
	 * @access	public
	 *
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->library('users/acl');
		$this->load->model('merchants_model');
		$this->load->language('merchants');
	}
	
	// --------------------------------------------------------------------

	/**
	 * index
	 *
	 * @access	public
	 * @param	none
	 * @author 	CMS Admin <densetsu.ghem@gmail.com>
	 */
	public function index()
	{
		$this->acl->restrict('merchants.merchants.list');
		
		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('merchants'));
		
		// session breadcrumb
		$this->session->set_userdata('redirect', current_url());
		
		// add plugins
		$this->template->add_css('mods/datatables.net-bs4/css/dataTables.bootstrap4.css');
		$this->template->add_css('mods/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css');
		$this->template->add_js('mods/datatables.net/js/jquery.dataTables.js');
		$this->template->add_js('mods/datatables.net-bs4/js/dataTables.bootstrap4.js');
		$this->template->add_js('mods/datatables.net-responsive/js/dataTables.responsive.min.js');
		$this->template->add_js('mods/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js');
		
		
		
		
		// render the page
		$this->template->add_css(module_css('merchants', 'merchants_index'), 'embed');
		$this->template->add_js(module_js('merchants', 'merchants_index'), 'embed');
		$this->template->write_view('content', 'merchants_index', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * datatables
	 *
	 * @access	public
	 * @param	mixed datatables parameters (datatables.net)
	 * @author 	CMS Admin <densetsu.ghem@gmail.com>
	 */
	public function datatables()
	{
		$this->acl->restrict('merchants.merchants.list');

		echo $this->merchants_model->get_datatables();
	}

	// --------------------------------------------------------------------

	/**
	 * form
	 *
	 * @access	public
	 * @param	$action string
	 * @param   $id integer
	 * @author 	CMS Admin <densetsu.ghem@gmail.com>
	 */
	function form($action = 'add', $id = FALSE)
	{
		$this->load->model('locations/locations_model', 'locations');
		$this->acl->restrict('merchants.merchants.' . $action, 'modal');

		$data['page_heading'] = lang($action . '_heading');
		$data['action'] = $action;

		if ($this->input->post())
		{
			if ($this->_save($action, $id))
			{
				echo json_encode(array('success' => true, 'message' => lang($action . '_success'))); exit;
			}
			else
			{	
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(					
					'merchant_merchant'		=> form_error('merchant_merchant'),
					'merchant_location'		=> form_error('merchant_location'),
					'merchant_status'		=> form_error('merchant_status'),
				);
				echo json_encode($response);
				exit;
			}
		}

		$data['locations'] = $this->locations->find_all_by('location_status','Active');
		
		if ($action != 'add') {
			$data['record'] = $this->merchants_model->find($id);
		}

		// render the page
		$this->template->set_template('modal');
		$this->template->add_css(module_css('merchants', 'merchants_form'), 'embed');
		$this->template->add_js(module_js('merchants', 'merchants_form'), 'embed');
		$this->template->write_view('content', 'merchants_form', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * delete
	 *
	 * @access	public
	 * @param	integer $id
	 * @author 	CMS Admin <densetsu.ghem@gmail.com>
	 */
	function delete($id)
	{
		$this->acl->restrict('merchants.merchants.delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_button'] = lang('button_delete');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->merchants_model->delete($id);

			echo json_encode(array('success' => true, 'message' => lang('delete_success'))); exit;
		}

		$this->load->view('../../modules/core/views/confirm', $data);
	}


	// --------------------------------------------------------------------

	/**
	 * _save
	 *
	 * @access	private
	 * @param	string $action
	 * @param 	integer $id
	 * @author 	CMS Admin <densetsu.ghem@gmail.com>
	 */
	private function _save($action = 'add', $id = 0)
	{
		// validate inputs
		$this->form_validation->set_rules('merchant_merchant', lang('merchant_merchant'), 'required');
		$this->form_validation->set_rules('merchant_location', lang('merchant_location'), 'required');
		$this->form_validation->set_rules('merchant_status', lang('merchant_status'), 'required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$data = array(
			'merchant_merchant'		=> $this->input->post('merchant_merchant'),
			'merchant_location'		=> $this->input->post('merchant_location'),
			'merchant_status'		=> $this->input->post('merchant_status'),
		);
		

		if ($action == 'add')
		{
			$insert_id = $this->merchants_model->insert($data);
			$return = (is_numeric($insert_id)) ? $insert_id : FALSE;
		}
		else if ($action == 'edit')
		{
			$return = $this->merchants_model->update($id, $data);
		}

		return $return;

	}
}

/* End of file Merchants.php */
/* Location: ./application/modules/merchants/controllers/Merchants.php */