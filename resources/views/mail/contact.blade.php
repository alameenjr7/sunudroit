<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Nouveau Message</title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <section class="mail-seccess section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <!-- Error Inner -->
                        <div class="success-inner">
                            <h3><i class="fa fa-envelope"></i><span>Nouveau message mail</span></h3>
                            <p>Bonjour, mon nom est {{$details['full_name']}}.</p><br>
                            <p>Adresse e-mail:  {{$details['email']}}</p><br>
                            <p>Numero de Telephone:  {{$details['telephone']==null ? $details['sujet'] : $details['telephone']}}</p><br>
                            <p>Message: {{$details['message']}}</p>

                            <br>
                            <br>
                            <p>Sincères salutations</p>
                            <a href="http://sunudroit.tech" class="btn btn-primary btn-lg">Aller sur notre site Internet</a>
                        </div>
                        <!--/ End Error Inner -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>