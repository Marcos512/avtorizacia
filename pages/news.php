<?php session_start();
$title = "Главная";
require $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>

<div class='inner'>
    <h1>Новости</h1>
</div>

<div class='outer'>
    <div class='middle'>
        <div class='inner'>
            <ul style="list-style-type: none;">
                <li><a href='#'>Новость 1</a></li>
                <br/>
                <li><a href='#'>Новость 2</a></li>
                <br/>
                <li><a href='#'>Новость 3</a></li>
                <br/>
                <li><a href='#'>Новость 4</a></li>
                <br/>
                <li><a href='#'>Новость 5</a></li>
                <br/>
            </ul>
        </div>
    </div>
</div>

<?php
require $_SERVER['DOCUMENT_ROOT'] . "/footer.php";
?>
