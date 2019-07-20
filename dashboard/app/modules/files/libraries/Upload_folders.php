<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Upload_folders Class
 *
 * @package		Codifire
 * @version		1.0
 */
class Upload_folders {

	/**
	* Constructor
	*
	* @access	public
	*
	*/
	public function __construct()
	{
		log_message('debug', "Upload_folders Class Initialized");
	}
	
	// --------------------------------------------------------------------

	/**
	 * get
	 *
	 * Returns the current upload folder
	 *
	 * @access	public
	 * @param	none
	 */	
	function get()
	{
		$upload_path = 'data/uploads/';

		$year = date("Y");   
		$month = date("m");   
		
		$year_folder = FCPATH . $upload_path . $year;   
		$month_folder = FCPATH . $upload_path . $year . "/" . $month;

		if (file_exists($year_folder))
		{
			if (file_exists($month_folder) == FALSE)
			{
				mkdir($month_folder, 0777);
			} 
		}
		else
		{
			mkdir($year_folder, 0777);
			mkdir($month_folder, 0777);
		}

		return $upload_path . $year . "/" . $month;
	}
}

/* End of file Upload_folders.php */
/* Location: ./application/libraries/Upload_folders.php */