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
    $(document).ready(function() {
        $('#datatables').DataTable();
    } );


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
