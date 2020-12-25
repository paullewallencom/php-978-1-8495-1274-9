<?php
    $objXML = simplexml_load_file('../common.xml');
    if (!$objXML)
    {
      echo 'Error loading xml';
    }
	else
	{
		$response = '';
		$action = $_GET['action'];
		switch($action)
		{
			case 'all':
				$book = $objXML->xpath('//book/name');
				$response.= '<ul>';
				foreach ($book as $item)
				{
					$response.= '<li>';
					$response.= $item[0].' ('.$item['year'].')';
					$response.= '</li>';
				}
				$response.= '</ul>';
			break;
			case 'total':
				$response.= '<ul>';
				$stories = $objXML->xpath('//story');
				foreach ($stories as $story)
				{
					$response.= '<li>';
					$response.= '<label>'.$story->title.'</label><br/><em>'.$story->quote.'</em>';
					$response.= '</li>';
				}
				$response.= '</ul>';
			break;
			
			case 'last':
				$lastElement = $objXML->xpath('//book[last()]');
				echo '<strong>'.$lastElement[0]->name.' ('.$lastElement[0]->name['year'].')</strong>';
			break;
			
			case 'year':
				$book = $objXML->xpath('//book/name[@year<1900]');
				$response.= '<ul>';
				foreach($book as $item)
				{
					$response.= '<li>';
					$response.= $item.' ('.$item['year'].')';
					$response.= '</li>';
				}
				$response.= '</ul>';
			break;
		}
		echo $response;
	}
?>
