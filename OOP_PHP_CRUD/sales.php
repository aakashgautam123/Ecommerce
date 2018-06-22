<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
	<title>sales</title>
</head>
<body>

<div id="mainpage">
	<div id="top">
		<div id="revenue">

			<img src="https://png.icons8.com/android/50/000000/fund-accounting.png"><p class="vertical">REVENUE<br>NRs.1000000</p><br>
		</div>
		<div id="sales">
			<img src="https://png.icons8.com/android/50/000000/checkout.png"><p class="vertical">SALES<br>100</p>
			
		</div>
		<div id="neworder">
			<img src="https://png.icons8.com/android/40/000000/purchase-order.png"><p class="vertical">NEW ORDERS<br> 1200</p>
			
		</div>
		<div id="visits">
			<img src="https://png.icons8.com/android/40/000000/business-contact.png"><p class="vertical">VISITS<br> 2000</p>
			
		</div>
	</div>
		<div id="chartcontainer">
			<h3 style="font-family:helvetica;">Monthly Sales</h3>
		<canvas id="linechart" width="300" height="200" >
			
		</canvas>
	</div>


</div>
<script type="text/javascript">
	var can = document.getElementById('linechart').getContext('2d');
	let chart = new Chart(can,{
	  type: 'line',
    data: {
        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
        }]
    },
   
	});

</script>
</body>
</html>