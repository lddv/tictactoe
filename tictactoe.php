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
					robotRandomPlay();
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

			});
		</script>
	</body>
</html>