<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Contact Controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/contact
	 */
	public function edit_contact_modal($contact_id = NULL)
	{
		if ($contact_id == NULL)
			return FALSE;

		$this->load->model('contact_model');
		$data['contact'] = $this->contact_model->get_contact(array('contact_id' => $contact_id));

		$this->load->view('contact/edit_contact', $data, FALSE);
	}

	public function create_contact_modal()
	{
		$this->load->view('contact/create_contact');
	}

	public function contact_info_modal($contact_id = NULL)
	{
		if ($contact_id == NULL)
			return FALSE;

		$this->load->model('contact_model');
		$data['contact'] = $this->contact_model->get_contact(array('contact_id' => $contact_id));

		$this->load->view('contact/view_contact', $data, FALSE);
	}

	public function ajax_search()
	{
		$this->load->model('contact_model');
		$search_string = $this->input->post('searchString');

		$data['contacts'] = $this->contact_model->search($search_string);

		$result = $this->load->view('contact/contact_list', $data, TRUE);
		$response = array('success' => TRUE, 'response' => $result);

		header('Content-type: application/json');
		echo json_encode($response);
	}

	public function ajax_register()
	{
		$this->load->model('contact_model');
		$email = $this->input->post('email_address');

		$exists = $this->contact_model->get_contact(array('email_address' => $email));

		$response = array('success' => FALSE, 'errors' => array('An unexpected error has occurred. Please try again.'));
		$result = NULL;

		if (!empty($exists))
		{
			$response = array('success' => FALSE, 'errors' => array('A Contact already exists with that Email Address.'));
		} 
		else
		{	
			$new_contact_data = $this->input->post();

			$result = $this->contact_model->create($new_contact_data);

			if (is_int($result))
				$response =  array('success' => TRUE, 'contact_id' => $result);
			else			
				$response = array('success' => FALSE, 'errors' => $result);
		}

		header('Content-type: application/json');
		echo json_encode($response);
	}

	public function ajax_update()
	{
		$this->load->model('contact_model');
		$email = $this->input->post('email_address');
		$contact_id = $this->input->post('contact_id');

		$contact = $this->contact_model->search($email);

		$response = array('success' => FALSE, 'errors' => array('An unexpected error has occurred. Please try again.'));
		$result = NULL;

		if (count($contact) > 1 || $contact[0]['contact_id'] != $contact_id)
		{
			$response = array('success' => FALSE, 'errors' => array('A Contact already exists with that Email Address.'));
		} 
		else
		{		
			$new_contact_data = $this->input->post();

			if ($this->contact_model->update($new_contact_data))
				$response =  array('success' => TRUE, 'contact_id' => $result);
			else			
				$response = array('success' => FALSE, 'errors' => array('Update Failed'));
		}

		header('Content-type: application/json');
		echo json_encode($response);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */