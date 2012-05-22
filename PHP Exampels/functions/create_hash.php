<?php
	/*
	* Name:			create_hash.php
	* Author: 		Marcus Orw�n
	* Copyright:	Copyright (c) 2012, Marcus Orw�n
	* License: 		GNU GPL v3
	*/
	
	/* create_hash
	* Creates an MD5, SHA1, etc hash
	* Needed vars
	* $algo (string) = The algorithm (md5, sha1, whirepool, etc)
	* $data (string) = The data to encode
	* $salt (string) = The salt of the hash.
	*/
	public static function create_hash($algo, $data, $salt){
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		return hash_final($context);
	}
?>