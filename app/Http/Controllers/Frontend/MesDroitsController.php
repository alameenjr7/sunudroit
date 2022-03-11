<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class MesDroitsController extends Controller
{
    //
    public function index(Request $request)
    {
        $full_name = $request->input('full_name');
        $last_name = $request->input('last_name');
        $typeDroit = $request->input('types-droit');
        $types = $request->input('types');
        $presences = $request->input('presence');
        $essai = $request->input('essai');
        $specialite = $request->input('specialite');
        $titulaire = $request->input('titulaire');
        $salaire = $request->input('salaire');
        $cumuleS = $request->input('cumuleS');
        $heure_supp = $request->input('heure_supp');
        $salaire_hor = $request->input('salaire_hor');
        $majoration = $request->input('majoration');
        $prime_panier = $request->input('prime_panier');
        $salaire_cat_tp = $request->input('salaire_cat_tp');
        $salaire_cat_in = $request->input('salaire_cat_in');
        $renumeration_due = $request->input('renumeration_due');
        $dateD = $request->input('date_deb');
        $dateF = $request->input('date_fin');

        //JOURS RESTANT DE L'AN
        $years = Carbon::parse($dateF)->format('Y');
        $dateFinAN = $years."-12-31";
    
        $dateFin_1 = $dateF; 
        $dateFinAn = $dateFinAN; 
        $dateFin1 = str_replace("/","-",$dateFin_1);
        $dateFinAn1 = str_replace("/","-",$dateFinAn);
            // On transforme les 2 dates en timestamp
        $date3 = strtotime($dateFin1);
        $date4 = strtotime($dateFinAn1);
            // On récupère la différence de timestamp entre les 2 précédents
        $nbJoursTimestamp = $date4 - $date3;
            // ** Pour convertir le timestamp (exprimé en secondes) en jours **
            // On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
        $joursRestant = $nbJoursTimestamp/86400;
        $NbrJrRestant_par365 = (float) number_format($joursRestant / 365,2);
        //FIN JOURS RESTANT DE L'AN

        //MOIS RESTANT DE L'AN
        $mois = Carbon::parse($dateF)->format('m');
        $moisRestant = 12 - $mois;
        $NbrMoisRestant_par12 = (float) number_format($moisRestant / 12,2);
        //END MOIS RESTANT DE L'AN

        //NOMBRE DE JOUR / 365
        $dateDe  =   strtotime($dateD);
        $dateFi    =   strtotime($dateF);
        $NombreSecondes = $dateFi - $dateDe;
        $NombreJours = $NombreSecondes / (3600*24);
        $NbrJours_par365 = (float) number_format($NombreJours / 365,2);
        // dd($NbrJours_par365);
        //END NOMBRE DE JOUR / 365

        //NOMBRE DE MOIS / 12
        if($dateD !=null && $dateF != null)
        {
            $tab_debut = explode ('-', $dateD);
            $tab_fin = explode ('-', $dateF);
            $mois_debut = $tab_debut['1']; // (0 annee, 1 mois, 2 jour)
            $mois_fin = $tab_fin['1'];
            $annee_debut = $tab_debut['0'];
            $anne_fin = $tab_fin['0'];
            $moisEntre = ($anne_fin - $annee_debut)*12 + ($mois_fin - $mois_debut);
            $nbrMois_Par12 = number_format($moisEntre/12,2);
        }
        $nbrMois_Par12;
        //END NOMBRE DE MOIS / 12

        $date = $dateD;
        $date1 = $dateF;
        $dateDiff = Carbon::parse($date)->floatDiffInRealYears($date1);
        $dateDiff_f = number_format($dateDiff);
        $yearAfter10 = $dateDiff_f - 10;
        $yearAfter20 = $dateDiff_f - 20;
        $heureSUP_supp8 = $heure_supp - 8;
        $demiSalaire = number_format(($salaire/2),2);
        $nombreAnnee_6_10 = $dateDiff_f - 6;

        

        
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
                return redirect()
                    ->back()
                    ->with('message','Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                        Votre indemnité de licenciement n’est pas due'
                    );
            }
            else
            {
                if($dateDiff_f <= 5){
                    $result0 = ($salaire * 25)/100 * $dateDiff_f;
                    // $result1 = ($salaire * 25)/100 * $nbrMois_Par12;
                    $result2 = ($salaire * 25)/100 * $NbrJours_par365;
                    $result = number_format($result0 + $result2,2);
                    // dd($result);

                    return redirect()
                        ->back()
                        ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                            Votre indemnite de licenciement est: '.$result.' FCFA.'
                        );
                }
                elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * $nombreAnnee_6_10;
                    // $result2 = ($salaire * 30)/100 * $NbrMoisRestant_par12;
                    $result3 = ($salaire * 30)/100 * $NbrJrRestant_par365;
                    $result = number_format(($result0 + $result1 + $result3),2);

                    return redirect()
                        ->back()
                        ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                                Votre indemnite de licenciement est: '.$result.' FCFA.'
                            );
                }
                else{
                    // $yearAfter10 = $dateDiff_f - 10;
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * 5;
                    $result2 = ($salaire * 40)/100 * $yearAfter10;
                    // $result3 = ($salaire * 40)/100 * $NbrMoisRestant_par12;
                    $result4 = ($salaire * 40)/100 * $NbrJrRestant_par365;
                    $result = number_format(($result0 + $result1 + $result2 + $result4),2);

                    return redirect()
                        ->back()
                        ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                            Votre indemnite de licenciement est: '.$result.' FCFA.'
                        );
                }

            }
            
        }

        // Indemnité de départ à la retraite (Article 84 de la CCNI)
        elseif($typeDroit == 'C_M_I_D_R')
        {

            if($dateDiff_f <= 5){
                $result0 = ($salaire * 25)/100 * $dateDiff_f;
                // $result1 = ($salaire * 25)/100 * $nbrMois_Par12;
                $result2 = ($salaire * 25)/100 * $NbrJours_par365;
                $result = number_format($result0 + $result2,2);

                return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                    Votre indemnité de départ à la retraite est: '.$result.' FCFA.'
                );
            }
            elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                $result0 = ($salaire * 25)/100 * 5;
                $result1 = ($salaire * 30)/100 * $nombreAnnee_6_10;
                // $result2 = ($salaire * 30)/100 * $NbrMoisRestant_par12;
                $result3 = ($salaire * 30)/100 * $NbrJrRestant_par365;
                $result = number_format(($result0 + $result1 + $result3),2);

                return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnite de départ à la retraite est: '.$result.' FCFA.'
                    );
            }
            elseif($dateDiff_f > 10 && $dateDiff_f <= 20){
                $result0 = ($salaire * 25)/100 * 4;
                $result2 = ($salaire * 45)/100 * $yearAfter10;
                // $result3 = ($salaire * 45)/100 * $NbrMoisRestant_par12;
                $result4 = ($salaire * 45)/100 * $NbrJrRestant_par365;
                $result = number_format(($result0 + $result2 + $result4),2);

                return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnite de départ à la retraite est: '.$result.' FCFA.'
                    );
            }
            //  plus de 20ans
            else{
                $result0 = ($salaire * 25)/100 * 5;
                $result1 = ($salaire * 30)/100 * 4;
                $result2 = ($salaire * 45)/100 * 10;
                $result3 = ($salaire * 50)/100 * $yearAfter20;
                $result5 = ($salaire * 50)/100 * $NbrJrRestant_par365;
                $result = number_format(($result0 + $result1 + $result2 + $result3 + $result5),2);

                return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnite de départ à la retraite est: '.$result.' FCFA.'
                    );
            }
        }

        // Calcul Indemnité de décès (Article 83 de la CCNI)
        elseif($typeDroit == 'C_M_I_D')
        {
            if($dateDiff_f < 1)
            {
                return redirect()
                    ->back()
                    ->with('message','Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                        L\'indemnité de décès n’est pas due'
                    );
            }
            elseif($dateDiff_f > 1)
            {
                if($dateDiff_f <= 5){
                    $result0 = ($salaire * 25)/100 * $dateDiff_f;
                    // $result1 = ($salaire * 25)/100 * $nbrMois_Par12;
                    $result2 = ($salaire * 25)/100 * $NbrJours_par365;
                    $result = number_format(($result0 + $result2),2);

                    return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnite de décès est: '.$result.' FCFA.'
                    );
                }
                elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * $nombreAnnee_6_10;
                    // $result2 = ($salaire * 30)/100 * $NbrMoisRestant_par12;
                    $result3 = ($salaire * 30)/100 * $NbrJrRestant_par365;
                    $result = number_format(($result0 + $result1 + $result3),2);

                    return redirect()
                        ->back()
                        ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                            Votre indemnite de décès est: '.$result.' FCFA.'
                        );
                }
                else{
                    $result0 = ($salaire * 25)/100 * 5;
                    $result1 = ($salaire * 30)/100 * 5;
                    $result2 = ($salaire * 40)/100 * $yearAfter10;
                    $result4 = ($salaire * 40)/100 * $NbrJrRestant_par365;
                    $result = number_format(($result0 + $result1 + $result2 + $result4),2);

                    return redirect()
                        ->back()
                        ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                            Votre indemnite de décès est: '.$result.' FCFA.'
                        );
                }

            }
        }

        // Calcul indemnité de maladie du travail (Article 87 de la CCNI)
        elseif($typeDroit == 'C_M_I_M_T')
        {
            if($presences == 'M_1_A_P')
            {
                $result = number_format($salaire,2);

                return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnité de maladie du travail est: '.$result.' FCFA pendant 1 mois et '.$demiSalaire.' FCFA pendant 3 mois.'
                    );
            }
            elseif($presences == '1_5_A_P')
            {
                $result = number_format($salaire,2);

                return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnité de maladie du travail est: '.$result.' FCFA pendant 1 mois et '.$demiSalaire.' FCFA pendant 4 mois.'
                    );
            }
            else
            {
                $result = number_format($salaire,2);

                return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnité de maladie du travail est: '.$result.' FCFA pendant 2 mois et '.$demiSalaire.' FCFA pendant 5 mois.'
                    );
            }
        }

        // Allocation de congé (Article 72 de la CCNI)
        elseif($typeDroit == 'C_M_A_C')
        {
            $result = number_format(($cumuleS / 12),2);

            return redirect()
            ->back()
            ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                Votre allocation de congé est: '.$result.' FCFA.'
            );
        }

        // Indemnités de licenciement pour motif économique 
        elseif($typeDroit == 'C_M_I_L_M_E')
        {
            // Je suis ouvrier ou employé
            if( $types == 'J_S_O_E')
            {
                if($dateDiff_f < 1)
                {
                    $result0 = $cumuleS * 1;
                    $result1 = $cumuleS * 1;
                    $result = number_format($result0 + $result1,2);
                    return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result0,2).' FCFA,
                                Votre indemnité de licenciement n\'est pas due,
                                Votre indemnité spéciale est: '.number_format($result1,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );
                }
                else
                {
                    if($dateDiff_f <= 5){
                        $result0 = ($salaire * 25)/100 * $dateDiff_f;
                        // $result1 = ($salaire * 25)/100 * $nbrMois_Par12;
                        $result2 = ($salaire * 25)/100 * $NbrJours_par365;
                        $result4 = $result0 + $result2;
                        $result5 = $salaire * 1;
                        $result6 = $salaire * 1;
                        $result = number_format($result4 + $result5 + $result6,2);
                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result5,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result4,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );

                    }
                    elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * $nombreAnnee_6_10;
                        // $result2 = ($salaire * 30)/100 * $NbrMoisRestant_par12;
                        $result3 = ($salaire * 30)/100 * $NbrJrRestant_par365;
                        $result5 = $salaire * 1;
                        $result6 = $salaire * 1;
                        $result7 = $result0 + $result1 + $result3;
                        $result = number_format($result5 + $result6 + $result7,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result5,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result7,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );

                    }
                    else{
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * 5;
                        $result2 = ($salaire * 40)/100 * $yearAfter10;
                        // $result3 = ($salaire * 40)/100 * $NbrMoisRestant_par12;
                        $result4 = ($salaire * 40)/100 * $NbrJrRestant_par365;
                        $result5 = $result0 + $result1 + $result2 + $result4;
                        $result6 = $salaire * 1;
                        $result7 = $salaire * 1;
                        $result = number_format($result5 + $result6 + $result7,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result5,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result7,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );
                    }

                }

            }
            // Je suis agent de maitrise ou assimilé
            elseif($types == 'J_S_A_M_A')
            {
                if($dateDiff_f < 1)
                {
                    $result0 = $cumuleS * 2;
                    $result1 = $cumuleS * 1;
                    $result = number_format($result0 + $result1,2);
                }
                else
                {
                    if($dateDiff_f <= 5){
                        $result0 = ($salaire * 25)/100 * $dateDiff_f;
                        $result1 = ($salaire * 25)/100 * $nbrMois_Par12;
                        $result2 = ($salaire * 25)/100 * $NbrJours_par365;
                        $result4 = $result0 + $result1 + $result2;
                        $result5 = $salaire * 2;
                        $result6 = $salaire * 1;
                        $result = number_format($result4 + $result5 + $result6,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result5,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result4,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );

                    }
                    elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * $dateDiff_f;
                        $result2 = ($salaire * 30)/100 * $NbrMoisRestant_par12;
                        $result3 = ($salaire * 30)/100 * $NbrJrRestant_par365;
                        $result5 = $salaire * 2;
                        $result6 = $salaire * 1;
                        $result7 = $result0 + $result1 + $result2 + $result3;
                        $result = number_format($result5 + $result6 + $result7,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result5,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result7,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );

                    }
                    else{
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * 5;
                        $result2 = ($salaire * 40)/100 * $yearAfter10;
                        $result3 = ($salaire * 40)/100 * $NbrMoisRestant_par12;
                        $result4 = ($salaire * 40)/100 * $NbrJrRestant_par365;
                        $result5 = $result0 + $result1 + $result2 + $result3 + $result4;
                        $result6 = $salaire * 2;
                        $result7 = $salaire * 1;
                        $result = number_format($result5 + $result6 + $result7,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result5,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result7,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );

                    }

                }
            }
            // Je suis cadre ou assimilé
            else
            {
                if($dateDiff_f < 1)
                {
                    $result0 = $cumuleS * 3;
                    $result1 = $cumuleS * 1;
                    $result = number_format($result0 + $result1,2);
                }
                else
                {
                    if($dateDiff_f <= 5){
                        $result0 = ($salaire * 25)/100 * $dateDiff_f;
                        $result1 = ($salaire * 25)/100 * $nbrMois_Par12;
                        $result2 = ($salaire * 25)/100 * $NbrJours_par365;
                        $result4 = $result0 + $result1 + $result2;
                        $result5 = $salaire * 3;
                        $result6 = $salaire * 1;
                        $result = number_format($result4 + $result5 + $result6,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result5,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result4,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );
                    }
                    elseif($dateDiff_f >= 6 && $dateDiff_f <= 10){
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * $dateDiff_f;
                        $result2 = ($salaire * 30)/100 * $NbrMoisRestant_par12;
                        $result3 = ($salaire * 30)/100 * $NbrJrRestant_par365;
                        $result5 = $salaire * 3;
                        $result6 = $salaire * 1;
                        $result7 = $result0 + $result1 + $result2 + $result3;
                        $result = number_format($result5 + $result6 + $result7,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result5,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result7,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );
                    }
                    else{
                        $result0 = ($salaire * 25)/100 * 5;
                        $result1 = ($salaire * 30)/100 * 5;
                        $result2 = ($salaire * 40)/100 * $yearAfter10;
                        $result3 = ($salaire * 40)/100 * $NbrMoisRestant_par12;
                        $result4 = ($salaire * 40)/100 * $NbrJrRestant_par365;
                        $result5 = $result0 + $result1 + $result2 + $result3 + $result4;
                        $result6 = $salaire * 3;
                        $result7 = $salaire * 1;
                        $result = number_format($result5 + $result6 + $result7,2);

                        return redirect()
                        ->back()
                        ->with('message',
                                'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>,
                                Votre indemnité compensatrice de préavis est: '.number_format($result6,2).' FCFA,
                                Votre indemnité de licenciement est: '.number_format($result5,2).' FCFA,
                                Votre indemnité spéciale est: '.number_format($result7,2).' FCFA,
                                Votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.'
                            );

                    }

                }
            }

            // return redirect()->back()->with('message','Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, votre indemnité de licenciement pour motif économique est: '.$result.' FCFA.');
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
            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                    '.$result
                );
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
            return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        '.$result
                    );
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
            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                            '.$result
                    );
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

            return redirect()
            ->back()
            ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, '.$result.'.
                    Passer ce délai, l\'employer doit d\'office vous reclasser dans le nouvel emploi occupé.'
                );

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

            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre Indemnité d\'interim est de '.$result.' FCFA.'
                    );
        }

        // Majoration des heures supplémentaires
        elseif($typeDroit == 'C_M_H_S')
        {
            if($majoration == null)
            {
                if($heure_supp <= 8)
                {
                    $result0 = ($heure_supp * ($salaire_hor * 15/100));
                    $result = number_format($result0,2);
                }
                else
                {
                    $result0 = ((8 * ($salaire_hor * 15/100)) + $heureSUP_supp8 * ($salaire_hor * 40/100));
                    $result = number_format($result0,2);
                }
            }
            elseif($majoration =='H_S_E_J_PJRHPF')
            {
                $result0 = $heure_supp * $salaire_hor;
                $result = number_format($result0,2);
            }
            elseif($majoration == 'H_S_E_N_PJRHPF')
            {
                $result0 = $heure_supp * ($salaire_hor * 60/100);
                $result = number_format($result0,2);
            }
            else{
                $result0 = $heure_supp * ($salaire_hor * 60/100);
                $result = number_format($result0,2);
            }

            return redirect()
                    ->back()
                    ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                            Votre majoration des heures supplémentaires est egale: '.$result.' FCFA.'
                        );
        }

        // Prime de panier (Article 53 de la CCNI)
        elseif($typeDroit == 'C_M_P_P')
        {
            if($prime_panier == 'J_E_M_6_HTN' || $prime_panier == 'J_E_10_H_I' || $prime_panier == 'J_E_3_H_P_H_N')
            {
                $result0 = 333.808 * 3 ;
                $result = number_format($result0,2);
            }
            else
            {
                $result0 = 0 ;
                $result = number_format($result0,2);
            }

            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre Prime de panier est egale a: '.$result.' FCFA.'
                    );
        }

        // Indemnité de fin de contrat à durée déterminée
        elseif($typeDroit == 'C_M_I_F_C_D_D')
        {
            $result0 = ($renumeration_due * 7) / 100;
            $result =  number_format($result0,2);

            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre indemnité de fin de contrat à durée déterminée est: '.$result.' FCFA.'
                    );
        }

        //Rappel de la prime de transport
        elseif($typeDroit == 'R_P_T')
        {
            $result = number_format(($salaire * $cumuleS) - 20800,2);
            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre rappel prime de transport est: <strong>'.$result.' FCFA</strong>.'
                    );
        }

        //Rappel de salaire
        elseif($typeDroit == 'R_S')
        {
            $result = number_format(($salaire_hor - $salaire) * $cumuleS,2);

            return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre Rappel de salaire est: <strong>'.$result.' FCFA</strong>.'
                    );
        }

        //Prime d’ancienneté
        elseif($typeDroit == 'P_A')
        {
            if($salaire < 2)
            {
                $result = 'Le Prime d’ancienneté n’est pas due';

                return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        '.$result.'.'
                    );
            }
            else
            {
                $result = $salaire.'% du salaire catégoriel pour chaque mois de la '.($salaire+1).'ème année';
                return redirect()
                ->back()
                ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                        Votre Prime d’ancienneté est de: '.$result.'.'
                    );
            }
        }

        else
        {
            $result0 = 0 ;
            $result =  number_format($result0,2);
        }

        return redirect()
            ->back()
            ->with('message', 'Salut <strong>'.ucfirst($full_name).' '.ucfirst($last_name).'</strong>, 
                    Votre indemnité compensatrice de préavis est égale à: '.$result.' FCFA.'
                );

    }

    public function calcul()
    {
        return view('frontend.pages.mesDroits.calcul-droit');
    }
}
