<?php
class Role_model extends CI_Model {

	function get_role_of_user($idUser)
	{
		$sql = "SELECT * FROM role WHERE idUser = ? ";
		$query = $this->db->query($sql, array($idUser)); 
		return $query->result();
	}

	function get_role_by_event($idEvent)
	{
		$sql = "SELECT * FROM role WHERE idEvent = ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}
	
	function get_role_by_position($idPosition)
	{
		$sql = "SELECT * FROM role WHERE idPosition = ? ";
		$query = $this->db->query($sql, array($idPosition)); 
		return $query->result();
	}
	
	function get_all_role()
	{
		$sql = "SELECT * FROM role ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_role_of_user_in_event($idUser, $idEvent)
	{
		$sql = "SELECT * FROM role WHERE idUser = ? AND idEvent = ?";
		$query = $this->db->query($sql, array($idUser, $idEvent)); 
		return $query->result();
	}


	function create_role($idUser, $idEvent, $idPosition)
	{
		$sql = "INSERT INTO role VALUES( ?, ?, ? )";
		$query = $this->db->query($sql, array($idUser, $idEvent, $idPosition)); 
		return $query;
	}

	function update_role($idUser, $idEvent, $idPosition)
	{
		$sql = "UPDATE role SET idPosition = ? WHERE idUser = ? AND idEvent = ? ";
		$query = $this->db->query($sql, array( $idPosition, $idUser, $idEvent)); 
		return $query;
	}

	function delete_role($idUser, $idEvent)
	{
		$sql = "DELETE FROM role WHERE idUser= ? AND idEvent = ? ";
		$query = $this->db->query($sql, array($idUser, $idEvent)); 
		return $query;
	}

}
?>