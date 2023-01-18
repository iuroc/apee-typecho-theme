<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="container py-3 py-sm-4">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="post-list">
                <h3 class="archive-title mb-3 mb-sm-4"><?php $this->archiveTitle([
                                                            'category' => _t('分类 <b>%s</b> 下的文章'),
                                                            'search'   => _t('包含关键字 <b>%s</b> 的文章'),
                                                            'tag'      => _t('标签 <b>%s</b> 下的文章'),
                                                            'author'   => _t('<b>%s</b> 发布的文章')
                                                        ], '', ''); ?></h3>
                <?php if ($this->have()) : ?>
                    <?php while ($this->next()) : ?>
                        <article class="card card-body border-3 list-item-post mb-3 mb-sm-4 shadow-sm">
                            <a class="mb-3 h4 text-center text-md-start fw-bold text-info-emphasis" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                            <div class="pb-3 border-bottom border-1 post-meta text-center text-md-start">
                                <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                                <span class="ms-3"><?php $this->date(); ?></span>
                                <span class="ms-3">分类：<?php $this->category(','); ?></span>
                                <a href="<?php $this->permalink() ?>#comments" class="ms-3 d-none d-sm-inline">
                                    <?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?>
                                </a>
                            </div>
                            <div class="content markdown-body pt-3" itemprop="articleBody">
                                <?php $this->content('阅读全文'); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <article class="post">
                        <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
                    </article>
                <?php endif; ?>
                <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>