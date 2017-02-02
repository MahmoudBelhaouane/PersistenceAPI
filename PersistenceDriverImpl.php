<?php
    include('PersistenceDriverEngine.php');
    include('PersistenceDriverUtil.php');
    include('PersistenceDriverInterface.php');

    class PersistenceDriverImpl implements PersistenceDriverInterface{
      private $db;
      private $res;

    public function find($className, $condition='', $orderBy=''){

    $this->db = new Database();
    $this->db->connect();
    $tableName = buildTableName($this->db->getPrefixe(), $className);
    $this->db->select($tableName, '*',null , $condition, $orderBy);	 // Table name	 Column Names	 WHERE conditions	 ORDER BY conditions
    $res = $this->db->getResult();
    $this->db->disconnect();
    return asJson($res);
    }

    public function remove($className, $id){
    					//second branch test		
    $this->db = new Database();
    $this->db->connect();
    $tableName = buildTableName($this->db->getPrefixe(), $className);
    $this->db->delete($tableName, 'id='.$id);	  // Table name	 WHERE conditions
    $this->db->disconnect();
        }

    public function add($className, $object){

    $this->db = new Database();
    $this->db->connect();
    //add escape input
    $tableName = buildTableName($this->db->getPrefixe(), $className);
    $this->db->insert($tableName, $object);	  // Table name	 column names and respective values
}

    public function update($className, $object){
    $this->db = new Database();
    $this->db->connect();
    $tableName = buildTableName($this->db->getPrefixe(), $className);
    $this->db->update($tableName,$object,'id='.$object['id']); // Table name, column names and values, WHERE conditions
        }
}
?>
