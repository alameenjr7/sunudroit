@extends('frontend.layouts.master')

@section('content')

<section class="contact-form-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>CALCULER MES DROITS</h2>
        </div>
        <div class="row">
                <div class="col-md-12 m-auto">
                    @if (session('message'))
                        <div class="alert alert-success text-center">
                            <h3>{{session('message')}}</h3>
                            <p style="font-size: 14px; font-family:'Times New Roman', Times, serif; font-wight: bold">
                                <h4>
                                    Notes: Les résultats affichés ne sont qu'indicatifs et peuvent dans le cas où ils seraient soumis à l’administration ou à un juge, être déclarés comme mal ou non fondés fondés sans que cela ne puisse en quoi que ce soit engager la responsabilité  de Sunudroit.Tech <br>
                                    Le droit à votre portée. <br>
                                    {{-- Le slogan : Le droit à votre portée --}}
                                </h4>
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
                        <label for="full_name">Votre nom complet</label>
                        <input class="form-control" type="text" id="full_name" name="full_name" placeholder="Baba NGOM" required>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="email">Votre adresse e-mail</label>
                        <input class="form-control" type="email" name="email" id="email"  placeholder="sunudroit@gmail.cm" required>
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group">
                        <label for="typesDroit">Choisir</label>
                        {{-- <input type="checkbox" id="papa" name="papa" value="1" checked> --}}
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
                            <option value="" selected>--Choisir--</option>
                            <option value="C_M_I_C_P" >Calculer Mon Indemnité compensatrice de préavis (Article 75 de la CCNI)</option>
                            <option value="C_M_I_L" >Calculer Mon Indemnité de licenciement (Article 80 de la CCNI)</option>
                            <option value="C_M_I_D_R" >Calculer Mon Indemnité départ à la retraite (Article 84 de la CCNI)</option>
                            <option value="C_M_I_D" >Calculer Mon Indemnité de décès (Article 83 de la CCNI)</option>
                            <option value="C_M_I_M_T" >Calculer Mon Indemnité de maladie du travail (Article 87 de la CCNI)</option>
                            <option value="C_M_A_C" >Calculer Mon Allocation de congé (Article 72 de la CCNI)</option>
                            <option value="C_M_I_L_M_E" >Calculer Mon Indemnités de licenciement pour motif économique</option>
                            <option value="C_M_P_E" >Calculer la Période d’essai (Article 23 de la CCNI)</option>
                            <option value="C_M_D_I_T_R_P_E" >Calculer le Délai d’information du travailleur pour le renouvellement de la période d’essai (Article 23 de la CCNI)</option>
                            <option value="C_M_N_J_A_E_F" >Calculer Mon Nombre de jours d’absence pour les événements familiaux</option>
                            <option value="C_L_D_M_I_E_R_C_S" >Calculer Ma Durée maximale de l’intérim dans un emploi relevant d’une catégorie supérieure (Article 35 de la CCNI)</option>
                            <option value="C_M_I_I" >Calculer Mon Indemnité d’intérim (Article 35 de la CCNI)</option>
                            <option value="C_M_H_S" >Calculer la Majoration des heures supplémentaires</option>
                            <option value="C_M_P_P" >Calculer Ma Prime de panier (Article 53 de la CCNI)</option>
                            <option value="C_M_I_F_C_D_D" >Calculer Mon Indemnité de fin de contrat à durée déterminée</option> 
                        </select>
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
                        <label for="presence">Choisir votre ancienete</label>
                        <select name="presence" class="custom-select-box form-control">
                            <option value="M_1_A_P" >Moins d'un an de presence</option>
                            <option value="1_5_A_P" >1 a 5 ans de presence</option>
                            <option value="P_5_A_P" >Plus de 5 ans de presence</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="ESSAI">
                        <label for="essai">Choisir le type</label>
                        <select name="essai" class="custom-select-box form-control">
                            <option value="J_S_P_H_J" >Je suis payé à l’heure ou à la journée</option>
                            <option value="J_S_O_E_P_M" >Je suis ouvrier ou employé payé au mois</option>
                            <option value="J_S_A_M_T_A" >Je suis agent de maîtrise, technicien ou assimilé</option>
                            <option value="J_S_I_C_A" >Je suis ingénieure, cadre ou assimilé</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="ABSENCE">
                        <label for="absence">Choisir l'evenement familial</label>
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
                        <label for="specialite">Choisir votre ...</label>
                        <select name="specialite" class="custom-select-box form-control">
                            <option value="J_S_O_S" >Je suis ouvrier spécialisé</option>
                            <option value="J_S_PEATA" >Je suis ouvrier professionnel, employé, agent de maitrise, technicien ou assimilé</option>
                            <option value="J_S_C_I_A" >Je suis cadre, ingénieur ou assimilé</option>
                        </select>
                    </div>

                    <div class=" col-md-12 col-sm-12 form-group d-none" id="TITULAIRE">
                        <label for="titulaire">Choisir votre ...</label>
                        <select name="titulaire" class="custom-select-box form-control">
                            <option value="L_T_P_M" >Le titulaire de poste est malade</option>
                            <option value="L_T_P_V_A" >Le titulaire de poste est victime d'accident</option>
                            <option value="L_T_P_C" >Le titulaire de poste est en conge</option>
                            <option value="AUTRES" >AUTRES</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="montant">
                        <label for="salaire">Votre salaire actuel</label>
                        <input  type="number" id="salaire" name="salaire"  placeholder="Ex: 75 000"  
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
                        <label for="date_deb">Date debut contrat</label>
                        <input class="form-control" type="date" id="date_deb" name="date_deb" placeholder="Ex: 01/01/2020" >
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="dateF">
                        <label for="date_fin">Date fin contrat</label>
                        <input class="form-control" type="date" name="date_fin" id="date_fin"  placeholder="Ex: 12/05/2022" >
                    </div>

                    {{-- cumule de vos salaires sur les 12mois --}}
                    <div class=" col-md-6 col-sm-12 form-group d-none" id="cumule_salaire">
                        <label for="cumuleS">Cumule de vos salaires sur les 12 derniers mois</label>
                        <input  type="number" id="cumuleS" name="cumuleS"  placeholder="Ex: 1 275 000"  
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

                    <div class=" col-md-6 col-sm-12 form-group d-none" id="SALAIRE_CAT_TP">
                        <label for="salaire_cat_tp">Salaire categriciel du tutilaire de poste</label>
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
                        <label for="salaire_cat_in">Salaire categoriciel de l'interimaire</label>
                        <input  type="number" id="salaire_cat_in" name="salaire_cat_in"  placeholder="Ex: 75 000"  
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
                        <label for="renumeration_due">Renumeration totale brute due pendant toute la duree du contrat</label>
                        <input  type="number" id="renumeration_due" name="renumeration_due"  placeholder="Ex: 3 750 000"  
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
                        <label for="salaire_hor">Insérer le salaire horaire</label>
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
                        <label for="majoration">Choisir votre ...</label>
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
                        <label for="prime_panier">Choisir votre ...</label>
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
                $('#montant').removeClass('d-none');
                $('#montant').val('');

                // remove class
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

                // remove class
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
            }

            // Indemnité départ à la retraite (Article 84 de la CCNI)
            else if(responseID == 'C_M_I_D_R')
            {
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');

                // remove class
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
            }

            // Calcul Indemnité de décès (Article 83 de la CCNI)
            else if(responseID == 'C_M_I_D')
            {
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');

                // remove class
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
            }

            // Calcul indemnité de maladie du travail (Article 87 de la CCNI)
            else if(responseID == 'C_M_I_M_T')
            {
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');
                $('#PRESENCE').removeClass('d-none');
                $('#PRESENCE').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#montant').removeClass('col-md-12');
                $('#montant').val('');

                // remove class
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
            }

            // Allocation de congé (Article 72 de la CCNI)
            else if(responseID == 'C_M_A_C')
            {
                $('#cumule_salaire').removeClass('d-none');
                $('#cumule_salaire').val('');

                // remove class
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
            }

            // Indemnités de licenciement pour motif économique 
            else if(responseID == 'C_M_I_L_M_E')
            {
                $('#C_M_I_C_P_types').removeClass('d-none');
                $('#C_M_I_C_P_types').val('');
                $('#montant').removeClass('d-none');
                $('#montant').val('');
                $('#dateD').removeClass('d-none');
                $('#dateD').val('');
                $('#dateF').removeClass('d-none');
                $('#dateF').val('');

                //remove class
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
                $('#SALAIRE_CAT_IN').addClass('d-none');
                $('#SALAIRE_CAT_TP').addClass('d-none');
                $('#TITULAIRE').addClass('d-none');
                $('#RENUMERATION_DUE').addClass('d-none');
            }

            // Période d’essai (Article 23 de la CCNI)
            else if(responseID == 'C_M_P_E')
            {
                $('#ESSAI').removeClass('d-none');
                $('#ESSAI').val('');
               
                // Remove class
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
            }

            // Délai d’information du travailleur pour le renouvellement de la période d’essai (Article 23 de la CCNI)
            else if(responseID == 'C_M_D_I_T_R_P_E')
            {
                $('#ESSAI').removeClass('d-none');
                $('#ESSAI').val('');
               
                // Remove class
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
            }

            // Nombre de jours d’absence pour les événements familiaux
            else if(responseID == 'C_M_N_J_A_E_F')
            {
                $('#ABSENCE').removeClass('d-none');
                $('#ABSENCE').val('');
               
                // Remove class
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
            }

            // Durée maximale de l’intérim dans un emploi relevant d’une catégorie supérieure (Article 35 de la CCNI)
            else if(responseID == 'C_L_D_M_I_E_R_C_S')
            {
                $('#SPECIALITE').removeClass('d-none');
                $('#SPECIALITE').val('');

                // Remove class
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

                //Remove class
                $('#C_M_I_C_P_types').addClass('d-none');
                $('#montant').addClass('d-none');
                $('#dateF').addClass('d-none');
                $('#dateD').addClass('d-none');
                $('#PRESENCE').addClass('d-none');
                $('#cumule_salaire').addClass('d-none');
                $('#ESSAI').addClass('d-none');
                $('#ABSENCE').addClass('d-none');
                $('#SPECIALITE').addClass('d-none');
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

                //remove class
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

                //remove class
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
            }

            else{
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
                $('#PRIME_PANIER').addClass('d-none');
            }
        });
    });
</script>

@endsection