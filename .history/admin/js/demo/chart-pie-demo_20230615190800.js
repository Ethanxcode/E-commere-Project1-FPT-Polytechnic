// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = 'Nunito'),
	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var phpData = [];

// Hàm để nhận dữ liệu từ PHP
function setDataFromPHP(data) {
	phpData = data;
}

// Pie Chart Example
var ctx = document.getElementById('myPieChart');
var myPieChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: phpData.map(function (item) {
			return item[0];
		}),
		datasets: [
			{
				data: phpData.map(function (item) {
					return item[1];
				}),
				backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
				hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
				hoverBorderColor: 'rgba(234, 236, 244, 1)',
			},
		],
	},
	// ...
});
