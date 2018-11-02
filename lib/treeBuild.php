<?php

namespace lib;
class TreeBuild{

    private $data;
    private $column;
    private $ids = array('id' => 'id', 'parent' => 'parent_id');
    
    public function set(array $tree){
    
        $this->getColumn($tree);
        $this->data = $tree;

        return $this;
        
    }
    
    private function getColumn($data){
    
        $this->column = array_keys($data[0]);
        
    }
    public function setColumn(array $data){
    
        $this->ids = array(
        'id' => $data[0],
        'parent' => $data[1]
        );

        return $this;
    
    }
    private function Column($arr, $tree){
    
        $return = array();
        
        $return["id"] = $arr[ $this->ids['id']];
        
        foreach($this->column as $column){
        
            if(!in_array($column, $this->ids) && isset($arr[$column])){
            
                $return[$column] = $arr[$column];
            
            }
        
        }
        
        $return["children"] = $this->build($tree, $arr[ $this->ids['id'] ]);
                     
        return $return;
    }
    
    public function build($tree, $root = null){
    
        $result = array();
        
        foreach($tree as $arr){
            
                if($root == $arr[ $this->ids['parent'] ]){
            
                    unset($tree[ $arr[ $this->ids['id'] ] ]);
                
                    $result[] = $this->Column($arr,$tree);
            
                }
        }
        return (empty($result))? null : $result;
    
    }
    
    public function get(){

        return $this->build($this->data, null);
    
    }

}


?>
