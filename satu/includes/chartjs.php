
<script src="utils/color-generator.js"></script>

  <script>
    /* Set up Chart.js Pie Chart */
    function createChart(chartId, chartData, colorScale, colorRangeInfo) {
      /* Grab chart element by id */
      const chartElement = document.getElementById(chartId);

      const dataLength = chartData.data.length;

      /* Create color array */
      var COLORS = interpolateColors(dataLength, colorScale, colorRangeInfo);

 
      /* Create chart */
      const myChart = new Chart(chartElement, {
        type: 'doughnut',
        data: {
          labels: chartData.labels,
          datasets: [
            {
              backgroundColor: COLORS,
              hoverBackgroundColor: COLORS,
              data: chartData.data
            }
          ],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {          
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false,
          },
          hover: {
            onHover: function(e) {
              var point = this.getElementAtEvent(e);
              e.target.style.cursor = point.length ? 'pointer' : 'default';
            },
          },
          cutoutPercentage: 50}
      });
    

      return myChart;
    }


    /* Example Data */
    const arrayLength = <?php echo $panjang;?>;
    var data = [<?php while ($p = mysqli_fetch_array($result)) { echo '"' . $p['jumlah'] . '",';}?>];
    var labels = [<?php while ($b = mysqli_fetch_array($result1)) { echo '"' . $b['nama'] . '",';}?>];


    const chartData = {
      labels: labels,
      data: data,
    };

    const colorScale = d3.interpolateCool;

    const colorRangeInfo = {
      colorStart: 0,
      colorEnd: 0.65,
      useEndAsStart: true,
    };

    /* Create Chart */
    createChart('myPieChart', chartData, colorScale, colorRangeInfo);
    console.log($result);
  </script>
