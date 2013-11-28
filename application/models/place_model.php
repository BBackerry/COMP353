<?php
class Place_model extends CI_Model {

	function get_place($idPlace)
	{
		$sql = "SELECT * FROM place WHERE idPlace = ? ";
		$query = $this->db->query($sql, array($idPlace)); 
		return $query->result();
	}

	function get_all_place()
	{
		$sql = "SELECT * FROM place ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_place($idPlace, $placeName)
	{
		$sql = "INSERT INTO place VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idPlace, $placeName)); 
		return $query;
	}

	function update_place($idPlace, $placeName )
	{
		$sql = "UPDATE place SET placeName = ? WHERE idPlace = ? ";
		$query = $this->db->query($sql, array( $placeName, $idPlace)); 
		return $query;
	}

	function delete_place($idPlace)
	{
		$sql = "DELETE FROM place WHERE idPlace= ? ";
		$query = $this->db->query($sql, array($idPlace)); 
		return $query;
	}

}
?>