<?php include __DIR__.'/../header.html';?> 
<form method="POST" action="/321/OOP/www/comments/<?= $comment->getId()?>/edit">
    <label for="comment">Комментарий</label>
    <textarea name="comment" id="comment" cols="30" rows="5"><?= $comment->getText()?></textarea>
    <button type="submit">Отправить</button>
</form>
<?php include __DIR__.'/../footer.html';?> 