<?php

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = mysql_connect('nome_do_servidor','nome_de_usuario','senha');
$db = mysql_select_db('nome_do_banco_de_dados');
$query_select = "SELECT login FROM USUARIOS WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];


	if ($login == "" || $login == null){
		echo"<script language='javascript' type='text/javascript'>
		alert('O capom login deve ser preenchido');window.location.href='regUser.html'</script>";
	}else{
		if($logarray == $login){
			
			echo "<script language='javascript' type='text/javascript'>
			alert('Esse login já cadastrado');window.location.href='regUser.html';</script>";
			die();

		}else{
			
			$query = "INSERT INTO usuario (login, senha) VALUES ('$login', '$senha')";
			$insert = mysql_query($query,$connect);

			if($insert){
				echo "<script language='javascript' type='text/javascript'>
				alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
			
			}else{
				echo "<script language='javascript type= 'text/javascript'>
				alert('Não foi possivel cadastrar esse usuário'); window.location.href= 'cadastro.html' </script>";
			}
		}
	}
?>