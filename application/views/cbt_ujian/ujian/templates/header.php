<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/wizard/')?>assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?= base_url('assets/wizard/')?>assets/img/favicon.png" />
	<title>Ujian</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="base_url" content="<?= base_url() ?>">

	<!-- CSS Files -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	</head>

    <style>
    
    .pagination .page-item .page-link:hover {
			background-color: #eee;
			border-radius: .125rem;
			-webkit-transition: all .3s linear;
			transition: all .3s linear;
		}
		div.dataTables_wrapper div.dataTables_paginate ul.pagination {
			-webkit-box-pack: end;
			-webkit-justify-content: flex-end;
			-ms-flex-pack: end;
			justify-content: flex-end;
		}
		.pagination .page-item.active .page-link {
			color: #fff;
			background-color: #4285f4;
			border-radius: .125rem;
			-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
			box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
			-webkit-transition: all .2s linear;
			transition: all .2s linear;
		}
		.pagination .page-item.not-select .page-link {
			color: #fff;
			background-color: #F4511E;
			border-radius: .125rem;
			-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
			box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
			-webkit-transition: all .2s linear;
			transition: all .2s linear;
		}
		.pagination .page-item .page-link {
			font-size: .9rem;
			color: #212529;
			background-color: #776e6e2b;
			border: 0;
			margin-left: 4px;
			outline: 0;
			-webkit-transition: all .3s linear;
			transition: all .3s linear;
				margin-bottom: 15px;
			
		}
		.page-item.active .page-link {
			z-index: 3;
			color: #fff;
			background-color: #007bff;
			border-color: #007bff;
		}
		.page-link {
			position: relative;
			display: block;
			padding: .5rem .75rem;
			line-height: 1.25;
		}
		.footer {
		  
		   left: 0;
		   bottom: 0;
		   width: 100%;
		   color: white;
		   text-align: center;
		}
		.logo-area {
			
			background-repeat: no-repeat;
		}
		.logo-area {
			width: 260px;
			display: block;
			min-height: 60px;
			float: right;
		}

		.navbar {
			padding: .3rem 0.3rem !important;
		}




		/*radio button css*/

		@keyframes check {0% {height: 0;width: 0;}
			25% {height: 0;width: 10px;}
			50% {height: 20px;width: 10px;}
		}
		.checkboxRadio{
			background-color:#fff;
			display:inline-block;
			height:28px;
			margin:0 .25em;
			width:28px;
			border-radius:4px;
			border:1px solid #ccc;
			float:left
		}
		.checkboxRadio span{
			display:block;
			height:28px;
			position:relative;
			width:28px;
			padding:0
		}
		.checkboxRadio span:after{
			-moz-transform:scaleX(-1) rotate(135deg);
			-ms-transform:scaleX(-1) rotate(135deg);
			-webkit-transform:scaleX(-1) rotate(135deg);
			transform:scaleX(-1) rotate(135deg);
			-moz-transform-origin:left top;
			-ms-transform-origin:left top;
			-webkit-transform-origin:left top;
			transform-origin:left top;
			border-right:4px solid #fff;
			border-top:4px solid #fff;
			content:'';
			display:block;
			height:20px;
			left:3px;
			position:absolute;
			top:15px;
			width:10px
		}
		.checkboxRadio span:hover:after{
			border-color:#999
		}
		.checkboxRadio input{
            background-color: green;
			display:none
		}
		.checkboxRadio input:checked + span:after{
			-webkit-animation:check .8s;
			-moz-animation:check .8s;
			-o-animation:check .8s;
			animation:check .8s;
			border-color:#555
		}
		.checkboxRadio input:checked + .default:after{
			border-color:#444
		}
		.checkboxRadio input:checked + .primary:after{
			border-color:#2196F3
		}
		.timercss{
			font-size: 25px;
			font-family: cursive;
			color: #FFEB3B !important;
		}
		.list-group-item {
			padding: .45rem 1rem;
		}
		.list-group-flush label {
			margin-bottom: .0rem !important;
		}
		.pagination {
			display: -ms-flexbox;
			flex-wrap: wrap;
			display: flex;
			padding-left: 0;
			list-style: none;
			border-radius: 0.25rem;
		}
		.btn-circle {
			width: 30px;
			height: 30px;
			text-align: center;
			padding: 6px 0;
			font-size: 12px;
			line-height: 1.428571429;
			border-radius: 15px;
		}
		.btn-circle.btn-lg {
			width: 50px;
			height: 50px;
			padding: 10px 16px;
			font-size: 18px;
			line-height: 1.33;
			border-radius: 25px;
		}
		.btn-success1 {
			color: #525252;
			background-color: #e4e4e4;
			border-color: #9a9a9a;
		}
		.username {
			font-weight: 500;
		}
		.profile-block{
			margin:5px auto;
			position:relative;
			overflow:hidden;
		}
		.profile-block .nav > li > a {
			background: #e7e7e7;
			border-radius: 0;
			color: #000;
			display: block;
			font-size: 14px;
			padding: 6px 18px;
			position: relative;
			text-align: left;
			text-decoration: none;
			
			
		}
		.profile-block ul > li > a > i {
			color: #000;
			font-size: 16px;
			padding-right: 10px;
		}
		.profile-block ul > li > a:hover, 
		.profile-block ul > li > a:focus, 
		.profile-block ul li.active a {
			background: #fff !important;
			border-radius: 0;
			color: #000 !important;
		}
		li.paginate_button.page-item {
			z-index: 0;
		}

			 
    </style>