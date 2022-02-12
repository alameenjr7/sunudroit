<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MesDroitsController extends Controller
{
    //
    public function index(Request $request)
    {
        $full_name = $request->input('full_name');
        $typeDroit = $request->input('types-droit');
        $types = $request->input('types');
        $presences = $request->input('presence');
        $essai = $request->input('essai');
        $specialite = $request->input('specialite');
        $titulaire = $request->input('titulaire');
        $salaire = $request->input('salaire');
        $cumuleS = $request->input('cumuleS');
        $salaire_cat_tp = $request->input('salaire_cat_tp');
        $salaire_cat_in = $request->input('salaire_cat_in');
        $renumeration_due = $request->input('renumeration_due');
        $dateD = $request->input('date_deb');
        $dateF = $request->input('date_fin');
        $date = $dateD;
        $date1 = $dateF;
        $dateDiff = Carbon::parse($date)->floatDiffInRealYears($date1);
        $dateDiff_f = number_format($dateDiff);
        $yearAfter10 = $dateDiff_f - 10;
        $yearAfter20 = $dateDiff_f - 20;
        $demiSalaire = number_format(($salaire/2),2);
        
        $result = 0;

        // Calcul Indemnité compensatrice de préavis (Article 75 de la CCNI)
        if($typeDroit == 'C_M_I_C_P')
        {
            // Je suis ouvrier ou employé
            if( $types == 'J_S_O_E'){
                $result = number_format($salaire * 1);
            }
            // Je suis agent de maitrise ou assimilé
            elseif($types == 'J_S_A_M_A')
            {
                $result = number_format($salaire * 2);
            }
            // Je suis cadre ou assimilé
            else
            {
                $result = number_format($salaire * 3);
            }
        }

        // Calcul Indemnité de licenciement (Article 80 de la CCNI)
        elseif($typeDroit == 'C_M_I_L')
        {
            if($dateDiff_f < 1)
            {
                return redirect()->back()->with('message','L’indemnité de licenciement n’est pas due');
            }
            else
            {
                if($dateDiff_f <= 5){
                    $result0 = ($salaire * 25)/100 * $dateDiff_f;
                    $result1 = ($salaire * 25)/100 * 12;
                    $result2 = ($salaire * 25)/100 * 365;
                    $result = number_format(($result0 + $result1 + $result2),2);

                    return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de licenciement est: '.$result.' FCFA.');
                }
                elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * $dateDiff_f;
                    $result2 = ($salaire * 30)/100 * 12;
                    $result3 = ($salaire * 30)/100 * 365;
                    $result = number_format(($result0 + $result1 + $result2 + $result3),2);

                    return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de licenciement est: '.$result.' FCFA.');
                }
                else{
                    $yearAfter10 = $dateDiff_f - 10;
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * 5;
                    $result2 = ($salaire * 40)/100 * $yearAfter10;
                    $result3 = ($salaire * 40)/100 * 12;
                    $result4 = ($salaire * 40)/100 * 365;
                    $result = number_format(($result0 + $result1 + $result2 + $result3 + $result4),2);

                    return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de licenciement est: '.$result.' FCFA.');
                }

            }
            
        }

        // Indemnité de départ à la retraite (Article 84 de la CCNI)
        elseif($typeDroit == 'C_M_I_D_R')
        {

            if($dateDiff_f <= 5){
                $result0 = ($salaire * 25)/100 * $dateDiff_f;
                $result1 = ($salaire * 25)/100 * 12;
                $result2 = ($salaire * 25)/100 * 365;
                $result = number_format($result0 + $result1 + $result2,2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnité de départ à la retraite est: '.$result.' FCFA.');
            }
            elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                $result0 = ($salaire * 25)/100 * 5;
                $result1 = ($salaire * 30)/100 * 4;
                $result2 = ($salaire * 30)/100 * 12;
                $result3 = ($salaire * 30)/100 * 365;
                $result = number_format(($result0 + $result1 + $result2 + $result3),2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de départ à la retraite est: '.$result.' FCFA.');
            }
            elseif($dateDiff_f > 10 && $dateDiff_f <= 20){
                $result0 = ($salaire * 25)/100 * 5;
                $result1 = ($salaire * 30)/100 * 5;
                $result2 = ($salaire * 45)/100 * 10;
                $result3 = ($salaire * 45)/100 * 12;
                $result4 = ($salaire * 45)/100 * 365;
                $result = number_format(($result0 + $result1 + $result2 + $result3 + $result4),2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de départ à la retraite est: '.$result.' FCFA.');
            }
            //  plus de 20ans
            else{
                $result0 = ($salaire * 25)/100 * 5;
                $result1 = ($salaire * 30)/100 * 5;
                $result2 = ($salaire * 45)/100 * 10;
                $result3 = ($salaire * 50)/100 * $yearAfter20;
                $result4 = ($salaire * 50)/100 * 365;
                $result4 = ($salaire * 50)/100 * 365;
                $result = number_format(($result0 + $result1 + $result2 + $result3 + $result4),2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de départ à la retraite est: '.$result.' FCFA.');
            }
        }

        // Calcul Indemnité de décès (Article 83 de la CCNI)
        elseif($typeDroit == 'C_M_I_D')
        {
            if($dateDiff_f < 1)
            {
                return redirect()->back()->with('message','L’indemnité de décès n’est pas due');
            }
            elseif($dateDiff_f > 1)
            {
                if($dateDiff_f <= 5){
                    $result0 = ($salaire * 25)/100 * $dateDiff_f;
                    $result1 = ($salaire * 25)/100 * 12;
                    $result2 = ($salaire * 25)/100 * 365;
                    $result = number_format(($result0 + $result1 + $result2),2);

                    return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de décès est: '.$result.' FCFA.');
                }
                elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * $dateDiff_f;
                    $result2 = ($salaire * 30)/100 * 12;
                    $result3 = ($salaire * 30)/100 * 365;
                    $result = number_format(($result0 + $result1 + $result2 + $result3),2);

                    return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de décès est: '.$result.' FCFA.');
                }
                else{
                    $yearAfter10 = $dateDiff_f - 10;
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * 5;
                    $result2 = ($salaire * 40)/100 * $yearAfter10;
                    $result3 = ($salaire * 40)/100 * 12;
                    $result4 = ($salaire * 40)/100 * 365;
                    $result = number_format(($result0 + $result1 + $result2 + $result3 + $result4),2);

                    return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnite de décès est: '.$result.' FCFA.');
                }

            }
        }

        // Calcul indemnité de maladie du travail (Article 87 de la CCNI)
        elseif($typeDroit == 'C_M_I_M_T')
        {
            if($presences == 'M_1_A_P')
            {
                $result = number_format($salaire,2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnité de maladie du travail est: '.$result.' FCFA. pendant 1 mois et '.$demiSalaire.' pendant 3 mois.');
            }
            elseif($presences == '1_5_A_P')
            {
                $result = number_format($salaire,2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnité de maladie du travail est: '.$result.' FCFA. pendant 1 mois et '.$demiSalaire.' pendant 4 mois.');
            }
            else
            {
                $result = number_format($salaire,2);

                return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnité de maladie du travail est: '.$result.' FCFA. pendant 2 mois et '.$demiSalaire.' pendant 5 mois.');
            }
        }

        // Allocation de congé (Article 72 de la CCNI)
        elseif($typeDroit == 'C_M_A_C')
        {
            $result = number_format(($cumuleS / 12),2);

            return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre allocation de congé est: '.$result.' FCFA.');
        }

        // Indemnités de licenciement pour motif économique 
        elseif($typeDroit == 'C_M_I_L_M_E')
        {
            // Je suis ouvrier ou employé
            if( $types == 'J_S_O_E')
            {
                if($dateDiff_f < 1)
                {
                    $result0 = $salaire * 1;
                    $result1 = $salaire * 1;
                    $result = number_format($result0 + $result1,2);
                }
                else
                {
                    if($dateDiff_f <= 5){
                        $result0 = ($salaire * 25)/100 * $dateDiff_f;
                        $result1 = ($salaire * 25)/100 * 12;
                        $result2 = ($salaire * 25)/100 * 365;
                        $result4 = $result0 + $result1 + $result2;
                        $result5 = $salaire * 1;
                        $result6 = $salaire * 1;
                        $result = number_format($result4 + $result5 + $result6,2);

                    }
                    elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * $dateDiff_f;
                        $result2 = ($salaire * 30)/100 * 12;
                        $result3 = ($salaire * 30)/100 * 365;
                        $result5 = $salaire * 1;
                        $result6 = $salaire * 1;
                        $result7 = $result0 + $result1 + $result2 + $result3;
                        $result = number_format($result5 + $result6 + $result7,2);

                    }
                    else{
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * 5;
                        $result2 = ($salaire * 40)/100 * $yearAfter10;
                        $result3 = ($salaire * 40)/100 * 12;
                        $result4 = ($salaire * 40)/100 * 365;
                        $result5 = $result0 + $result1 + $result2 + $result3 + $result4;
                        $result6 = $salaire * 1;
                        $result7 = $salaire * 1;
                        $result = number_format($result5 + $result6 + $result7,2);

                    }

                }

            }
            // Je suis agent de maitrise ou assimilé
            elseif($types == 'J_S_A_M_A')
            {
                if($dateDiff_f < 1)
                {
                    $result0 = $salaire * 2;
                    $result1 = $salaire * 1;
                    $result = number_format($result0 + $result1,2);
                }
                else
                {
                    if($dateDiff_f <= 5){
                        $result0 = ($salaire * 25)/100 * $dateDiff_f;
                        $result1 = ($salaire * 25)/100 * 12;
                        $result2 = ($salaire * 25)/100 * 365;
                        $result4 = $result0 + $result1 + $result2;
                        $result5 = $salaire * 2;
                        $result6 = $salaire * 1;
                        $result = number_format($result4 + $result5 + $result6,2);

                    }
                    elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * $dateDiff_f;
                        $result2 = ($salaire * 30)/100 * 12;
                        $result3 = ($salaire * 30)/100 * 365;
                        $result5 = $salaire * 2;
                        $result6 = $salaire * 1;
                        $result7 = $result0 + $result1 + $result2 + $result3;
                        $result = number_format($result5 + $result6 + $result7,2);

                    }
                    else{
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * 5;
                        $result2 = ($salaire * 40)/100 * $yearAfter10;
                        $result3 = ($salaire * 40)/100 * 12;
                        $result4 = ($salaire * 40)/100 * 365;
                        $result5 = $result0 + $result1 + $result2 + $result3 + $result4;
                        $result6 = $salaire * 2;
                        $result7 = $salaire * 1;
                        $result = number_format($result5 + $result6 + $result7,2);

                    }

                }
            }
            // Je suis cadre ou assimilé
            else
            {
                if($dateDiff_f < 1)
                {
                    $result0 = $salaire * 3;
                    $result1 = $salaire * 1;
                    $result = number_format($result0 + $result1,2);
                }
                else
                {
                    if($dateDiff_f <= 5){
                        $result0 = ($salaire * 25)/100 * $dateDiff_f;
                        $result1 = ($salaire * 25)/100 * 12;
                        $result2 = ($salaire * 25)/100 * 365;
                        $result4 = $result0 + $result1 + $result2;
                        $result5 = $salaire * 3;
                        $result6 = $salaire * 1;
                        $result = number_format($result4 + $result5 + $result6,2);

                    }
                    elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * $dateDiff_f;
                        $result2 = ($salaire * 30)/100 * 12;
                        $result3 = ($salaire * 30)/100 * 365;
                        $result5 = $salaire * 3;
                        $result6 = $salaire * 1;
                        $result7 = $result0 + $result1 + $result2 + $result3;
                        $result = number_format($result5 + $result6 + $result7,2);

                    }
                    else{
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * 5;
                        $result2 = ($salaire * 40)/100 * $yearAfter10;
                        $result3 = ($salaire * 40)/100 * 12;
                        $result4 = ($salaire * 40)/100 * 365;
                        $result5 = $result0 + $result1 + $result2 + $result3 + $result4;
                        $result6 = $salaire * 3;
                        $result7 = $salaire * 1;
                        $result = number_format($result5 + $result6 + $result7,2);

                    }

                }
            }

            return redirect()->back()->with('message','Bonjour '.$full_name.', votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.');
        }

        // Période d’essai (Article 23 de la CCNI)
        elseif($typeDroit == 'C_M_P_E')
        {
            if($essai == 'J_S_P_H_J')
            {
                $result = "Votre periode d'essai est de 8 jours";
            }
            elseif($essai == 'J_S_O_E_P_M')
            {
                $result = "Votre periode d'essai est de 1 mois";
            }
            elseif($essai == 'J_S_A_M_T_A')
            {
                $result = "Votre periode d'essai est de 2 mois";
            }
            else
            {
                $result = "Votre periode d'essai est de 3 mois";
            }
            return redirect()->back()->with('message', 'Bonjour '.$full_name.', '.$result);
        }

        // Délai d’information du travailleur pour le renouvellement de la période d’essai (Article 23 de la CCNI)
        elseif($typeDroit == 'C_M_D_I_T_R_P_E')
        {
            if($essai == 'J_S_P_H_J')
            {
                $result = "La délai d’information pour le renouvellement est de 2 jours au moins avant la fin de la période d'essai";
            }
            elseif($essai == 'J_S_O_E_P_M')
            {
                $result = "La délai d’information pour le renouvellement est de 5 jours au moins avant la fin de la période d'essai";
            }
            elseif($essai == 'J_S_A_M_T_A')
            {
                $result = "La délai d’information pour le renouvellement est de 10 jours au moins avant la fin de la période d'essai";
            }
            else
            {
                $result = "La délai d’information pour le renouvellement est de 15 jours au moins avant la fin de la période d'essai";
            }
            return redirect()->back()->with('message', 'Bonjour '.$full_name.', '.$result);
        }

        // Nombre de jours d’absence pour les événements familiaux
        elseif($typeDroit == 'C_M_N_J_A_E_F')
        {
            if($typeDroit == 'M_M')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 3 jours";
            }
            elseif($typeDroit == 'M_E_F_S')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 1 jours";
            }
            elseif($typeDroit == 'D_C_D_L_D')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 4 jours"; 
            }
            elseif($typeDroit == 'D_C_L_D_F_S')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 2 jours"; 
            }
            elseif($typeDroit == 'D_BP_BM')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 2 jours";
            }
            elseif($typeDroit == 'N_M_E')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 1 jours"; 
            }
            elseif($typeDroit == 'B_M_E')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 1 jours"; 
            }
            elseif($typeDroit == 'P_C_M_E')
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 1 jours";
            }
            else
            {
                $result = "Le nombre de jours d'absence legalement autorise est de 2 jours";
            }
            return redirect()->back()->with('message', 'Bonjour '.$full_name.', '.$result);
        }

        // Durée maximale de l’intérim dans un emploi relevant d’une catégorie supérieure (Article 35 de la CCNI)
        elseif($typeDroit == 'C_L_D_M_I_E_R_C_S')
        {
            if($specialite == 'J_S_O_S')
            {
                $result = "La durée maximale de l’intérim est de 15 jours!";
            }
            elseif($specialite == 'J_S_PEATA')
            {
                $result = "La durée maximale de l’intérim est de 1 mois!";
            }
            else
            {
                $result = "La durée maximale de l’intérim est de 3 mois!";
            }

            return redirect()->back()->with('message', 'Bonjour '.$full_name.', '.$result.' Passer ce délai, l\'employer doit d\'office vous reclasser dans le nouvel emploi occupé.');

        }

        // Indemnité d’intérim (Article 35 de la CCNI)
        elseif($typeDroit == 'C_M_I_I')
        {
            if($titulaire == 'AUTRES')
            {
                $result = 0;
            }
            else
            {
                $result = $salaire_cat_tp - $salaire_cat_in;
            }

            return redirect()->back()->with('message', 'Bonjour '.$full_name.', Votre Indemnité d\'interim est de '.$result.' FCFA.');
        }

        // Majoration des heures supplémentaires
        elseif($typeDroit == 'C_M_H_S'){

        }

        // Prime de panier (Article 53 de la CCNI)
        elseif($typeDroit == 'C_M_P_P'){

        }

        // Indemnité de fin de contrat à durée déterminée
        elseif($typeDroit == 'C_M_I_F_C_D_D')
        {
            $result = number_format(($renumeration_due * 7) / 100,2);

            return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnité de fin de contrat à durée déterminée est: '.$result.' FCFA.');
        }

        else{
            $result = 0;
        }

        return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre indemnité compensatrice de préavis: '.$result.' FCFA.');

    }

    public function calcul()
    {
        return view('frontend.pages.mesDroits.calcul-droit');
    }

    public function document()
    {
        return view('frontend.pages.mesDroits.document');
    }
}
