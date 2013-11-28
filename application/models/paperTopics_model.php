<?php
class PaperTopics_model extends CI_Model {

	function get_paperTopics($idPaper)
	{
		$sql = "SELECT * FROM paperTopics WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}

	function get_all_paperTopics()
	{
		$sql = "SELECT * FROM paperTopics ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_paperTopics($idPaper, $idTopic)
	{
		$sql = "INSERT INTO paperTopics VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idPaper, $idTopic)); 
		return $query;
	}

	function update_paperTopics($idPaper, $idTopic )
	{
		$sql = "UPDATE paperTopics SET idTopic = ? WHERE idPaper = ? ";
		$query = $this->db->query($sql, array( $idTopic, $idPaper)); 
		return $query;
	}

	function delete_paperTopics($idPaper)
	{
		$sql = "DELETE FROM paperTopics WHERE idPaper= ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query;
	}

}
?>