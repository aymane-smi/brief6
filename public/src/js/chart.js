let result;

fetch("http://localhost:9000/Utils/getMonthsData")
  .then((res)=>res.json())
  .then((data)=>{
    result = data;
  });

var options = {
  series: [{
  name: 'Orders',
  data: result
}],
  chart: {
  height: 450,
  width: "100%",
  type: 'bar',
},
plotOptions: {
  bar: {
    borderRadius: 10,
    horizontal: false,
    dataLabels: {
      position: 'top', // top, center, bottom
    },
  }
},
dataLabels: {
  enabled: true,
  formatter: function (val) {
    return val+" order";
  },
  offsetY: -20,
  style: {
    fontSize: '12px',
    colors: ["#304758"]
  }
},
responsive: [
  {
    breakpoint: 1000,
    options:{
      chart:{
        width: "100%",
      }
    }
  },{
    breakpoint: 600,
    options:{
      plotOptions: {
        bar: {
          horizontal: true,
        }
      },
      legend: {
        position: "bottom"
      },
      title:{
        align: "right",
        margin: 20,
      }
    }
  }
],
xaxis: {
  categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  position: 'bottom',
  axisBorder: {
    show: false
  },
  axisTicks: {
    show: false
  },
  crosshairs: {
    fill: {
      type: 'gradient',
      gradient: {
        colorFrom: '#D8E3F0',
        colorTo: '#BED1E6',
        stops: [0, 100],
        opacityFrom: 0.4,
        opacityTo: 0.5,
      }
    }
  },
  tooltip: {
    enabled: true,
  }
},
yaxis: {
  axisBorder: {
    show: false
  },
  axisTicks: {
    show: false,
  },
  labels: {
    show: false,
    formatter: function (val) {
      return val;
    }
  }

},
title: {
  text: 'Order per month',
  floating: true,
  offsetY: 10,
  align: 'bottom',
  style: {
    color: '#444'
  }
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

document.querySelector(".apexcharts-toolbar").style.display = "none";

console.log(document.body);