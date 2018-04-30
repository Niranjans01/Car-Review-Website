<?php 
require("../actions/user.php");
 $rss = new uploadingcar;
 $feed = $rss->Rssfeed();

echo header("content-type:text/xml");
echo "<?xml version = '1.0' ?>";

echo "<Eco_Friendly_Car>";
foreach($feed as $rssfeeed)
{
	echo "<Eco-friendly-car>";
	echo "<carname>".$rssfeeed['carname']."</carname>";
     echo "<fueltype>".$rssfeeed['fuel']."</fueltype>";
     echo "<efficiency>".$rssfeeed['efficiency']."</efficiency>";
     echo "<rating>".$rssfeeed['ratings']."</rating>";
     echo "<description>".$rssfeeed['description']."</description>";
     echo "<pathofimage>".$rssfeeed['imagepath']."</pathofimage>";
     echo "<extension>".$rssfeeed['extension']."</extension>";
	echo "</Eco-friendly-car>";
}
echo "</Eco_Friendly_Car>";
 ?>