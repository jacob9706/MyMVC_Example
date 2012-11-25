<?php

/**
 * All rights to this class belong to : http://www.designosis.com/PDO_class/
 */ 
class Database_Helper extends PDO
{
	public $error = '';
    private $crypt_salt = 'somesillystringforsalt'; // min 22 chars alphanumeric
    public  $querycount = 0;

    public function __construct() {
    	try {
    		parent::__construct($GLOBALS['CONFIG_DB']['dsn'], $GLOBALS['CONFIG_DB']['user'], $GLOBALS['CONFIG_DB']['passwd'], $GLOBALS['CONFIG_DB']['driver_options']);
    	} catch (PDOException $e) {
    		$this->error = $e->getMessage();
    	}
    }

    public function run($query, $bind=false, $handler=false) {
    	$this->querycount++;
    	try {
    		if ($bind !== false) {
    			$bind = (array) $bind;
    			$dbh = $this->prepare( trim($query) );
    			$dbh->execute( $bind );
    		} else {
                $dbh = $this->query( trim($query) ); // because query is 3x faster than prepare+execute
            }
            if (preg_match('/^(select|describe|pragma)/i', $query)) {
                // if $query begins with select|describe|pragma, either return handler or fetch
            	return ($handler) ? $dbh : $dbh->fetchAll();
            } else if (preg_match('/^(delete|insert|update)/i', $query)) {
                // if $query begins with delete|insert|update, return count
            	return $dbh->rowCount();
            } else {
            	return true;
            }
        } catch (PDOException $e) {
        	$this->error = $e->getMessage();
        	return false;
        }
    }

    private function prepBind($pairs, $glue) {
    	$parts = array();
    	foreach ($pairs as $k=>&$v) { $parts[] = "`$k` = ?"; }
    	return implode($glue, $parts);
    }

    public function update($table, $data, $where, $limit=false) {
    	if (is_array($data) && is_array($where)) {

    		$dataStr  = $this->prepBind( $data, ', ' );
    		$whereStr = $this->prepBind( $where, ' AND ' );
    		$bind = array_merge( $data, $where );
    		$bind = array_values( $bind );

    		$sql = "UPDATE `$table` SET $dataStr WHERE $whereStr";
    		if ($limit && is_int($limit)) { $sql .= ' LIMIT '. $limit; }
    		return $this->run($sql, $bind);
    	}
    	return false;
    }

    // public function insert($table, $data) {
    // 	if (is_array($data)) {

    // 		$dataStr = $this->prepBind( $data, ', ' );
    // 		$bind = array_values( $data );

    // 		$sql = "INSERT `$table` SET  $dataStr";
    // 		return $this->run($sql, $bind);
    // 	}
    // 	return false;
    // }

    public function insert($table, Array $arrayOfValues)
    {
        $query = 'INSERT INTO ' . $table;
        $columns = '';
        $values = '';
        $executeVar = array();
        if ($this->isAssoc($arrayOfValues)) {
            $delimiter = '';
            foreach ($arrayOfValues as $column =>$value) {
                $columns .= $delimiter . $column;
                $values .= $delimiter . ':' . $column;
                $executeVar[(':' . $column)] = $value;
                $delimiter = ', ';
            }

            $query .= '(' . $columns . ')' . ' VALUES(' . $values . ')';
            // echo $query;
            // print_r($executeVar);
            $query = $this->prepare($query);
            try {
                return $query->execute($executeVar);
            } catch(PDOException $e) {
                return false;
            }
        } else {
            $debug = debug_backtrace();
            die('Error: Second param of ' . $debug[0]['function'] . '() must be an associative array, ' . $debug[0]['file'] . ": line " . $debug[0]['line']);
        }
    }

    public function delete($table, $where, $limit=false) {
    	if (is_array($where)) {

    		$whereStr = $this->prepBind( $where, ' AND ' );
    		$bind = array_values( $where );

    		$sql = "DELETE FROM `$table` WHERE $whereStr";
    		if ($limit && is_int($limit)) { $sql .= ' LIMIT '. $limit; }
    		return $this->run($sql, $bind);
    	}
    	return false;
    }

    // crypt (one-way encryption)
    public function crypt($str, $moresalt='') {
    	$salt = $moresalt . $this->crypt_salt;
    	if (CRYPT_BLOWFISH == 1) {
            $presalt = (version_compare(PHP_VERSION,'5.3.7','<')) ? '2a' : '2y'; // PHP 5.3.7 fixed stuff
            $blowfish_salt = '$'. $presalt .'$07$'. substr($salt, 0, CRYPT_SALT_LENGTH) .'$';
            return crypt($str, $blowfish_salt);
        }
        return sha1($str . $salt);        
    }

    private function isAssoc($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}