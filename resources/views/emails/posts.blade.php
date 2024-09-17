<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <?php if($postMail['status'] == 'auth') { ?>
        <p><strong>Name:</strong> {{ $postMail['body']->name }}</p>
        <p><strong>Email:</strong> {{ $postMail['body']->email }}</p>
        <p><strong>Nip:</strong> {{ $postMail['body']->nip }}</p>
    <?php } else if ($postMail['status'] == 'verifikasi') { ?>
        <p> Akun anda sudah di verifikasi oleh admin KBS KMS</p>
   <?php } else if ($postMail['status'] == 'konten') { ?>
        <p> Konten pengetahuan baru sudah di buat oleh user atau admin</p>
   <?php } else if ($postMail['status'] == 'published') { ?> 
        <p> Konten Anda sudah di publish oleh Admin</p>
    <?php} else if ($postMail['status'] == 'revisi') { ?>
        <p> Konten Anda di revisi oleh Admin</p>
    <?php } else if ($postMail['status'] == 'verifikasi_verifikator') { ?>
        <p> Check Konten Pengetahuan yang sudah di verifikasi oleh Knowledge Verifikator </p>
    <?php }?>
    
</body>
</html>