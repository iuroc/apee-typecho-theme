<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="container py-3 py-lg-4">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="post-list">
                <?php while ($this->next()) : ?>
                    <article class="mb-3 mb-sm-4">
                        <a class="mb-3 h4 text-center text-md-start fw-bold text-info-emphasis" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                        <div class="content markdown-body pt-3" itemprop="articleBody">
                            <?php $this->content('阅读全文'); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>