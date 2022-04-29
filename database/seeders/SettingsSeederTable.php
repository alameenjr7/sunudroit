<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            'title' => 'Le droit à votre portée.',
            'meta_description' => 'SunuDroit.tech',
            'meta_keywords' => 'Les résultats affichés ne sont qu\'indicatifs et peuvent dans le cas où ils seraient soumis à l’administration ou à un juge, être déclarés comme mal ou non fondés fondés sans que cela ne puisse en quoi que ce soit engager la responsabilité  de Sunudroit.Tech',
            'logo' => 'frontend/assets/Sunudroit-logo/background/taille/230X60_1.png',
            'logo2' => 'frontend/assets/Sunudroit-logo/background/taille/230X60_2.png',
            'favicon' => 'frontend/assets/Sunudroit-logo/background/Favicon/6.ico',
            'favicon2' => 'frontend/assets/Sunudroit-logo/background/Favicon/5.ico',
            'email_1' => 'sunudroit@sunudroit.tech',
            'email_2' => '',
            'telephone1' => '221 78 107 73 73',
            'telephone2' => '',
            'fax' => '221-0456-8756-0456',
            'adresse' => '113',
            'lot' => ' Rond-point',
            'appartement' => ' Cité Keur Gorgui',
            'footer' => '',
            'text_abonnement' => 'Quis autem vel eum iure reprehenderit aui ea voluptate.',
            'image_footer' => 'frontend/assets/img/just.jpg',
            'background_footer' => 'frontend/assets/img/jst&bal.jpg',
            'background_header' => 'frontend/assets/img/bal.jpg',
            'facebook_url' => '',
            'info_pratique' => 'Consciente de la complexité du droit et de la difficultés à accéder à certains professionnels du droit, Sunudroit.Tech s’est donnée pour mission de faciliter l’accès au droit par la fourniture d’outils et d’informations juridiques simples et accessibles à tous.',
            'linkedin_url' => '',
            'instagram_url' => '',
            'about' => 'Sunudroit.Tech est une legaltech fondée par des professionnels droit en collaboration avec des informaticiens.',
            'map_url' => '',
        ]);

        DB::table('banners')->insert([
            [
                'photo' => 'frontend/assets/img/droit1.jpeg',
                'title' => 'Droit du travail',
                'subtitle' => 'Les travailleurs',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/img/droit2.jpeg',
                'title' => 'Droit du travail',
                'subtitle' => 'Les travailleurs',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/img/droit3.jpg',
                'title' => 'Droit du travail',
                'subtitle' => 'Les travailleurs',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // [
            //     'photo' => 'frontend/assets/img/droit2.jpeg',
            //     'title' => 'Droit de la femme',
            //     'subtitle' => 'Femme',
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ]
        ]);

        // DB::table('categories')->insert([
        //     [
        //         'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
        //         'title' => 'Droit de la famille',
        //         'is_parent' => 1,
        //         'slug'=>'droit-de-la-famille',
        //         'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
        //         'status' => 'active',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
        //         'title' => 'Droit des affaires',
        //         'is_parent' => 1,
        //         'slug'=>'droit-des-affaires',
        //         'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
        //         'status' => 'active',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
        //         'title' => 'Droit de la famille',
        //         'slug'=>'droit-d-la-famille',
        //         'is_parent' => 1,
        //         'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
        //         'status' => 'active',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
        //         'title' => 'Droit des affaires',
        //         'is_parent' => 1,
        //         'slug'=>'droit-des-affaire',
        //         'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
        //         'status' => 'active',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]
        // ]);

        // DB::table('publications')->insert([
        //     [
        //         'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
        //         'title' => 'Droit de la famille',
        //         'subtitle' => 'Famille',
        //         'slug'=>'droit-de-la-famille',
        //         'contenu' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
        //         'status' => 'active',
        //         'cat_id' => 1,
        //         'conditions' => 'publier',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
        //         'title' => 'Droit des affaires',
        //         'slug'=>'droit-des-affaires',
        //         'subtitle' => 'Affaires',
        //         'contenu' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
        //         'status' => 'active',
        //         'cat_id' => 2,
        //         'conditions' => 'publier',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]
        // ]);

        DB::table('info_pratiques')->insert([
            [
                'title' => 'Annulation d’Acte d’état Civil',
                'description' => 'Pièces à fournir<br>1- Demande motivée adressée à Madame / Monsieur le Président du Tribunal de<br>Grande Instance<br>2- Acte d’état civil à annuler<br>3- Acte d’état civil',
                'status' => 'active',
                'slug'=>'annulation-d-acte-d-état-civil',
                'icons' => 'flaticon-car-1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Divorce Amiable',
                'description' => 'Pièces à fournir<br>1- Demande indiquant les modalités du divorce adressée à Madame / Monsieur le<br>Président du Tribunal d’Instance signée par les deux époux<br>2- Certificat de mariage<br>3- Extrait de naissance des enfants',
                'status' => 'active',
                'slug'=>'divorce-amiable',
                'icons' => 'flaticon-briefcase',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Divorce Contentieux',
                'description' => 'Pièces à fournir<br>1- Demande motivée adressée à Madame / Monsieur le Président du Tribunal<br>d’Instance<br>2- Certificat de mariage<br>3- Extrait de naissance des enfants',
                'status' => 'active',
                'slug'=>'divorce-contentieux',
                'icons' => 'flaticon-handcuffs-1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Homologation de Partage',
                'description' => 'Pièces à fournir
                <br>1- Demande motivée adressée à Madame / Monsieur le Président du Tribunal
                d’Instance
                <br>2- Jugement d’hérédité en expédition
                <br>3- Certificat de non opposition ni appel
                <br>4- Procès-verbal de partage ou protocole en original signé par tous les héritiers
                <br>5- Ordonnance d’autorisation de consentir pour un mineur à un partage',
                'status' => 'active',
                'slug'=> 'homologation-de-partage',
                'icons' => 'flaticon-save-money',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Administration Légale',
                'description' => 'Pièces à fournir<br>1- Demande motivée adressée à Madame / Monsieur le Président du Tribunal<br>d’Instance<br>2- Jugement d’hérédité ou jugement de divorce en expédition<br>3- Extrait de naissance de l’enfant âgé de moins de dix-huit (18) ans<br>4- Photocopie légalisée de la carte nationale d’identité du demandeur',
                'status' => 'active',
                'slug'=>'administration-legale',
                'icons' => 'flaticon-injury',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Rectificatif d’acte d’état civil',
                'description' => 'Pièces à fournir<br>1- Demande adressée à Madame / Monsieur le Président du Tribunal d’Instance<br>2- Copie littérale de l’acte comportant l’erreur<br>3- Copie littérale de l’acte comportant les bonnes informations',
                'status' => 'active',
                'slug'=>'rectificatif-d-acte-d-etat-civil',
                'icons' => 'flaticon-law',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Jugement d’Hérédité',
                'description' => 'Pièces à fournir<br>1- Demande adressée à Madame / Monsieur le Président du Tribunal d’Instance listant<br>les héritiers<br>2- Bulletin de décès en original<br>3- Certificat de mariage en original<br>4- Extrait de naissance de tous les enfants<br>5- Photocopie légalisée de la carte nationale d’identité de deux témoins.',
                'status' => 'active',
                'slug'=>'jugement-d-hérédité',
                'icons' => 'flaticon-balance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Délégation de Puissance Paternelle',
                'description' => 'Pièces à fournir<br>1- Demande adressée à Madame / Monsieur le Président du Tribunal d’Instance<br>2- Photocopie légalisée de la carte nationale d’identité du père et de la mère des<br>enfants<br>3- Photocopie légalisée de la carte nationale d’identité du demandeur<br>4- Certificat de mariage en original<br>5- Accord écrit des parents<br>6- Extrait de naissance de l’enfant âgé de moins de dix-huit (18) ans',
                'status' => 'active',
                'icons' => 'flaticon-notebook',
                'slug'=>'délégation-de-puissance-paternelle',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Régularisation de Mariage',
                'description' => '<p>Pièces à fournir<br>1- Demande adressée à Madame / Monsieur le Président du Tribunal d’Instance<br>2- Attestation de mariage délivrée par la mosquée ou l’autorité ayant célébré le<br>mariage coutumier<br>3- Photocopie légalisée de la carte nationale d’identité des époux<br>4- Photocopie légalisée de la carte nationale d’identité de deux témoins<br>5- Certificat de non inscription délivrée par la mairie du lieu où le mariage devrait être<br>déclaré<br></p>',
                'status' => 'active',
                'icons' => 'flaticon-auction',
                'slug'=>'régularisation-de-mariage',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Déclaration Tardive de Naissance',
                'description' => '<p>Pièces à fournir<br>1- Demande adressée à Madame / Monsieur le Président du Tribunal d’Instance<br>2- Certificat d’accouchement<br>3- Photocopie légalisée de la carte nationale d’identité des époux<br>4- Certificat de non inscription délivrée par la mairie du lieu où la naissance devait être<br>déclarée<br></p>',
                'status' => 'active',
                'icons' => 'flaticon-notebook',
                'slug'=>'déclaration-tardive-de-naissance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Certificat de Nationalité Sénégalaise',
                'description' => '<p>Pièces à fournir<br>1- Demande adressée à Madame / Monsieur le Président du Tribunal d’Instance<br>2- Extrait de naissance du demandeur en original<br>3- Extrait de naissance ou photocopie légalisée de la carte nationale d’identité de l’un<br>des parents<br>4- Certificat de résidence du demandeur<br>5- Timbre fiscal de 2.000f CFA<br></p>',
                'status' => 'active',
                'icons' => 'flaticon-notebook',
                'slug'=>'certificat-de-nationalité-sénégalaise',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Garde d’Enfant',
                'description' => '<p>Pièces à fournir<br>1- Demande motivée adressée à Madame / Monsieur le Président du Tribunal<br>d’Instance<br>2- Extrait de naissance de l’enfant âgé de moins de dix-huit (18) ans<br>3- Photocopie légalisée de la carte nationale d’identité du demandeur<br></p>',
                'status' => 'active',
                'icons' => 'flaticon-auction',
                'slug'=>'garde-d-enfant',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Contribution aux Charges du Ménage',
                'description' => '<p>Pièces à fournir<br>1- Demande motivée adressée à Madame / Monsieur le Président du Tribunal<br>d’Instance<br>2- Photocopie légalisée de la carte nationale d’identité du demandeur<br>3- Certificat de mariage en original<br></p>',
                'status' => 'active',
                'icons' => 'flaticon-marketing',
                'slug'=>'contribution-aux-charges-du-ménage',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('document_pdfs')->insert([
            [
                'title' => 'Contrat de location',
                'contenu' => '<p>ENTRE :
                La SARL Sunudroit.Tech agissant par son Gérant, en ses bureaux sis à 12 Boulevard Djily Mbaye, Immeuble Azur 15, 2 ème étage à Dakar ; (ci-après appelé(e) « le Client »)
                ET :
                Monsieur Baba NGOM, Informaticien demeurant à Ouest Foire, téléphone 772050626;</p>',
                'status' => 'activer',
                'prix'=>null,
                'conditions'=>'gratuit',
                'slug'=>'contrat-de-location',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'CONTRAT DE CONCEPTION DE SITE WEB',
                'contenu' => '<p>ENTRE :
                La SARL Sunudroit.Tech agissant par son Gérant, en ses bureaux sis à 12 Boulevard Djily Mbaye, Immeuble Azur 15, 2 ème étage à Dakar ; (ci-après appelé(e) « le Client »)
                ET :
                Monsieur Baba NGOM, Informaticien demeurant à Ouest Foire, téléphone 772050626;</p>',
                'status' => 'activer',
                'slug'=>'contrat-de-conception-de-site-web',
                'prix'=> 1000,
                'conditions'=>'payant',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
