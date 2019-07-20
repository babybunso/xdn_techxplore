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
			<label for="gender_label"><?php echo lang('gender_label')?>:</label>			
			<?php echo form_input(array('id'=>'gender_label', 'name'=>'gender_label', 'value'=>set_value('gender_label', isset($record->gender_label) ? $record->gender_label : ''), 'class'=>'form-control'));?>
			<div id="error-gender_label"></div>			
		</div>

		<div class="form-group">
			<label for="gender_status"><?php echo lang('gender_status')?>:</label>
			<?php $options = create_dropdown('array', ',Active,Disabled'); ?>
			<?php echo form_dropdown('gender_status', $options, set_value('gender_status', (isset($record->gender_status)) ? $record->gender_status : ''), 'id="gender_status" class="form-control"'); ?>
			<div id="error-gender_status"></div>
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