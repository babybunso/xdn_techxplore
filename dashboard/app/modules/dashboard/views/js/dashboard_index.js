var gender_data =[ [
                { y: 40, name: 'Female' },
                { y: 40, name: 'Male' },
                { y: 20, name: 'Unknown' },
        ],
        [
                { y: 30, name: 'Female' },
                { y: 30, name: 'Male' },
                { y: 15, name: 'Unknown' },
        ],
        [
                { y: 20, name: 'Female' },
                { y: 30, name: 'Male' },
                { y: 15, name: 'Unknown' },
        ]];
var category_data =[ [
                { y: 20, name: 'Clothes' },
                { y: 20, name: 'Shoes' },
                { y: 20, name: 'Accessories' },
                { y: 20, name: 'Bags' },
                { y: 10, name: 'Socks' },
                { y: 10, name: 'Mobile Phones' }
        ],
        [
                { y: 30, name: 'Clothes' },
                { y: 20, name: 'Shoes' },
                { y: 10, name: 'Accessories' },
                { y: 5, name: 'Bags' },
                { y: 5, name: 'Socks' },
                { y: 5, name: 'Mobile Phones' }
        ],
        [
                { y: 32, name: 'Clothes' },
                { y: 40, name: 'Shoes' },
                { y: 20, name: 'Accessories' },
                { y: 15, name: 'Bags' },
                { y: 15, name: 'Socks' },
                { y: 15, name: 'Mobile Phones' }
        ]
];
var location_data =[ [
                { y: 40, name: 'Manila' },
                { y: 40, name: 'Cebu' },
                { y: 20, name: 'Davao' }
        ],
        [
                { y: 45, name: 'Manila' },
                { y: 47, name: 'Cebu' },
                { y: 25, name: 'Davao' }
        ],
        [
                { y: 30, name: 'Manila' },
                { y: 20, name: 'Cebu' },
                { y: 20, name: 'Davao' }
        ]
        ];
var merchant_data = [[
                { y: 20, name: 'Bench' },
                { y: 40, name: 'SM Department Store' },
                { y: 460, name: 'Robinsons Department Store' }
        ],
        [
                { y: 30, name: 'Bench' },
                { y: 45, name: 'SM Department Store' },
                { y: 110, name: 'Robinsons Department Store' }
        ],
        [
                { y: 30, name: 'Bench' },
                { y: 45, name: 'SM Department Store' },
                { y: 115, name: 'Robinsons Department Store' }
        ]              
];
function canvasChart(position, category,sdate) {
        let title = "";
        if (category == "Gender") {
             
                if (sdate == "2019-07-21") {
                        points = gender_data[0];
                        title = "Today";
                }
                else if (sdate == "2019-07-20") {
                        points = gender_data[1];
                }
                else if (sdate == "2019-07-18") {
                        points = gender_data[0];
                }
                else if (sdate == "2019-07-17") {
                        points = gender_data[1];
                }
                else {
                        points = gender_data[2];
                }
                
        }
        else if (category == "Category") {
                if (sdate == "2019-07-21") {
                        points = category_data[0];
                        title = "Today";
                }
                else if (sdate == "2019-07-20") {
                        points = category_data[1];
                }
                else if (sdate == "2019-07-18") {
                        points = category_data[0];
                }
                else if (sdate == "2019-07-17") {
                        points = category_data[1];
                }
                else {
                        points = category_data[2];
                }
                
          
        }
        else if (category == "Locations") {
                console.log(sdate +"."+ category)
                if (sdate == "2019-07-21") {
                        points = location_data[0];
                        title = "Today";
                }
                else if (sdate == "2019-07-20") {
                        points = location_data[1];
                }
                else if (sdate == "2019-07-18") {
                        points = location_data[0];
                }
                else if (sdate == "2019-07-17") {
                        points = location_data[1];
                }
                else {
                        points = location_data[2];
                }
          
        }
        else if (category == "Merchants") {
                if (sdate == "2019-07-21") {
                        points = merchant_data[0];
                        title = "Today";
                }
                else if (sdate == "2019-07-20") {
                        points = merchant_data[1];
                }
                else if (sdate == "2019-07-18") {
                        points = merchant_data[0];
                }
                else if (sdate == "2019-07-17") {
                        points = merchant_data[1];
                }
                else {
                        points = merchant_data[2];
                }
          
        }
     
        var chart1 = new CanvasJS.Chart("chartContainer" + position, {
                colorSet: "greenShades",
                exportEnabled: true,
                animationEnabled: true,
                theme: "pie", 
                backgroundColor: "transparent",
                title: {
                        text: category + " " + title
                 },
                data: [{
                        showInLegend: false,
                        type: "pie",
                        toolTipContent: "<b>{name}</b>: {y} (#percent%)",
                        indexLabel: "{name} - #percent%",
                        dataPoints: points
                }]
        });
   
        chart1.render();
}

