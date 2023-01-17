<?php

/**
 * 鹏优创 Typecho 主题
 * 
 * @package Typecho Apee Theme
 * @author 欧阳鹏
 * @version 1.0
 * @link http://apee.top
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="container py-3 py-lg-4">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="post-list">
                <div class="alert alert-secondary mb-3 mb-sm-4 border-3" role="alert">
                    <?php $this->options->description() ?>
                </div>
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
                <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>