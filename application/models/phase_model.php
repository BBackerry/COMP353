<?php
class Phase_model extends CI_Model {

	function get_phase($idPhase, $idEvent)
	{
		$sql = "SELECT * FROM phase WHERE idPhase = ? AND idEvent = ?";
		$query = $this->db->query($sql, array($idPhase, $idEvent)); 
		return $query->result();
	}

	function get_all_phase()
	{
		$sql = "SELECT * FROM phase ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_all_phase_for_event($idEvent)
	{
		$sql = "SELECT * FROM phase WHERE idEvent = ?";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}

	function create_phase($idPhase, $idEvent, $startTime, $endTime)
	{
		$sql = "INSERT INTO phase VALUES( ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($idPhase, $idEvent, $startTime, $endTime)); 
		return $query;
	}

	function update_phase($idPhase, $idEvent, $startTime, $endTime, $createdBy )
	{
		$sql = "UPDATE phase SET startTime = ?, endTime = ?, createdBy = ? WHERE idPhase = ? AND idEvent = ? ";
		$query = $this->db->query($sql, array( $startTime, $endTime, $createdBy, $idPhase, $idEvent)); 
		return $query;
	}

	function delete_phase($idPhase, $idEvent)
	{
		$sql = "DELETE FROM phase WHERE idPhase= ? AND idEvent = ?";
		$query = $this->db->query($sql, array($idPhase, $idEvent)); 
		return $query;
	}

}
?>