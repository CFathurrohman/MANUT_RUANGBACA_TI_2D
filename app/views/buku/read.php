<div class="container mt-5">
    <div class="card mb-3"
    ">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="../../../public/img/poltekkk-removebg-preview.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title"><?= $data['buku']['nama_buku']; ?></h2>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><small class="text-muted">Kategori
                        : <?= $data['buku']['nama_kategori']; ?></small></li>
                <li class="list-group-item"><small class="text-muted">Penulis
                        : <?= $data['buku']['penulis']; ?></small></li>
                <li class="list-group-item"><small class="text-muted">Tahun Terbit
                        : <?= $data['buku']['tahun_terbit']; ?></small></li>
                <li class="list-group-item"><small
                            class="text-muted">Deskripsi<br><?= $data['buku']['deskripsi']; ?></small></li>
            </ul>
            <div class="card-body text-end">
                <a href="#" class="btn btn-warning col-1"">Edit</a>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-5 g-4" ">
<div class="col">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                additional content. This content is a little bit longer.</p>
        </div>
    </div>
</div>
<div class="col">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                additional content. This content is a little bit longer.</p>
        </div>
    </div>
</div>

<div class="col">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                additional content.</p>
        </div>
    </div>
</div>
<div class="col">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                additional content. This content is a little bit longer.</p>
        </div>
    </div>
</div>
</div>
</div>


