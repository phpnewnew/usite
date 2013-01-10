<?php
class Pager
{
	
	public function ViewPage($totalcount,$totalpage,$pagenum,$pagesize,$param,$url)
	{
		 
		
		
		
		$rtn ="";
		if($totalcount==0)
			return $rtn;
			
		if($pagenum>0)
			$rtn.="<a class='page-start' href='".$url."?".$param."&page=".($pagenum-1)."'>��һҳ</a>";
		else
			$rtn.="<span class='page-start'><span>��һҳ</span></span>";
		
		if($totalpage<=5)
		{
			for($i=0;$i<$totalpage;$i++)
			{
				$classname="";
				if($pagenum==$i)
				{
					$classname ="class='page-curr'";
					$rtn.="<span ".$classname.">".($i+1)."</span>";
				}
				else
				{
					$rtn.="<a href='".$url."?".$param."&page=".$i."'>".($i + 1)."</a>";
				}
			}
		}
		else
		{
			if($pagenum >=0 && $pagenum <=2)
			{
				for($i=0;$i<5;$i++)
				{
					$classname="";
					if($pagenum==$i)
					{
						$classname ="class='page-curr'";
						$rtn.="<span ".$classname.">".($i+1)."</span>";
					}
					else
					{
						$rtn.="<a href='".$url."?".$param."&page=".$i."'>".($i + 1)."</a>";
					}
					
				}
			}
			else if($pagenum > 2 && $pagenum < $totalpage - 2)
			{
				for ($i = $pagenum - 2; $i <= $pagenum + 2; $i++)
				{
					$classname="";
					if($pagenum==$i)
					{
						$classname ="class='page-curr'";
						$rtn.="<span ".$classname.">".($i+1)."</span>";
					}
					else
					{
						$rtn.="<a href='".$url."?".$param."&page=".$i."'>".($i + 1)."</a>";
					}
				}
			}
			else if ($pagenum >= $totalpage - 2 && $pagenum <= ($totalpage - 1))
			{
				for ($i = $totalpage - 5; $i <= ($totalpage - 1); $i++)
				{
					$classname="";
					if($pagenum==$i)
					{
						$classname ="class='page-curr'";
						$rtn.="<span ".$classname.">".($i+1)."</span>";
					}
					else
					{
						$rtn.="<a href='".$url."?".$param."&page=".$i."'>".($i + 1)."</a>";
					}
				}
			}
			
			
			
		}
		
		if($pagenum <($totalpage -1))
		{
			$rtn.="<a class='page-next' href='".$url."?".$param."&page=".($pagenum+1)."'>��һҳ</a>";
		}
		else
		{
			$rtn.="<span class='page-end'><span>��һҳ</span></span>";
		}
		
		return $rtn;
		
		
	}
}

?>