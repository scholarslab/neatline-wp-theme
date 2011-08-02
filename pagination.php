<?php if (is_paged()): ?>
<nav id="pagination">
    <ul>
        <li id="older"><?php next_posts_link(__('&laquo;Older Entries')); ?></li>
        <li id="newer"><?php previous_posts_link(__('Newer Entries&raquo;')); ?></li>
    </ul>
</nav>
<?php endif; ?>