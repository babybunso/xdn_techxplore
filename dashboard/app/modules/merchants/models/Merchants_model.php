<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Merchants_model Class
 *
 * @package		 DG
 * @version		1.0
 * @author 		CMS Admin <densetsu.ghem@gmail.com>
 * @copyright 	Copyright (c) 2019, DXN Team
 * @link		 http://densetsughem.com
 */
class Merchants_model extends BF_Model {

	protected $table_name			= 'merchants';
	protected $key					= 'merchant_id';
	protected $date_format			= 'datetime';
	protected $log_user				= TRUE;

	protected $set_created			= TRUE;
	protected $created_field		= 'merchant_created_on';
	protected $created_by_field		= 'merchant_created_by';

	protected $set_modified			= TRUE;
	protected $modified_field		= 'merchant_modified_on';
	protected $modified_by_field	= 'merchant_modified_by';

	protected $soft_deletes			= TRUE;
	protected $deleted_field		= 'merchant_deleted';
	protected $deleted_by_field		= 'merchant_deleted_by';

	// --------------------------------------------------------------------

	/**
	 * get_datatables
	 *
	 * @access	public
	 * @param	none
	 * @author 	CMS Admin <densetsu.ghem@gmail.com>
	 */
	public function get_datatables()
	{
		$fields = array(
			'merchant_id',
			'merchant_merchant',
			'merchant_location',
			'merchant_status',

			'merchant_created_on', 
			'concat(creator.first_name, " ", creator.last_name)', 
			'merchant_modified_on', 
			'concat(modifier.first_name, " ", modifier.last_name)'
		);

		return $this->join('users as creator', 'creator.id = merchant_created_by', 'LEFT')
					->join('users as modifier', 'modifier.id = merchant_modified_by', 'LEFT')
					->datatables($fields);
	}
}