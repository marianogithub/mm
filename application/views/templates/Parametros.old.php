<html>
<header>
	<title></title>
<style>
.parametros{
	background-color:#FFF8DC;
	width:100%;
	font-family:arial;
	color:#696969;
	font-size: 12px;
}
.tituloParametro{
	background-color:#DEB887;	
	height: 30px;
}
.tituloParametro th{
	text-align: left;
	font-size:16px;
	padding:6px;
	text-align: center;
}
.tituloParametro th.seguridad{
	background:url('/Salsa/css/images/folderlocked32.png') no-repeat;
	vertical-align: middle;
}
.tituloParametro th.param{
	background:url('/Salsa/css/images/database32.png') no-repeat;
	vertical-align: middle;
}
.tituloParametro th.personal{
	background:url('/Salsa/css/images/groupofusers32.png') no-repeat;
	vertical-align: middle;
}
.ulli{
	list-style-image: url('/Salsa/css/images/textfile16.png');
	
}
</style>
</header>
<body>
<table width="70%" style="padding:4px;">
<tr>
	<td>
		<div>
			<table class="parametros">
				<tr class="tituloParametro">
					<th class="seguridad">Seguridad</th>
				</tr>
				<tr>
					<td>
						<ul class="ulli">
							<li>Personas</li>
							<li>Usuarios</li>
							<li>Roles</li>
							<li>Menú</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	<br/>
	<table class="parametros">
			<tr class="tituloParametro">
				<th class="personal">Personal</th>
			</tr>
			<tr>
				<td>
					<ul class="ulli">
						<li>Personal</li>
						<li>Categoría Personal</li>
						<li>Tareas</li>
					</ul>
				</td>
			</tr>
		</table>
	</td>
	<td valign="top">
		<table class="parametros">
			<tr class="tituloParametro">
				<th class="param">Parámetros</th>
			</tr>
			<tr>
				<td>
					<ul class="ulli">
						<li>Proveedores</li>
						<li>Tipo Insumo</li>
						<li>Insumo</li>
						<li>IVA</li>
						<li>Forma de Pago</li>
						<li>Tipo de Movimiento</li>
					</ul>
				</td>
			</tr>
		</table>
		
	</td>
<tr>
</table>
</body>
</html>
<?php ?>