$(document).ready(function() {
        $('#datatables').DataTable({"searching":false});
        

        $("#compare_status2").on('change', function (e) {
                e.preventDefault();

               // let id = 1;
                let position = 1;
                let category = "Gender";
                let sdate = $(this).val();
                
                
                canvasChart(1, "Gender", sdate);
                canvasChart(2, "Category", sdate);
                canvasChart(3, "Merchants", sdate);
                canvasChart(4, "Locations", sdate);
        }); 

        /* $("#compare_status1, #compare_status2, #compare_status3, #compare_status4").on('change', function (e) {
                e.preventDefault();

                let id = $(this).attr('id');
                let position = $(this).data('id');
                let category = $(this).val();
                let sdate = $(this).val();
                console.log(id +"/"+ position +"/" + category);

                if (position == 1 || position == 4)
                        canvasChart(1, category, "2019-07-21");
                else {
                       category = $("#compare_status" + (position - 1)).val();
                       console.log(category +"/"+ (position - 1))
                        canvasChart(position, category, sdate);
                }
                 
        }); */
});
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

                
        var chart1 = new CanvasJS.Chart("chartContainer1", {
                colorSet: "greenShades",
		exportEnabled: true,
                animationEnabled: true,
                theme: "pie", 
                backgroundColor: "transparent",
                title: {
                        text: "Transaction by Gender"
                },
                data: [{
                        showInLegend: false,
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
        var chart2 = new CanvasJS.Chart("chartContainer2", {
                colorSet: "greenShades",
		exportEnabled: true,
                animationEnabled: true,
                theme: "pie", 
                backgroundColor: "transparent",
                title: {
                        text: "Transaction by Category"
                },
                data: [{
                        showInLegend: false,
                        type: "pie",
                        toolTipContent: "<b>{name}</b>: {y} (#percent%)",
			indexLabel: "{name} - #percent%",
			dataPoints: [
				{ y: 20, name: 'Clothes' },
				{ y: 20, name: 'Shoes' },
                                { y: 20, name: 'Accessories' },
                                { y: 20, name: 'Bags' },
                                { y: 10, name: 'Socks' },
                                { y: 10, name: 'Mobile Phones' }
			]
                }]
        });

        var chart3 = new CanvasJS.Chart("chartContainer3", {
                colorSet: "greenShades",
		exportEnabled: true,
                animationEnabled: true,
                theme: "pie", 
                backgroundColor: "transparent",
                title: {
                        text: "Transaction by Location"
                },
                data: [{
                        showInLegend: false,
                        type: "pie",
                        toolTipContent: "<b>{name}</b>: {y} (#percent%)",
			indexLabel: "{name} - #percent%",
			dataPoints: [
				{ y: 40, name: 'Manila' },
				{ y: 40, name: 'Cebu' },
                                { y: 20, name: 'Davao' }
			]
                }]
        });

        var chart4 = new CanvasJS.Chart("chartContainer4", {
                colorSet: "greenShades",
		exportEnabled: true,
                animationEnabled: true,
                theme: "pie", 
                backgroundColor: "transparent",
                title: {
                        text: "Transaction by Merchants"
                },
                data: [{
                        showInLegend: false,
                        type: "pie",
                        toolTipContent: "<b>{name}</b>: {y} (#percent%)",
			indexLabel: "{name} - #percent%",
			dataPoints: [
				{ y: 20, name: 'Bench' },
				{ y: 40, name: 'SM Department Store' },
                                { y: 460, name: 'Robinsons Department Store' }
			]
                }]
        });
        chart1.render();
        chart2.render();
        chart3.render();
        chart4.render();
});

/* $(document).ready(function() {
        $('#example').DataTable( {
            "ajax": "https://localhost/hackathon2019/xdn-cms/data/uploads/sample.txt",
            "columns": [
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]
        } );
    } );
 */


/* $(function() {
	// renders the datatables (datatables.net)
	var oTable = $('#datatables').dataTable({
                "bProcessing": true,
                "columns": [
                        { "data": "name" },
                        { "data": "position" }
                ],
		"bServerSide": true,
		"sAjaxSource": "https://localhost/hackathon2019/xdn-cms/data/uploads/value.txt",
		"lengthMenu": [[10, 20, 50, 100, 300, -1], [10, 20, 50, 100, 300, "All"]],
		"pagingType": "full_numbers",
		"language": {
			"paginate": {
				"previous": 'Prev',
				"next": 'Next', 
			}
		},
		"bAutoWidth": false,
		"aaSorting": [[ 0, "asc" ]],
		"aoColumnDefs": [
			
			{
				"aTargets": [0],
				"sClass": "text-center",
			},
			{
				"aTargets": [1],
				"mRender": function (data, type, full) {
					return '<a href="gender/form/edit/'+full[0]+'" data-toggle="modal" data-target="#modal" tooltip-toggle="tooltip" data-placement="top" title="Edit">' + data + '</a>';
				},
			},
			
		]
	});

	$('.btn-actions').prependTo('div.dataTables_filter');

	// executes functions when the modal closes
	$('body').on('hidden.bs.modal', '.modal', function () {        
		// eg. destroys the wysiwyg editor
	});

}); */
