
<?php


include("header.php");


include("$lib_path/view-tabs.php");

echo "<div class='container'>___<hr><table class='TFtable';>";
foreach($contents as $n) {
        list($k, $v) = array_pad( explode ("=", $n, 2), 2, null);
       
	//for remote files via http
        if(preg_match('/\[\?(.+?)\]/', $v, $matches)) {
	  // to allow comments in the target field.
	 	  list($v1, $v2) = array_pad( explode ("///", $v, 2), 2, null);
	  	  $v1=substr($v1, 2, -2);
	  $v = "<a href=$matches[1]>$v1</a></td><td>$v2";
        }
	//for folders (navigation)

	else if(preg_match('/\[(.+?)\\/]/', $v, $matches)) {
                $v = "<a href=$_SERVER[PHP_SELF]?action=list&file=$matches[1]/>$v</a>";
	}

	//for local files

        else if(preg_match('/\[(.+?)\]/', $v, $matches)) {
          // to allow comments in the target field.
	  list($v1, $v2) = array_pad( explode ("///", $v, 2), 2, null);

	  $v = "<a href=$_SERVER[PHP_SELF]?action=source&file=$matches[1]>$v1</a></td><td>$v2";

        }

       	
        echo "<tr id=$k>";
        if(isset($v)) { echo "<th height='10' width='300' style='text-align:right'>$k</th><td width='20'></td><td>$v</td>"; }
        else { echo "<th height='10' style='text-align:right'></th><td width='20'></td><td>$k</td>"; }
        echo "</tr>";
}

?>
</table>

</div>


</div>




</div></div>

</div>
