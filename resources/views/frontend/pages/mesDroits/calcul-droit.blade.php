@extends('frontend.layouts.master')

@section('title')
    <title>Connaitre son droit ou calculer son droit - SunuDroit</title>
@endsection

@section('content')

<section class="contact-form-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2> CALCULER MES DROITS </h2>
            <div class="text">Besoin d'assistance ?<strong> Contactez-nous au (+221) 78 107 53 53</strong>.</div>
        </div>
        <div class="row">
                <div class="col-md-12 m-auto">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                            <h4 class="alert-heading">Resultat !</h4>
                            <div>
                                <p>{!! nl2br(session('message'),true) !!}</p>
                            </div>
                            <hr>
                            <p class="mb-0">
                                <strong>Note:</strong> {{get_setting('meta_keywords')}}<br>
                                <strong class="font-italic">{{get_setting('title')}} </strong>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        <!-- Contact Form -->
        <div class="contact-form">

            @include('components.errors')
            <!--Contact Form-->
            <form action="{{route('calcul.submit')}}" method="POST">
                @csrf
                <div class="row clearfix">

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="full_name">Votre prénom</label>
                        <input class="form-control" type="text" id="full_name" name="full_name" placeholder="Ex: John" required>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="email">Votre nom</label>
                        <input class="form-control" type="text" name="last_name" id="last_name"  placeholder="Ex: Doe">
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group">
                        <label for="typesDroit">Choisir le type de calcul</label>
                        <select required id="types-droit" name="types-droit"  class="form-control" style="position: relative;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                            <option value="" selected>-- Choisir --</option>
                            <option value="C_M_I_C_P" >Calculer Mon Indemnité Compensatrice de Préavis</option>
                            <option value="C_M_I_L" >Calculer Mon Indemnité de Licenciement</option>
                            <option value="C_M_I_D_R" >Calculer Mon Indemnité Départ à la Retraite</option>
                            <option value="C_M_I_D" >Calculer Mon Indemnité de Décès</option>
                            <option value="C_M_I_M_T" >Calculer Mon Indemnité de Maladie du Travail</option>
                            <option value="C_M_A_C" >Calculer Mon Allocation de Congé</option>
                            <option value="C_M_I_L_M_E" >Calculer Mon Indemnités de Licenciement pour Motif Économique</option>
                            <option value="C_M_P_E" >Calculer La Période d’Essai</option>
                            <option value="C_M_D_I_T_R_P_E" >Calculer Le Délai d’Information du Travailleur pour le Renouvellement de la Période d’Essai</option>
                            <option value="C_M_N_J_A_E_F" >Calculer Mon Nombre de Jours d’Absence pour les Événements Familiaux</option>
                            <option value="C_L_D_M_I_E_R_C_S" >Calculer Ma Durée Maximale de l’Intérim dans un Emploi Relevant d’une Catégorie Supérieure</option>
                            <option value="C_M_I_I" >Calculer Mon Indemnité d’Intérim</option>
                            <option value="C_M_H_S" >Calculer La Majoration des Heures Supplémentaires</option>
                            <option value="C_M_P_P" >Calculer Ma Prime de Panier</option>
                            <option value="C_M_I_F_C_D_D" >Calculer Mon Indemnité de Fin de Contrat à Durée Déterminée</option>
                            <option value="R_P_T">Calculer Mon Rappel de la Prime de Transport</option>
                            <option value="R_S">Calculer Mon Rappel de Salaire</option>
                            <option value="P_A">Calculer Ma Prime d’Ancienneté</option>
                            <option value="C_D_P_S_C_T_M">Calculer la durée de la période de suspensions de mon contrat de travail pour maladie</option>
                            <option value="C_I_D_H_LHT">Calculer mon indemnité de déplacement hors de mon lieu habituel de travail</option>
                            <option value="C_NJC">Calculer mon nombre de jours de congés</option>
                            <option value="C_DELFE">Calculer le Délai pour évacuer le logement fourni par l’employeur</option>
                            <option value="C_DMP">Calculer la durée de mon préavis</option>


                        </select>
                    </div>


                    <div class=" col-md-6 col-sm-12 form-group d-none" id="MDCMOT">
                        <label for="mdcmot" id="MDCMOT">Mon déplacement a pour cause une mission occasionnelle et temporaire</label>
                            <div>
                                <input  type="radio" id="mdcmot1" name="mdcmot"  value="OUI">
                                <label for="mdcmot1"> OUI</label>
                            </div>
                            <div>
                                <input  type="radio" id="mdcmot2" name="mdcmot"  value="NON">
                                <label for="mdcmot2"> NON </label>
                            </div>
                    </div>
                    <div class=" col-md-6 col-sm-12 form-group  d-none" id="LDDIES">
                        <label for="" id="LDDIES">La durée du déplacement est inférieure ou égale à six mois</label>
                        <div>
                            <input  type="radio" id="mdcmot1" name="lddies"  value="OUI">
                            <label for="mdcmot1"> OUI</label>
                        </div>
                        <div>
                            <input  type="radio" id="mdcmot2" name="lddies"  value="NON">
                            <label for="mdcmot2"> NON</label>
                        </div>
                    </div>
                    <div class=" col-md-6 col-sm-12 form-group  d-none" id="MDOFS">
                        <label for="" id="MDOFS">Mon déplacement occasionne des frais supplémentaires</label>
                        <div>
                            <input  type="radio" id="mdofs1" name="mdofs"  value="OUI">
                            <label for="mdofs1"> OUI</label>
                        </div>
                        <div>
                            <input  type="radio" id="mdofs2" name="mdofs"  value="NON">
                            <label for="mdofs2"> NON</label>
                        </div>
                    </div>
                    <div class=" col-md-6 col-sm-12 form-group  d-none" id="MEFNPDNLG">
                        <label for="" id="MEFNPDNLG">Mon employeur me fournit en nature les prestations décentes de nourriture, de
                            logement et de voyage</label>
                        <div>
                            <input  type="radio" id="mefnpdnlg1" name="mefnpdnlg"  value="OUI">
                            <label for="mefnpdnlg1"> OUI</label>
                        </div>
                        <div>
                            <input  type="radio" id="mefnpdnlg2" name="mefnpdnlg"  value="NON">
                            <label for="mefnpdnlg2"> NON</label>
                        </div>
                    </div>
                    <div class=" col-md-6 col-sm-12 form-group  d-none" id="MDOP">
                        <label for="" id="MDOP">Mon déplacement occasionne la prise (Chois unique)</label>
                        <div>
                            <input  type="radio" id="mdof1" name="mdof"  value="RP">
                            <label for="mdof1"> D’un repas principal</label>
                        </div>
                        <div>
                            <input  type="radio" id="mdof2" name="mdof"  value="DRP">
                            <label for="mdof2"> De deux repas principaux</label>
                        </div>
                        <div>
                            <input  type="radio" id="mdof3" name="mdof"  value="DRPC">
                            <label for="mdof3"> De deux repas principaux et le couchage</label>
                        </div>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="C_M_I_C_P_types">
                        <label for="types">Type de fonction</label>
                        <select name="types" class="custom-select-box form-control">
                            <option value="J_S_O_E" >Je suis ouvrier ou employé</option>
                            <option value="J_S_A_M_A" >Je suis agent de maitrise ou assimilé</option>
                            <option value="J_S_C_A" >Je suis cadre ou assimilé</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="PRESENCE">
                        <label for="presence">Choisir votre ancienneté</label>
                        <select name="presence" class="custom-select-box form-control">
                            <option value="M_1_A_P" >Moins d'un an de présence</option>
                            <option value="1_5_A_P" >1 a 5 ans de présence</option>
                            <option value="P_5_A_P" >Plus de 5 ans de présence</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="ESSAI">
                        <label for="essai">Choisir votre situation</label>
                        <select name="essai" class="custom-select-box form-control">
                            <option value="J_S_P_H_J" >Je suis payé à l’heure ou à la journée</option>
                            <option value="J_S_O_E_P_M" >Je suis ouvrier ou employé payé au mois</option>
                            <option value="J_S_A_M_T_A" >Je suis agent de maîtrise, technicien ou assimilé</option>
                            <option value="J_S_I_C_A" >Je suis ingénieure, cadre ou assimilé</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="ABSENCE">
                        <label for="absence">Choisir l'événement familial</label>
                        <select name="absence" class="custom-select-box form-control">
                            <option value="M_M" >Mon mariage</option>
                            <option value="M_E_F_S" >Mariage d’un de mes enfants, d’un frère ou d’une sœur</option>
                            <option value="D_C_D_L_D" >Décès de mon conjoint ou d’un descendant en ligne directe</option>
                            <option value="D_C_L_D_F_S" >Décès de mon ascendant en ligne directe de mon frère ou de ma sœur  </option>
                            <option value="D_BP_BM" >Décès de mon beau-père ou de ma belle-mère</option>
                            <option value="N_M_E" >Naissance de mon enfant</option>
                            <option value="B_M_E" >Baptême de mon enfant</option>
                            <option value="P_C_M_E" >Première communion de mon enfant</option>
                            <option value="H_M_C_E" >Hospitalisation de mon conjoint ou de mon enfant</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="SPECIALITE">
                        <label for="specialite">Choisir votre situation</label>
                        <select name="specialite" class="custom-select-box form-control">
                            <option value="J_S_O_S" >Je suis ouvrier spécialisé</option>
                            <option value="J_S_PEATA" >Je suis ouvrier professionnel, employé, agent de maitrise, technicien ou assimilé</option>
                            <option value="J_S_C_I_A" >Je suis cadre, ingénieur ou assimilé</option>
                        </select>
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group d-none" id="TITULAIRE">
                        <label for="titulaire">Choisir la cause de l'intérim</label>
                        <select name="titulaire" class="custom-select-box form-control">
                            <option value="L_T_P_M" >Le titulaire de poste est malade</option>
                            <option value="L_T_P_V_A" >Le titulaire de poste est victime d'accident</option>
                            <option value="L_T_P_C" >Le titulaire de poste est en conge</option>
                            <option value="AUTRES" >AUTRES</option>
                        </select>
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group d-none" id="LOGEMENT_F">
                        <label for="logement_f">Choisir le motif de l’évacuation du logement</label>
                        <select name="logement_f" class="custom-select-box form-control">
                            <option value="DLNPDR" >Démission ou licenciement avec notification d’un préavis dans les délais requis</option>
                            <option value="DSRP" >Démission sans respect d’un préavis</option>
                            <option value="LSRP" >Licenciement sans respect d’un préavis</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="montant">
                        <label for="salaire" id="LABELS">Votre salaire actuel</label>
                        <input  type="number" id="salaire" name="salaire"  placeholder="Ex: 300 000"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    {{-- cumule de vos salaires sur les 12mois --}}
                    <div class=" col-md-6 col-sm-12 form-group d-none" id="cumule_salaire">
                        <label for="cumuleS" id="CUMULESALAIRE">Cumule de vos salaires sur les 12 derniers mois</label>
                        <input  type="number" id="cumuleS" name="cumuleS"  placeholder="Ex: 20 000"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="dateD">
                        <label for="date_deb" id="DATEEMBAUCHE">Date début contrat</label>
                        <input class="form-control" type="date" id="date_deb" name="date_deb" placeholder="Ex: 01/01/2020" >
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="dateF">
                        <label for="date_fin" id="DATELICENCIEMENT">Date fin contrat</label>
                        <input class="form-control" type="date" name="date_fin" id="date_fin"  placeholder="Ex: 12/05/2022" >
                    </div>



                    <div class=" col-md-6 col-sm-12 form-group d-none" id="SALAIRE_CAT_TP">
                        <label for="salaire_cat_tp">Salaire catégoriciel du tutilaire de poste</label>
                        <input  type="number" id="salaire_cat_tp" name="salaire_cat_tp"  placeholder="Ex: 75 000"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="SALAIRE_CAT_IN">
                        <label for="salaire_cat_in">Salaire catégoriciel de l'intérimaire</label>
                        <input  type="number" id="salaire_cat_in" name="salaire_cat_in"  placeholder="Ex: 275 000"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group d-none" id="RENUMERATION_DUE">
                        <label for="renumeration_due">Rénumération totale brute versée pendant toute la durée du contrat</label>
                        <input  type="number" id="renumeration_due" name="renumeration_due"  placeholder="Ex: 750 000"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    {{-- Majoration --}}
                    <div class=" col-md-6 col-sm-12 form-group d-none" id="HEURE_SUPP">
                        <label for="heure_supp">Insérer le nombre d’heures supplémentaires</label>
                        <input  type="number" id="heure_supp" name="heure_supp"  placeholder="Ex: 8"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="SALAIRE_HOR">
                        <label for="salaire_hor" id="SALAIRE_HOR">Insérer le salaire horaire</label>
                        <input  type="number" id="salaire_hor" name="salaire_hor"  placeholder="Ex: 375"
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group d-none" id="MAJORATION">
                        <label for="majoration">Période pendant laquelle les heures ont été effectuées</label>
                        <select name="majoration" class="custom-select-box form-control">
                            <option value="" >-- Choisir --</option>
                            <option value="H_S_E_N" >Heures supplémentaire effectuées de nuit</option>
                            <option value="H_S_E_J_PJRHPF" >Heures supplémentaire effectuées le jour, pendant le jour de repos hebdomadaire ou pendant les jours fériés</option>
                            <option value="H_S_E_N_PJRHPF" >Heures supplémentaire effectuées la nuit, pendant le jour de repos hebdomadaire ou pendant les jours fériés</option>
                        </select>
                    </div>
                    {{-- End Majoration --}}

                    {{-- PRIME DE PANIER --}}
                    <div class=" col-md-12 col-sm-12 form-group d-none" id="PRIME_PANIER">
                        <label for="prime_panier">Choisir votre situation</label>
                        <select name="prime_panier" class="custom-select-box form-control">
                            <option value="J_E_M_6_HTN" >J’effectue au moins 6 heures de travail de nuit</option>
                            <option value="J_E_10_H_I" >J’ai effectué 10 heures ininterrompues</option>
                            <option value="J_E_3_H_P_H_N" >J’ai effectué 3 heures de plus que mon horaire normal</option>
                            <option value="J_P_P_P_N" >Je perçois la prime de panier en nature</option>
                            <option value="J_S_G_C" >Je suis gardien concierge</option>
                            <option value="AUTRES" >Autres</option>
                        </select>
                    </div>
                    {{-- END PRIME DE PANIER --}}

                    <div class=" col-md-12 col-sm-12 form-group text-center">
                        <button class="theme-btn btn-style-two" type="submit">
                            <span class="txt">Calculer
                                <i class="arrow flaticon-right"></i>
                            </span>
                        </button>
                    </div>

                </div>
            </form>

            <!--End Contact Form -->
        </div>
    </div>
