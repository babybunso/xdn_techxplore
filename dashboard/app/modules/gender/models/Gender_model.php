<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Gender_model Class
 *
 * @package		 DG
 * @version		1.0
 * @author 		CMS Admin <densetsu.ghem@gmail.com>
 * @copyright 	Copyright (c) 2019, DXN Team
 * @link		http://densetsughem.com
 */
class Gender_model extends BF_Model {

	protected $table_name			= 'gender';
	protected $key					= 'gender_id';
	protected $date_format			= 'datetime';
	protected $log_user				= TRUE;

	protected $set_created			= TRUE;
	protected $created_field		= 'gender_created_on';
	protected $created_by_field		= 'gender_created_by';

	protected $set_modified			= TRUE;
	protected $modified_field		= 'gender_modified_on';
	protected $modified_by_field	= 'gender_modified_by';

	protected $soft_deletes			= TRUE;
	protected $deleted_field		= 'gender_deleted';
	protected $deleted_by_field		= 'gender_deleted_by';

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
			'gender_id',
			'gender_label',
			'gender_status',

			'gender_created_on', 
			'concat(creator.first_name, " ", creator.last_name)', 
			'gender_modified_on', 
			'concat(modifier.first_name, " ", modifier.last_name)'
		);

		return $this->join('users as creator', 'creator.id = gender_created_by', 'LEFT')
					->join('users as modifier', 'modifier.id = gender_modified_by', 'LEFT')
					->datatables($fields);
	}
}