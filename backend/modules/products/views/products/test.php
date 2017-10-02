<?php
use backend\assets\BootAsset;

BootAsset::register($this); ?>

 <script type="text/javascript">
  tinymce.init({
    selector: '#mytextarea',
    toolbar: 'image',
    plugins: 'image imagetools',
    images_upload_url: '/lifestyle/backend/web/products/products/uploadblogimg'
  });
  </script>

<h1>TinyMCE Quick Start Guide</h1>
  <form method="post">
    <textarea id="mytextarea">Hello, World!</textarea>
 </form>
