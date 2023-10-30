<?php
//buat array scalar judul kolom
$ar_judul = ['NO','NAMA','GENDER','TEMPAT LAHIR','TGL LAHIR','NOMOR HP','EMAIL','MEDIA SOSIAL','AGAMA','UNIVERSITAS','FOTO','ACTION'];
//ciptakan object dari class Produk
$obj_person = new Person();
$keyword = $_GET['keyword'];
//panggil fungsionalitas terkait
$rs = $obj_person->cari($keyword);
//print_r($rs); die();
?>
<h3>Daftar Pencarian Mahasiswa</h3>
<a href="index.php?hal=Person_form" class="btn btn-primary">Tambah</a>
<table class="table table-striped">
	<thead>
		<tr>
		<?php
				foreach($ar_judul as $jdl){
					echo '<th>'.$jdl.'</th>';
				}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach($rs as $person){
        ?>    
			<tr>
				<td><?= $no ?></td>
				<td><?= $person['nama'] ?></td>
				<td><?= $person['gender'] ?></td>
				<td><?= $person['tempat_lahir'] ?></td>
				<td><?= $person['tgl_lahir'] ?></td>
				<td><?= $person['no_hp'] ?></td>
				<td><?= $person['email'] ?></td>
				<td><?= $person['media_sosial'] ?></td>
				<td><?= $person['Agama'] ?></td>
				<td><?= $person['kampus'] ?></td>
				<td><?= $person['foto'] ?></td>

                <td>
                <td>
					<a href="index.php?hal=Person_form&id=<?= $person['id'] ?>" 
					   title="Ubah Produk" class="btn btn-warning btn-sm">
						<i class="bi bi-pencil"></i>
					</a>
					<button type="submit" title="Hapus Produk" class="btn btn-danger btn-sm"
					    name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
						<i class="bi bi-trash"></i>
					</button>
					<input type="hidden" name="id" value="<?= $person['id'] ?>" /> 
					</form>
				</td>
			</tr>
        <?php    
		$no++;
		}	
		?>
	</tbody>
</table>