<?php
class PaperDecision_model extends CI_Model {

	function get_paperDecision($idPaper)
	{
		$sql = "SELECT * FROM paperDecision WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}
	
	function get_paperDecision_by_paper_and_user($idPaper, $idUser)
	{
		$sql = "SELECT * FROM paperDecision WHERE idPaper = ? AND decidedBy = ?";
		$query = $this->db->query($sql, array($idPaper, $idUser)); 
		return $query->result();
	}

	function get_all_paperDecision()
	{
		$sql = "SELECT * FROM paperDecision ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_paperDecision($idPaper, $decision, $decidedBy, $reason)
	{
		$sql = "INSERT INTO paperDecision VALUES( ?, ? , ?, ?)";
		$query = $this->db->query($sql, array($idPaper, $decision, $decidedBy, $reason)); 
		return $query;
	}

	function update_paperDecision($idPaper, $decision, $decidedBy, $reason)
	{
		$sql = "UPDATE paperDecision SET decision = ?, decidedBy = ?, reason = ? WHERE idPaper = ?";
		$query = $this->db->query($sql, array($decision, $decidedBy, $reason, $idPaper)); 
		return $query;
	}
	
	function update_paperDecision_by_paper_and_user($idPaper, $decision, $decidedBy, $reason)
	{
		$sql = "UPDATE paperDecision SET decision = ?, reason = ? WHERE idPaper = ? AND decidedBy = ?";
		$query = $this->db->query($sql, array($decision, $reason, $idPaper, $decidedBy)); 
		return $query;
	}

	function delete_paperDecision($idPaper)
	{
		$sql = "DELETE FROM paperDecision WHERE idPaper= ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query;
	}

}
?>