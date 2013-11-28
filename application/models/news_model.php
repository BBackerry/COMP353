<?php
class News_model extends CI_Model {

	function get_news($idNews)
	{
		$sql = "SELECT * FROM news WHERE idNews = ? ";
		$query = $this->db->query($sql, array($idNews)); 
		return $query->result();
	}

	function get_all_news()
	{
		$sql = "SELECT * FROM news ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_news($idNews, $newsDescription, $createdBy)
	{
		$sql = "INSERT INTO news VALUES( ?, ?, ?)";
		$query = $this->db->query($sql, array($idNews, $newsDescription, $createdBy)); 
		return $query;
	}

	function update_news($idNews, $newsDescription, $createdBy)
	{
		$sql = "UPDATE news SET newsDescription = ?, createdBy = ? WHERE idNews = ?";
		$query = $this->db->query($sql, array( $newsDescription, $createdBy, $idNews)); 
		return $query;
	}

	function delete_news($idNews)
	{
		$sql = "DELETE FROM news WHERE idNews= ? ";
		$query = $this->db->query($sql, array($idNews)); 
		return $query;
	}

}
?>