</section>

@endsection


@section('scripts')

<script>
    $(document).ready(function(){
        $("#types-droit").change(function(){
            // e.preventDefault();
            var responseID = $(this).val();
            console.log(responseID);

            // Calcul Indemnité compensatrice de préavis (Article 75 de la CCNI)
            if(responseID == "C_M_I_C_P")
            {
                $('#C_M_I_C_P_types').removeClass('d-none');
                $('#C_M_I_C_P_types').val('');
                $('#C_M_I_C_P_types').removeClass('col-md-12');
                $('#C_M_I_C_P_types').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-12');
                $('#montant').val('');

                //required
                document.getElementById('salaire').required = true;

                //Labels title
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre salaire actuel');

                // remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#montant').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Calcul Indemnité de licenciement (Article 80 de la CCNI)
            else if(responseID == "C_M_I_L")
            {
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-6');
                $('#montant').val('');

                //required
                document.getElementById('salaire').required = true;
                document.getElementById('date_deb').required = true;
                document.getElementById('date_fin').required = true;

                //Label title
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre salaire moyen des 12 derniers mois');
                $('label[id*=DATEEMBAUCHE]').empty();
                $('label[id*=DATEEMBAUCHE]').text('Insérer votre date d\'embauche');
                $('label[id*=DATELICENCIEMENT]').empty();
                $('label[id*=DATELICENCIEMENT]').text('Insérer la date du licenciement');
                // remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#montant').addClass('col-md-12');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Indemnité départ à la retraite (Article 84 de la CCNI)
            else if(responseID == 'C_M_I_D_R')
            {
                //remove class
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-6');
                $('#montant').val('');

                //required
                document.getElementById('salaire').required = true;
                document.getElementById('date_deb').required = true;
                document.getElementById('date_fin').required = true;

                //Label title
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre salaire moyen des 12 derniers mois');
                $('label[id*=DATEEMBAUCHE]').empty();
                $('label[id*=DATEEMBAUCHE]').text('Insérer votre date d\'embauche');
                $('label[id*=DATELICENCIEMENT]').empty();
                $('label[id*=DATELICENCIEMENT]').text('Insérer la date de départ à la retraite');

                // add class
                $('#MEFNPDNLG').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#montant').removeClass('col-md-12');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Calcul Indemnité de décès (Article 83 de la CCNI)
            else if(responseID == 'C_M_I_D')
            {
                //remove
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-6');
                $('#montant').val('');

                //required
                document.getElementById('salaire').required = true;
                document.getElementById('date_deb').required = true;
                document.getElementById('date_fin').required = true;

                //Label title
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre salaire moyen des 12 derniers mois');
                $('label[id*=DATEEMBAUCHE]').empty();
                $('label[id*=DATEEMBAUCHE]').text('Insérer votre date d\'embauche');
                $('label[id*=DATELICENCIEMENT]').empty();
                $('label[id*=DATELICENCIEMENT]').text('Insérer la date de décès');

                // add class
                $('#montant').removeClass('col-md-12');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Calcul indemnité de maladie du travail (Article 87 de la CCNI)
            else if(responseID == 'C_M_I_M_T')
            {
                $('#PRESENCE').removeClass('d-none');
                $('#PRESENCE').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-12');
                $('#montant').val('');

                //required
                document.getElementById('salaire').required = true;
                document.getElementById('date_fin').required = false;

                //Label title
                $('label[id*=DATELICENCIEMENT]').empty();
                $('label[id*=DATELICENCIEMENT]').text('Insérer votre date d\'embauche');
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre salaire actuel');

                // remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#dateF').addClass('d-none');
            }

            // Allocation de congé (Article 72 de la CCNI)
            else if(responseID == 'C_M_A_C')
            {
                $('#cumule_salaire').removeClass('d-none');
                $('#cumule_salaire').val('');

                //required
                document.getElementById('cumuleS').required = true;

                //Label title
                $('label[id*=CUMULESALAIRE]').empty();
                $('label[id*=CUMULESALAIRE]').text('Insérer votre salaire moyen des 12 derniers mois');

                // remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Indemnités de licenciement pour motif économique
            else if(responseID == 'C_M_I_L_M_E')
            {
                $('#C_M_I_C_P_types').removeClass('d-none');
                $('#C_M_I_C_P_types').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-12');
                $('#montant').val('');
                $('#cumule_salaire').removeClass('d-none');
                $('#cumule_salaire').val('');
                $('#C_M_I_C_P_types').removeClass('col-md-6');
                $('#C_M_I_C_P_types').val('');
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');

                //required
                document.getElementById('date_deb').required = true;
                document.getElementById('date_fin').required = true;
                document.getElementById('cumuleS').required = true;
                document.getElementById('salaire').required = true;

                //Label title
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre salaire moyen des 12 derniers mois');
                $('label[id*=DATEEMBAUCHE]').empty();
                $('label[id*=DATEEMBAUCHE]').text('Insérer votre date d\'embauche');
                $('label[id*=DATELICENCIEMENT]').empty();
                $('label[id*=DATELICENCIEMENT]').text('Insérer la date du licenciement');
                $('label[id*=CUMULESALAIRE]').empty();
                $('label[id*=CUMULESALAIRE]').text('Insérer votre salaire actuel');

                //remove class
                $('#montant').addClass('col-md-6');
                $('#PRESENCE').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#C_M_I_C_P_types').removeClass('col-md-12');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Période d’essai (Article 23 de la CCNI)
            else if(responseID == 'C_M_P_E')
            {
                $('#ESSAI').removeClass('d-none');
                $('#ESSAI').val('');

                // Remove class
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Délai d’information du travailleur pour le renouvellement de la période d’essai (Article 23 de la CCNI)
            else if(responseID == 'C_M_D_I_T_R_P_E')
            {
                $('#ESSAI').removeClass('d-none');
                $('#ESSAI').val('');

                // Remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Nombre de jours d’absence pour les événements familiaux
            else if(responseID == 'C_M_N_J_A_E_F')
            {
                $('#ABSENCE').removeClass('d-none');
                $('#ABSENCE').val('');

                // Remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Durée maximale de l’intérim dans un emploi relevant d’une catégorie supérieure (Article 35 de la CCNI)
            else if(responseID == 'C_L_D_M_I_E_R_C_S')
            {
                $('#SPECIALITE').removeClass('d-none');
                $('#SPECIALITE').val('');

                // Remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Indemnité d’intérim (Article 35 de la CCNI)
            else if(responseID == 'C_M_I_I')
            {
                $('#TITULAIRE').removeClass('d-none');
                $('#TITULAIRE').val('');
                $('#SALAIRE_CAT_TP').removeClass('d-none');
                $('#SALAIRE_CAT_TP').val('');
                $('#SALAIRE_CAT_IN').removeClass('d-none');
                $('#SALAIRE_CAT_IN').val('');

                //required
                document.getElementById('salaire_cat_in').required = true;
                document.getElementById('salaire_cat_tp').required = true;

                //Remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }

            // Majoration des heures supplémentaires
            else if(responseID == 'C_M_H_S')
            {
                $('#HEURE_SUPP').removeClass('d-none');
                $('#HEURE_SUPP').val('');
                $('#SALAIRE_HOR').removeClass('d-none');
                $('#SALAIRE_HOR').val('');
                $('#MAJORATION').removeClass('d-none');
                $('#MAJORATION').val('');

                //required
                document.getElementById('heure_supp').required = true;
                document.getElementById('salaire_hor').required = true;

                //remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
            }

            // Prime de panier (Article 53 de la CCNI)
            else if(responseID == 'C_M_P_P')
            {
                $('#PRIME_PANIER').removeClass('d-none');
                $('#PRIME_PANIER').val('');

                //remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
            }

            // Indemnité de fin de contrat à durée déterminée
            else if(responseID == 'C_M_I_F_C_D_D')
            {
                $('#RENUMERATION_DUE').removeClass('d-none');
                $('#RENUMERATION_DUE').val('');

                //required
                document.getElementById('renumeration_due').required = true;

                //remove class
                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
            }
            //Rappel de la prime de transport
            else if(responseID == 'R_P_T')
            {
                $('#montant').removeClass('d-none');
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Indiquer le montant versé au titre de la prime de transport');
                $('#cumule_salaire').removeClass('d-none');
                $('label[id*=CUMULESALAIRE]').empty();
                $('label[id*=CUMULESALAIRE]').text('Indiquer le nombre de mois pendant lequel le montant a été payé');
                $('#salaire').removeAttr("placeholder");
                $('#cumuleS').removeAttr("placeholder");

                document.getElementById('cumuleS').required = true;
                document.getElementById('salaire').required = true;
                document.getElementsByName('salaire')[0].placeholder='Ex: 150 000';
                document.getElementsByName('cumuleS')[0].placeholder='Ex: 5';


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');

                document.getElementById('renumeration_due').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;

            }
            //Rappel de salaire
            else if(responseID == 'R_S')
            {
                $('#montant').removeClass('d-none');
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Indiquer le montant versé au titre du salaire catégoriel');
                $('#cumule_salaire').removeClass('d-none');
                $('label[id*=CUMULESALAIRE]').empty();
                $('label[id*=CUMULESALAIRE]').text('Indiquer le nombre de mois pendant lequel le montant a été payé');
                $('#SALAIRE_HOR').removeClass('d-none');
                $('label[id*=SALAIRE_HOR]').empty();
                $('label[id*=SALAIRE_HOR]').text('Indiquer le salaire catégoriel normalement dû');

                document.getElementById('cumuleS').required = true;
                document.getElementById('salaire').required = true;
                document.getElementById('salaire_hor').required = true;


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');

                document.getElementById('renumeration_due').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;

            }
            //Prime d’ancienneté
            else if(responseID == 'P_A')
            {
                $('#montant').removeClass('d-none');
                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre ancienneté (ans)');
                $('#cumule_salaire').removeClass('d-none');
                $('label[id*=CUMULESALAIRE]').empty();
                $('label[id*=CUMULESALAIRE]').text('Insérer votre salaire catégoriel');
                $('#salaire').removeAttr("placeholder");
                $('#cumuleS').removeAttr("placeholder");

                document.getElementById('cumuleS').required = true;
                document.getElementById('salaire').required = true;
                document.getElementsByName('salaire')[0].placeholder='Ex: 3';
                document.getElementsByName('cumuleS')[0].placeholder='Ex: 150 000';


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');

                document.getElementById('renumeration_due').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;

            }
            // Calculer la durée de la période de suspensions de mon contrat de travail pour maladie
            else if(responseID == 'C_D_P_S_C_T_M')
            {
                $('#montant').removeClass('d-none');
                $('#montant').val('');

                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre ancienneté (ans)');

                document.getElementsByName('salaire')[0].placeholder='Ex: 13';


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');

                //required
                document.getElementById('renumeration_due').required = false;
                document.getElementById('salaire').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;
                document.getElementById('cumuleS').required = false;
            }
            //Calculer mon indemnité de déplacement hors de mon lieu habituel de travail
            else if(responseID == 'C_I_D_H_LHT')
            {

                $('#MDCMOT').removeClass('d-none');
                $('#MDCMOT').val('');
                $('#LDDIES').removeClass('d-none');
                $('#LDDIES').val('');
                $('#MDOFS').removeClass('d-none');
                $('#MDOFS').val('');
                $('#MEFNPDNLG').removeClass('d-none');
                $('#MEFNPDNLG').val('');
                $('#MDOP').removeClass('d-none');
                $('#MDOP').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#C_M_I_C_P_types').removeClass('d-none');
                $('#C_M_I_C_P_types').val('');


                document.getElementById('salaire').required = true;

                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
                $('label[id*=LABELS]').text('Insérer votre salaire horaire de base');

                //required
                document.getElementById('renumeration_due').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;
                document.getElementById('cumuleS').required = false;
            }
            //Calculer mon nombre de jours de congés
            else if(responseID == 'C_NJC')
            {

                $('#montant').removeClass('d-none');
                $('#montant').val('');

                $('label[id*=LABELS]').empty();
                $('label[id*=LABELS]').text('Insérer votre ancienneté (ans)');

                document.getElementsByName('salaire')[0].placeholder='Ex: 7';


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
                // $('label[id*=LABELS]').text('Insérer votre salaire actuel');

                //required
                document.getElementById('renumeration_due').required = false;
                document.getElementById('salaire').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;
                document.getElementById('cumuleS').required = false;
            }
            //Délai pour évacuer le logement fourni par l’employeur
            else if(responseID == 'C_DELFE')
            {
                $('#LOGEMENT_F').removeClass('d-none');
                $('#LOGEMENT_F').val('');


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
                $('label[id*=LABELS]').text('Insérer votre salaire actuel');

                //required
                document.getElementById('renumeration_due').required = false;
                document.getElementById('salaire').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;
                document.getElementById('cumuleS').required = false;
            }
            //Calculer la durée de mon préavis
            else if(responseID == 'C_DMP')
            {

                $('#SPECIALITE').removeClass('d-none');
                $('#SPECIALITE').val('');


                $('#MEFNPDNLG').addClass('d-none');
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
                $('label[id*=LABELS]').text('Insérer votre salaire actuel');

                //required
                document.getElementById('renumeration_due').required = false;
                document.getElementById('salaire').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;
                document.getElementById('cumuleS').required = false;
            }
            else
            {
                $('#MDCMOT').addClass('d-none');
                $('#LDDIES').addClass('d-none');
                $('#MDOFS').addClass('d-none');
                $('#MDOP').addClass('d-none');
                $('#MEFNPDNLG').addClass('d-none');

                $('#LOGEMENT_F').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#C_M_I_C_P_types').addClass('col-md-6');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
                $('#montant').addClass('col-md-6');
                $('#HEURE_SUPP').addClass('d-none');
                $('#SALAIRE_HOR').addClass('d-none');
                $('#MAJORATION').addClass('d-none');
                $('#PRIME_PANIER').addClass('d-none');
                $('label[id*=LABELS]').text('Insérer votre salaire actuel');

                //required
                document.getElementById('renumeration_due').required = false;
                document.getElementById('salaire').required = false;
                document.getElementById('date_deb').required = false;
                document.getElementById('date_fin').required = false;
                document.getElementById('heure_supp').required = false;
                document.getElementById('salaire_hor').required = false;
                document.getElementById('salaire_cat_in').required = false;
                document.getElementById('salaire_cat_tp').required = false;
                document.getElementById('cumuleS').required = false;
            }
        });
    });
</script>

@endsection
