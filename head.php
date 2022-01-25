<head>

    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Warehouse order receipt control system">
    <meta name="author" content="armenisnick">    
    <link rel="shortcut icon" href="assets/favico.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>

	
    <!-- Theme CSS -->  
<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/theme-1.css">
	<link id="theme-style" rel="stylesheet" href="assets/css/diellas.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju-1.12.1/jq-3.3.1/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-print-1.6.5/kt-2.5.3/rg-1.1.2/rr-1.2.7/sp-1.2.1/sl-1.3.1/datatables.min.css"/>
	<script type="text/javascript" src="assets/plugins/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/ju-1.12.1/jq-3.3.1/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-print-1.6.5/kt-2.5.3/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<script>
		$(document).ready( function () {
			
		$('#table-custom-2').DataTable({
			 "ordering": false,
			paging: false
			})
		} );
		
/*
		 $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[0]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) {return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

       
            $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true});
            $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true});
            var table = $('#table-custom-2').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
		*/
	
	
	

	
	</script>
	
		
</head> 