<?php

/**
 * Get a organization by ID
 *
 */
function db_get_organization($idOrganization)
{
   $CI = get_instance();
   $sql = "SELECT * FROM organization WHERE idOrganization = ? ";

   $query = $CI->db->query($sql, array($idOrganization)); 
   return $query;
}

function db_get_all_organization()
{
   $CI = get_instance();
   $sql = "SELECT * FROM organization ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_organization($idOrganization, $organizationName)
{
   $CI = get_instance();
   $sql = "INSERT INTO organization VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idOrganization, $organizationName)); 
   return $query;
}

function update_organization($idOrganization, $organizationName )
{
   $CI = get_instance();
   $sql = "UPDATE organization SET organizationName = ? WHERE idOrganization = ? ";

   $query = $CI->db->query($sql, array( $organizationName, $idOrganization)); 
   return $query;
}

function delete_organization($idOrganization)
{
   $CI = get_instance();
   $sql = "DELETE FROM organization WHERE idOrganization= ? ";

   $query = $CI->db->query($sql, array($idOrganization)); 
   return $query;
}

function get_collumns()
{
    return('idOrganization', 'organizationName');
}

?>