<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>贪吃蛇之面向过程</title>
<style>
	*{
		margin: 0;
		padding: 0;
	}
	#ground{
		width: 1000px;
		height: 500px;
		background: #000;
		position: relative;
		overflow: hidden;
	}
	#control{
		width: 998px;
		height: 50px;
		border: 1px solid #000;
	}
	#container{
		width: 1000px;
		
		margin: 50px auto;
		
		
	}
	#banner{
		float: left;
		line-height: 50px;

	}
	#buttons{
		float: right;
		line-height: 50px;
		width: 200px;
		height: 50px;
	}
	input{
		width: 80px;
		height: 40px;
		font-size: 16px;
	}
	#ground .block{
		width: 20px;
		height: 20px;
		background: orange;
		float: left;
	}
	#ground .section{
		background: red;
		position: absolute;
		top: 60px;
	}
	#ground .food{
		background: green;
		position: absolute;
	}
	#mark{
		height: 50px;
		width: 150px;
		line-height: 50px;
		font-size: 18px;
		display:inline-block;
	}
	#level{
		height: 50px;
		width: 150px;
		line-height: 50px;
		font-size: 18px;
		display:inline-block;

	}
</style>
</head>
<body>
	<div id="container">
		<div id="ground">
		</div>
		<div id="control">
			<span id="banner">贪吃蛇 by 若有若无的小矫情</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<span id="mark"></span>
			<span id="level"></span>
			<div id="buttons">
				<input type="button" id="btn-start" value="开始">
				<input type="button" id="btn-pause" value="暂停">
				
			</div>
		</div>

	</div>

<script>

	// 初始化草场
	var oGround = document.getElementById('ground');
	var ROWS = 25,
		COLS = 50;
	for (var i = 0; i < ROWS; i++) {
		for (var j = 0; j < COLS; j++) {
		var oDiv = document.createElement('div');
	 	oDiv.className = 'block';
	 	oGround.appendChild(oDiv);
		}
	}
	// 初始化小蛇
	var aSnakeBody = [];
	for (var i = 0; i < 3; i++) {
		var oSection = document.createElement('div');
		oSection.className = ' block section';
		oGround.appendChild(oSection);
		oSection.style.left = 60-20*i+'px';
		oSection.innerHTML = i;
		aSnakeBody.push(oSection);
	}
	var oFood;
	function mfood(){
		// 初始化随机若干个食物
		do{
			var bFlag = true;//标示位
		// 检测食物在ground内部
			var iRandomLeft = Math.ceil(Math.random()*980);
			var iRandomTop = Math.ceil(Math.random()*480);
			var iLeft = iRandomLeft-iRandomLeft%20;
			var iTop = iRandomTop-iRandomTop%20;
		//检测食物是否和蛇重合
			for (var i = 0; i < aSnakeBody.length; i++) {
				if(aSnakeBody[i].offsetLeft == iLeft&& aSnakeBody[i].offsetTop == iTop){//重合
					bFlag = false;
					break;
				}	
			}
		}while(!bFlag);
			oFood = document.createElement('div');
			oFood.className = 'block food ';
			oFood.style.left = iLeft +'px';
			oFood.style.top = iTop +'px';
			oGround.appendChild(oFood);	
	
	}


		mfood();


		//开始游戏
		var bDown = true;
		var oBtnStart = document.getElementById('btn-start');
		oBtnStart.onclick = function () {
			timer = setInterval(function(){
				for (var i = 0; i < 1; i++) {
			    	move();
				}
			},1000);
		};
		var oBtnStop = document.getElementById('btn-pause');
		oBtnStop.onclick = function(){
			if(oBtnStop.value == '暂停'){
				oBtnStop.value = '继续';
			}
			else{
				oBtnStop.value = '暂停';
			}
		}

		var direction = 'right';

		function move(){
			for (var i = aSnakeBody.length-1; i>= 1; i--) {
				aSnakeBody[i].style.left = aSnakeBody[i-1].offsetLeft+'px';
				aSnakeBody[i].style.top = aSnakeBody[i-1].offsetTop+'px';
			}
			var snakeHead = aSnakeBody[0];
			if (direction == 'left') {
				snakeHead.style.left = snakeHead.offsetLeft - 20 +'px';
			}else if(direction == 'up'){
				snakeHead.style.top = snakeHead.offsetTop - 20 +'px';
			}else if(direction == 'right'){
				snakeHead.style.left = snakeHead.offsetLeft + 20 +'px';
			}else if(direction == 'down'){
				snakeHead.style.top = snakeHead.offsetTop + 20 +'px';
			}
			for (var i = 4; i < aSnakeBody.length; i++) {
				if (snakeHead.offsetTop ==aSnakeBody[i].offsetTop && snakeHead.offsetLeft == aSnakeBody[i].offsetLeft) {
					alert('GAME OVER');
					clearInterval(timer);
				}
			}
			// 吃食物
			if (snakeHead.offsetTop == oFood.offsetTop && snakeHead.offsetLeft == oFood.offsetLeft) {
				oFood.className = 'block section'
				aSnakeBody.push(oFood);
				mfood();
			}
			//撞墙
			if (snakeHead.offsetTop == 500||snakeHead.offsetTop == -20||snakeHead.offsetLeft == 1000||snakeHead.offsetLeft == -20) {
				alert('GAME OVER');
				clearInterval(timer);
			}
			bDown = false;
		}
		document.onkeydown = function(e){
			e = e||window.event;
			var key = e.which || e.keyCode;
			switch(key){
				case 37:
				if (direction !='right'){
					direction = 'left';
					bDown = true;
					move();}
					break;
				case 38:
				if (direction !='down')
					{direction = 'up';
					bDown = true;
					move();}
					break;
				case 39:
				if (direction !='left')
					{direction = 'right';
					bDown = true;
					move();}
					break;
				case 40:
				if (direction !='up')
					{direction = 'down';
					bDown = true;
					move();}
					break;
			}

		};
	//初始化分数
	var oMark = document.getElementById('mark');
	var oLevel = document.getElementById('level');
	oMark.innerHTML='当前得分：'+(aSnakeBody.length-2)*10;
	oLevel.innerHTML='当前等级：';
</script>
</body>
</html>