<?php
class ReviewAssignment_model extends CI_Model {

	function get_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper)
	{
		$sql = "SELECT * FROM reviewAssignment WHERE idAssignedBy = ? AND idAssignedTo = ? AND idPaper = ? ";
		$query = $this->db->query($sql, array($idAssignedBy, $idAssignedTo, $idPaper)); 
		return $query->result();
	}

	function get_all_reviewAssignment()
	{
		$sql = "SELECT * FROM reviewAssignment ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function get_reviewAssignment_by_assignedBy($idAssignedBy)
	{
		$sql = "SELECT * FROM reviewAssignment WHERE idAssignedBy = ? ";
		$query = $this->db->query($sql, array($idAssignedBy));
		return $query->result();
	}
	
	function get_paper_assignedTo_user($idUser)
	{
		$sql = "SELECT * FROM paper p WHERE EXISTS(SELECT * FROM reviewAssignment r WHERE p.idPaper = r.idPaper AND r.idAssignedTo = ?)";
		$query = $this->db->query($sql, array($idUser));
		return $query->result();
	}
	
	function get_reviewAssignment_by_assignedTo($idAssignedTo)
	{
		$sql = "SELECT * FROM reviewAssignment WHERE idAssignedTo = ? ";
		$query = $this->db->query($sql, array($idAssignedTo));
		return $query->result();
	}

	function get_reviewAssignment_by_paper($idPaper)
	{
		$sql = "SELECT * FROM reviewAssignment WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper));
		return $query->result();
	}

	function create_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper)
	{
		$sql = "INSERT INTO reviewAssignment (idAssignedBy, idAssignedTo, idPaper) VALUES( ?, ?, ?)";
		$query = $this->db->query($sql, array($idAssignedBy, $idAssignedTo, $idPaper)); 
		return $query;
	}

	function update_reviewAssignment($idAssignedTo, $idPaper, $comment, $score)
	{
		$sql = "UPDATE reviewAssignment SET comment = ?, score = ? WHERE idAssignedTo = ? AND idPaper = ? ";
		$query = $this->db->query($sql, array( $comment, $score, $idAssignedTo, $idPaper)); 
		return $query;
	}

	function delete_reviewAssignment($idAssignedTo, $idPaper)
	{
		$sql = "DELETE FROM reviewAssignment WHERE idAssignedTo = ? AND idPaper = ? ";
		$query = $this->db->query($sql, array($idAssignedTo, $idPaper)); 
		return $query;
	}

}
?>