<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PRUEBA DE LIBRERIA</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.page-break {
		    page-break-after: always;
		}
	</style>
</head>
<body>
	<table class="table table-striped">
	  <thead class="bg-success text-white">
        <tr class="text-center">
            <td>Usuario</td>
            <td>Estatus</td>
            <td>Titulo</td>
            <td>Inicio</td>
            <td>Ultima Actualización</td>
        </tr>
	  </thead>
	  <tbody>
	        @foreach ($results as $result)
                <tr class=" ">
                    <td>{{$result->user->name }}</td>
                    <td>{{$result->typeticket->type }}</td>
                    <td>{{$result->tittle }}</td>
                    <td>{{$result->created_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>
                    <td>{{$result->updated_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>                   
                </tr>
            @endforeach
	  </tbody>
	</table>
    
	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(150, 780, " Busqueda: de {{$user}} desde {{$dataStart}} hasta {{$dataEnd}} de tipo {{$dataType}} Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>
    {{-- <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script> --}}
</body>
</html>