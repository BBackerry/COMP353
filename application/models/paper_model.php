<?php
class Paper_model extends CI_Model {
	
	function get_paper($idPaper)
	{
		$sql = "SELECT * FROM paper WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}
	
	function get_paper_by_user($idUser)
	{
		$sql = "SELECT * FROM paper WHERE submittedBy = ? ";
		$query = $this->db->query($sql, array($idUser));
		return $query->result();
	}

	function create_paper($title, $abstract, $submittedby, $document, $keywords, $idEvent)
	{
		$sql = "INSERT INTO paper VALUES(NULL, ?, ?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($title, $abstract, $submittedby, $document, $keywords, $idEvent)); 
		return $query;
	}

	function update_paper($idpaper, $title, $abstract, $submittedby, $document, $keywords)
	{
		$sql = "UPDATE paper SET title = ?, abstract = ?, submittedBy = ?, document = ?, keywords = ? WHERE idPaper = ?";
		$query = $this->db->query($sql, array( $title, $abstract, $submittedby, $document, $keywords, $idpaper)); 
		return $query;
	}

	function delete_paper($idpaper)
	{
		$sql = "DELETE FROM paper WHERE idPaper= ? ";
		$query = $this->db->query($sql, array($idpaper)); 
		return $query;
	}
}
?>