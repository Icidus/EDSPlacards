<?php
require_once dirname(__FILE__).'/../../Application/Controller/Pdo.php';


class Request extends BrowsePdo
{
	
	public function searchJournals($name)
	{
		$connected = BrowsePdo::connect();
		$sql = "SELECT * FROM journals WHERE name = '$name'";
		$user = BrowsePdo::query($sql);
		foreach($user as $data){
			return $data;
		}
	}
	
	public function searchFindingAids($name)
	{
		$name_cleaned = $this->removeUnderscore($name);
		$request = file_get_contents("http://asteria.fivecolleges.edu/api/100/query/all/brief/jsonp/$name_cleaned");
		$clean = substr($request, 13, strlen($request)-16);
		$results = json_decode($clean, true);
		return $results;
	}
	
	public function searchLibguides($name, $id, $key)
	{
		$name_cleaned = $this->removeUnderscore($name);
		$search = file_get_contents("http://lgapi.libapps.com/1.1/guides/?site_id=$id&key=$key&search_terms=$name_cleaned&sort_by=relevance");
		$results = json_decode($search, true);
		$limit = array_slice($results, 0, 3);
		return $limit;
	}
	
	public function removeUnderscore($value)
	{
	    if(strpos($value, '_')) {
	    	return str_replace('_', '+', $value);
	    } else {
		    return $value;
	    }
	}   
	
	
}	
	
?>