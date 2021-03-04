/*=========================================================================================
    File Name: card-statistics.js
    Description: Card-statistics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuesax HTML Admin Template
    Version: 1.1
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

 function updateCircle(){



  var $primary = '#7367F0';
  var $danger = '#EA5455';
  var $warning = '#FF9F43';
  var $info = '#00cfe8';
  var $success = '#00db89';
  var $primary_light = '#9c8cfc';
  var $warning_light = '#FFC085';
  var $danger_light = '#f29292';
  var $info_light = '#1edec5';
  var $strok_color = '#b9c3cd';
  var $label_color = '#e7eef7';
  var $purple = '#df87f2';
  var $white = '#fff';


    // Goal Overview  Chart
    // -----------------------------



    $(".progressCircle").each(function() {
      var self = this;
  var value = $(this).attr('data-value');
  var left = $(this).find('.progress-left .progress-bar');
  var right = $(this).find('.progress-right .progress-bar');

var goalChartoptions = {
  chart: {
    height: 115,
    type: 'radialBar',
    sparkline: {
        enabled: true,
    },
    dropShadow: {
        enabled: true,
        blur: 3,
        left: 1,
        top: 1,
        opacity: 0.1
    },
  },
  colors: [$success],
  plotOptions: {
      radialBar: {
          size: 50,
          startAngle: -150,
          endAngle: 150,
          hollow: {
              size: '60%',
          },
          track: {
              background: $strok_color,
              strokeWidth: '100%',
          },
          dataLabels: {
              name: {
                  show: false
              },
              value: {
                  offsetY: 8,//top padding of lable
                  color: $strok_color,
                  fontSize: '1.7rem'
              }
          }
      }
  },
  fill: {
      type: 'gradient',
      gradient: {
          shade: 'dark',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: ['#00b5b5'],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
      },
  },
  series: [value],
  stroke: {
    lineCap: 'round'
  },
}

var goalChart = new ApexCharts(
  document.querySelector("#"+self.id),
  goalChartoptions
);

goalChart.render();
  });
}
