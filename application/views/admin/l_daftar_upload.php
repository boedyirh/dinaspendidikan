<div class="clearfix">

<div class="panel panel-info">
	<div class="panel-heading" style="overflow: auto">
		<div class="col-md-6"><h3 style="margin-top: 5px"><span class="glyphicon glyphicon-user"></span> Monitoring Upload Data Sekolah</h3></div>
 		<div class="col-md-3"></div>
		<div class="col-md-4">
		 	</div>
	</div>
</div>

<?php echo $this->session->flashdata("k");?>

  <table class="display table table-bordered table-striped table-condensed table-hover" id="suratMasuk">
	<thead>
		<tr  bgcolor=#cce6ff>
			<th class="text-center" width="3%">No</th>
			<th class="text-center" width="8%">Periode</th>
			<th class="text-center" width="8%">Jenjang</th>
			<th class="text-center" width="13">Kecamatan</th>
      	<th class="text-center" width="18%">Sekolah</th>
      <th class="text-center" width="15%">Waktu Upload</th>
       <th class="text-center" width="8%">Rows</th>
        <th class="text-center" width="10%">UploadBy</th>
         <th class="text-center" width="10%">Status</th>
      <th class="text-center" width="12%">Batch Code</th>
			<th class="text-center" width="23%">Aksi</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='11'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
		?>
		<tr>
			<td class="text-center"><?php
       echo $no;?></td>
			<td class="text-center"><?php echo $b->Periode; ?></td>
			<td class="text-center"><?php echo $b->Jenjang; ?></td>
			<td><?php echo $b->Kecamatan; ?></td>
      	<td><?php echo $b->NamaSekolah; ?></td>
			<td><?php echo $b->TanggalUpload; ?></td>
     	<td class="text-center"><?php echo number_format($b->JumlahRow); ?></td>
     	<td class="text-center"><?php 
         $namaadmin =	gval("t_admin", "id", "nama", $b->UploadBy);
       echo $namaadmin; 
       echo '<br>';
         echo $b->File; 
       ?></td>
		  <?php 
       $StatusAjuan = $b->Status;
          if( $StatusAjuan=='Ada')
                              {
                               $stts = "<span title='Uploaded' class='label label-primary'>Data Tersedia</span>";
                              }
                              else
                              {
                               $stts = "<span title='Telah disetujui untuk diajukan' class='label label-danger'>Dibatalkan</span>";
                              }
          ?>
    	<td class="text-center"><?php echo $stts; ?></td>
      
      	<td><?php echo $b->BatchCode; ?></td>
					<td class="text-center" class="ctr" >
				<?php  
				 if( $StatusAjuan=='Ada') {
				?>
				<div class="btn-group">
					<a href="<?php echo base_URL()?>admin/daftar_upload/batal/<?php echo $b->id?>" class="btn btn-warning btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i> Batalkan Upload</a>
				 
				</div>	
				<?php 
				} else {
				?>
				<div class="btn-group">
				<a href="<?php echo base_URL()?>admin/daftar_upload/jadi/<?php echo $b->id?>" class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i> Kembalikan Data</a>
				 		</div>	
				<?php 
				}
				?>
				
			</td>
			
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
</div>
