<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<body>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/profileStyle.css">

    <div class="profile-container">
        <div class="profile">
            <img class="profile-image" src="">
            <div class="profile-details">
                <div class="profile-name"><?= $data['user']['nama']; ?></div>
                <div class="profile-info">Status : <?= $data['user']['status']; ?> </div>
                <div class="profile-info"> ID : <?= $data['user']['id_anggota']; ?> </div>
                <div class="profile-info">No Telepon : <?= $data['user']['no_telp']; ?> </div>
            </div>
        </div>
    </div>


    <div class="content">