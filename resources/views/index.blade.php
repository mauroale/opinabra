<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<script src="jqcloud.min.js"></script>
	<link rel="stylesheet" href="jqcloud.min.css">



	<script src="jquery.tagcloud.js"></script>
	<script src="wordcloud2.js"></script>	


<script  src="https://cdnjs.cloudflare.com/ajax/libs/jqcloud/1.0.4/jqcloud-1.0.4.js" > </script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jqcloud/1.0.4/jqcloud-1.0.4.min.js" > </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqcloud/1.0.4/jqcloud.css" >


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<script type="text/javascript">
		
		var words = [
					  {text: "Lorem", weight: 13},
					  {text: "Ipsum", weight: 10.5},
					  {text: "Dolor", weight: 9.4},
					  {text: "Sit", weight: 8},
					  {text: "Amet", weight: 6.2},
					  {text: "Consectetur", weight: 5},
					  {text: "Adipiscing", weight: 5},
					  
					];

		var palavras = [
							@foreach( $reinvidicacoes as $reinvindicacao )
								{text:  "{{ $reinvindicacao['nome'] }}", weight: {{ $reinvindicacao['votos'] }}    },
							@endforeach
					   ];


		

		$(document).ready(function() {

			var div = document.getElementById("sourrounding_div");
			var canvas = document.getElementById("my_canvas");
			canvas.height = div.offsetHeight;
			canvas.width  = div.offsetWidth;

		   
		//   $('#keywords').jQCloud(words);
		/*$('#keywords').jQCloud(palavras, {
		  width: 1000,
		  height: 500,
		  autoResize: true
		});
		*/


		/*
		$.fn.tagcloud.defaults = {
		  size: {start: 14, end: 40, unit: 'pt'},
		  color: {start: '#cde', end: '#f52'}
		};

		$(function () {
		  $('#whatever a').tagcloud();
		});
		*/

		var list = [
						
						@foreach( $reinvidicacoes as $reinvindicacao )
								['{{ $reinvindicacao['nome'] }}',  {{ $reinvindicacao['votos'] }}    ],
						@endforeach

					];
		
		var objetct = {
						  gridSize: 60,
						  
						  fontFamily: 'Times, serif',
						  color: function (word, weight) {
						    return (weight === 12) ? '#f02222' : '#c09292';
						  },
						  rotateRatio: 0.5,
						  backgroundColor: '#ffe0e0',
						  fontWeight: 400,
						  size: 1,
						  list: [
						
									@foreach( $reinvidicacoes as $reinvindicacao )
											[   '{{ $reinvindicacao['nome'] }}',  {{ $reinvindicacao['votos'] }}    ],
									@endforeach

								], 
						};


		WordCloud( document.getElementById('my_canvas') , objetct);
 


		});

	</script>
</head>
<body class="container-fluid">

	<div class="row">
		
		<div class="col-md-10 col-md-offset-1">
			
			<div class="form-group">
				<form action="{{ url('novaReinvidicacao') }}" method="post" class="form-group">
				    <label for="reinvidicacoes"> Reinvidicacao </label>

					<input type="text" name="reinvidicacoes" class="form-control" > 	</input>
					<input type="submit" name="Enviar" value="Enviar" class="form-control" ></input>
					
				</form>
			</div>

		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<div class="keywords" id="keywords">
					
				</div>

				<div id="sourrounding_div" style="width:100%;height:500px">

					<canvas id="my_canvas">
				
					</canvas>
				</div>



			</div>

			<div class="col-md-2 col-md-offset-1">
				
				<table class="table">
					<thead>
						<tr> 
							<td> Reinvidicação </td> <td> Votos </td>
						</tr>
					</thead>
					<tbody>
					
					@foreach( $reinvidicacoes as $reinvindicacao )
						<tr>
							<td> {{ $reinvindicacao['nome'] }} </td>  <td>  {{ $reinvindicacao['votos'] }}  - <a href='{{ "votar/$reinvindicacao[id]" }}'> Votar </a> </td>
						</tr>
					@endforeach
					</tbody>

				</table>
				<!--
				<ul class="list-unstyled">
					@foreach( $reinvidicacoes as $reinvindicacao )

						<li> {{ $reinvindicacao['nome'] }} - {{ $reinvindicacao['votos'] }}  - <a href='{{ "votar/$reinvindicacao[id]" }}'> Votar </a> </li> 

					@endforeach
				</ul>
				-->
			</div>
		</div>	
		

	</div>
</body>
</html>