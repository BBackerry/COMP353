<?php
class PaperAuthor_model extends CI_Model {

	function get_paperAuthor($idPaper)
	{
		$sql = "SELECT * FROM paperAuthor WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}

	function get_all_paperAuthor()
	{
		$sql = "SELECT * FROM paperAuthor ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_paperAuthor($idPaper, $idUser)
	{
		$sql = "INSERT INTO paperAuthor VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idPaper, $idUser)); 
		return $query;
	}

	function delete_paperAuthor($idPaper, $idUser)
	{
		$sql = "DELETE FROM paperAuthor WHERE idPaper= ? AND idUser = ?";
		$query = $this->db->query($sql, array($idPaper, $idUser)); 
		return $query;
	}

}
?>