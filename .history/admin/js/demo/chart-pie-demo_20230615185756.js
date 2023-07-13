// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
// var ctx = document.getElementById("myPieChart");
// var myPieChart = new Chart(ctx, {
//   type: 'doughnut',
//   data: {
//     labels: ["Direct", "Referral", "Social"],
//     datasets: [{
//       data: [55, 30, 15],
//       backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
//       hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
//       hoverBorderColor: "rgba(234, 236, 244, 1)",
//     }],
//   },
//   options: {
//     maintainAspectRatio: false,
//     tooltips: {
//       backgroundColor: "rgb(255,255,255)",
//       bodyFontColor: "#858796",
//       borderColor: '#dddfeb',
//       borderWidth: 1,
//       xPadding: 15,
//       yPadding: 15,
//       displayColors: false,
//       caretPadding: 10,
//     },
//     legend: {
//       display: false
//     },
//     cutoutPercentage: 80,
//   },
// });

// Lấy dữ liệu từ tập tin PHP bằng Ajax
$.ajax({
  url: 'get_chart_data.php',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
    // Cập nhật dữ liệu cho biểu đồ
    myPieChart.data.labels = data.labels;
    myPieChart.data.datasets[0].data = data.datasets[0].data;

    // Vẽ lại biểu đồ
    myPieChart.update();
  },
  error: function(xhr, textStatus, error) {
    console.log(xhr.statusText);
  }
});

// Thay thế dữ liệu mặc định của biểu đồ bằng dữ liệu từ PHP
var phpData = <?php echo json_encode($data); ?>;
myPieChart.data.labels = phpData.labels;
myPieChart.data.datasets[0].data = phpData.datasets[0].data;

// Vẽ biểu đồ
myPieChart.update();