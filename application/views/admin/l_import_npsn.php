<div class="clearfix">

<div class="panel panel-info">
	<div class="panel-heading" style="overflow: auto">
		<div class="col-md-6"><h3 style="margin-top: 5px"><span class="glyphicon glyphicon-cloud-upload"></span> Import/Upload Excel XLSX (Office 2007)</h3></div>
		<div class="col-md-3">
	
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
      <form class="navbar-form navbar-left" name='formupload' enctype="multipart/form-data" method="post" action="<?=base_URL()?>admin/import_npsn/import"> 
        
        <input type="file" name="file_surat" class="form-control" style="width: 200px">
       	<button type="submit" value="upload" class="btn btn-info"><i class="icon-search icon-white"> </i> Upload</button> 
         
				</form>
    
    
		</div>
	</div>
</div>

<?php echo $this->session->flashdata("k");?>

 

</div>
