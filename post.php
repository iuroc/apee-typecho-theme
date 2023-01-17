<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="container py-3 py-lg-4">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="post-list">
                <article class="mb-3 mb-sm-4">
                    <a class="mb-3 h4 text-center text-md-start fw-bold text-info-emphasis d-block" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                    <div class="pb-3 border-bottom border-1 post-meta text-center text-md-start">
                        <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                        <span class="ms-3"><?php $this->date(); ?></span>
                        <span class="ms-3">分类：<?php $this->category(','); ?></span>
                        <a href="<?php $this->permalink() ?>#comments" class="ms-3 d-none d-sm-inline">
                            <?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?>
                        </a>
                    </div>
                    <div class="content markdown-body pt-3" itemprop="articleBody">
                        <?php $this->content(); ?>
                    </div>
                </article>
                <hr>
                <!-- <?php $this->need('comments.php'); ?> -->
                <div class="comment mb-3 mb-sm-4">
                    <?php $this->comments()->to($comments); ?>
                    <?php if ($comments->have()) : ?>
                        <h4 class="fw-bold text-info-emphasis mb-3"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
                        <div class="mb-4">
                            <?php $comments->listComments(); ?>
                        </div>
                        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

                    <?php endif; ?>

                    <?php if ($this->allow('comment')) : ?>
                        <div id="<?php $this->respondId(); ?>" class="respond">
                            <div class="cancel-comment-reply">
                                <?php $comments->cancelReply(); ?>
                            </div>
                            <h4 id="response" class="my-3"><?php _e('添加新评论'); ?></h4>
                            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                                <?php if ($this->user->hasLogin()) : ?>
                                    <p><?php _e('登录身份：'); ?><a class="me-3" href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a><a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                                    </p>
                                <?php else : ?>
                                    <div class="mb-3">
                                        <label for="author" class="required form-label"><?php _e('称呼'); ?></label>
                                        <input type="text" name="author" id="author" class="text form-control" value="<?php $this->remember('author'); ?>" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mail" class="<?php if ($this->options->commentsRequireMail) : ?>required <?php endif; ?>form-label"><?php _e('Email'); ?></label>
                                        <input type="email" name="mail" id="mail" class="text form-control" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                                    </div>
                                    <div class="mb-3">
                                        <label for="url" class="<?php if ($this->options->commentsRequireURL) : ?>required <?php endif; ?>form-label"><?php _e('网站'); ?></label>
                                        <input type="url" name="url" id="url" class="text form-control" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="textarea" class="required form-label">内容</label>
                                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea form-control" required><?php $this->remember('text'); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">提交评论</button>
                            </form>
                        </div>
                    <?php else : ?>
                        <h3>评论已关闭</h3>
                    <?php endif; ?>

                </div>
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