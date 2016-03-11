<ul>
    <?php foreach($news as $item): ?>
    <li>
        <a href="article.php?id=<?php echo $item->id?>"><?php echo $item->title ?></a>
    </li>
    <?php endforeach; ?>
<ul>