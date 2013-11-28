<?php
class Department_model extends CI_Model {

	function get_department($idDepartment)
	{
		$sql = "SELECT * FROM department WHERE idDepartment = ? ";
		$query = $this->db->query($sql, array($idDepartment)); 
		return $query->result();
	}

	function get_all_department()
	{
		$sql = "SELECT * FROM department";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_department($idDepartment, $departmentName)
	{
		$sql = "INSERT INTO department VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idDepartment, $departmentName)); 
		return $query;
	}

	function update_department($idDepartment, $departmentName )
	{
		$sql = "UPDATE department SET departmentName = ? WHERE idDepartment = ? ";
		$query = $this->db->query($sql, array( $departmentName, $idDepartment)); 
		return $query;
	}

	function delete_department($idDepartment)
	{
		$sql = "DELETE FROM department WHERE idDepartment= ? ";
		$query = $this->db->query($sql, array($idDepartment)); 
		return $query;
	}

}
?>