<?php
class eventTopic_model extends CI_Model {

		function get_eventTopic($idEvent)
	{
		$sql = "SELECT * FROM eventTopic WHERE idEvent = ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}

	function get_all_eventTopic()
	{
		$sql = "SELECT * FROM eventTopic ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_eventTopic($idEvent, $idTopic)
	{
		$sql = "INSERT INTO eventTopic VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idEvent, $idTopic)); 
		return $query;
	}

	function update_eventTopic($idEvent, $idTopic )
	{
		$sql = "UPDATE eventTopic SET idTopic = ? WHERE idEvent = ? ";
		$query = $this->db->query($sql, array( $idTopic, $idEvent)); 
		return $query;
	}

	function delete_eventTopic($idEvent)
	{
		$sql = "DELETE FROM eventTopic WHERE idEvent= ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query;
	}

}
?>