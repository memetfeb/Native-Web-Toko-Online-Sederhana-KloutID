<?php 
require_once('includes/conn.php');
$result = mysqli_query($con," SELECT b.namakategori as nama, COUNT(a.idproduk) as jumlah FROM produk a, kategori b WHERE a.idkategori = b.idkategori GROUP BY a.idkategori");
$result1 = mysqli_query($con," SELECT b.namakategori as nama FROM produk a, kategori b WHERE a.idkategori = b.idkategori GROUP BY a.idkategori");
$panjang = mysqli_num_rows($result);
 ?>
<script src="utils/color-generator.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

      <script src="https://d3js.org/d3-color.v1.min.js"></script>
    <script src="https://d3js.org/d3-interpolate.v1.min.js"></script>
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>

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
            displayColors: true,
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
          cutoutPercentage: 60}
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
  </script>
