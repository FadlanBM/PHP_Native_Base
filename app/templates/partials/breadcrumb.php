<div class="page-breadcrumb">
    <div class="row">
        <div class="col-md-5 align-self-center">
            <h3 class="page-title"><?php echo isset($page_title) ? $page_title : 'Page Title'; ?></h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php if (isset($breadcrumbs) && is_array($breadcrumbs)): ?>
                            <?php foreach ($breadcrumbs as $crumb): ?>
                                <?php if (isset($crumb['active']) && $crumb['active']): ?>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $crumb['label']; ?></li>
                                <?php else: ?>
                                    <li class="breadcrumb-item"><a href="<?php echo isset($crumb['url']) ? $crumb['url'] : '#'; ?>"><?php echo $crumb['label']; ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo isset($page_title) ? $page_title : 'Page Title'; ?></li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-7 d-flex justify-content-end align-self-center d-none d-md-flex">
            <?php if (isset($breadcrumb_actions)): ?>
                <?php echo $breadcrumb_actions; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
