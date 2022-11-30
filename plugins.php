<?php
date_default_timezone_set('Asia/Taipei');
session_start();

$time = date('Y-m-d H:i:s');

function title1()
{
	echo'
	<!DOCTYPE html>
	<html lang="en">
	<head>
	    <link rel="stylesheet" href="https://www.chyhhwen.blaetoan.cyou/css/index.css">
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>NPU AIR澎科航空</title>
	</head>
	    <body>
	        <div class="box">
	            <div class="important">
	                <div class="text">
	                    <span style="font-weight:bold;">重要訊息</span><br>
	                    <span style="font-size:110%;">國內線票價調整</span>
	                </div>
	            </div>
	            <div class="title">
	                <div class="not">

	                </div>
	                <div class="test">
	                    <a href="/airport/index.php">首頁|</a>
	                </div>
	            </div>
	            <div class="menu">
	                <div class="not">

	                </div>    
	                <div class="dropdown-menu">
	                    <span>航班資訊</span>
	                    <ul class="dropdown">
	                        <li><a href="/airport/index.php?p=time">班機表定時刻表</a></li>
	                        <li><a href="/airport/index.php?p=airplant">機隊介紹</a></li>
	                        <li><a href="/airport/index.php?p=line">航線圖</a></li>
	                    </ul>
	                </div>
	                <div class="dropdown-menu">
	                    <span>網路購票</span>
	                    <ul class="dropdown">
	                        <li><a href="/airport/index.php?p=book">訂位購票</a></li>
	                        <li><a href="/airport/index.php?p=update">更改行程</a></li>
	                        <li><a href="/airport/index.php?p=seat">線上畫位</a></li>
	                        <li><a href="/airport/index.php?p=no">退票申請</a></li>
	                    </ul>
	                </div>
	                <div class="dropdown-menu">
	                    <span>旅客服務</span>
	                    <ul class="dropdown">
							<li><a href="/airport/index.php?p=news">機場資訊</a></li>
							<li><a href="/airport/index.php?p=luggage">行李訊息</a></li>
							<li><a href="/airport/index.php?p=notice">注意事項</a></li>
						</ul>
	                </div>
	                <div class="dropdown-menu">
	                    <span>
	                        <a href="/airport/index.php?p=Introduction" style="text-decoration:none;color:#f9f9e6;">
	                            關於澎科航空
	                        </a>
	                    </span>
	                </div>
	            </div>
	';
}

function title2($input)
{
	echo'
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<link rel="stylesheet" href="../airport/css/'.$input.'.css">
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>NPU AIR澎科航空</title>
		</head>
			<body>
				<div class="box">
					<div class="title">
						<div class="not">

						</div>
						<div class="test">
							<a href="/airport/index.php">首頁|</a>
						</div>
					</div>
					<div class="menu">
						<div class="not">

						</div>    
						<div class="dropdown-menu">
							<span>航班資訊</span>
							<ul class="dropdown">
	                        	<li><a href="/airport/index.php?p=time">班機表定時刻表</a></li>
	                        	<li><a href="/airport/index.php?p=airplant">機隊介紹</a></li>
	                        	<li><a href="/airport/index.php?p=line">航線圖</a></li>
	                    	</ul>
						</div>
						<div class="dropdown-menu">
							<span>網路購票</span>
							<ul class="dropdown">
								<li><a href="/airport/index.php?p=book">訂位購票</a></li>
								<li><a href="/airport/index.php?p=update">更改行程</a></li>
								<li><a href="/airport/index.php?p=seat">線上畫位</a></li>
								<li><a href="/airport/index.php?p=no">退票申請</a></li>
							</ul>
						</div>
						<div class="dropdown-menu">
							<span>旅客服務</span>
							<ul class="dropdown">
								<li><a href="/airport/index.php?p=news">機場資訊</a></li>
								<li><a href="/airport/index.php?p=luggage">行李訊息</a></li>
								<li><a href="/airport/index.php?p=notice">注意事項</a></li>
							</ul>
						</div>
						<div class="dropdown-menu">
							<span>
								<a href="/airport/index.php?p=Introduction" style="text-decoration:none;color:#f9f9e6;">
									關於澎科航空
								</a>
							</span>
						</div>
					</div>';
}
function conn()
{
	$a = mysqli_connect('localhost','vvrzmwkq_chyhhwe','_+AI4n{_Z&g!','vvrzmwkq_chyhhwen');
	if($a->connect_error)
	{
		die($a->connect_error);
		return false;
	}
	mysqli_set_charset($a, 'utf8');
	return $a;
}


function squery($a)
{
	$b = conn();
	switch($a[0])
	{
		case 'get':
			$c = $b->query($a[1]);
			$d = mysqli_fetch_array($c);
			$b->close();
			return $d;
		break;
		case 'list':
			$e=1;
			$f=[];
			$c = $b->query($a[1]);
			while($d = mysqli_fetch_array($c)){
				$f[$e]=$d;
				$e++;
			}
			$b->close();
			return $f;
		break;
		case 'run':
			$b->query($a[1]);
			if($b->error){
				echo $b->error;
				$b->close();
				return false;
			}else{
				$b->close();
				return true;
			}
		break;
	}
	echo 'noselect';
}

function ref($a)
{
	header('refresh:'.$a[0].';url="'.$a[1].'"');
}


function findsql($a)
{
	return squery([
		'get',
		"SELECT * FROM `$a[0]` WHERE `$a[1]`='$a[2]'"
	]);
}

function p($a){return $_POST[$a];}
function g($a){return $_GET[$a];}
function s($a){return $_SESSION[$a];}
function set_s($a){$_SESSION[$a[0]]=$a[1];}
function f($a){return $_FILES[$a];}
function v($a){return var_dump($a);}
function k($a){return md5($a);}
function e($a){return explode(':',$a);}