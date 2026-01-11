@extends('layouts.app')
@section('content')
	<h1 class="text-center text-3xl font-bold text-white my-5">Black Sidewall 2 Compound</h1>
	<div style="width:70%; height:328px;" class="mx-auto bg-gray-50 dark:bg-gray-600 p-4 rounded">
		<canvas id="sidewallChart"></canvas>
	</div>
	{{-- <div class="w-full mt-5 ">
		<p class="text-center dark:text-white">Total Area: {{ $tot_area }}</p>
	</div>
	<div class="w-full mt-5">
		<p class="text-center dark:text-white">Total Area BEC: {{ $totBEC }}</p>
	</div> --}}
@endsection
@push('js')
	<script src=" https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js "></script>

	<script>
		const ctx = document.getElementById('sidewallChart');
		const gaLabels = @json($gaLabels);
		// colors darkmode to chart
		const isDarkMode = document.documentElement.classList.contains('dark');
		
		const gaTextLabelPlugin = {
			id: 'gaTextLabelPlugin',
			afterDatasetsDraw(chart) {
				const { ctx, scales } = chart;
				const xScale = scales.x;
				const yScale = scales.y;

				ctx.save();
				ctx.font = 'bold 12px Arial';
				ctx.fillStyle = '#ffffff'; // cocok dark mode
				ctx.textAlign = 'center';
				ctx.textBaseline = 'middle';

				gaLabels.forEach(item => {
					if (item.x == null || item.y == null) return;

					const xPixel = xScale.getPixelForValue(item.x);
					const yPixel = yScale.getPixelForValue(item.y);

					ctx.fillText(
						item.text,
						xPixel,
						yPixel
					);
				});

				ctx.restore();
			}
		};

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

					// RC
					{
						label: 'RC',
						data: @json($rc),
						parsing: false,
						borderColor: '#c0392b',
						borderWidth: 1,
						backgroundColor: '#c0392b',
						pointRadius: 4,
						pointStyle: 'rect',
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
						pointRadius: 3,
						borderWidth: 1,
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
						max: 165,
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
			},
			plugins: [gaTextLabelPlugin],
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