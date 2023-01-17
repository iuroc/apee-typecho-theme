<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)) : ?>
    <div class="card mb-3 mb-sm-4">
        <div class="card-header">最新文章</div>
        <div class="card-body">
            <?php \Widget\Contents\Post\Recent::alloc()
                ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)) : ?>
    <div class="card mb-3 mb-sm-4">
        <div class="card-header">最近回复</div>
        <div class="card-body">
            <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
            <?php while ($comments->next()) : ?>
                <li>
                    <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>：<?php $comments->excerpt(35, '...'); ?>
                </li>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)) : ?>
    <div class="card mb-3 mb-sm-4">
        <div class="card-header">分类</div>
        <div class="card-body">
            <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)) : ?>
    <div class="card mb-3 mb-sm-4">
        <div class="card-header">归档</div>
        <div class="card-body">
            <?php \Widget\Contents\Post\Date::alloc('type=month&format=F Y')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)) : ?>
    <div class="card mb-3 mb-sm-4">
        <div class="card-header">其他</div>
        <div class="card-body">
            <?php if ($this->user->hasLogin()) : ?>
                <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?>
                        (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else : ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a>
                </li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </div>
    </div>
<?php endif; ?>