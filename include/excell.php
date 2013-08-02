<?php
class Export
{
function ExportToExcell($sql){
$filename = date('d-m-y');
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename='$filename'.xls");
header("Pragma: no-cache");
header("Expires: 0");

//$Connect = @mysql_connect("localhost", "root", "")
 //   or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database
//$Db = @mysql_select_db("db_projector", $Connect)
//    or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());
//execute query
	$result = mysql_query($sql);
//    or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());

$file_ending = "xls";
$sep = "\t"; //tabbed character
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");
//end of printing column names
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
 $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
  }

/*$header ='';
	$data = '';
    $rec = mysql_query($sql) or die (mysql_error());
    
    $num_fields = mysql_num_fields($rec);
    
    for($i = 0; $i < $num_fields; $i++ )
    {
        $header .= mysql_field_name($rec,$i)."\t";
    }
    
    while($row = mysql_fetch_row($rec))
    {
        $line = '';
        foreach($row as $value)
        {                                            
            if((!isset($value)) || ($value == ""))
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
    
    $data = str_replace("\r" , "" , $data);
    
    if ($data == "")
    {
        $data = "\\n No Record Found!\n";                        
    }
    
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=reports.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$data";
	}
*/
exit();
}
};

/* Initialize mailer object */
$export = new Export;
?>