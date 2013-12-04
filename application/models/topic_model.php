<?php
class Topic_model extends CI_Model {

	function get_topic($idTopic)
	{
		$sql = "SELECT * FROM topic WHERE idTopic = ? ";
		$query = $this->db->query($sql, array($idTopic)); 
		return $query->result();
	}

	function get_all_topic()
	{
		$sql = "SELECT * FROM topic ";
		$query = $this->db->query($sql); 
		return $query->result();
	}

	function create_topic($topicName)
	{
		$sql = "INSERT INTO topic (topicName) VALUES( ? )";
		$query = $this->db->query($sql, array($topicName)); 
		return $query;
	}

	function update_topic($idTopic, $topicName )
	{
		$sql = "UPDATE topic SET topicName = ? WHERE idTopic = ? ";
		$query = $this->db->query($sql, array( $topicName, $idTopic)); 
		return $query;
	}

	function delete_topic($idTopic)
	{
		$sql = "DELETE FROM topic WHERE idTopic= ? ";
		$query = $this->db->query($sql, array($idTopic)); 
		return $query;
	}

}
?>