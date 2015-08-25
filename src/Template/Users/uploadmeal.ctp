<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('#image-preview img').attr('src', e.target.result);
				$('#image-preview img').show();
			}
			
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$(function(){
		$("#image-meal").change(function(){
			readURL(this);
		});
	})
</script>

<div class="col-md-12" style="margin-top:30px">
    <?= $this->element('user_menu');?>
	<div class="col-md-4">
		<h2>Meal Upload Form</h2>
		<?= $this->Form->create('filename', array('class'=>'form-horizontal','action'=>'uploadmeal','enctype' => 'multipart/form-data', 'type' => 'file'));?>
			<fieldset>
				<div class="form-group">
					<label class="col-lg-4 control-label col-xs-12" for="Name">Restaurant Name<span class="require">*</span></label>
					<div class="col-lg-8">
						<input type="text" name="Name" required class="form-control" value="<?= $Restaurant->Name; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label col-xs-12" for="Meal_Name">Meal Name<span class="require">*</span></label>
					<div class="col-lg-8">
						<input type="text" name="Meal_Name" required class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label col-xs-12" for="Image">Image<span class="require">*</span></label>
					<div class="col-lg-8">
						<input type="file" id="image-meal" name="Image" required class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success pull-right" value="Upload Image" />
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label col-xs-12">Image Preview</label>
					<div id="image-preview" class="col-lg-8">
						<img src="#" class="img-responsive" alt="your image" style="display:none"/>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="col-md-6 col-sm-8">	
		<h2>Meal Upload History</h2>	
		<table class="table table-theme table-striped">
			<thead>
				<tr>
					<th>Restaurant Name</th>
					<th>Meal Name</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					
				</tr>
			</tbody>
		</table>
	</div>


<div class="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="content-page row">
    <?php echo $this->element('user_menu');?>
	
</div>
</div>

</div>

</div>
