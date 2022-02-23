<!DOCTYPE html>
<html>
	<head>
		<title>{{$contrat->title}}</title>
		{{-- <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'> --}}
		<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta http-equiv="content-type" content="text-html; charset=utf-8">
		<style type="text/css">
			/* avec script */
			body{
				background-color: gray;
			}
			.A4 {
				background: white;
				width: 21cm;
				height: 29.7cm;
				display: block;
				margin: 0 auto;
				padding: 10px 25px;
				margin-bottom: 0.5cm;
				box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
				/* overflow-y: scroll; */
				box-sizing: border-box;
				font-size: 12pt;
				}

				@media print {
				.page-break {
					display: block;
					page-break-before: always;
				}
				/* size: A4 portrait; */
				}

				@media print {
				body {
					margin: 0;
					padding: 0;
				}
				.A4 {
					box-shadow: none;
					margin: 0;
					width: auto;
					height: auto;
				}
				.noprint {
					display: none;
				}
				.enable-print {
					display: block;
				}
				}
		</style>
	</head>

	<body>
				<div class="A4">
					<h1 style="text-align:center">
						{{$contrat->title}}
					</h1>
					<p>
						{!! html_entity_decode($contrat->contenu) !!}
					</p>

		</div>

	</body>
	<script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
	<script>
		var max_pages = 100;
		var page_count = 0;

		function snipMe() {
		page_count++;
		if (page_count > max_pages) {
			return;
		}
		var long = $(this)[0].scrollHeight - Math.ceil($(this).innerHeight());
		var children = $(this).children().toArray();
		var removed = [];
		while (long > 0 && children.length > 0) {
			var child = children.pop();
			$(child).detach();
			removed.unshift(child);
			long = $(this)[0].scrollHeight - Math.ceil($(this).innerHeight());
		}
		if (removed.length > 0) {
			var a4 = $('<div class="A4"></div>');
			a4.append(removed);
			$(this).after(a4);
			snipMe.call(a4[0]);
		}
		}

		$(document).ready(function() {
		$('.A4').each(function() {
			snipMe.call(this);
		});
		});
	</script>

</html>
