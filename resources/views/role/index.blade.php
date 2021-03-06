@extends ('layouts.admin')
@section ('content')
<div class="container col-md-8 col-md-offset-2">
	<div class="panel panel-primary animated fadeInUp">
		<div class="panel-heading" align="center">
			<h2>Listado de Roles del Sistema <button class="btn btn-warning" data-target="#create-modal" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo Rol</button></h2>
		</div>
		@include('role.create')
		<div class="panel-body">
			<div class="form-group col-md-12">
				
			</div>
			<div class="table-responsive col-md-10 col-md-offset-1">
			  <table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Estado</th>
						<th>Salario</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $r)
					<tr class="user-{{$r->idRole}}">
						<td>{{$r->idRole}}</td>
						<td>{{$r->nameRole}}</td>
						<td>
							@if($r->statusRole==1)
							<span class="label label-success">Activo</span>
							@else
							<span class="label label-danger">Inactivo</span>
							@endif
						</td>
						<td>{{$r->salaryRole}}</td>
						<td>
							<button class="btn btn-info btn-xs" data-target="#edit-modal-{{$r->idRole}}" data-toggle="modal"><i class="fa fa-pencil"></i> Editar</button>
							@if($r->statusRole==1)
							<button class="btn btn-danger btn-xs" data-target="#inactive-{{$r->idRole}}" data-toggle="modal"><i class="fa fa-close"></i> Desactivar</button>
							@else
							<button class="btn btn-success btn-xs" data-target="#active-{{$r->idRole}}" data-toggle="modal"><i class="fa fa-check"></i> Activar</button>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			  </table>
			</div>
		</div>
	</div>
</div>
@foreach($roles as $r)
	@include('role.active')
	@include('role.inactive')
	@include('role.edit')
@endforeach
@endsection