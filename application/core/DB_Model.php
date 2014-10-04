<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Database_Model
 *
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Config $config
 * @property CI_Loader $load
 * @property CI_Session $session
 */
class DB_Model extends CI_Model {

	protected $table_name;
	protected $primary_key = 'id';

	public function get($primary_value)
	{
		return $this->get_by($this->primary_key, $primary_value);
	}

	public function get_by($key, $value = NULL)
	{
		$query = $this->db->from($this->table_name);

		if ( ! is_array($key) && $value !== NULL)
		{
			$key = array($key => $value);
		}

		$query->where($key)->limit(1);

		$this->pre_get($query);
		$result = $query->get()->row_array();

		return $this->post_get($result);
	}

	public function get_many_by($key = NULL, $value = NULL, $limit = NULL, $offset = 0)
	{
	    $query = $this->db->from($this->table_name);

	    if ($key !== NULL)
		{
	        if ( ! is_array($key) && $value !== NULL)
			{
    	        $key = array($key => $value);
    	    }

			$query->where($key);
	    }

	    if ($limit !== NULL)
		{
	        $query->limit($limit, $offset);
	    }

		$this->pre_get($query);
		$result = $query->get()->result_array();

		return $this->post_get($result);
	}

	public function get_all($limit = NULL, $offset = 0)
	{
	    return $this->get_many_by(NULL, NULL, $limit, $offset);
	}

	// Assumes column exsits
	public function get_column($column, $key = NULL, $value = NULL)
	{
		if ( ! is_array($key) && $value == NULL)
		{
			$value = $key;
			$key = $this->primary_key;
		}

		$query = $this->db->select($column)
			->from($this->table_name)
			->where($key, $value);

		$this->pre_get($query);
		$result = $query->get()->row_array();

		if ($result && isset($result[$column]))
		{
			return $result[$column];
		}

		return NULL;
	}

	public function create($values)
	{
		$query = $this->db->set($values);

		$this->pre_create($query);
		$result = $query->insert($this->table_name) ? $this->db->insert_id() : FALSE;

		return $this->post_create($result);
	}

	public function update($primary_value, $values)
	{
		$query = $this->db->set($values)
			->where($this->primary_key, $primary_value);

		$this->pre_update($query);
		$result = $query->update($this->table_name);

		return $this->post_update($result);
	}

	public function delete($primary_value)
	{
		$query = $this->db->where($this->primary_key, $primary_value);

		$this->pre_delete($query);
		$result = $query->delete($this->table_name) ? $this->db->affected_rows() > 0 : FALSE;

		return $this->post_delete($result);
	}

	public function count_all()
	{
		return $this->db->count_all($this->table_name);
	}

	public function __call($method, $args)
	{
		if (strncmp($method, 'get_by_', 7) === 0)
		{
			return $this->get_by(substr($method, 7), reset($args));
		}
		elseif (strncmp($method, 'get_many_by_', 12) === 0)
		{
			return $this->get_many_by(substr($method, 12), reset($args));
		}
	}

	protected function pre_get(&$query) {}

	protected function post_get($result)
	{
		return $result;
	}

	protected function pre_create(&$query) {}

	protected function post_create($result)
	{
		return $result;
	}

	protected function pre_update(&$query) {}

	protected function post_update($result)
	{
		return $result;
	}

	protected function pre_delete(&$query) {}

	protected function post_delete($result)
	{
		return $result;
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */