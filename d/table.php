<?php
function row($data){
    ?>
    <tr><td><?=$data["name"]?></td></tr>

}



<?php
foreach($rows as $row) {
    echo row($row);
}
?>


