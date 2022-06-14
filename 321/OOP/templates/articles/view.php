<?php include __DIR__ . '/../header.html'; ?>
<h2><?= $article->getName() ?></h2>
<p><?= $article->getText() ?></p>
<hr>
<a class="view-comment" href="/321/OOP/www/article/<?= $article->getId() ?>/comments">Страница с комментариями</a>

<form method="POST" action="/321/OOP/www/article/<?= $article->getId() ?>/comments/add">
    <label for="comment">Комментарий</label>
    <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
    <button type="submit">Отправить</button>
</form>
<?php include __DIR__ . '/../footer.html'; ?>