<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PRUEBA DE LIBRERIA</title>
	
	<style>
        table{
            font-family: sans-serif;
            color: #212529;
            border-collapse: collapse;
        }
        table thead{
            font-weight: 700;   
                   
        }
        table thead tr td{
            padding-bottom: 6px;
            padding-top: 6px; 
        }
        .tittle{
           
        }
		.page-break {
		    page-break-after: always;
		}
        tbody tr:nth-child(odd){
            background: #F8FCFF;
        }
        tbody tr td{
            border-top: 1.5px solid #DEE2E6;
            border-bottom: 1.5px solid #DEE2E6;
            padding-bottom: 6px;
            padding-top: 6px;
        }
	</style>
</head>
<body>
	<table class="table table-striped">
	  <thead style="text-align:center;color:#212529;" class="bg-success">
        <tr class="text-center tittle">
            <td>Usuario</td>
            <td>Tipo de ticket</td>
            <td>Titulo</td>
            <td>Inicio</td>
            <td>Ultima Actualización</td>
        </tr>
	  </thead>
	  <tbody>
	        @foreach ($results as $result)
                <tr class=" ">
                    <td style="color:#2B9C9B;">{{$result->user->name }}</td>
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
            $pdf->text(20, 800, " Busqueda: de  {{$user}} desde {{$dataStart}} hasta {{$dataEnd}} estado {{$dataType}} Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
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