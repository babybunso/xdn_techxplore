/**
 * @package      
 * @version     1.0
 * @author            
 * @copyright   Copyright (c) 2014-2015,   
 * @link           
 */
 
$(document).ready(function(e){
        CanvasJS.addColorSet("greenShades",
		[
                        "#407140",
                        "#5a995a",
                        "#2E8B57",
                        "#3CB371",
                        "#90EE90",
                        "#71bf71",
                        "#62a562",
                        "#4d834d",
                        "#3d633d",
                        "#2e4c2e"                
                ]);
                
        var chart = new CanvasJS.Chart("chartContainer1", {
                colorSet: "greenShades",
		exportEnabled: true,
                animationEnabled: true,
                theme: "pie", 
                backgroundColor: "transparent",
                title: {
                        text: "Transaction by Gender"
                },
                axisY: {
                        title: "Growth Rate (in %)",
                        suffix: "%",
                        includeZero: false
                },
                axisX: {
                        title: "Countries"
                },
                data: [{
                        showInLegend: true,
                        type: "pie",
                        toolTipContent: "<b>{name}</b>: {y} (#percent%)",
			indexLabel: "{name} - #percent%",
			dataPoints: [
				{ y: 40, name: 'Female' },
				{ y: 40, name: 'Male' },
				{ y: 20, name: 'Unknown' },
			]
                }]
        });
        chart.render();
});

