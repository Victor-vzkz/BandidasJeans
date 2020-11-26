<!DOCTYPE html>
<html>
<head>
	<title>Nuevo pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido</p>
	<p>Estos son los datos del cliente que realizó el pedido:</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{$user->name}}
		</li>
		<li>
			<strong>E-mail:</strong>
		    {{$user->email}}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
		    {{$cart->order_date}}
		</li>
		<li>
			<strong>Teléfono:</strong>
		    {{$user->phone}}
		</li>
		<li>
			<strong>Dirección:</strong>
		    {{$user->address}}
		</li>
	</ul>
	<hr>
	<p>Estos son los detalles del pedido:</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{$detail->product->name}} x {{$detail->quantity}}
			(${{$detail->quantity * $detail->product->price}})
				
				
		</li>
		<li>
			<strong>Con talla: </strong>{{$detail->tallas}} 
		</li>
		<li>
			<strong>Color </strong>{{$detail->color}} 
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Importe que el cliente debe pagar por sus productos: </strong>{{$cart->total}} + Gastos de envío. 
	</p>
	<hr>
</body>
</html>