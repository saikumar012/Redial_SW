<link rel="stylesheet" type="text/css" href="css/style.css" />

<?php
/*
Developed by Reneesh T.K
reneeshtk@gmail.com
You can use it with out any worries...It is free for you..It will display the out put like:
First | Previous | 3 | 4 | 5 | 6 | 7| 8 | 9 | 10 | Next | Last
Page : 7  Of  10 . Total Records Found: 20
*/
class Pagination_class{
	var $result;
	var $anchors;
	var $total;
	function Pagination_class($qry,$starting,$recpage)
	{
		$rst		=	mysql_query($qry) or die(mysql_error());
		$numrows	=	mysql_num_rows($rst);
        $qry		 .=	" limit $starting, $recpage";
		$this->result	=	mysql_query($qry) or die(mysql_error());
		$next		=	$starting+$recpage;
		$var		=	((intval($numrows/$recpage))-1)*$recpage;
		$page_showing	=	intval($starting/$recpage)+1;
		$total_page	=	ceil($numrows/$recpage);

		if($numrows % $recpage != 0){
			$last = ((intval($numrows/$recpage)))*$recpage;
		}else{
			$last = ((intval($numrows/$recpage))-1)*$recpage;
		}
		$previous = $starting-$recpage;
		if($previous < 0){
		}else{
			@$anc .= "&nbsp;&nbsp;"."<a href='javascript:pagination(0);' class='numbers'>|<</a>"."&nbsp;&nbsp;";
			$anc .= "<a href='javascript:pagination($previous);' class='numbers'><<</a>"."&nbsp;&nbsp;";
		}
		
		################If you dont want the numbers just comment this block###############	
		$norepeat = 3;//no of pages showing in the left and right side of the current page in the anchors 
		$j = 1;
		for($i=$page_showing; $i>$norepeat; $i--){
			$fpreviousPage = $i-1;
			$page = ceil($fpreviousPage*$recpage)-$recpage;
			@$anch = "<a href='javascript:pagination($page);' class='numbers'>$fpreviousPage </a>"."&nbsp;&nbsp;".$anch;
			if($j == $norepeat) break;
			$j++;
		}
		@$anc .= $anch;
		$anc .= "<a href='' class='numbers active'>$page_showing </a>"."&nbsp;&nbsp;";
		$j = 1;
		for($i=$page_showing; $i<$total_page; $i++){
			$fnextPage = $i+1;
			$page = ceil($fnextPage*$recpage)-$recpage;
			$anc .= "<a href='javascript:pagination($page);' class='numbers'>$fnextPage </a>"."&nbsp;&nbsp;";
			if($j==$norepeat) break;
			$j++;
		}
		############################################################
		if($next >= $numrows){
		}else{
			$anc .= "<a href='javascript:pagination($next);' class='numbers'> >> </a>"."&nbsp;&nbsp;";
			$anc .= "<a href='javascript:pagination($last);' class='numbers'> >| </a>"."&nbsp;&nbsp;";
		}
		$this->anchors = $anc." ";
		
		$this->total = "<center><svaluestrong>Page : $page_showing <i> Of  </i> $total_page . Total Records Found: $numrows</svaluestrong></center>";
	}
}
?>
