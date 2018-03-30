function lineChart(ca_mensuels,last_ca_mensuels){
    var tab = [];
    var tablast = [];
    
    for(var i in ca_mensuels)
    {
        tab.push(ca_mensuels[i]);
    }
    
    for(var i in last_ca_mensuels)
    {
        tablast.push(last_ca_mensuels[i]);
    }
    
	var lineChartData = {
			labels : ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aôut","Septembre","Octobre","Novembre","Décembre"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : tablast
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : tab
				}
			]
		}
	
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
}

function barChart(ca_mensuels,last_ca_mensuels){
	var tab = [];
    var tablast = [];
    
    for(var i in ca_mensuels)
    {
        tab.push(ca_mensuels[i]);
    }
    
    for(var i in last_ca_mensuels)
    {
        tablast.push(last_ca_mensuels[i]);
    }
    
	var barChartData = {
			labels : ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aôut","Septembre","Octobre","Novembre","Décembre"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: "rgba(220,220,220,0.75)",
					highlightStroke: "rgba(220,220,220,1)",
					data : tablast
				},
				{
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 0.8)",
					highlightFill : "rgba(48, 164, 255, 0.75)",
					highlightStroke : "rgba(48, 164, 255, 1)",
					data : tab
				}
			]
	
		}
	
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive : true
	});
}

function doughnutChart(){
	var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
	var doughnutData = [
					{
						value: 300,
						color:"#30a5ff",
						highlight: "#62b9fb",
						label: "Blue"
					},
					{
						value: 50,
						color: "#ffb53e",
						highlight: "#fac878",
						label: "Orange"
					},
					{
						value: 100,
						color: "#1ebfae",
						highlight: "#3cdfce",
						label: "Teal"
					},
					{
						value: 120,
						color: "#f9243f",
						highlight: "#f6495f",
						label: "Red"
					}
	
				];
	
	var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
		responsive : true
	});
}

function pieChart(ca_clients){
    var j = 0;
    var tab = [];
    var colors = ["#30a5ff","#ffb53e","#1ebfae","#f9243f"];
    var highlight = ["#62b9fb","#fac878","#3cdfce","#f6495f"];
    
    for(var i in ca_clients)
    {
        var obj = {
            value: parseInt(ca_clients[i].ca),
            color: colors[j],
            highlight: highlight[j],
            label: ca_clients[i].raison_social
        }
        tab.push(obj);
        
        if(j>2)
            j= 0;
        else
            j++;
    }
    
	var pieData = tab;
	
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {
		responsive : true
	});
}