<form id="formMunicipios" action="" method="post">
	<select name="per_page" onchange="this.form.submit()" >
		<option <?php echo ($por_page==5)? 'selected' : '' ; ?> value="5">5</option>
		<option <?php echo ($por_page==10)? 'selected' : '' ; ?> value="10">10</option>
		<option <?php echo ($por_page==15)? 'selected' : '' ; ?> value="15">15</option>
		<option <?php echo ($por_page==20)? 'selected' : '' ; ?> value="20">20</option>
	</select>
</form>

<table >
	<thead>
		<tr><th>#</th><th>Municipio</th><th>Provincia</th><th>Comunidad</th></tr>
	</thead>
	<tbody>
	<?php 
	foreach($rsMunicipios as $objMunicipio){
	    echo "<tr>";
	    echo "<td>".$objMunicipio->id."</td>";
	    echo "<td>".$objMunicipio->nombre."</td>";
	    echo "<td>".$objMunicipio->provincia."</td>";
	    echo "<td>".$objMunicipio->comunidad."</td>";
	    echo "</tr>";
	}
	?>
	</tbody>
</table>
<style>
    div.links a {padding:3px; margin:10px;}
</style>
<div class="links"><?php echo $pagination ?></div>

<script type="text/javascript">


</script>