<?php
class Position_model extends CI_Model {

	function get_position($idPosition)
	{
		$sql = "SELECT * FROM position WHERE idPosition = ? ";
		$query = $this->db->query($sql, array($idPosition)); 
		return $query->result();
	}

	function get_all_position()
	{
		$sql = "SELECT * FROM position ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_position($idPosition, $positionName)
	{
		$sql = "INSERT INTO position VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idPosition, $positionName)); 
		return $query;
	}

	function update_position($idPosition, $positionName )
	{
		$sql = "UPDATE position SET positionName = ? WHERE idPosition = ? ";
		$query = $this->db->query($sql, array( $positionName, $idPosition)); 
		return $query;
	}

	function delete_position($idPosition)
	{
		$sql = "DELETE FROM position WHERE idPosition= ? ";
		$query = $this->db->query($sql, array($idPosition)); 
		return $query;
	}

}
?>