<?php
class Meeting_model extends CI_Model {

	function get_meeting($idMeeting)
	{
		$sql = "SELECT * FROM meeting WHERE idMeeting = ? ";
		$query = $this->db->query($sql, array($idMeeting)); 
		return $query->result();
	}

	function get_meeting_by_place($idPlace)
	{
		$sql = "SELECT * FROM meeting WHERE idPlace = ? ";
		$query = $this->db->query($sql, array($idPlace)); 
		return $query->result();
	}

	function get_all_meeting()
	{
		$sql = "SELECT * FROM meeting ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_meeting($idPlace, $createdBy, $startTime, $endTime)
	{
		$sql = "INSERT INTO meeting (idPlace, createdBy, startTime, endTime) VALUES( ?, ?, ?, ? )";
		$query = $this->db->query($sql, array($idPlace, $createdBy, $startTime, $endTime)); 
		return $query;
	}

	function update_meeting($idMeeting, $idPlace, $createdBy, $startTime, $endTime)
	{
		$sql = "UPDATE meeting SET idPlace = ?, createdBy = ?, startTime = ?, endTime = ?  WHERE idMeeting = ? ";
		$query = $this->db->query($sql, array($idPlace, $createdBy, $startTime, $endTime, $idMeeting)); 
		return $query;
	}

	function delete_meeting($idMeeting)
	{
		$sql = "DELETE FROM meeting WHERE idMeeting= ? ";
		$query = $this->db->query($sql, array($idMeeting)); 
		return $query;
	}

}
?>