@extends('layouts.app')
@section('content')
	<div style="width:70%; height:328px;" class="mx-auto bg-gray-50 dark:bg-gray-600 p-4 rounded">
		<canvas id="sidewallChart"></canvas>
	</div>
	<div class="w-full mt-5 ">
		<p class="text-center dark:text-white">Total Area: {{ $tot_area }}</p>
	</div>
	<div class="w-full mt-5">
		<p class="text-center dark:text-white">Total Area BEC: {{ $totBEC }}</p>
	</div>
@endsection
@push('js')
	<script src=" https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js "></script>

	<script>
		const ctx = document.getElementById('sidewallChart');
		// colors darkmode to chart
		const isDarkMode = document.documentElement.classList.contains('dark');

		const chart= new Chart(ctx, {
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
						pointRadius: 5,
						pointStyle: 'crossRot',
						tension: 0,
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
						font: { size: 18, weight: 'bold' },
					},
					legend: {
						position: 'bottom',
						labels: { 
							usePointStyle: true,
						}
					}
				},

				scales: {
					x: {
						type: 'linear',
						min: 0,
						max: 120,
						title: {
							display: true,
							text: 'Width',
						},
						
						ticks: {
							stepSize: 5,
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
							stepSize: 1,
						},
					}
				}
			}
		});

		function updateChartTheme(chart) {
			const isDark = document.documentElement.classList.contains('dark');

			const text = isDark ? '#f3f4f6' : '#111827';
			const grid = isDark ? '#333854' : '#e5e7eb';
			const tick = isDark ? '#9ca3af' : '#6b7280';

			chart.options.scales.x.ticks.color = tick;
			chart.options.scales.x.title.color = text;
			chart.options.scales.x.grid.color = grid;

			chart.options.scales.y.ticks.color = tick;
			chart.options.scales.y.title.color = text;
			chart.options.scales.y.grid.color = grid;

			chart.options.plugins.legend.labels.color = text;
			chart.options.plugins.title.color = text;

			chart.update();
		}

		const observer = new MutationObserver(() => {
			updateChartTheme(chart);
		});

		observer.observe(document.documentElement, {
			attributes: true,
			attributeFilter: ['class']
		});
		updateChartTheme(chart);
	</script>
@endpush