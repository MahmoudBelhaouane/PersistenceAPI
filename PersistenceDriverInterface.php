<?php							

interface PersistenceDriverInterface{							
    public function find($className, $condition);					
    public function remove($className, $id);					
    public function add($className, $object);    	
    public function update($className, $object);
}							
?>			