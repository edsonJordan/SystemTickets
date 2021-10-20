@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('css')
   
@endsection
@section('content_header')
    
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.ticket.tickets.create')}}">Nuevo Ticket</a>
    <h1>Estadisticas de tickets generados</h1>
@stop
@section('content')
<style>
    .icon{
        z-index: 0;
        color: rgba(0, 0, 0, .2);
        font-size: 4rem;
        position: absolute;
        top: 10%;
        right: 10%;
    }
</style>
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>        
      </div>
    @endif

    <div class="row">

    </div>
    <div class="card">
        <div class="card-header ">  
          
                <div class="row">
                    <div class="col-lg col-sm m-2">
                        <!-- small box -->
                        <div class="p-4 rounded bg-success">
                          <div class="inner">
                            <h3>{{$countUsers}}<sup style="font-size: 20px"></sup></h3>              
                            <p>Usuarios</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-fw fa-users"></i>
                          </div>
                          <a href="{{route('admin.ticket.users.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg col-sm m-2">
                        <!-- small box -->
                        <div class="p-4 rounded bg-success">
                          <div class="inner">
                            <h3>{{$countGroup}}<sup style="font-size: 20px"></sup></h3>              
                            <p>Equipos de Soporte</p>
                          </div>
                          <div class="icon">
                            <i class="fas fas-fw fa-briefcase"></i>
                          </div>
                          <a href="{{route('admin.ticket.groups.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                      <!-- ./col -->
                    <div class="col-lg col-sm m-2">
                        <!-- small box -->
                        <div class="p-4 rounded bg-warning">
                          <div class="inner">
                            <h3>{{$countAreas}}</h3>
              
                            <p>Areas</p>
                          </div>
                          <div class="icon">
                            <i class="fas fas-fw fa-building"></i>
                          </div>
                          <a href="{{route('admin.ticket.areas.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                      <!-- ./col -->
                    <div class="col-lg col-sm m-2">
                        <!-- small box -->
                        <div class="p-4 rounded bg-danger">
                          <div class="inner">
                            <h3>{{$countTickets}}</h3>              
                            <p>Tickets</p>
                          </div>
                          <div class="icon">
                            <i class="fas fas-fw fa-file"></i>
                          </div>
                          <a href="{{route('admin.ticket.tickets.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
           
            </div>
           
        </div>
        <h2 class="text-center">Tickets</h2>
        <div class="card-body row">
          
            <div class="col-md-6">
                <canvas id="radarChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="pieChart"></canvas>
            </div>
            
        </div>
        <div class="card-footer">
            
        </div>
    </div>
    <div class="card">
        <div class="card-header">  
          <h2 class="text-center">Ranking de Tickets</h2>
        </div>
        <div class="card-body row">
            <div class="col-md-4">
                <canvas id="barChart0"></canvas>

            </div>
            
            <div class="col-md-4">
                <canvas id="barChart"></canvas>

            </div>
            <div class="col-md-4">
              <canvas id="barChart1"></canvas>

          </div>
        </div>
        <div class="card-footer">
            
        </div>
    </div>

@stop

@section('js')      

<script>
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
    type: 'radar',
    data: {
    labels: ["Pendiente", "Resuelto", "Asignado", "P. Bajo", "P. Intermedio", "P. Alto", "P. Urgente"],
    datasets: [{
    label: "Llamada",
    data: [{{$TiPendLlam}}, {{$TiRestLlam}}, {{$TiAsigLlam}}, {{$TiBajLlam}}, {{$TiInterLlam}}, {{$TiAltoLlam}}, {{$TiUrgenLlam}}],
    backgroundColor: [
    'rgba(105, 0, 132, .2)',    ],    borderColor: [
    'rgba(200, 99, 132, .7)',
    ],
    borderWidth: 2
    },
    {label: "Web",    data: [{{$TiPendWeb}}, {{$TiRestWeb}}, {{$TiAsigWeb}}, {{$TiBajWeb}}, {{$TiInterWeb}}, {{$TiAltoWeb}}, {{$TiUrgenWeb}}],    
    backgroundColor: [    'rgba(0, 250, 220, .2)',    ],    borderColor: [
    'rgba(0, 213, 132, .7)',
    ],
    borderWidth: 2
    },
    {label: "Correo",    data: [{{$TiPendCorr}}, {{$TiRestCorr}}, {{$TiAsigCorr}}, {{$TiBajCorr}}, {{$TiInterCorr}}, {{$TiAltoCorr}}, {{$TiUrgenCorr}}],    
    backgroundColor: [    'rgba(20, 150, 50  , .7)',    ],    borderColor: [
    'rgba(20, 150, 50  , .7)',
    ],
    borderWidth: 2
    }
    ]
    },
    options: {
    responsive: true
    }
    });




var ctxP = document.getElementById("pieChart").getContext('2d');

var myPieChart = new Chart(ctxP, {
type: 'pie',
data: {
labels: ["Pendiente", "Resuelto", "Asignado"],
datasets: [{
data: [{{$TickePendientes}}, {{$TickeResueltos}}, {{$TickeAsignados}}],
backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
}]
},
options: {
responsive: true
}
});






