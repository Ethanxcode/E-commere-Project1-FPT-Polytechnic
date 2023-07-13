// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = 'Nunito'),
	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
// Lấy dữ liệu từ tập tin PHP bằng Ajax
$.ajax({
	url: 'get_chart_data.php',
	type: 'GET',
	dataType: 'json',
	success: function (data) {
		// Cập nhật dữ liệu cho biểu đồ
		myPieChart.data.labels = data.labels;
		myPieChart.data.datasets[0].data = data.datasets[0].data;

		// Vẽ lại biểu đồ
		myPieChart.update();
	},
	error: function (xhr, textStatus, error) {
		console.log(xhr.statusText);
	},
});
