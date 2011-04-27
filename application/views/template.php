
<h1>Header</h1>
<hr/>
<?php if (!empty($content)): ?>
<?php $this->load->view($content); ?>
<?php else: ?>
        Halaman tidak ada
<?php endif; ?>
<hr/>
<h2>Footer</h2>