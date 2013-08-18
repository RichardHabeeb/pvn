<?php

const HASH_ITERATIONS = 10000;  

/**
 * Crypto
 * @author Richard
 * 
 * Basic cryptographic methods
 */
class Crypto {
	/**
	 * $salt
	 * @var unknown_type - a string storing the salt to use in encryption.
	 */
	public $salt; //the salt value used in each layer of hashing. It defaults to junk data. 

	/**
	 * __construct()
	 * 
	 * @param string $s custom salt
	 */
	function __construct($s)	{
		$salt = (string)$s;
	}
	
	/**
	 * Hash()
	 * 
	 * @param string $s - hash a string with a salt
	 * @return string The hash
	 */
	public function Hash($s) {
		$temp_salt = $this->salt;
		$s = (string)$s;
		for($i = 0; $i < HASH_ITERATIONS; $i++) {
			$s = hash("ripemd160",$temp_salt . $s . $i);
			$s = hash("whirlpool",$temp_salt . $s . $i);
			$temp_salt ^= ~$i;
		}
		return $s;
	}
	
	
	
}

?>