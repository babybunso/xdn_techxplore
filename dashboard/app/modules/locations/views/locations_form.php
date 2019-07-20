<div class="modal-header">
	<h5 class="modal-title" id="modalLabel"><?php echo $page_heading?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>

<div class="modal-body">

	<div class="form">

		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
		
		<div class="form-group">
			<label for="location_location"><?php echo lang('location_location')?>:</label>			
			<?php echo form_input(array('id'=>'location_location', 'name'=>'location_location', 'value'=>set_value('location_location', isset($record->location_location) ? $record->location_location : ''), 'class'=>'form-control'));?>
			<div id="error-location_location"></div>			
		</div>

		<div class="form-group">
			<label for="location_city"><?php echo lang('location_city')?>:</label>			
			<?php echo form_input(array('id'=>'location_city', 'name'=>'location_city', 'value'=>set_value('location_city', isset($record->location_city) ? $record->location_city : ''), 'class'=>'form-control'));?>
			<div id="error-location_city"></div>			
		</div>

		<div class="form-group">
			<label for="location_status"><?php echo lang('location_status')?>:</label>
			<?php $options = create_dropdown('array', ',Active,Disabled'); ?>
			<?php echo form_dropdown('location_status', $options, set_value('location_status', (isset($record->location_status)) ? $record->location_status : ''), 'id="location_status" class="form-control"'); ?>
			<div id="error-location_status"></div>
		</div>



	</div>

</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?php echo lang('button_close')?>
	</button>
	<?php if ($action == 'add'): ?>
		<button id="submit" class="btn btn-success" type="submit" data-loading-text="<?php echo lang('processing')?>">
			<i class="fa fa-save"></i> <?php echo lang('button_add')?>
		</button>
	<?php elseif ($action == 'edit'): ?>
		<button id="submit" class="btn btn-success" type="submit" data-loading-text="<?php echo lang('processing')?>">
			<i class="fa fa-save"></i> <?php echo lang('button_update')?>
		</button>
	<?php else: ?>
		<script>$(".modal-body :input").attr("disabled", true);</script>
	<?php endif; ?>
</div>	