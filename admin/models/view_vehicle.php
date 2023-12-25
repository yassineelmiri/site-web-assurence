<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `vehicle_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("vehicle ID is not valid."); location.replace("./?page=vehicles")</script>';
	}
}else{
	echo '<script>alert("vehicle ID is Required."); location.replace("./?page=vehicles")</script>';
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
    #uni_modal .modal-body{
        padding-bottom:0px !important;
    }
</style>
<div class="container-fluid">
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">Numéro de dossier du véhicule</div>
        <div class="col-9 mb-0 border"><?= isset($mv_number) ? $mv_number : '' ?></div>
    </div>
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">Numéro de reclamation </div>
        <div class="col-9 mb-0 border"><?= isset($plate_number) ? $plate_number : '' ?></div>
    </div>
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">color</div>
        <div class="col-9 mb-0 border"><?= isset($variant) ? $variant : '' ?></div>
    </div>
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">Mètres</div>
        <div class="col-9 mb-0 border"><?= isset($mileage) ? ($mileage > 0 ? format_num($mileage) : $mileage) : '' ?> KM</div>
    </div>
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">Numéro de moteur</div>
        <div class="col-9 mb-0 border"><?= isset($engine_number) ? $engine_number : '' ?></div>
    </div>
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">Numéro de châssis</div>
        <div class="col-9 mb-0 border"><?= isset($chasis_number) ? $chasis_number : '' ?></div>
    </div>
    <div class="d-flex w-100">
        <div class="col-3 mb-0 border bg-gradient-secondary">prix</div>
        <div class="col-9 mb-0 border"><?= isset($price) ? format_num($price, 2) : ' ' ?>  $</div>
    </div>
    <div class="d-flex w-100 mb-3">
        <div class="col-3 mb-0 border bg-gradient-secondary">la situation</div>
        <div class="col-9 mb-0 border">
            <td class="text-center">
                <?php if(isset($status)): ?>
                    <?php if($status == 0): ?>
                        <span class="badge badge-success px-3 rounded-pill">disponible </span>
                    <?php else: ?>
                        <span class="badge badge-danger px-3 rounded-pill">Non  disponible</span>
                    <?php endif; ?>
                <?php else: ?>
                        <span class="badge badge-light border px-3 rounded-pill">N/A</span>
                <?php endif; ?>
            </td>
        </div>
    </div>
</div>
<hr class="mx-n4">
<div class="py-3 text-right">
    <button class="btn btn-sm btn-flat btn-navy bg-gradient-navy" id="edit-vehicle" type="button"><i class="fa fa-edit"></i> modification</button>
    <button class="btn btn-sm btn-flat btn-danger bg-gradient-danger" id="delete-vehicle" type="button"><i class="fa fa-trash"></i>supprimer</button>
    <button class="btn btn-sm btn-flat btn-light bg-gradient-light border" data-dismiss="modal" type="button"><i class="fa fa-close"></i> Fermer</button>
</div>
<script>
	$(function(){
		$('#delete-vehicle').click(function(){
			_conf("Are you sure to delete this vehicle permanently?","delete_vehicle",['<?= isset($id) ? $id : '' ?>'])
		})
        $('#edit-vehicle').click(function(){
			uni_modal('<i class="fa fa-edit"></i> Add Vehicle Entry','models/manage_vehicle.php?id=<?= isset($id) ? $id : '' ?>','modal-lg')
		})
	
	})
	function delete_vehicle($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_vehicle",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("une erreur",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("une erreur",'error');
					end_loader();
				}
			}
		})
	}
</script>