<!DOCTYPE html>
<html>

<?php
 //$conteudo = json_decode($conteudo);
?>

<?php include 'master/header_master.php';?>

<title>Estudar Física - Cálculo on-line</title>
<meta name="description" content="Fale Conosco, envie sua mensagem para nós!">

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
    <?php include 'master/header.php';?>
    <?php include 'master/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cálculo on-line
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cálculo</li>
      </ol>
    </section>

		<div style="width:75%;">
			<canvas id="canvas"></canvas>
		</div>
	<br>
	<br>

    <!-- Main content -->
    <section class="content">

         
			<?php 
			$varA = isset( $_POST["varA"] ) ? $_POST["varA"] : null;
			$varB = isset( $_POST["varB"] ) ? $_POST["varB"] : null;
			$varC = isset( $_POST["varC"] ) ? $_POST["varC"] : null;

			if (  ($varA != null ) && ($varB != null ) && ($varC != null ) ) 
			{

				$varA = intval($varA);
				$varB = intval($varB);
				$varC = intval($varC);

				$delta = $varB ^ 2 - 4 * $varA * $varC ;

				$delta =  intval($delta);
				$raiz1 = ( + $varB + sqrt($delta) ) / 2 * $varA;
				$raiz2 = ( - $varB - sqrt($delta) ) / 2 * $varA;
				echo "O Delta é :" . $delta . "<br>";
				echo "Raiz1 :" . $raiz1 . "<br>";
				echo "Raiz2 :" . $raiz2 . "<br>";
			}
      ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="calculo.php">
                               
              <div class="box-body">
                <div class="form-group">
                  <label for="InputEmail1">Equação da Reta:</label>
								 
								 <table>
										<tr>
											<td>A</td>
											<td> <input type="text" name="varA"  size="4" class="form-control" id="varA" ></td>
										</tr>
										<tr>
											<td>B</td>
											<td><input type="text" name="varB"  size="4" class="form-control" id="varB" ></td>
										</tr>
										<tr>
											<td>C</td>
											<td><input type="text" name="varC"  size="4" class="form-control" id="varC" ></td>
										</tr>
								 </table>
                </div>
               

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
					
  
          <!-- /.box -->
      </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
   

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



			<script>
		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: ['-3', '-2', '-1', '0', '1', '2', '3'],
				datasets: [{
					label: 'Gráfico da Reta',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						1000,
						20,
						20,
						40,
						50,
						randomScalingFactor(),
						randomScalingFactor()
					],
					fill: false,
				}, ]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Equação x Gráfico da Reta'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Reta X'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myLine.update();
		});
	</script>

	<?php include 'master/footer_master.php';?>


</body>
</html> 