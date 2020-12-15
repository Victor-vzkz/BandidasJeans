<!DOCTYPE html>
<html>
<head>
	<title>VALIDACIÓN DE PEDIDO</title>
</head>
<body>
	<p>Se ha registrado tu pedido!!</p>
	<p>Datos del cliente:</p>
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
	</ul>
	<hr>
	<p>Datos de tu compra:</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{$detail->product->name}} x {{$detail->quantity}}
			(Con un Subtotal de ${{$detail->quantity * $detail->product->price}})
				
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
		<strong>Aplica precio de mayoreo a partir de 10 Unidades</strong>
	</p>
	<p>
		<strong>Importe que el cliente debe pagar por sus productos: </strong>{{$cart->total}} + Gastos de envío. 
	</p>
	<p>
		<strong>Si quieres pagar tu pedido en efectivo, puedes hacerlo a través de esta cuenta depositando en OXXO: 1238587691691234</strong>
	</p>
	<p>
		<strong>Si has pagado con tarjeta, envia tu comprobante al número 2481817484</strong>
	</p>
	<p>
		Si tienes alguna duda sobre tu pedido o la forma de coordinar tu entrega, contáctanos en el número <strong> 2481817484</strong> o a nuestro correo en <strong>Bandidas.Jeans2020@gmail.com</strong>
	</p>
	<hr>
</body>
</html>