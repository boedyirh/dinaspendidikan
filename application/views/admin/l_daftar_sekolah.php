<div class="clearfix">

<div class="panel panel-info">
	<div class="panel-heading" style="overflow: auto">
		<div class="col-md-6"><h3 style="margin-top: 5px"><span class="glyphicon glyphicon-search"></span> Rekapitulasi Daftar Sekolah di Bojonegoro</h3></div>
	 	<div class="col-md-3"></div>
		<div class="col-md-4">
			<form class="navbar-form navbar-left" method="post" action="<?php echo base_URL(); ?>admin/daftar_sekolah/cari" style="margin-top: 0px">
				<input type="text" class="form-control" name="q" style="width: 180px" placeholder="Cari Sekolah ...">
				<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"> </i> Tampilkan</button>
			</form>
		</div>
	</div>
</div>

<?php echo $this->session->flashdata("k");?>
	

<table class="table table-bordered table-hover">
	<thead>
		<tr  bgcolor=#cce6ff>
		 	  
    <th class="text-center" rowspan="2">No</th>
    <th class="text-center" rowspan="2">Kecamatan</th>
    <th class="text-center" rowspan="2">Jumlah Sekolah</th>
    <th class="text-center" colspan="3">SD</th>
    <th class="text-center" colspan="3">SMP</th>
    <th class="text-center" colspan="3">SMA</th>
    <th class="text-center" colspan="3">SMK</th>
 
   	</tr>
     
       <tr  bgcolor=#cce6ff>
       <td class="text-center">Negeri</td>
       <td class="text-center">Swasta</td>
        <td class="text-center">Total</td>
      
       <td class="text-center">Negeri</td>
         <td class="text-center">Swasta</td>
           <td class="text-center">Total</td>
      
       <td class="text-center">Negeri</td>
       <td class="text-center">Swasta</td>
         <td class="text-center">Total</td>
      
         <td class="text-center">Negeri</td>
       <td class="text-center">Swasta</td>
         <td class="text-center">Total</td>
      
    
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
			<td><?php echo $b->nama; ?></td>
      <td class="text-center"><?php echo '45';?></td>
      
			<td class="text-center"><?php echo '45';?></td>
			<td class="text-center"><?php echo '23';?></td>
      <td class="text-center"><?php echo '68';?></td>
     	
     	<td class="text-center"><?php echo '45';?></td>
			<td class="text-center"><?php echo '23';?></td>
      <td class="text-center"><?php echo '68';?></td>
     
     	<td class="text-center"><?php echo '45';?></td>
			<td class="text-center"><?php echo '23';?></td>
      <td class="text-center"><?php echo '68';?></td>
      
		 	<td class="text-center"><?php echo '45';?></td>
			<td class="text-center"><?php echo '23';?></td>
      <td class="text-center"><?php echo '68';?></td>
     
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
