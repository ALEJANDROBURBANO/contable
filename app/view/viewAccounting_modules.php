<?php 

	class viewAccounting_modules{

		static public function registerInvoices($param){

			?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
     
    </div>

  </div>
</div>

			<script type="text/javascript">
				
				 $('.dropify').dropify();

			</script>

		<br>
		<div class="row">

			<div class="col-md-5">

			<h3>Registrar nueva factura</h3>

				<form id="form_new_invoice" action="" class="" method="post" autocomplete="off" enctype="enctype/form-data" onsubmit="postdata('form_new_invoice', event, ok_register_invoice)">

					<input type="hidden" name="class" value="Accounting_modules">
					<input type="hidden" name="method" value="storage_invoices">

				<select class="form-control" name="users_has_accounting_modules_id">
					<option selected="" disabled="">Seleccione un tipo</option>

					<?php foreach ($param['accounting_modules'] as $key => $value): ?>

						<option value="<?=$value['id_accounting_modules']?>"><?=$value['name']?></option>
						
					<?php endforeach ?>
				</select>

                <div class="form-group">
                    <center><input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="invoice" class="dropify" style="height: 500px" data-default-file="" required="" />
                    <input type="number" name="value" class="form-control" placeholder="$ Valor"> 
                    </center>
                    <textarea placeholder="Descripción" name="description" class="form-control"></textarea>
                </div>
                <div class="row">
                <div class="col-6">
                	<input name="type_voice" type="radio" id="ingreso" value="0" class="with-gap radio-col-teal">
                	<label for="ingreso">Ingreso</label>
                </div>
                <div class="col-6">
                	<input name="type_voice" type="radio" id="egreso" value="1" class="with-gap radio-col-red">
                	<label for="egreso">Egreso</label>
                </div>
            	</div>

            	<br>
                

                <button class="btn btn-sm btn-primary btn-block">Guardar <i class="fas fa-save"></i></button>

            	</form>

            </div>

            <div class="col-md-1"></div>

            <div class="col-md-4">

            	<label><h3>Tipos de manejo economico</h3></label>

            	<?php foreach ($param['users_has_accounting_modules'] as $key => $value): ?>

            		<div class="card" style="padding: 5px; text-align: center;" onclick="view('Accounting_modules', 'invoices', <?=$value['id']?> )">
            			<div class="row">
            				<div class="col-8">
            					
            					<h3 style="margin-top: 20px;"><?=$value['name']?> </h3>
            					
            				</div>
            				<div class="col-4">

            					<div style="width: 80px; height: 80px; border-radius: 80px; border: solid gray 1px; padding: 3px; float: right;">
            						<img style=" width: 100%; border-radius: 100%" src="../storage/users/<?=$_SESSION['id']?>/accounting_modules/<?=$value['id']?>.png" >
            					</div>
            					
            				</div>
            			</div>
            		</div>
            		
            	<?php endforeach ?>

            	<div class="card" style="padding: 5px" data-toggle="modal" data-target="#myModal">

            		<center><i class="fas fa-plus-circle" style="width: 80px; height: 80px;"></i></center>
            		
            	</div>
            	

            </div>

        </div>

			<?php

		}

		static public function invoices($params){

			$module = (object)$params['users_has_accounting_module'];

			?>
		<br>

	<div class="row">

		<div class="col-2">

			<div style="height: 100px; width: 100px; border-radius: 100px; border: dashed 1px gray; padding: 4px;">

				<img src="../storage/users/<?=$_SESSION['id']?>/accounting_modules/<?=$module->id?>.png" style="width: 100%; height: 100%; border-radius: 100%">
				
			</div>

		</div>

		<div class="col-4">
			
			<h3><?=$module->name?></h3>

			<div class="progress">
			<div class="progress-bar bg-success" role="progressbar" style="width: 75%;height:15px;" role="progressbar"> 75% </div>
			</div>

		</div>

		<div class="col-md-6">
			
			<div id="sparkline11" class="text-center" style=""></div>


			<script type="text/javascript">
				
				$('#sparkline11').sparkline([60, 40], {
		            type: 'pie',
		            height: '100',
		            resize: true,
		            sliceColors: ['#81C784', '#BF360C']
		        });
				
			</script>

		</div>

	</div>

		
<br><hr>
		<div class="row">

			<div class="col-md-6">

			<table class="table color-bordered-table inverse-bordered-table table-sm">
				<thead>
					<th></th>
					<th>Descripción</th>
					<th>Valor</th>
					<th>Responsable</th>
					<th>Fecha</th>
				</thead>
				<tbody>
					
					<?php $total = 0; foreach ($params['invoices_entry'] as $key => $value): ?>

						<tr>
							<td></td>
							<td><?=$value['description']?></td>
							<td>$ <?=$value['value']?></td>
							<td> <?=$value['name']?></td>
							<td> <?=$value['created_at']?></td>

						</tr>


						
					<?php $total += $value['value']; endforeach ?>
				</tbody>

				<tfoot style="background-color: gray; color: white">
					
							<td colspan="5" style="text-align: right;"><b>Total ingresos: </b><?=$total?></td>
					
				</tfoot>

			</table>

			</div>

			<div class="col-md-6">

				<table class="table color-bordered-table red-bordered-table table-sm">
					<thead>
						<th></th>
						<th>Descripción</th>
						<th>Valor</th>
						<th>Responsable</th>
						<th>Fecha</th>
					</thead>
					<tbody>
						
						<?php $total_e = 0; foreach ($params['invoices_egress'] as $key => $value): ?>

							<tr>

								<td></td>
								<td><?=$value['description']?></td>
								<td>$ <?=$value['value']?></td>
								<td> <?=$value['name']?></td>
								<td> <?=$value['created_at']?></td>

				

							</tr>
							
						<?php $total_e += $value['value']; endforeach ?>
					</tbody>

					<tfoot style="background-color: #EF5350; color: white">
					
							<td colspan="5" style="text-align: right;"><b>Total egresos: </b><?=$total_e?></td>
					
					</tfoot>

				</table>
				
			</div>

		</div>

			<?php

		}

	}
 ?>