<?php 

	class viewAccounting_modules{

		static public function registerInvoices($param){

			?>

			<script type="text/javascript">
				
				 $('.dropify').dropify();

			</script>

			<h3>Registrar nueva factura</h3>

			<div class="col-6">

				<form id="form_new_accounting_modules" action="" method="post" autocomplete="off" enctype="enctype/form-data" onsubmit="postdata('form_new_accounting_modules', event, ok_register_accounting_modules)">

					<input type="hidden" name="class" value="Accounting_modules">
					<input type="hidden" name="method" value="storage_accounting_modules">

				<select class="form-control">
					<option selected="" disabled="">Seleccione un tipo</option>

					<?php foreach ($param['accounting_modules'] as $key => $value): ?>

						<option value="<?=$value['id_accounting_modules']?>"><?=$value['name']?></option>
						
					<?php endforeach ?>
				</select>

                <div class="form-group">
                    <center><input onchange="validate_size(this)" accept="image/*" type="file" id="cover" name="invoice" class="dropify" style="height: 500px" data-default-file="" required="" />
                    <input type="number" name="value" class="form-control" placeholder="$ Valor"> 
                    </center>
                    <textarea placeholder="Descripción" class="form-control"></textarea>
                </div>

            </div>

			<?php

		}

	}
 ?>