<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="container py-3 py-lg-4">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="post-list">
                <h3 class="mb-3 mb-sm-4">404 - 页面没找到</h3>
                <div class="msg mb-3">你想查看的页面已被转移或删除了，要不要搜索看看：</div>
                <form method="post" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" name="s" class="text form-control" autofocus>
                        <button type="submit" class="btn btn-success">搜索</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>