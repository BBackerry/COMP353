<?php
class Paper_model extends CI_Model {
	
	function get_all_paper()
	{
		$sql = "SELECT * FROM paper ";
		$query = $this->db->query($sql); 
		return $query->result();
	}
	
	function get_paper($idPaper)
	{
		$sql = "SELECT * FROM paper WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}
	
	function get_accepted_paper_match_by_title_submittedBy_keywords_eventName($title, $submittedBy, $keywords, $eventName)
	{
		$sql = "SELECT paper.idPaper, paper.title, paper.abstract, paper.submittedBy, paper.keywords, paper.idEvent, paperdecision.decision, event.eventName FROM paper JOIN paperDecision ON paper.idPaper = paperDecision.idPaper JOIN event ON paper.idEvent = event.idEvent WHERE keywords LIKE $keywords OR title LIKE $title OR submittedBy LIKE $submittedBy OR eventName LIKE $eventName AND decision = 1";
		$query = $this->db->query($sql); 
		return $query->result();
	}
	
	function get_accepted_paper_match_by_title_submittedBy_keywords($title, $submittedBy, $keywords, $idEvent)
	{
		$sql = "SELECT paper.idPaper, paper.title, paper.abstract, paper.submittedBy, paper.keywords, paper.idEvent, event.eventName FROM paper JOIN paperDecision ON paper.idPaper = paperDecision.idPaper JOIN event ON paper.idEvent = event.idEvent WHERE paper.idEvent = $idEvent AND keywords LIKE $keywords OR title LIKE $title OR submittedBy LIKE $submittedBy ";
		$query = $this->db->query($sql); 
		return $query->result();
	}
	
	function get_paper_by_event($idEvent)
	{
		$sql = "SELECT * FROM paper WHERE idEvent = ? ";
		$query = $this->db->query($sql, array($idEvent)); 
		return $query->result();
	}
	
	function get_paper_no_blob($idPaper)
	{
		$sql = "SELECT idPaper, title, abstract, submittedBy, keywords, idEvent FROM paper WHERE idPaper = ? ";
		$query = $this->db->query($sql, array($idPaper)); 
		return $query->result();
	}
	
	function get_paper_by_user($idUser)
	{
		$sql = "SELECT * FROM paper WHERE submittedBy = ? ";
		$query = $this->db->query($sql, array($idUser));
		return $query->result();
	}
	
	function get_paper_by_user_no_blob($idUser)
	{
		$sql = "SELECT idPaper, title, abstract, submittedBy, keywords, idEvent FROM paper WHERE submittedBy = ? ";
		$query = $this->db->query($sql, array($idUser)); 
		return $query->result();
	}
	
	function get_paper_by_event_no_blob($idEvent)
	{
		$sql = "SELECT idPaper, title, abstract, submittedBy, keywords, idEvent FROM paper WHERE idEvent = ?";
		$query = $this->db->query($sql, array($idEvent)); 
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