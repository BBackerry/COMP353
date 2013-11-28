<?php
class PaperDecision_model extends CI_Model {

	function get_paperDecision($idPaper)
	{
		$sql = "SELECT * FROM paperDecision WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}

	function get_all_paperDecision()
	{
		$sql = "SELECT * FROM paperDecision ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_paperDecision($idPaper, $decision, $decidedBy)
	{
		$sql = "INSERT INTO paperDecision VALUES( ?, ? , ?)";
		$query = $this->db->query($sql, array($idPaper, $decision, $decidedBy)); 
		return $query;
	}

	function update_paperDecision($idPaper, $decision, $decidedBy )
	{
		$sql = "UPDATE paperDecision SET decision = ?, decidedBy = ? WHERE idPaper = ? ";
		$query = $this->db->query($sql, array( $decision, $decidedBy, $idPaper)); 
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