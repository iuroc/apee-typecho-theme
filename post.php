<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="container py-3 py-sm-4">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="post-list">
                <article class="mb-3 mb-sm-4">
                    <a class="mb-3 h4 text-center text-md-start fw-bold text-info-emphasis d-block" href="<?php $this->permalink() ?>" itemprop="name headline url"><?php $this->title() ?></a>
                    <div class="pb-3 border-bottom border-1 post-meta text-center text-md-start">
                        <a href="<?php $this->author->permalink(); ?>" itemprop="author name" itemscope itemtype="http://schema.org/Person"><?php $this->author(); ?></a>
                        <time class="ms-3" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                        <span class="ms-3">分类：<?php $this->category(','); ?></span>
                        <a href="<?php $this->permalink() ?>#comments" class="ms-3 d-none d-sm-inline" itemprop="interactionCount discussionUrl">
                            <?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?>
                        </a>
                    </div>
                    <div class="content markdown-body pt-3 mb-3" itemprop="articleBody">
                        <?php $this->content(); ?>
                    </div>
                    <div class="keywords">
                        <?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?>
                    </div>
                </article>
                <script>
                    var cid = location.href.match(/\/archives\/(\d+)\//)[1]
                    document.write('<a href="https://apee.top/admin/write-post.php?cid=' + cid + '">编辑文章</a>')
                </script>
                <hr>
                <?php $this->need('comments.php'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="border rounded shadow-sm p-3">
                            上一篇：<?php $this->thePrev('%s', '没有了'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded shadow-sm p-3">
                            下一篇：<?php $this->theNext('%s', '没有了'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>
