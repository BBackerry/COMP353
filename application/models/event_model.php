<?php
class Event_model extends CI_Model {

	function get_event($idEvent)
	{
		$sql = "SELECT * FROM event WHERE idEvent = ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}

	function get_all_event()
	{
		$sql = "SELECT * FROM event ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_event($startDate, $endDate, $createdBy, $eventDescription, $eventName)
	{
		$sql ="INSERT INTO event (startDate, endDate, createdBy, eventDescription, eventName) VALUES (?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($startDate, $endDate, $createdBy, $eventDescription, $eventName)); 
		return $query;
	}
	
	function update_event($idEvent, $startDate, $endDate, $createdBy, $eventDescription, $eventName)
	{
		$sql = "UPDATE event SET startDate = ?, endDate = ?, createdBy = ?, eventDescription = ?, eventName = ? WHERE idEvent = ?";
		$query = $this->db->query($sql, array($startDate, $endDate, $createdBy, $eventDescription, $eventName, $idEvent)); 
		return $query;
	}

	function update_paper_decision($idEvent, $startDate, $endDate, $createdBy)
	{
		$sql = "UPDATE event SET startDate = ?, endDate = ?, createdBy = ? WHERE idEvent = ?";
		$query = $this->db->query($sql, array($startDate, $endDate, $createdBy, $idEvent)); 
		return $query;
	}

	function delete_event($idEvent)
	{
		$sql = "DELETE FROM event WHERE idEvent= ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query;
	}

}
?>