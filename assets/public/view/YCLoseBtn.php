<?php


if ($yoo_remove_close_btn)
{
    $hidecls_btn = '';
}
else
{
    $hidecls_btn = '<span class="ybr-ybar-toggle-button ybr-ybar-hide ybr-ybar-text-color ybr-ybar-hide-admin-custom alert-box">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="30px" height="30px" x="0" y="0" viewBox="0 0 386.667 386.667" xml:space="preserve" class="ybr-ybar-close-icon" style="background:' . $yoo_close_back . '"><g><path xmlns="http://www.w3.org/2000/svg" d="m386.667 45.564-45.564-45.564-147.77 147.769-147.769-147.769-45.564 45.564 147.769 147.769-147.769 147.77 45.564 45.564 147.769-147.769 147.769 147.769 45.564-45.564-147.768-147.77z" fill="#ffffff" data-original="#000000" style="" class=""/></g></svg>
</span>';
}
