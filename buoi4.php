<?php $n=5;?>
<html lang="en">
<head>
    <title>bang cc <?php echo $n?></title>
    <style >tr:hover{background-color: yellow};</style>
</head>
<body>
<table border="1">
<?php 
    for($i=1;$i<=10;$i++){
        // echo "<tr><td>$n</td>";
        // echo "<td>x$i</td>";
        // echo "<td>=".($n*$i)."</td></tr>";
        ?>
        <tr>
            <td><?php echo $n?></td>
            <td><?php echo $i?></td>
            <td><?php echo $n*$i?></td>
        </tr>
        <?php
    }
?>

</table>
</body>
</html>