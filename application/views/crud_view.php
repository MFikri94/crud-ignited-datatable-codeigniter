<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Crud dengan ignited datatables pada CodeIgniter</title>
  <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.css'?>" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container">
    <h2>Product List</h2>
		<button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
    <table class="table table-striped" id="mytable">
      <thead>
        <tr>
          <th>Product Code</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>

	<!-- Modal Add Produk-->
	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/simpan'?>" method="post">
	     <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Add New</h4>
	               </div>
	               <div class="modal-body">
	                   <div class="form-group">
	                       <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
	                   </div>
										 <div class="form-group">
	                       <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
	                   </div>
										 <div class="form-group">
	                       <select name="kategori" class="form-control" placeholder="Kode Barang" required>
													  <?php foreach ($kategori->result() as $row) :?>
													 		<option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
													 	<?php endforeach;?>
												 </select>
	                   </div>
										 <div class="form-group">
	                       <input type="text" name="harga" class="form-control" placeholder="Harga" required>
	                   </div>

	               </div>
	               <div class="modal-footer">
	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                  	<button type="submit" id="add-row" class="btn btn-success">Save</button>
	               </div>
	      			</div>
	        </div>
	     </div>
	 </form>

	 <!-- Modal Update Produk-->
 	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/update'?>" method="post">
 	     <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Update Produk</h4>
 	               </div>
 	               <div class="modal-body">
 	                   <div class="form-group">
 	                       <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
 	                   </div>
 										 <div class="form-group">
 	                       <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
 	                   </div>
 										 <div class="form-group">
 	                       <select name="kategori" class="form-control" placeholder="Kode Barang" required>
 													  <?php foreach ($kategori->result() as $row) :?>
 													 		<option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
 													 	<?php endforeach;?>
 												 </select>
 	                   </div>
 										 <div class="form-group">
 	                       <input type="text" name="harga" class="form-control" placeholder="Harga" required>
 	                   </div>

 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Update</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form>

	 <!-- Modal Hapus Produk-->
 	  <form id="add-row-form" action="<?php echo base_url().'index.php/crud/delete'?>" method="post">
 	     <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
 	               </div>
 	               <div class="modal-body">
 	                       <input type="hidden" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
												 <strong>Anda yakin mau menghapus record ini?</strong>
 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Hapus</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form>

<script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.datatables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.js'?>"></script>

<script>
	$(document).ready(function(){
		// Setup datatables
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };

      var table = $("#mytable").dataTable({
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'index.php/crud/get_guest_json'?>", "type": "POST"},
                	columns: [
												{"data": "barang_kode"},
												{"data": "barang_nama"},
												//render harga dengan format angka
                        {"data": "barang_harga", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "kategori_nama"},
                        {"data": "view"}
                  ],
          		order: [[1, 'asc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }

      });
			// end setup datatables
			// get Edit Records
			$('#mytable').on('click','.edit_record',function(){
            var kode=$(this).data('kode');
						var nama=$(this).data('nama');
						var harga=$(this).data('harga');
						var kategori=$(this).data('kategori');
            $('#ModalUpdate').modal('show');
            $('[name="kode_barang"]').val(kode);
						$('[name="nama_barang"]').val(nama);
						$('[name="harga"]').val(harga);
						$('[name="kategori"]').val(kategori);
      });
			// End Edit Records
			// get Hapus Records
			$('#mytable').on('click','.hapus_record',function(){
            var kode=$(this).data('kode');
            $('#ModalHapus').modal('show');
            $('[name="kode_barang"]').val(kode);
      });
			// End Hapus Records

	});
</script>
</body>
</html>
