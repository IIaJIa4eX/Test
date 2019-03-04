<ul>

<?php 
    foreach ($MODEL as $v) {
        echo "<li>";
            echo $this->WriteHTML($v, "comment", "one"); 
        echo "</li>";
    }
?>

</ul>