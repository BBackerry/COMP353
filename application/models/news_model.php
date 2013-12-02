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
		$sql = "SELECT * FROM news ORDER BY newsDate DESC";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_news($newsTitle, $newsDate, $newsDescription, $createdBy )
	{
		$sql = "INSERT INTO news (newsTitle, newsDate, newsDescription, createdBy) VALUES( ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($newsTitle, $newsDate, $newsDescription, $createdBy )); 
		return $query;
	}

	function update_news($idNews, $newsTitle, $newsDate, $newsDescription, $createdBy)
	{
		$sql = "UPDATE news SET newsTitle = ?, newsDate = ?, newsDescription = ?, createdBy = ? WHERE idNews = ?";
		$query = $this->db->query($sql, array( $newsTitle, $newsDate, $newsDescription, $createdBy, $idNews)); 
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