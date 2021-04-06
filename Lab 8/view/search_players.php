<!DOCTYPE html>
<html>
<head>
    <title>Search Players</title>
    <link rel="stylesheet" href="../styles/search_players.css">
</head>

<body>
<?php
include "../view/header.php";
?>
<div class="flex-container">
    <div class="search-box input-field-margin">
        <input class="rounded-input-field input-field-margin" type="search" placeholder="Search a game">
        <div class="input-field-margin rounded-input-field">
            <p style="color: gray">Search by region</p>
            <select name="region" id="regions" class="drop-down-menu">
                <?php
                include '../utils/utilities.php';
                $countries = getCountryNames();
                foreach ($countries as $country) {
                    echo "<option value=".$country.">$country</option>";
                }
                ?>
            </select><br>
        </div>
        <button id="searchButton" class="rectangular-button input-field-margin action-button" type="button" onclick="searchPlayersByRegion()">Search</button>
    </div>
    <div id="player-list" class="player-list">
    </div>
</div>

<script type="text/javascript" src="../scripts/search_players.js"></script>
</body>
</html>

