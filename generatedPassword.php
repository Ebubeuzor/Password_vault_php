<?php
	
    session_start();
    require("datbase-controller/Auth.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="Script.js"></script>
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
		}
		body{
			background-color:whitesmoke;
		}

		.container{
			width: 50%;
			margin: 20px auto;
		}

		#password{
			border:none;
			background: transparent;
			outline: none;
			border-bottom: 1px solid black;
			white-space: nowrap;
			width: 100%;
			overflow: hidden;
			text-overflow: ellipsis;
			font-size: 20px;
		}

		.cont{
			background-color: white;
			margin-left: auto;
			margin-right: auto;
			margin-top: 50px;
			width: 400px;
			height: 400px;
			border-radius: 50px;
    		box-shadow: 0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);
			transition: 0.5s;
		}

		.cont h1{
			width: 100%;
			font-family: sans-serif;
			text-align: center;
			margin: 10px auto;
		}

		.cont:focus{
			transition: 0.5s;
			transform: scale(1.1,1.1);
		}
		
		.cont2{
			/*border:groove;*/
			border-color: darkgray;
			box-shadow: 0 0 5px 0.2px rgba(0, 0, 0, 0.30);
			display: flex;
			gap: 10px;
			align-items: center;
			width: fit-content;
			height: 150px;
			font-size: 25px;
			border-width: 1px;
			margin: 10px;
			padding: 10px;
			transition: 0.2s;
			font-size:15.5px;
			color: #04AA6D;
			padding-top: 10px;
			padding-right:4px;
		}

		.cont2:hover{
			transition: 0.2s;
			transform: scale(1.1);
		}
		
		h1{
			float: left;
			font-family: Tahoma,sans-serif;
			margin-left: 22px;
			cursor: pointer;
			
			
		}

		.BtnCont{
			display: flex;
			flex-direction: column;
			gap: 20px;
			width: fit-content;
			margin: 50px auto;
		}

		.btn,#prev-btn{
			border-radius: 100px;
			border: 10px;
			background-color: cyan;
			width: 400px;
			height: 50px;
		/*	text-transform: uppercase;*/
			font-family: serif;
		/*	margin-top: 20px;*/
			font-weight: bold;
			font-size: 20px;
			font-display: block;
			word-spacing: 3px;
			transition: 0.2s;
		}
		
		#prev-btn{
			background-color: gold;
		}

		.btn:hover{
			background: magenta;
			transition:0.2s;
			transform: scale(1.1,1.1);
		}
	
		.check input{
			width: 20px;
			height: 20px;
			margin-top: 10px;
			box-shadow: inset 0 0 5px 0.2px rgba(0, 123, 255, 0.30);
			accent-color: #e74c3c;
		}

		
		/*	box-shadow: 0 0 1px #2196F3;*/
		

		.check label{
			margin-left: 5px;
			display: inline-block;



		}
		.check-note{
			margin: 15px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		#Plen{
			width: 60px;
			height: 40px;
			margin-left: 20px;
			margin-top: 20px;
			text-align: center;
			background-color: white;
			border-style: groove;
			border-color: darkgray;
			border-width: 1px;
			border-radius: 5px;
			box-shadow: inset 0 0 3px 0.2px rgba(0, 0, 0, 0.30);
			transition: 0.2s;

		}
		#Plen:hover{
			transition: 0.2s;
			transform: scale(1.1,1.1);
		}
	
		.slider{
			-webkit-appearance: none;
			appearance: none;
			width: 65%;
			height: 5px;
			background: #d3d3d3;
			border-radius: 5px;
			outline: none;
			opacity: 0.7;
			-webkit-transition: .2s;
			transition: opacity .2s;
			transition: 0.2s;
			margin-left: 20px;

		}

		.slider:hover{
			transition: 0.2s;
			opacity: 1;
			height: 8px;
			transform: scale(1.1,1.1);

		}
