<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


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
			<div class="col-md-10 col-md-offset-1">

				@foreach( $reinvidicacoes as $reinvindicacao )

					<li> {{ $reinvindicacao['nome'] }} - {{ $reinvindicacao['votos'] }}  - <a href='{{ "votar/$reinvindicacao[id]" }}'> Votar </a> </li> 

				@endforeach

			</div>
		</div>

	</div>
</body>
</html>