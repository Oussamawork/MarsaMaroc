
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.left
		{
			position: absolute;
			padding-left:19em; 
		}
		.right
		{
			position: absolute;
			padding-left: 2em;
		}
		.leftx
		{
			position: absolute;
			padding-left:19em;
			padding-top: 3em;  
		}
		.rightx
		{
			position: absolute;
			padding-left: 2em;
			padding-top: 3em; 
		}
		.fin
		{
			position: absolute;
			padding-left:7em;
			padding-top: 10em;  
		}
	</style>
	@if(Session::has('script'))

    Session::get('script')

@endif
</head>
<body>
<h2 style="text-align: center;"><u>BON DE SORTIE</u></h2>
<br><br><br><br><br><br>


	<span style="font-size: 25px" class="right">Réference:</span>
		
	<span style="font-size: 25px" class="left">Type Materiel:</span>
	
	<span style="font-size: 20px" class="rightx">{{$p->materiel->serial}}</span>
		
	<span style="font-size: 20px" class="leftx">{{$p->materiel->type->label}}</span>
    <br><br><br><br><br><br><br><br><br>
	<span style="font-size: 25px" class="right">Motif:</span>
		
	<span style="font-size: 25px" class="left">Date de sortie:</span>

	<span style="font-size: 20px" class="rightx">{{$p->description}}</span>
		
	<span style="font-size: 20px" class="leftx">{{$b->date_sortie}}</span>
	<br><br><br><br><br><br><br><br><br>
	<span style="font-size: 25px" class="right">Soustraitant:</span>

	<span style="font-size: 20px" class="rightx">{{$p->soustraitant->nom}}_{{$p->soustraitant->prenom}}</span>

	<span style="font-size: 20px" class="fin">LE CHEF DE LA DEVISION DES SYSTEMES D'INFORMATION</span>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    
</body>
</html>