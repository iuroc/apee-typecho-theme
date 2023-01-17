<?php

/**
 * 鹏优创 Typecho 主题
 * 
 * @package Typecho Apee Theme
 * @author 欧阳鹏
 * @version 1.0
 * @link http://apee.top
 */
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title><?php $this->archiveTitle([
                'category' => _t('分类 %s 下的文章'),
                'search'   => _t('包含关键字 %s 的文章'),
                'tag'      => _t('标签 %s 下的文章'),
                'author'   => _t('%s 发布的文章')
            ], '', ' - ');
            $this->options->title(); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/github-markdown-css/5.1.0/github-markdown.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <script>
        window.onload = function() {
            document.body.ondragstart = () => {
                return false
            }
        }
    </script>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-body-tertiary shadow-sm sticky-top border-bottom">
        <div class="container">
            <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link<?php if ($this->is('index')) : ?> active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>">首页</a>
                    </li>
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <li class="nav-item">
                            <a class="nav-link<?php if ($this->is('page', $pages->slug)) : ?> active<?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <form class="d-flex" role="search" action="<?php $this->options->siteUrl(); ?>">
                    <input class="form-control me-2" name="s" type="search" placeholder="请输入搜索关键词">
                    <button class="btn btn-outline-success text-nowrap" type="submit">搜索</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container py-3 py-lg-4">
        <div class="alert alert-secondary mb-3 mb-sm-4 border-3" role="alert">
            <?php $this->options->description() ?>
        </div>
        <div class="row">
            <div class="col-xxl-9">
                <div class="post-list">
                    <?php while ($this->next()) : ?>
                        <article class="card card-body h-100 border-3 list-item-post mb-3 mb-sm-4 shadow-sm">
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
                </div>
            </div>
            <div class="col-xxl-3">
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
                                    <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?>
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
            </div>
        </div>
    </div>
    <footer class="text-center pb-5">
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        由 <a href="http://www.typecho.org">Typecho</a> 强力驱动.
    </footer>
</body>

</html>