<?php
class PhaseType_model extends CI_Model {

	function get_phaseType($idPhase)
	{
		$sql = "SELECT * FROM phaseType WHERE idPhase = ? ";
		$query = $this->db->query($sql, array($idPhase)); 
		return $query->result();
	}

	function get_all_phaseType()
	{
		$sql = "SELECT * FROM phaseType ORDER BY idPhase ASC";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_phaseType($idPhase, $phaseName)
	{
		$sql = "INSERT INTO phaseType VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idPhase, $phaseName)); 
		return $query;
	}

	function update_phaseType($idPhase, $phaseName )
	{
		$sql = "UPDATE phaseType SET phaseName = ? WHERE idPhase = ? ";
		$query = $this->db->query($sql, array( $phaseName, $idPhase)); 
		return $query;
	}

	function delete_phaseType($idPhase)
	{
		$sql = "DELETE FROM phaseType WHERE idPhase= ? ";
		$query = $this->db->query($sql, array($idPhase)); 
		return $query;
	}

}
?>