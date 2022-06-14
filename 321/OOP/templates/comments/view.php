<?php include __DIR__.'/../header.html';?> 
    <div class="comments">
    <h2>Комментарии</h2>
    <ul >
    <?php

    foreach($comments as $comment){
        echo "<li class='comments__item'>" . $comment->getText() . " <a href='/321/OOP/www/comments/".$comment->getId()."/edit'>Редактировать</a></li>";
    }
    ?>
    </ul>
    </div>
<?php include __DIR__.'/../footer.html';?> 