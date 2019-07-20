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
			<label for="merchant_merchant"><?php echo lang('merchant_merchant')?>:</label>			
			<?php echo form_input(array('id'=>'merchant_merchant', 'name'=>'merchant_merchant', 'value'=>set_value('merchant_merchant', isset($record->merchant_merchant) ? $record->merchant_merchant : ''), 'class'=>'form-control'));?>
			<div id="error-merchant_merchant"></div>			
		</div>

		<div class="form-group">
			<label for="merchant_location"><?php echo lang('merchant_location')?>:</label>
			<?php //$options = create_dropdown('array', ',10'); ?>
			<?php
				foreach($locations as $key) {
					$options[$key->location_id] = $key->location_location;
				}
			?>
			<?php echo form_dropdown('merchant_location', $options, set_value('merchant_location', (isset($record->merchant_location)) ? $record->merchant_location : ''), 'id="merchant_location" class="form-control"'); ?>
			<div id="error-merchant_location"></div>
		</div>

		<div class="form-group">
			<label for="merchant_status"><?php echo lang('merchant_status')?>:</label>
			<?php $options = create_dropdown('array', ',Active,Disabled'); ?>
			<?php echo form_dropdown('merchant_status', $options, set_value('merchant_status', (isset($record->merchant_status)) ? $record->merchant_status : ''), 'id="merchant_status" class="form-control"'); ?>
			<div id="error-merchant_status"></div>
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