<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>sidewall</title>

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
	<div style="width:70%; height:325px;" class="mx-auto">
		<canvas id="sidewallChart"></canvas>
	</div>
	<div class="w-full mt-5"><p class="text-center">Total Area: {{ $tot_area }}</p></div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('sidewallChart');

new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [

			// WIDTHTOTAL
            {
                label: 'Width Total',
                data: @json($widthTotal),
                parsing: false,
                borderColor: '#f39c12',
                borderWidth: 1,
                pointRadius: 6,
				pointStyle: 'crossRot',
                tension: 0
            },

            // BEC
            {
                label: 'BEC',
                data: @json($bec),
                parsing: false,
                borderColor: '#000',
				borderWidth: 1,
				backgroundColor: '#000',
                pointRadius: 4,
                tension: 0
            },

            // RC
            {
                label: 'RC',
                data: @json($rc),
                parsing: false,
                borderColor: '#c0392b',
				borderWidth: 1,
				backgroundColor: '#c0392b',
				pointStyle: 'rect',
                pointRadius: 4,
                tension: 0
            },

            // RC1
            {
                label: 'RC1',
                data: @json($wrc1Data),
                parsing: false,
                borderColor: '#2980b9',
				borderWidth: 1,
                pointRadius: 4,
				pointStyle: 'star',
                tension: 0
            },

            

            // GA (titik hijau)
            {
                label: 'Ga',
                data: @json($ga),
                parsing: false,
                borderColor: '#2ecc71',
                backgroundColor: '#2ecc71',
                showLine: true,
                pointRadius: 4,
            }
        ]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            title: {
                display: true,
                text: 'Die Sidewall',
                font: { size: 18, weight: 'bold' }
            },
            legend: {
                position: 'bottom',
                labels: { usePointStyle: true }
            }
        },

        scales: {
            x: {
                type: 'linear',
                min: 0,
                max: 120,
                title: {
                    display: true,
                    text: 'Width'
                },
                ticks: {
                    stepSize: 5
                }
            },
            y: {
                min: 0,
                max: 16,
                title: {
                    display: true,
                    text: 'Ga'
                },
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>
</body>
</html>