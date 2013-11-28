<?php
class TopicHierarchy_model extends CI_Model {

	function get_topicHierarchy_of_topic($idTopic)
	{
		$sql = "SELECT * FROM topicHierarchy WHERE idTopic = ? ";
		$query = $this->db->query($sql, array($idTopic)); 
		return $query->result();
	}

	function get_all_topicHierarchy()
	{
		$sql = "SELECT * FROM topicHierarchy ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_topicHierarchy($idTopic, $idTopicHierarchy)
	{
		$sql = "INSERT INTO topicHierarchy VALUES( ?, ? )";
		$query = $this->db->query($sql, array($idTopic, $idTopicHierarchy)); 
		return $query;
	}

	function update_topicHierarchy($idTopic, $idTopicHierarchy )
	{
		$sql = "UPDATE topicHierarchy SET idTopicHierarchy = ? WHERE idTopic = ? ";
		$query = $this->db->query($sql, array( $idTopicHierarchy, $idTopic)); 
		return $query;
	}

	function delete_topicHierarchy($idTopic)
	{
		$sql = "DELETE FROM topicHierarchy WHERE idTopic= ? ";
		$query = $this->db->query($sql, array($idTopic)); 
		return $query;
	}

}
?>