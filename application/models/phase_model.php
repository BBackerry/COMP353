<?php
class Phase_model extends CI_Model {

	function get_phase($idPhase, $idMeeting)
	{
		$sql = "SELECT * FROM phase WHERE idPhase = ? AND idMeeting = ?";
		$query = $this->db->query($sql, array($idPhase, $idMeeting)); 
		return $query->result();
	}

	function get_all_phase()
	{
		$sql = "SELECT * FROM phase ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_all_phase_for_meeting($idMeeting)
	{
		$sql = "SELECT * FROM phase WHERE idMeeting = ?";
		$query = $this->db->query($sql, array($idMeeting)); 
		return $query->result();
	}

	function create_phase($idPhase, $idMeeting, $startTime, $endTime, $createdBy)
	{
		$sql = "INSERT INTO phase VALUES( ?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($idPhase, $idMeeting, $startTime, $endTime, $createdBy)); 
		return $query;
	}

	function update_phase($idPhase, $idMeeting, $startTime, $endTime, $createdBy )
	{
		$sql = "UPDATE phase SET startTime = ?, endTime = ?, createdBy = ? WHERE idPhase = ? AND idMeeting = ? ";
		$query = $this->db->query($sql, array( $startTime, $endTime, $createdBy, $idPhase, $idMeeting)); 
		return $query;
	}

	function delete_phase($idPhase, $idMeeting)
	{
		$sql = "DELETE FROM phase WHERE idPhase= ? AND idMeeting = ?";
		$query = $this->db->query($sql, array($idPhase, $idMeeting)); 
		return $query;
	}

}
?>