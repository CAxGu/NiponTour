<!DOCTYPE HTML>
<html>
	<head>
		<title>NiponTour 2ºDAW</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="view/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="view/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="view/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="view/css/ie9.css" /><![endif]-->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
		<script>
		 $( function() {
			$( "#f_sal" ).datepicker({
			minDate: '0Y',
			maxDate: '+3Y',
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true
            });

        $( "#f_lleg" ).datepicker({
			minDate: '0Y',
			maxDate: '+3Y',
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true
			});
		} );
	</script>
	</head>