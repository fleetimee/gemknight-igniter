<?= $this->extend("master") ?>

<?= $this->section("header") ?>
Ini header halaman publik
<?= $this->endSection() ?>


<?= $this->section("content") ?>
Ini content halaman publik
<ul>
    <li>Menu1</li>
    <li>Menu2</li>
    <li>Menu3</li>
</ul>
<?= $this->endSection() ?>

<?= $this->section("footer") ?>
Ini footer halaman publik
<?= $this->endSection() ?>
