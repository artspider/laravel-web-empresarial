<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<div>
		<x-utils.subtitle class="mb-4">Agregar nuevo producto</x-utils.subtitle>
		<form action="route('category.store')" method="post">
			@csrf
		</form>
	</div>
</body>

</html>