/* today sale  */
// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";
Chart.defaults.global.defaultFontStyle = "Bold";

// Dounght Chart Example
var ctx = document.getElementById("doughnut");
var doughnut = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["Sale", "Profit", "Due", "Expence"],
    datasets: [
      {
        data: [today_sale, today_profit, today_due, today_expence],
        backgroundColor: ["#4e73df", "#5cb85c", "#fd7e14", "#dc3545"],
        hoverBackgroundColor: ["#2e59d9", "#17a673", "#a80a0ae0", "#946817"],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: "#dddfeb",
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      position: "top",
      display: true,
    },
    cutoutPercentage: 60,
  },
});
