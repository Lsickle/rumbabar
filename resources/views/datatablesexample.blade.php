Check it out on the browser.
Laravel Mixes (3 Part Series)
1 Adding Font-Awesome to Laravel (The Laravel-Mix Way)
2 Adding SweetAlert2 to Laravel (The Laravel-Mix Way)
3 Adding Datatable to Laravel (The Laravel Mix Way)
Discussion (0)
pic
Code of Conduct • Report abuse
Read next
primetek profile image
Vue3 PickList

PrimeTek - Mar 8
5t3ph profile image
Developing For Imperfect: Future Proofing CSS Styles

Stephanie Eckles - Mar 29
ryansolid profile image
Solid Update: March 2021

Ryan Carniato - Mar 29
nayi10 profile image
Creating Your First Blog With TALL - Part Five

Alhassan Kamil - Mar 29
Dendi Handian profile image Dendi Handian
A backend developer by heart, a fullstack developer wannabe, a data scientist dreamer.

Work
Laravel Web Artisan
Location
Bandung, Indonesia
Education
B.S. Computer Science
Joined
13 de octubre de 2019

More from Dendi Handian
Backup Your DEV.to Posts Using Python
#python #tutorial #meta #showdev
Laravel Email Verification
#laravel #php #tutorial #webdev
Making DataTable-Like Livewire Component: Search Items
#laravel #livewire #php #tutorial

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel Datatable Example</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="row vw-100 vh-100 d-flex justify-content-center align-items-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table id="product-table" class="table table-sm table-bordered">
							<thead>
								<th>No</th>
								<th>Product Name</th>
								<th>Stock</th>
								<th>Price</th>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Peanut Butter</td>
									<td>10</td>
									<td>10</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Peanut Butter Chocolate</td>
									<td>5</td>
									<td>50</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Peanut Butter Chocolate Cake</td>
									<td>3</td>
									<td>100</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Peanut Butter Chocolate Cake with Kool-aid</td>
									<td>2</td>
									<td>150</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		$(function () {
            $('#product-table').DataTable({
                processing: true,
                serverSide: false
            });
        });
		// $(document).ready(function () {
		// 	$('#product-table').DataTable({
		// 	processing: true,
		// 	serverSide: false
		// 	});
		// });
	</script>
</body>

</html>
