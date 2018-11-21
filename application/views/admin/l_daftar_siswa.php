<div class="clearfix">

<div class="panel panel-info">
	<div class="panel-heading" style="overflow: auto">
		<div class="col-md-6"><h3 style="margin-top: 5px"><span class="glyphicon glyphicon-search"></span> Daftar Siswa di Bojonegoro</h3></div>
	 	<div class="col-md-2"></div>
		<div class="col-md-6">
			<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL(); ?>admin/daftar_siswa/cari" style="margin-top: 0px">
		   	 <?php

//		ComboBoxKecamatan("nama", "data_kecamatan", "kode", "nama", 'xxx', "JenisID", "form-control","170px","----Kecamatan-----");
		
        ?>
    
    		<input type="text" class="form-control" name="q" style="width: 180px" placeholder="Cari Sekolah/Siswa ...">
				<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"> </i> Tampilkan</button>
			</form>
		</div>
	</div>
</div>

<?php echo $this->session->flashdata("k");?>
	

<table class="table table-bordered table-hover">
	<thead>
		<tr  bgcolor=#cce6ff>
		 	  
    <th class="text-center" >No</th>
    <th class="text-center" >NPSN</th>
    <th class="text-center" >Nama Siswa</th>
    <th class="text-center" >Asal Sekolah</th>
    <th class="text-center" >Kecamatan</th>
    
    <th class="text-center" >Kelas</th>
    <th class="text-center" >Aksi</th>
 
   	</tr>
     
     
    
    
    
    
	</thead>
	
	<tbody>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
		?>
		<tr>
			<td class="text-center"><?php echo $no?></td>
      	<td class="text-center"><?php echo $b->NPSN; ?></td>
			<td><?php echo $b->NamaSiswa; ?></td>
      <td ><?php echo $b->NamaSekolah; ?></td>
      
			<td class="text-center"><?php echo $b->Kecamatan; ?></td>
		
      <td class="text-center"><?php echo '7A';?></td>
     	
     	<td class="text-center"><?php echo 'Aksi';?></td>
		  
     
     
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
