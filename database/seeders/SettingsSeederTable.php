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
            'logo' => 'frontend/assets/images/sunudroit-logo/png/Logo_180X55.png',
            'logo2' => 'frontend/assets/images/sunudroit-logo/png/Logo_240X60.png',
            'favicon' => 'frontend/assets/images/sunudroit-logo/Couleur/Logo_Couleur-180X55.png',
            'favicon2' => 'frontend/assets/images/sunudroit-logo/Couleur/Logo_Couleur-230X60.png',
            'email_1' => 'management@sunudroit.tech',
            'email_2' => 'info@sunudroit.com',
            'telephone1' => '221 77 655 14 84',
            'telephone2' => '221 33 848 79 88',
            'fax' => '221-0456-8756-0456',
            'adresse' => 'Cité Keur Gougui,',
            'lot' => ' Lot N°R85,',
            'appartement' => ' Imm. Neptune Optique',
            'footer' => 'Quis autem vel eum iure reprehenderit aui ea voluptate velit esse molestiae consequatur, vel illum qui dolorem.',
            'text_abonnement' => 'Quis autem vel eum iure reprehenderit aui ea voluptate.',
            'image_footer' => 'frontend/assets/images/resource/hammer.png',
            'background_footer' => 'frontend/assets/images/resource/cta.jpg',
            'background_header' => 'frontend/assets/images/background/1.jpg',
            'facebook_url' => '',
            'twitter_url' => '',
            'linkedin_url' => '',
            'instagram_url' => '',
            'youtube_url' => '',
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.028235227538!2d-17.469440185846533!3d14.710995378307327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec173b4b3874b63%3A0xbf6bd7d773ce2ddd!2sLPS%20L%40W%2C%20SCP%20d&#39;Avocats!5e0!3m2!1sen!2sus!4v1643800014744!5m2!1sen!2sus',
        ]);

        DB::table('banners')->insert([
            [
                'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
                'title' => 'Droit de la famille',
                'subtitle' => 'Famille',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
                'title' => 'Droit des affaires',
                'subtitle' => 'Affaires',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('categories')->insert([
            [
                'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
                'title' => 'Droit de la famille',
                'is_parent' => 1,
                'slug'=>'droit-de-la-famille',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
                'title' => 'Droit des affaires',
                'is_parent' => 1,
                'slug'=>'droit-des-affaires',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
                'title' => 'Droit de la famille',
                'slug'=>'droit-d-la-famille',
                'is_parent' => 1,
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
                'title' => 'Droit des affaires',
                'is_parent' => 1,
                'slug'=>'droit-des-affaire',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('publications')->insert([
            [
                'photo' => 'frontend/assets/images/main-slider/banner-7.jpg',
                'title' => 'Droit de la famille',
                'subtitle' => 'Famille',
                'slug'=>'droit-de-la-famille',
                'contenu' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'cat_id' => 1,
                'conditions' => 'publier',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => 'frontend/assets/images/main-slider/banner-9.jpg',
                'title' => 'Droit des affaires',
                'slug'=>'droit-des-affaires',
                'subtitle' => 'Affaires',
                'contenu' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'cat_id' => 2,
                'conditions' => 'publier',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('info_pratiques')->insert([
            [
                'title' => 'Car Accident',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=>'car-accident',
                'icons' => 'flaticon-car-1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Business Law',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=>'business-law',
                'icons' => 'flaticon-briefcase',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Criminal Law',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=>'criminal-law',
                'icons' => 'flaticon-handcuffs-1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Child Support',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=> 'child-support',
                'icons' => 'flaticon-save-money',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Personal Injury',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=>'personal-injury',
                'icons' => 'flaticon-injury',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Education LAw',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=>'education-law',
                'icons' => 'flaticon-law',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Divorce Law',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'slug'=>'divorce-law',
                'icons' => 'flaticon-balance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'TAX LAW',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.',
                'status' => 'active',
                'icons' => 'flaticon-notebook',
                'slug'=>'tax-law',
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
