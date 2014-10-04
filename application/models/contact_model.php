<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model Extends MY_Model {

	/**
	 * Contact Model.
	 *
	 * Structure and main functions for CRUD actions on a user.
	 */
	private $required_fields = array('first_name' => 'First Name', 'last_name' => 'Last Name', 'email_address' => 'Email Address');
	private $search_columns = array('contact_id','first_name', 'last_name', 'email_address', 'phone_home', 'phone_mobile');
	
	function __construct()
    {
        parent::__construct();
    }

    public function search($string = '')
	{
		foreach ($this->search_columns as $column_name)
		{
			if (!empty($search_string))
				$search_string .= " OR {$column_name} LIKE '%{$string}%'";
			else
				$search_string = "{$column_name} LIKE '%{$string}%'";
		}

		$this->db->where($search_string);
		return $this->db->get('contacts')->result_array();
	}

	public function create($contact_data = array())
	{
		if (empty($contact_data))
			return array('<b>No Contact Data Submitted</b>');

		if ($response = $this->validate($contact_data))
			return $response;

		$this->db->insert('contacts', $contact_data);

		return $this->db->insert_id();
	}

	public function update($contact_data = array())
	{
		if (empty($contact_data))
			return array('<b>No Contact Data Submitted</b>');

		$contact_id = $contact_data['contact_id'];
		unset($contact_data['contact_id']);

		if (empty($contact_id))
			return array('<b>No Contact ID Submitted</b>');

		if ($response = $this->validate($contact_data))
			return $response;

		$this->db->where('contact_id', $contact_id);
		$result = $this->db->update('contacts', $contact_data);

		if ($result)
			return $contact_id;

		return array('An unexpected error has occurred. Please try again.');
	}

	public function get_contact($filter = array())
	{
		$this->db->where($filter);
		return $this->db->get('contacts')->row_array();
	}

	private function validate($contact_data = array())
	{
		if (empty($contact_data))
			return array('<b>No Contact Data Submitted</b>');

		$errors = array();

		foreach ($this->required_fields as $field => $name)
		{
			if (empty($contact_data[$field]))
				$errors[] = '<b>Missing field</b>: '.$name;
		}

		return !empty($errors) ? $errors : FALSE;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */