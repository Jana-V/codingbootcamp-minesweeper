<ul>
    <?php foreach($games as $game) : ?>
        <li>
            <a href="http://www.minesweeper.local?route=play&id=<?php echo $game['id']; ?>"><?php echo $game['started_at']; ?></a>
        </li>
    <?php endforeach; ?>

</ul>