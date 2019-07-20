<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dashboard Class
 *
 * @package		 
 * @version		1.0
 * @author 		      
 * @copyright 	Copyright (c) 2014-2015,   
 * @link		   
 */
class Dashboard extends CI_Controller 
{
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
		//$this->load->model('users/users_group', 'groups');
		$this->load->model('users/users_groups_model', 'users_groups');

		$this->load->language('dashboard');
	}
	
	// --------------------------------------------------------------------

	/**
	 * index
	 *
	 * @access	public
	 * @param	none
	 * @author 	      
	 */
	public function index()
	{
		// check if database is already installed
		// comment out these lines after installation
		$this->load->dbutil();
		if (! $this->db->table_exists('users'))
		{
			show_error('You must run the installer to use this app.');
		}
		
		$permission = $this->acl->restrict('dashboard.dashboard.list', 'return');
		if (!$permission) show_404();

		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		$data['transactions'] = '';

		$users = $this->users_groups->find_by('user_id',
				$this->session->userdata('user_id'));

		$this->session->set_userdata('group_id', $users->group_id);

		//ghem
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_PORT => "7338",
			CURLOPT_URL => "http://13.250.99.38:7338",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{\"method\":\"listwallettransactions\",\"params\":[],\"id\":\"36584760-1563607250\",\"chain_name\":\"dlt_xdn\"}",
			CURLOPT_HTTPHEADER => array(
				"Accept: */*",
				"Authorization: Basic bXVsdGljaGFpbnJwYzpGQzhCQnI3dUJtamk0OVRoZVE5TkU3cmRGYVZtYXVaaEdRelNqeWpVRWhpWQ==",
				"Cache-Control: no-cache",
				"Connection: keep-alive",
				"Content-Type: application/json",
				"Host: 13.250.99.38:7338",
					"cache-control: no-cache",
				),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data['transactions'] =  json_decode($response);
			
		}

		//ghem


		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('dashboard'));

		// session breadcrumb
		$this->session->set_userdata('redirect', current_url());

		// add plugins
		$this->template->add_css('mods/datatables.net-bs4/css/dataTables.bootstrap4.css');
		$this->template->add_css('mods/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css');
		$this->template->add_js('mods/datatables.net/js/jquery.dataTables.js');
		$this->template->add_js('mods/datatables.net-bs4/js/dataTables.bootstrap4.js');
		$this->template->add_js('mods/datatables.net-responsive/js/dataTables.responsive.min.js');
		$this->template->add_js('mods/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js');





		$this->template->add_css(module_css('dashboard', 'dashboard_index'), 'embed');
		$this->template->add_js(module_js('dashboard', 'dashboard_index'), 'embed');
		$this->template->write_view('content', 'dashboard_index', $data);
		$this->template->render(); //chartContainer
	}
}

/* End of file dashboard.php */
