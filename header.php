<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
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
    <link rel="stylesheet" href="https://cdn.staticfile.org/github-markdown-css/5.1.0/github-markdown-light.min.css">
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