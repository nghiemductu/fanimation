<?php
    function renderPagination($current_page, $total_pages, $url_pattern) {
        ob_start();
    ?>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?php echo sprintf($url_pattern, $current_page - 1); ?>" tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php echo ($current_page == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="<?php echo sprintf($url_pattern, $i); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?php echo sprintf($url_pattern, $current_page + 1); ?>">Next</a>
            </li>
        </ul>
    </nav>
    <?php
        return ob_get_clean();
    }
?>