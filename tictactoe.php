<html>
	<head>
		<style type="text/css">
			.casa {
				border: 1px solid black;
				width: 132px;
				height: 132px;
			}
			.content {
				padding-top: 20px;
			}
		</style>
		<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	</head>
	<body>
		<div align="center" class="content">
			<table>
				<tr>
					<td class="casa" id="casa0"></td>
					<td class="casa" id="casa1"></td>
					<td class="casa" id="casa2"></td>
				</tr>
				<tr>
					<td class="casa" id="casa3"></td>
					<td class="casa" id="casa4"></td>
					<td class="casa" id="casa5"></td>
				</tr>
				<tr>
					<td class="casa" id="casa6"></td>
					<td class="casa" id="casa7"></td>
					<td class="casa" id="casa8"></td>
				</tr>
			</table>
		</div>

		<div class="activitylog">
			<p>Let the game begin!</p>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				var slots = [0,0,0,0,0,0,0,0,0];

				$('.casa').on('click', function(){
					var i = $(this).attr('id').substring(4,5);
					if (slots[i] == 0) {
						// OK;
						slots[i] = 1;
						$(this).html('<img src="x-128.png">');
						$('.activitylog').append('<p>Player choice: slot '+i+'</p>');
					} else {
						alert('Illegal!!!');
						return;
					}

					if (checkWin() == 0) {
						robotRandomPlay();
						checkWin();
					}
				});

				function robotRandomPlay(){
					// console.log('start robot:: slots = '+slots);
					// console.log('is 0 inside slots? '+ $.inArray(0,slots));
					if ($.inArray(0,slots) != -1) {
						var index = Math.floor((Math.random() * 9));
						console.log('first index is = '+index);
						while(true){
							if (slots[index] == 0) {

								slots[index] = 2;
								break;
								// return index;
							} else {
								index++;
								if (index == 9) index=0;
							}
						}
						console.log('random = '+index);
						console.log('slots = '+slots);
						$('#casa'+index).html('<img src="o-128.jpg">');
						$('.activitylog').append('<p>Robot choice: slot '+index+'</p>');
					} else {
						console.log('no more space');
					}
				}

				function checkWin(){
					var win = 0;
					win += checkRowWin();
					win += checkColumnWin();
					win +=checkDiagonalWin();
					if ((win == 0) && ($.inArray(0,slots) == -1)) {
						$('.activitylog').append('<p>IT IS A DRAW!</p>');
					}
					return win;
				}

				function checkRowWin(){
					var winner = 0;
					if (slots[0] == slots[1] && slots[1] == slots[2]) {
						winner = slots[0];
						if (winner == 1) {
							alert('Player wins at line 1!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at line 1!');
							return winner;
						}
					} else if (slots[3] == slots[4] && slots[4] == slots[5]) {
						winner = slots[3];
						if (winner == 1) {
							alert('Player wins at line 2!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at line 2!');
							return winner;
						}
					} else if (slots[6] == slots[7] && slots[7] == slots[8]) {
						winner = slots[6];
						if (winner == 1) {
							alert('Player wins at line 3!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at line 3!');
							return winner;
						}
					}
					return winner;
				}

				function checkColumnWin(){
					var winner = 0;
					if (slots[0] == slots[3] && slots[3] == slots[6]) {
						winner = slots[0];
						if (winner == 1) {
							alert('Player wins at column 1!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at column 1!');
							return winner;
						}
					} else if (slots[1] == slots[4] && slots[4] == slots[7]) {
						winner = slots[1];
						if (winner == 1) {
							alert('Player wins at column 2!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at column 2!');
							return winner;
						}
					} else if (slots[2] == slots[5] && slots[5] == slots[8]) {
						winner = slots[2];
						if (winner == 1) {
							alert('Player wins at column 3!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at column 3!');
							return winner;
						}
					}
					return winner;
				}

				function checkDiagonalWin(){
					var winner = 0;
					if (slots[0] == slots[4] && slots[4] == slots[8]) {
						winner = slots[0];
						if (winner == 1) {
							alert('Player wins at main diagonal from upper left to bottom right!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at main diagonal from upper left to bottom right!');
							return winner;
						}
					} else if (slots[2] == slots[4] && slots[4] == slots[6]) {
						winner = slots[2];
						if (winner == 1) {
							alert('Player wins at secondary diagonal from upper right to bottom left!');
							return winner;
						} else if (winner == 2) {
							alert('ROBOT wins at secondary diagonal from upper right to bottom left!');
							return winner;
						}
					}
					return winner;
				}

			});
		</script>
	</body>
</html>