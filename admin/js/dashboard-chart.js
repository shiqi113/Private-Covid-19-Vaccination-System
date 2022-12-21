//total Available vaccine chart
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Vaccine', 'Vaccine Administered'],
    ['Pfizer',  200],
    ['Sinovac',  300],
    ['AstraZeneca',400]
  ]);

  var options = {
    title: 'Vaccine Administered',
    backgroundColor: 'transparent',
    colors: ['#52B69A', '#76C893', '#99D98C'],

  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  chart.draw(data, options);
}
//Daily Vaccine chart
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
    ['Vaccine', 'Daily Used Vaccine'],
    ['Pfizer',  10],
    ['Sinovac',  60],
    ['AstraZeneca',40]
  ]);

  var options = {
    title: 'Total Daily Used Vaccine',
    backgroundColor: 'transparent',
    colors: ['#52B69A', '#76C893', '#99D98C'],

  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart1_3d'));
  chart.draw(data, options);
}
//Vaccine Appointment chart
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart2);

function drawChart2() {

var data = new google.visualization.DataTable();
data.addColumn('string', 'Day');
data.addColumn('number', 'Sinovac');
data.addColumn('number', 'Pfizer');
data.addColumn('number', 'AstraZeneca');

data.addRows([
  ["MON",  30, 50, 41],
  ["TUE",  39, 69, 32],
  ["WED",  25, 57, 25],
  ["THUR",  11, 18, 10],
  ["FRI",  51, 17, 45],
  ["SAT",  20, 13, 42],
  ["SUN",  47, 72, 66],
]);

var options = {
  chart: {
    title: 'One week Vaccine Appointment',
  },

};

var chart = new google.charts.Line(document.getElementById('linechart_material'));

chart.draw(data, google.charts.Line.convertOptions(options));
}

$(window).resize(function(){
    drawChart();
    drawChart1();
    drawChart2();
});