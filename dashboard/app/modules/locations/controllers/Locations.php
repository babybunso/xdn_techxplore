<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Locations Class
 *
 * @package		 DG
 * @version		1.0
 * @author 		CMS Admin <densetsu.ghem@gmail.com>
 * @copyright 	Copyright (c) 2019, DXN Team
 * @link		 http://densetsughem.com
 */
class Locations extends MX_Controller {
	
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
		$this->load->model('locations_model');
		$this->load->language('locations');
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
		$this->acl->restrict('locations.locations.list');
		
		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('locations'));
		
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
		$this->template->add_css(module_css('locations', 'locations_index'), 'embed');
		$this->template->add_js(module_js('locations', 'locations_index'), 'embed');
		$this->template->write_view('content', 'locations_index', $data);
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
		$this->acl->restrict('locations.locations.list');

		echo $this->locations_model->get_datatables();
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
		$this->acl->restrict('locations.locations.' . $action, 'modal');

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
					'location_location'		=> form_error('location_location'),
					'location_city'		=> form_error('location_city'),
					'location_status'		=> form_error('location_status'),
				);
				echo json_encode($response);
				exit;
			}
		}

		if ($action != 'add') $data['record'] = $this->locations_model->find($id);


		

		// render the page
		$this->template->set_template('modal');
		$this->template->add_css(module_css('locations', 'locations_form'), 'embed');
		$this->template->add_js(module_js('locations', 'locations_form'), 'embed');
		$this->template->write_view('content', 'locations_form', $data);
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
		$this->acl->restrict('locations.locations.delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_button'] = lang('button_delete');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->locations_model->delete($id);

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
		$this->form_validation->set_rules('location_location', lang('location_location'), 'required');
		$this->form_validation->set_rules('location_city', lang('location_city'), 'required');
		$this->form_validation->set_rules('location_status', lang('location_status'), 'required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$data = array(
			'location_location'		=> $this->input->post('location_location'),
			'location_city'		=> $this->input->post('location_city'),
			'location_status'		=> $this->input->post('location_status'),
		);
		

		if ($action == 'add')
		{
			$insert_id = $this->locations_model->insert($data);
			$return = (is_numeric($insert_id)) ? $insert_id : FALSE;
		}
		else if ($action == 'edit')
		{
			$return = $this->locations_model->update($id, $data);
		}

		return $return;

	}
}

/* End of file Locations.php */
/* Location: ./application/modules/locations/controllers/Locations.php */