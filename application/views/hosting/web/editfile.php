<div class="row mx-2">
	<div class="col">
		<form action="<?= base_url('hosting/efile/' . $folder['id']); ?>" method="post">
			<div class="col-md-12">
				<div class="row">
					<input type="text" name="nama" id="nama" value="<?= $folder['file']; ?>" class="form-control mx-3 my-2 col-md-9" style="border: none;">
					<button type="submit" class="ml-auto btn btn-success my-1"><i class="fas fa-save"> </i> save</button>
				</div>
			</div>
			<textarea id="file" name="file" cols="10" rows="30" class="form-control" style="border: 1px solid black;"><?= htmlspecialchars($open); ?>
			</textarea>
		</form>
	</div>
	<div class="col">
		<?= $compile; ?>
		<p class="text-right mr-3">Template by IT Club</p>
	</div>
</div>
</div>