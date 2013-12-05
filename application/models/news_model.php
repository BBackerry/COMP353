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
    function get_all_news_for_event($idEvent)
	{
		$sql = "SELECT * FROM news WHERE idEvent = ? OR idEvent = 1 ORDER BY newsDate DESC";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}
	function create_news($newsTitle, $newsDate, $newsDescription, $createdBy, $idEvent )
	{
		$sql = "INSERT INTO news (newsTitle, newsDate, newsDescription, createdBy, idEvent) VALUES( ?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($newsTitle, $newsDate, $newsDescription, $createdBy, $idEvent )); 
		return $query;
	}

	function update_news($idNews, $newsTitle, $newsDate, $newsDescription, $createdBy, $idEvent)
	{
		$sql = "UPDATE news SET newsTitle = ?, newsDate = ?, newsDescription = ?, createdBy = ?, idEvent = ? WHERE idNews = ?";
		$query = $this->db->query($sql, array( $newsTitle, $newsDate, $newsDescription, $createdBy, $idEvent, $idNews)); 
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