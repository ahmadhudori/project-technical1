@extends('layouts.app')
@section('content')
	<h1 class="text-center text-3xl font-bold text-white my-5">White Sidewall 2 Compound</h1>
	<div style="width:70%; height:328px;" class="mx-auto bg-gray-50 dark:bg-gray-600 p-4 rounded">
		<canvas id="sidewallChart"></canvas>
	</div>
	<div style="width:70%; height:328px;" class="mx-auto bg-gray-50 dark:bg-gray-600 p-4 rounded my-5">
		<canvas id="sidewallChartWhite"></canvas>
	</div>
@endsection
@push('js')
	<script src=" https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js "></script>

	<script>
		const dataNormal = {
			widthTotal : @json($widthTotal),
			rc : @json($rc),
			ga : @json($ga),
			gaLabels : @json($gaLabels)
		};

		const dataWhite = {
			widthTotal : @json($widthTotalWhite),
			rc : @json($rcWhite),
			ga : @json($gaWhite),
			gaLabels : @json($gaLabelsWhite),
			newData : @json($newDataWhite)
		}

		function gaTextLabelPluginFactory(gaLabels) {
			return {
				id : 'gaTextLabelPlugin',
				afterDatasetsDraw(chart) {
					if (!Array.isArray(gaLabels) || gaLabels.length === 0) return;
					const { ctx, scales, options } = chart;
					const xScale = scales.x;
					const yScale = scales.y;

					const textColor = options.plugins?.gaTextLabel?.color || '#111827';
					ctx.save();
					ctx.font = 'bold 12px Arial';
					ctx.fillStyle = textColor;
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
			}
		}
		
		// Normal Sidewall Chart
		const ctxNormal = document.getElementById('sidewallChart');

		const chartNormal = new Chart(ctxNormal, {
			type: 'line',
			data: {
				datasets: [
					{
						label: 'Width Total',
						data:  dataNormal.widthTotal,
						parsing: false,
						borderColor: '#f39c12',
						pointStyle: 'crossRot',
						pointRadius: 5,
						tension: 0,
					},
					{
						label: 'RC',
						data: dataNormal.rc,
						parsing: false,
						borderColor: '#c0392b',
						backgroundColor: '#c0392b',
						pointRadius: 4,
						pointStyle: 'rect',
						tension: 0,
					},
					{
						label: 'GA',
						data: dataNormal.ga,
						parsing: false,
						borderColor: '#2ecc71',
						backgroundColor: '#2ecc71',
						pointRadius: 3,
						tension: 0,
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
						font: { size: 18, wight: 'bold'},
					},
					legend: {
						position: 'bottom',
						labels: {usePointStyle: true}
					},
					gaTextLabel: {
						color: '#111827' // light default
					},
				},
				scales: {
					x: {
						type: 'linear',
						min: 0,
						max: @json($wpTerakhirValue),
						title: { display: true, text: 'Width' },
						ticks: { stepSize: 10 }
					},
					y: {
						min: 0,
						max: 16,
						title: { display: true, text: 'Ga' },
						ticks: { stepSize: 1 }
					}
				}
			},
			plugins: [gaTextLabelPluginFactory(dataNormal.gaLabels)]
		});

		applyDarkMode(chartNormal);

		// White Sidewall Chart
		const ctxWhite = document.getElementById('sidewallChartWhite');

		const chartWhite = new Chart(ctxWhite, {
			type: 'line',
			data: {
				datasets: [
					{
						label: 'Width Total White',
						data: dataWhite.widthTotal,
						parsing: false,
						borderColor: '#f39c12',
						backgroundColor: '#ffffff',
						pointStyle: 'crossRot',
						pointRadius: 5,
						tension: 0,
					},
					{
						label: 'RC White',
						data: dataWhite.rc,
						parsing: false,
						borderColor: '#c0392b',
						backgroundColor: '#c0392b',
						pointStyle: 'rect',
						pointRadius: 4,
						tension: 0,
					},
					{
						label: 'GA White',
						data: dataWhite.ga,
						parsing: false,
						borderColor: '#7f8c8d',
						backgroundColor: '#7f8c8d',
						pointRadius: 3,
						tension: 0,
					},
					{
						label: 'new Data',
						data: dataWhite.newData,
						parsing: false,
						borderColor: '#f1c40f',
						backgroundColor: '#f1c40f',
						pointRadius: 3,
						tension: 0,
					}
				]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					title: {
						display: true,
						text: 'Die Sidewall White',
						font: { size: 18, wight: 'bold'},
					},
					legend: {
						position: 'bottom',
						labels: { usePointStyle: true }
					},
					gaTextLabel: {
						color: '#111827' // light default
					},
				},
				scales: {
					x: {
						type: 'linear',
						min: 0,
						max: 210,
						title: { display: true, text: 'Width' },
						ticks: { stepSize: 10 }
					},
					y: {
						min: 0,
						max: 16,
						title: { display: true, text: 'Ga' },
						ticks: { stepSize: 1 }
					}
				}
			},
			plugins: [gaTextLabelPluginFactory(dataWhite.gaLabels)]
		});

		applyDarkMode(chartWhite);
		
		function applyDarkMode(chart) {
			const update = () => {
				const isDark = document.documentElement.classList.contains('dark');
				const text = isDark ? '#f3f4f6' : '#111827';
				const grid = isDark ? '#333854' : '#e5e7eb';
				const tick = isDark ? '#9ca3af' : '#6b7280';
				const labelColor = isDark ? '#f9fafb' : '#111827';

				chart.options.scales.x.ticks.color = tick;
				chart.options.scales.x.title.color = text;
				chart.options.scales.x.grid.color = grid;

				chart.options.scales.y.ticks.color = tick;
				chart.options.scales.y.title.color = text;
				chart.options.scales.y.grid.color = grid;

				chart.options.plugins.legend.labels.color = text;
				chart.options.plugins.title.color = text;


				chart.options.plugins.gaTextLabel = {
					color: isDark ? '#f9fafb' : '#111827'
				};

				chart.update();
			};

			update();
			new MutationObserver(update).observe(document.documentElement, {
				attributes: true,
				attributeFilter: ['class']
			});
		}
	</script>
@endpush