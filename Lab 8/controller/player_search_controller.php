<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/player_search.php';

if (isset($_GET['region'])){
       $players = searchPlayersByRegion($_GET['region']);
       if (sizeof($players) > 0){
           foreach ($players as $key => $player){
               echo "<div class='list-item card'>";
               echo "<div class='rounded-avatar'>";
               echo "<img src=".$player['imgUrl'].">";
               echo "</div>";
               echo "<h4>".$player['name']."</h4>";
               echo "<img id='addButton' src='../img/add_icon.png'>";
               echo  "</div>";
           }
       }else{
           echo "<h3>No result found</h3>";
       }
       //TODO:: search game with text
}


