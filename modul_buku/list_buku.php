<table class="data">
	<tr>
		<th>Judul</th>
		<th>Kategori</th>
		<th>Deskripsi</th>
		<th>Jumblah</th>
		<th>Cover</th>
		<th width="20%">Pilihan</th>
	</tr>
	<?php foreach ($data_buku as $buku) : ?>
	<tr>
		<td><?php echo $buku['buku_judul'] ?></td>
		<td><?php echo $buku['Kategori_nama'] ?></td>
		<td><?php echo $buku['buku_deskripsi'] ?></td>
		<td><?php echo $buku['buku_jumlah'] ?></td>
		<td><img class="buku-cover" src="cover/<?php echo $buku['buku_cover'] ?>"></td>
		<td><a href="edit-buku-php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-edit">Edit</a>
				<a
			 href="delete-buku.php?id_buku=<?php echo $buku['buku.id']; ?>" class="btn btn-hapus" onclick="return confrim('Hapus data ini');">Hapus</a>
		</td>
	</tr>
<?php endforeach ?>
</table>