/*
		.slider::after{
			position: absolute;
			content:"";
			background-color: green;
			width: 20%;
			height: 10px;
		}*/

		.slider::-webkit-slider-thumb{
			-webkit-appearance: none;
			appearance: none;
			width: 25px;
			border-radius: 100px;
			height: 25px;
			background: #04AA6D;
			cursor: pointer;
			transition: 0.2s;
		}

		.slider::-webkit-slider-thumb:hover{
			transition: 0.2s;
			transform: scale(1.2,1.2);
		}

		.top{
			background-color: whitesmoke;
			border-radius: 5px;
			width: fit-content;
			margin: 0 auto;
			padding: 10px;
			overflow-x: auto;
			height: fit-content;
			box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),0 6.7px 5.3px rgba(0, 0, 0, 0.048),0 12.5px 10px rgba(0, 0, 0, 0.06),0 22.3px 17.9px rgba(0, 0, 0, 0.072),0 41.8px 33.4px rgba(0, 0, 0, 0.086),0 100px 80px rgba(0, 0, 0, 0.12);
			transition: 0.5s;

		}

		.top:hover{
			transition: 0.5s;
			transform: scale(1.1,1.1);
		}
		.top span{
		/*	color: red;*/
			font-size: 25px;
			padding-left: 22px;
		

		}
		.top hr{
			width: 90%; 
			margin-left: 20px;


		}
		.rotate{
			animation: rotation 4s infinite linear;
		}
		@keyframes rotation{
			0%{
				transform: rotate(0deg);

			}25%{
				transform: rotateY(90deg);
				}50%{
				transform: rotateY(180deg);
			}100%{
				transform: rotateY(360deg);
			}
		}

		@media only screen and (max-width:840px) {
			.container{
				width: 80%;
			}

			.cont h1{
				font-size: 16px;
			}

			.check label{
				font-size: 13px;
			}

			.cont2 div{
				font-size: 12px;
			}

			.cont{
				padding: 10px;
				width: 60%;
				height: fit-content;
			}

			.length-change{
				display: flex;
				align-items: center;
			}

			.check-note{
				flex-direction: column;
			}

			
			.btn,#prev-btn{
				border-radius: 100px;
				border: 10px;
				background-color: cyan;
				width: 250px;
				height: 50px;
				font-family: serif;
				font-weight: bold;
				font-size: 15px;
				font-display: block;
				word-spacing: 3px;
				transition: 0.2s;
			}

			#prev-btn{
				background-color: gold;
			}
		}

		@media only screen and (max-width:540px) {
			.container{
				width: 100%;
			}
		}


	</style>
</head>
<body onload="tickAll()">

	<div class="container">
		<div class="top">
			<input type="text" id="password"/>
		</div>
		<div class="cont">
			<h1>Password Generator</h1>
			<label id="p_text" style="font-weight: bold; padding-left: 20px;">Password Length</label><br>
			<div class="length-change">
				<input id="Plen" type="text" name="" disabled>
				<input type="range" class="slider" id="myRange" name="" min="4" max="64" value="7"><br>
			</div>
	
			<div class="check-note">
				
				
				<div class="cont2">	
					<div id="display" style="width: 80px;height: 80px;"><img class="rotate" width="100%" height="100%" src="asset/unlock.png"></div>
					<div>Note:Passwords<br> starting<br> from 11 digits <br>and above are<br> always safer</div>
				</div>
				

				<div class="check2">
					<form class="check">
						<input type="checkbox" name="a" id="num" onclick="gen()"><label>Uppercase</label><br>
						
						<input type="checkbox" name="a" id="aChar" onclick="gen()"><label>Lowercase</label><br>
						<input type="checkbox" name="a" id="aNum" onclick="gen()"><label>Numbers</label><br>
						<input type="checkbox" name="a" id="aNumchar" onclick="gen()"><label>Symbols</label><br>
					
					</form>
				</div>
			</div>
	
		</div>
	
		<div class="BtnCont">
			<button type="button" class="btn copybtn">Copy Password</button>
			<button type="button" id="prev-btn">Go back</button>
		</div>
	</div>

    <script src="previous.js"></script>

	<script type="text/javascript">
				
		const copyBtn = document.querySelector(".copybtn");

		copyBtn.addEventListener('click',copyFun);

		function copyFun() {
			let copyText = document.getElementById("password");

			copyText.select();
			copyText.setSelectionRange(0,9999);

			navigator.clipboard.writeText(copyText.value);
			alert("Password copied")
		};

		var slider =document.getElementById("myRange");
		var output=document.getElementById("Plen");
		output.value=slider.value;


			slider.oninput=function(){
				output.value=this.value;
				
				gen();
			}
	</script>

	<script type="text/javascript">
		function tickAll(){
			document.getElementById("num").checked=true;
			document.getElementById("aNum").checked=true;
			document.getElementById("aChar").checked=true;
			document.getElementById("aNumchar").checked=true;
				
				gen();
			
			
		}
	</script>
		
		

</body>
</html>