<?php
class MeetingEvent_model extends CI_Model {

	function get_meetingEvent($idEvent)
	{
		$sql = "SELECT * FROM meetingEvent WHERE idEvent = ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}

	function get_all_meetingEvent()
	{
		$sql = "SELECT * FROM meetingEvent ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_meetingEvent($idEvent, $idMeeting)
	{
		$sql = "INSERT INTO meetingEvent VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idEvent, $idMeeting)); 
		return $query;
	}

	function delete_meetingEvent($idEvent, $idMeeting)
	{
		$sql = "DELETE FROM meetingEvent WHERE idEvent= ? AND idMeeting = ? ";
		$query = $this->db->query($sql, array($idEvent, $idMeeting)); 
		return $query;
	}
	
	function delete_meetingEvent_by_event($idEvent)
	{
		$sql = "DELETE FROM meetingEvent WHERE idEvent= ?";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query;
	}

}
?>