var scatterData = {
datasets: [{
borderColor: 'rgba(99,0,125, .2)',
backgroundColor: 'rgba(99,0,125, .5)',
label: 'V(node2)',
data: [{
x: 1,
y: -1.711e-2,
}, {
x: 1.26,
y: -2.708e-2,
}, {
x: 1.58,
y: -4.285e-2,
}, {
x: 2.0,
y: -6.772e-2,
}, {
x: 2.51,
y: -1.068e-1,
}, {
x: 3.16,
y: -1.681e-1,
}, {
x: 3.98,
y: -2.635e-1,
}, {
x: 5.01,
y: -4.106e-1,
}, {
x: 6.31,
y: -6.339e-1,
}, {
x: 7.94,
y: -9.659e-1,
}, {
x: 10.00,
y: -1.445,
}, {
x: 12.6,
y: -2.110,
}, {
x: 15.8,
y: -2.992,
}, {
x: 20.0,
y: -4.102,
}, {
x: 25.1,
y: -5.429,
}, {
x: 31.6,
y: -6.944,
}, {
x: 39.8,
y: -8.607,
}, {
x: 50.1,
y: -1.038e1,
}, {
x: 63.1,
y: -1.223e1,
}, {
x: 79.4,
y: -1.413e1,
}, {
x: 100.00,
y: -1.607e1,
}, {
x: 126,
y: -1.803e1,
}, {
x: 158,
y: -2e1,
}, {
x: 200,
y: -2.199e1,
}, {
x: 251,
y: -2.398e1,
}, {
x: 316,
y: -2.597e1,
}, {
x: 398,
y: -2.797e1,
}, {
x: 501,
y: -2.996e1,
}, {
x: 631,
y: -3.196e1,
}, {
x: 794,
y: -3.396e1,
}, {
x: 1000,
y: -3.596e1,
}]
}]
}




/* var ctxBc = document.getElementById('bubbleChart').getContext('2d');
var bubbleChart = new Chart(ctxBc, {
type: 'bubble',
data: {
datasets: [{
label: "{{$ranking[0]->name}}",
data: [{
x: 3,
y: 7,
}],
backgroundColor: "#ff6384",
hoverBackgroundColor: "#ff6384"
}, 

{
label: "{{$ranking[1]->name}}",
data: [{
x: 5,
y: 7,
}],
backgroundColor: "#44e4ee",
hoverBackgroundColor: "#44e4ee"
}, 

{
label: "{{$ranking[2]->name}}",
data: [{
x: 7,
y: 7,
}],
backgroundColor: "#62088A",
hoverBackgroundColor: "#62088A"
}]
}
}) */




//doughnut
/* var ctxD = document.getElementById("doughnutChart").getContext('2d');
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
datasets: [{
data: [300, 50, 100, 40, 120],
backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
}]
},
options: {
responsive: true
}
}); */


//bar
var ctxB = document.getElementById("barChart0").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: ['{{$ranking[0]->name}}', '{{$ranking[1]->name}}', 
    '{{$ranking[2]->name}}', '{{$ranking[3]->name}}', '{{$ranking[4]->name}}', '{{$ranking[5]->name}}'],
datasets: [{
label: '# Usuarios que con mas Tickets generados',
data: ["{{$ranking[0]->conteo}}", "{{$ranking[1]->conteo}}", "{{$ranking[2]->conteo}}", "{{$ranking[3]->conteo}}", 
  "{{$ranking[4]->conteo}}", "{{$ranking[5]->conteo}}"],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}
],


}

,
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});


var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: ['{{$rankingUserAssingment[0]->name}}', '{{$rankingUserAssingment[1]->name}}', 
    '{{$rankingUserAssingment[2]->name}}', '{{$rankingUserAssingment[3]->name}}', '{{$rankingUserAssingment[4]->name}}', '{{$rankingUserAssingment[5]->name}}'],
datasets: [{
label: '# Usuarios con mas Tickets asignados',
data: ["{{$rankingUserAssingment[0]->conteo}}", "{{$rankingUserAssingment[1]->conteo}}", "{{$rankingUserAssingment[2]->conteo}}", "{{$rankingUserAssingment[3]->conteo}}", 
  "{{$rankingUserAssingment[4]->conteo}}", "{{$rankingUserAssingment[5]->conteo}}"],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}
],


}

,
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});


var ctxB = document.getElementById("barChart1").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: ['{{$rankingGroupAssingment[0]->group}}', '{{$rankingGroupAssingment[1]->group}}', 
    '{{$rankingGroupAssingment[2]->group}}'],
datasets: [{
label: '# Grupos con mas Tickets asignados',
data: ["{{$rankingGroupAssingment[0]->conteo}}", "{{$rankingGroupAssingment[1]->conteo}}", "{{$rankingGroupAssingment[2]->conteo}}"],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}
],


}

,
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});


</script>
@endsection

