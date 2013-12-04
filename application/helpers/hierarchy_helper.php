<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        
    function isParent($topic, $topicHierarchy){
        foreach($topicHierarchy as $relation){
            if($relation->idTopic == $topic)
                return false;
        }
        return true;
    }
    function displayTree($parent,$topicParents,$str=""){    
        foreach($parent as $key => $value){
            if($key === "id"){
                if( isParent($parent["id"], $topicParents)){
                    $str = $str ."&". $parent["id"];
                } else {
                    $str = $str . $parent["id"];
                }
            }
            if($key !== "id"){
                $str = $str . "["; 
                $str = displayTree($value, $topicParents, $str);
                $str = $str . "]";                
            }
        }
        return $str;
    }
    
    function constructHierarchy(array $hierarchyData, $parentId) {
        $hierarchy = array("id" => $parentId);
        foreach ($hierarchyData as $relation) {
            if ($relation['idTopicHierarchy'] == $parentId) {
                $child = array("id"=>$relation['idTopic']);
                $children = constructHierarchyNoParent($hierarchyData, $relation['idTopic']);
                if ($children) {
                    $child[] = $children;
                }
                    $hierarchy[] = $child;
            }
        }
        //print_r($hierarchy);
        return $hierarchy;
    }
    function constructHierarchyNoParent(array $hierarchyData, $parentId = 1) {
        $hierarchy = array();
        foreach ($hierarchyData as $relation) {
            if ($relation['idTopicHierarchy'] == $parentId) {
                $child = array("id"=>$relation['idTopic']);
                $children = constructHierarchyNoParent($hierarchyData, $relation['idTopic']);
                if ($children) {
                    $child[] = $children;
                }
                    $hierarchy[] = $child;
            }
        }
        return $hierarchy;
    }
