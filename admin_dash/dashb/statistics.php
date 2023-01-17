<?php
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Management System- Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<style>
#piechart_3d{
		width: 400px; 
		height: 400px;
	        margin-left : 300px;
            }
#barchart_values{
		width: 400px; 
		height: 400px;
	        margin-left : 800px;
		margin-top :-400px;
            }
#calendar_basic{
		width: 1000px; 
		height: 250px;
	        margin-left : 300px;
            }


</style>

</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php?dashboard"><span>Hotel </span>Management System</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-user"></em>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="logout.php"><i class="fa fa-power-off" style="color:red;"></i>
                                Logout
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<?php
include "sidebar.php";
?>
<div class="container-fluid">
    <div id="piechart_3d"></div>
    <div id="barchart_values"></div><br><br>
    <div id="calendar_basic"></div>
    
    </div> 
     
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Employee', 'Count'],
          ['Manager',     2],
          ['Cleaning',      14],
          ['Reception',  4],
          ['Cook', 5],
        
        ]);

        var options = {
          title: 'Employees According To Positions',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
 <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Type", "Expense", { role: "style" } ],
        ["Maintanence", 8.94, "#b87333"],
        ["Salary", 10.49, "silver"],
        ["Electric Bills", 19.30, "gold"],
        ["External Services", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Hotel Expense",
        width: 410,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
  <script type="text/javascript">
      google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date' });
       dataTable.addColumn({ type: 'number', id: 'Room Booked' });
       dataTable.addRows([
          [ new Date(2022, 3, 13), 6   ],
          [ new Date(2022, 3, 14), 7   ],
          [ new Date(2022, 3, 15), 2   ],
          [ new Date(2022, 3, 16), 3   ],
          [ new Date(2022, 3, 17), 3   ],
           //
          [ new Date(2022, 4, 13), 5 ],
          [ new Date(2022, 4, 14), 9 ],
          [ new Date(2022, 4, 15), 5 ],
          [ new Date(2022, 4, 16), 6 ],
          [ new Date(2022, 4, 17), 2 ],
          // Many rows omitted for brevity.
          [ new Date(2022, 9, 4), 3 ],
          [ new Date(2022, 9, 5), 5],
          [ new Date(2022, 9, 12), 6],
          [ new Date(2022, 9, 13), 7],
          [ new Date(2022, 9, 19), 1 ],
          [ new Date(2022, 9, 23), 3],
          [ new Date(2022, 9, 24), 5],
          [ new Date(2022, 9, 30), 2 ]
        ]);

       var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

       var options = {
         title: "Reserved Room on Different Day",
         height: 350,
       };

       chart.draw(dataTable, options);
   }
</script>
  </body>
</html>
<?php
include_once "footer.php";
?>
