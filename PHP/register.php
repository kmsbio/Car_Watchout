<?php
	//사용자가 계정을 생성할때 들어간느 페이지다.
	$ID = $_POST['userID'];
	$PW = $_POST['password'];
	$Name = $_POST['name'];
	$Birthday = $_POST['birthday'];
	$Email = $_POST['email'];

	require 'SQL.php';
	storeRegister($ID,$PW,$Name,$Birthday,$Email);

	#https://conkjh032.tistory.com/249
	/*
    Create Table Register
	ID Varchar(24) Primary Key,
	Name Varchar(10),
    Birthday Datetime,
    PW Varchar(24),
    Email Varchar(30)
    */
?>