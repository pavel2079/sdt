<?php
namespace Sdt\TransferMietwagen\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use Sdt\TransferMietwagen\Domain\Model\Buchung;
use Sdt\TransferMietwagen\Domain\Model\Rdb;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/***
 *
 * This file is part of the "Transfer und Mietwagen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Stolberg <p.stolberg@gmx.de>
 *
 ***/
/**
 * BuchungController
 */
class BuchungController extends ActionController
{

    /**
     * buchungRepository
     *
     * @var \Sdt\TransferMietwagen\Domain\Repository\BuchungRepository
     * @inject
     */
    protected $buchungRepository = null;

    /**
     * @var \Sdt\TransferMietwagen\Domain\Repository\StadtRepository
     * @inject
     */
    protected $stadtRepository = null;

    /**
     * @var \Sdt\TransferMietwagen\Domain\Repository\FlughafenRepository
     * @inject
     */
    protected $flughafenRepository = null;

    /**
     * @var \Sdt\TransferMietwagen\Domain\Repository\AutoRepository
     * @inject
     */
    protected $autoRepository = null;

    private $lngf = 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang.xlf';


    /**
     * action mainFormular
     *
     * @return void
     */
    public function mainFormularAction() {

        $languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
        $sys_language_uid = $languageAspect->getId();
        $this->view->assign('currentSpracheUid', $sys_language_uid);
        //DebuggerUtility::var_dump($sys_language_uid);  //DebuggerUtility::var_dump($GLOBALS['TSFE']->sys_language_uid);
        $agent = $this->getNumAgent();
        $this->view->assign('agent', $agent);
        $arrAgentur = $this->getAgentur();
        if (isset($arrAgentur['fid'])) { $this->view->assign('agentur', $arrAgentur); $this->view->assign('fid', $arrAgentur['fid']); } else $this->view->assign('fid',0);
        $this->view->assign('flughafens', $this->flughafenRepository->getFlughafens());
        $this->view->assign('stadts', $this->stadtRepository->getStadts());
        $this->view->assign('autos', $this->autoRepository->getAutos());
        $errDaten = $this->request->getArguments();
        $this->view->assign('errDaten', $errDaten);
        $zeit = time();
        $minDate = $zeit + 2 * 86400;

        ## min start nach 48 Stunde 86400 * 2
        $this->view->assign('mindatum', date('d.m.Y', $minDate));
        $anydata = ceil($zeit / 17);

        ## Felder gegen Bote
        $this->view->assign('anydata_1', 'a' . $anydata);
        $this->view->assign('anydata_2', 'b' . $anydata);
        $this->view->assign('aktuelleZeit', $zeit);

        //$conf = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        //print_r($conf);
    }

    /**
     * action showStrecke
     *
     * @return void
     */
    public function showStreckeAction()
    {
        $ArrArguments = $this->request->getArguments();
        switch ($ArrArguments['type']) {
            case 1:
                $err = '';
                if (!isset($ArrArguments['from']) || trim($ArrArguments['from']) == '') {
                    $err = LocalizationUtility::translate($this->lngf.':LAB_LEERE_VON');
                }
                if (!isset($ArrArguments['to']) || trim($ArrArguments['to']) == '') {
                    $err .= ' '.LocalizationUtility::translate($this->lngf.':LAB_LEERE_NACH');
                }
                if (!isset($ArrArguments['event_start']) || trim($ArrArguments['event_start']) == '') {
                    $err .= ' '.LocalizationUtility::translate($this->lngf.':LAB_LEERE_DATUM');
                }
                if ($ArrArguments['to'] == 1 && (!isset($ArrArguments['event_zuruck']) || trim($ArrArguments['event_zuruck']) == '')) {
                    $err .= ' '.LocalizationUtility::translate($this->lngf.':LAB_LEERE_DATUM_ZURUCK');
                }
                if ($err) {
                    $this->addFlashMessage($err, '', AbstractMessage::ERROR, false);
                    $this->forward('mainFormular', 'Buchung', NULL, $ArrArguments);
                } else {
                    $this->view->assign('ArrArguments', $ArrArguments);

                    //$Autos = $this->autoRepository->findAll()->toArray();
                    $arrStrecke = $this->stadtRepository->createStrecke($ArrArguments['from'], $ArrArguments['to'], $ArrArguments['back']);
                    $this->view->assign('arrStrecke', $arrStrecke);
                    if ($arrStrecke['err']) {
                        $this->addFlashMessage($arrStrecke['err'], '', AbstractMessage::ERROR, false);
                        $this->forward('mainFormular', 'Buchung', NULL, $ArrArguments);
                    }

                    //$Autos = $this->autoRepository->findAll();
                    $arrAutos = $this->autoRepository->findAllMitTransferPreise($arrStrecke);
                    $this->view->assign('autos', $arrAutos);
                }
                break;
            case 0:
                $err = '';
                if (!isset($ArrArguments['event_start']) || trim($ArrArguments['event_start']) == '') {
                    $err = LocalizationUtility::translate($this->lngf.':LAB_LEERE_DATUM');
                }
                if ($err) {
                    $this->addFlashMessage($err, '', AbstractMessage::ERROR, false);
                    $this->forward('mainFormular', 'Buchung', NULL, $ArrArguments);
                } else {

                    //$GLOBAL['TSFE']->fe_user->setKey('ses', 'buch', $ArrArguments);
                    $this->redirect('formMietwagen', 'Buchung', NULL, $ArrArguments);
                }
                break;
        }

        $this->view->assign('agent', $ArrArguments['agent']);
        if (isset($ArrArguments['fid'])) {

          $this->view->assign('fid', $ArrArguments['fid']);
          $this->view->assign('username', $ArrArguments['username']);
          $this->view->assign('uscreate', $ArrArguments['uscreate']);
          $this->view->assign('usergroup', $ArrArguments['usergroup']);

        } else $this->view->assign('fid',0);
    }

    /**
     * action formTransfer
     *
     * @return void
     */
    public function formTransferAction()
    {
        $arrBuchung = array();
        $ArrArguments = $this->request->getArguments();
        $flughafens = $this->flughafenRepository->findAll();
        $arrBuchung['vonFlug'] = 0;
        $arrBuchung['zurFlug'] = 0;
        foreach ($flughafens as $flughafen) {

            ## Startpunkt oder Endpunkt?
            if (strcmp($flughafen->getNm(), trim($ArrArguments['from'])) == 0) {
                $arrBuchung['vonFlug'] = 1;
                break;
            } elseif (strcmp($flughafen->getNm(), trim($ArrArguments['to'])) == 0) {
                $arrBuchung['zurFlug'] = 1;
                break;
            }
        }
        if (!$arrBuchung['vonFlug'] && !$arrBuchung['zurFlug']) {
            $fluginfo = 0;
        } else {
            $fluginfo = 1;
        }
        $this->view->assign('fluginfo', $fluginfo);
        $this->view->assign('auto', $this->autoRepository->findByUid($ArrArguments['wagen']));
        if ($ArrArguments['back']) {
            $arrBuchung['distance'] = 2 * $ArrArguments['entfernung'];
            $arrBuchung['distance_2'] = 2 * $ArrArguments['hinMitWaluf'];
            $arrBuchung['grundpreis'] = (int) ($ArrArguments['trpreis'] / 2);
            $ArrArguments['grundpreis'] = $arrBuchung['grundpreis'];
        } else {
            $arrBuchung['distance'] = $ArrArguments['entfernung'];
            $arrBuchung['distance_2'] = $ArrArguments['hinMitWaluf'];
            $arrBuchung['grundpreis'] = (int) $ArrArguments['trpreis'];
            $ArrArguments['grundpreis'] = (int) $ArrArguments['trpreis'];
        }
        $this->view->assign('phoneKodes', $this->buchungRepository->getKode());

        if (isset($ArrArguments['fid'])) {
            $arrBuchung['fid'] = $ArrArguments['fid'];
            $this->view->assign('fid', $ArrArguments['fid']);
            $this->view->assign('username', $ArrArguments['username']);
            $this->view->assign('uscreate', $ArrArguments['uscreate']);
            $this->view->assign('usergroup', $ArrArguments['usergroup']);
        } else $this->view->assign('fid',0);

        $ArrArguments['provision'] = round($ArrArguments['trpreis'] * 0.15);
        $ArrArguments['offenerBetrag'] = $ArrArguments['trpreis'] - $ArrArguments['provision'];
        $arrBuchung['provision'] = $ArrArguments['provision'];

        $ArrArguments['zeitcontrol'] = time();
        $this->view->assign('ArrArguments', $ArrArguments);
        $this->view->assign('serBuchung', serialize($arrBuchung));
        $this->view->assign('agent', $ArrArguments['agent']);
    }

    /**
     * action formMietwagen
     *
     * @return void
     */
    public function formMietwagenAction()
    {
        $ArrArguments = $this->request->getArguments();
        //DebuggerUtility::var_dump($ArrArguments);

        $auto = $this->autoRepository->findByUid($ArrArguments['car']);
        $this->view->assign('auto', $auto);
        $preisAutoMiete = $auto->getPreis();
        $arrBuchung = array('grundpreis' => $preisAutoMiete);
        $ArrArguments['gesamtpreis'] = $ArrArguments['rent_time'] * $preisAutoMiete;

        $this->view->assign('phoneKodes', $this->buchungRepository->getKode());

        if (isset($ArrArguments['fid'])) {
            $arrBuchung['fid'] = $ArrArguments['fid'];
            $this->view->assign('fid', $ArrArguments['fid']);
            $this->view->assign('username', $ArrArguments['username']);
            $this->view->assign('uscreate', $ArrArguments['uscreate']);
            $this->view->assign('usergroup', $ArrArguments['usergroup']);
        } else $this->view->assign('fid',0);

        $ArrArguments['provision'] = round($ArrArguments['gesamtpreis'] * 0.15);
        $ArrArguments['offenerBetrag'] = $ArrArguments['gesamtpreis'] - $ArrArguments['provision'];
        $arrBuchung['provision'] = $ArrArguments['provision'];

        $ArrArguments['zeitcontrol'] = time();
        $this->view->assign('ArrArguments', $ArrArguments);
        $this->view->assign('serBuchung', serialize($arrBuchung));
        $this->view->assign('agent', $ArrArguments['agent']);
        if (isset($ArrArguments['fid'])) {

          $this->view->assign('fid', $ArrArguments['fid']);
          $this->view->assign('username', $ArrArguments['username']);
          $this->view->assign('uscreate', $ArrArguments['uscreate']);
          $this->view->assign('usergroup', $ArrArguments['usergroup']);

        } else $this->view->assign('fid',0);
    }

    /**
     * action reservierung
     *
     * @return void
     */
    public function reservierungAction()
    {
        $arrArguments = $this->request->getArguments();

        ## Prüfung, ob User noch einmal gleiche Buchung versucht auszuführen.
        $anz = $this->buchungRepository->countByZeitControl($arrArguments['zeitcontrol']);
        if ($anz) {
            $this->addFlashMessage(LocalizationUtility::translate($this->lngf.':fehlermeldung'), '', AbstractMessage::ERROR, false);
            $this->forward('mainFormular');
        }

        $buchung = GeneralUtility::makeInstance(Buchung::class);

        //DebuggerUtility::var_dump($arrArguments);
        if (isset($arrArguments['serBuchung'])) {

            $arrBuchung = unserialize(stripcslashes($arrArguments['serBuchung']));
            if (isset($arrBuchung['vonFlug'])) $buchung->setVonFlug($arrBuchung['vonFlug']);
            if (isset($arrBuchung['zurFlug'])) $buchung->setZurFlug($arrBuchung['zurFlug']);
            if (isset($arrBuchung['distance'])) $buchung->setDistance($arrBuchung['distance']);
            if (isset($arrBuchung['distance_2'])) $buchung->setDistanceErw($arrBuchung['distance_2']);
            if (isset($arrBuchung['grundpreis'])) $buchung->setGrundpreis($arrBuchung['grundpreis']);
        }

        // $arrAuto = $this->autoRepository->findByUid($arrArguments['car']);
        $buchung->setAid($arrArguments['car']);
        $startDate = explode(".", $arrArguments['event_start']);
        $startUhr = (int) $arrArguments['uhr'];
        $startMinuten = (int) $arrArguments['minuten'];

        ## Ankunft bei Transfer und Start bei Miete
        $buchung->setAb(mktime($startUhr, $startMinuten, 0, $startDate[1], $startDate[0], $startDate[2]));
        $startMKT = $buchung->getAb() - 3600;

        ## 1 Stunde braucht Fahrer für Fahrt von Garage zum Start
        $buchung->setStartMkt($startMKT);
        $buchung->setStart(date("Y-m-d H:i:s", $startMKT));

        switch ($arrArguments['type']) {
            case 1:

                ## Transfer
                $buchung->setArt(1);
                $buchung->setVon(trim($arrArguments['from']));
                $buchung->setNach(trim($arrArguments['to']));

                ## Abfahrtsadresse hin
                if (isset($arrArguments['VON_ADRESS'])) {
                    $buchung->setVonAdress(htmlspecialchars(trim($arrArguments['VON_ADRESS'])));
                }

                ## Ende Adresse
                if (isset($arrArguments['full_address'])) {
                    $buchung->setNachAdress(htmlspecialchars(trim($arrArguments['full_address'])));
                }

                ## Ende der Benutzung für Transfer
                ## 1 Stunde Wartezeit + 2 * Entfernung: bis 50 km 1 Stunde, > 50 км - Gesch. 80 km/St
                if ($arrArguments['KM'] < 50 || !isset($arrArguments['KM'])) {
                    $dorogaOjid = 3 * 3600;
                } else {
                    $dorogaOjid = (1 + ceil($arrArguments['KM'] / 80) * 2) * 3600;
                }

                if (trim($arrArguments['reis_number']) != '') {
                    $buchung->setFlugNr(htmlspecialchars(trim($arrArguments['reis_number'])));
                }

                ## Abflug. Datum und Uhrzeit
                $FlugUhr = (int) $arrArguments['FlugUhr'];
                $FlugMinuten = (int) $arrArguments['FlugMinuten'];
                $buchung->setFlugZeit(mktime($FlugUhr, $FlugMinuten, 0, $startDate[1], $startDate[0], $startDate[2]));
                if ($arrBuchung['zurFlug']) {

                    ## zum Flughafen
                    $buchung->setBis($buchung->getFlugZeit());
                    $buchung->setEnd(date("Y-m-d H:i:s", $buchung->getFlugZeit()));

                    ## Ende des Zeitraums in Format
                } else {
                    $bis = $buchung->getAb() + $dorogaOjid;

                    ## Ende des Zeitraums in Ziffer
                    $buchung->setBis($bis);
                    $buchung->setEnd(date("Y-m-d H:i:s", $bis));

                    ## Ende des Zeitraums in Format date
                }
                if ($arrArguments['back']) {
                    $buchung->setBack(1);
                    $buchung->setVonAdressZuruck(htmlspecialchars(trim($arrArguments['from_address_zuruck'])));

                    ## Abfart für Rückflug
                    $startDateZuruck = explode(".", $arrArguments['event_zuruck']);
                    $abfahrtUhrZuruck = (int) $arrArguments['abfahrtUhr'];
                    $abfahrtMinutenZuruck = (int) $arrArguments['abfahrtMinuten'];
                    $buchung->setAbzuruck(mktime($abfahrtUhrZuruck, $abfahrtMinutenZuruck, 0, $startDateZuruck[1], $startDateZuruck[0], $startDateZuruck[2]));
                    $startZuruckMkt = $buchung->getAbzuruck() - $dorogaOjid;

                    ## высчитываем начало занятости автомобиля для обратного пути Трансфера
                    $buchung->setStartZuruckMkt($startZuruckMkt);
                    $buchung->setStartZuruck(date("Y-m-d H:i:s", $startZuruckMkt));

                    ##  в формате для календаря в админке
                    if (trim($arrArguments['reis_zuruck']) != '') {
                        $buchung->setFlugNrZuruck(htmlspecialchars(trim($arrArguments['reis_zuruck'])));
                    }

                    ## дата и время вылета
                    $ruckFlugUhr = (int) $arrArguments['ruckFlugUhr'];
                    $ruckFlugMinuten = (int) $arrArguments['ruckFlugMinuten'];
                    $buchung->setFlugZeitZuruck(mktime($ruckFlugUhr, $ruckFlugMinuten, 0, $startDateZuruck[1], $startDateZuruck[0], $startDateZuruck[2]));
                    if ($arrBuchung['vonFlug']) {

                        ## Едем в аэропорт (на обратном пути)
                        $buchung->setBiszuruck($buchung->getFlugZeitZuruck());
                        $buchung->setEndZuruck(date("Y-m-d H:i:s", $buchung->getBiszuruck()));
                    } else {
                        $bisZuruck = $buchung->getAbzuruck() + $dorogaOjid;

                        ## конец периода в виде цифры
                        $buchung->setBiszuruck($bisZuruck);
                        $buchung->setEndZuruck(date("Y-m-d H:i:s", $bisZuruck));

                        ## конец периода в формате
                    }

                    ## адрес подачи автомобиля
                    if (isset($arrArguments['NACH_ADRESS_ZURUCK'])) {
                        $buchung->setNachAdressZuruck(htmlspecialchars(trim($arrArguments['NACH_ADRESS_ZURUCK'])));
                    }

                    ## адрес подачи автомобиля
                } else {
                    $buchung->setBack(0);
                }
                break;

            #################################################################################################
            case 0:

                ## Miete
                $buchung->setArt(2);
                $buchung->setVon($arrArguments['fromMiete']);
                $buchung->setRentTime($arrArguments['rent_time']);

                ## адрес подачи автомобиля
                if (isset($arrArguments['full_address'])) {
                    $buchung->setNachAdress(htmlspecialchars(trim($arrArguments['full_address'])));
                }

                ## высчитываем конец занятости автомобиля туда для аренды
                $bis = $buchung->getAb() + $buchung->getRentTime() * 3600;

                ## конец периода в виде цифры
                $buchung->setBis($bis);
                $buchung->setEnd(date("Y-m-d H:i:s", $bis));

                ## конец периода в формате
                break;
        }
        $buchung->setZeitControl($arrArguments['zeitcontrol']);
        $buchung->setPerson($arrArguments['pasengers']);
        $buchung->setKoffer($arrArguments['koffer']);
        $buchung->setName(htmlspecialchars(trim($arrArguments['name'])));
        if (isset($arrArguments['PhoneCode'])) {
            $buchung->setTelefon('+' . $arrArguments['PhoneCode'] . ' ' . htmlspecialchars(trim($arrArguments['tel'])));
        } else {
            $buchung->setTelefon(htmlspecialchars(trim($arrArguments['tel'])));
        }
        if (isset($arrArguments['schild'])) {
            $buchung->setSchild(htmlspecialchars(trim($arrArguments['schild'])));
        }
        $buchung->setEmail(htmlspecialchars(trim($arrArguments['email'])));
        if (isset($arrArguments['nameKunde'])) {
            $buchung->setNameKunde(htmlspecialchars(trim($arrArguments['nameKunde'])));
        }
        if (isset($arrArguments['telKunde'])) {
            $buchung->setTelKunde('+' . $arrArguments['PhoneCode2'] . ' ' . htmlspecialchars(trim($arrArguments['telKunde'])));
        }
        if (isset($arrArguments['emailKunde'])) {
            $buchung->setEmailKunde(htmlspecialchars(trim($arrArguments['emailKunde'])));
        }
        if (isset($arrArguments['child'])) {
            if (isset($arrArguments['child_sit'])) {
                $buchung->setKindersitz($arrArguments['child_sit']);
            }
        } else {
            $buchung->setKindersitz(0);
        }
        if (isset($arrArguments['comments']) && trim($arrArguments['comments']) != '') {
            $buchung->setKommentar(htmlspecialchars(trim($arrArguments['comments'])));
        }
        $buchung->setStatus(1);
        if (isset($arrArguments['zART'])) {
            $buchung->setZArt($arrArguments['zART']);
        }
        if (isset($arrArguments['zuschlag']) && $arrArguments['zuschlag'] == 15) {
            $buchung->setVorkasse(1);
        }
        $buchung->setSumma($arrArguments['GESAMTPREIS']);

        if ($arrBuchung['agent']) {

            $rowUS = $this->getUserFromAdm($arrBuchung['agent']);
            if (!empty($rowUS)) {

	            $buchung->setNameKunde($buchung->getName());
	            $buchung->setTelKunde($buchung->getTelefon());
	            $buchung->setEmailKunde($buchung->getEmail());

	            $buchung->setAgent($arrBuchung['agent']);
	            $buchung->setName($rowUS['name']);
	            $buchung->setTelefon($rowUS['telephone']);
	            $buchung->setEmail($rowUS['email']);

            } else $buchung->setAgent(0);
        }

        if (isset($arrArguments['fid']) && $arrArguments['fid']>0) {

            $rowUS = $this->getUserFromAdm($arrArguments['fid']);
            if (!empty($rowUS) && $arrArguments['uscreate']==$rowUS['crdate']) {

	            $buchung->setIdUser($arrArguments['fid']);
	            $buchung->setProvision($arrArguments['provision']);
	            if ($rowUS['mwst']) $buchung->setMwst($rowUS['mwst']);

            } else $buchung->setIdUser(0);
        }

        $this->buchungRepository->add($buchung);
        $this->objectManager->get(PersistenceManager::class)->persistAll();
        $last_id_buch = $buchung->getUid();
        $this->insToAdm($last_id_buch, $buchung);

	          //  DebuggerUtility::var_dump($last_id_buch);
	          //DebuggerUtility::var_dump($buchung);
	          //$massiv = array('last_id_buch' => $last_id_buch);
	          //$this->redirect('bestatigung', 'Buchung', NULL, $massiv);

        ## create PDF
        header('Location: https://admin.sdt-transfer.de/index.php?id=37&buch='.$last_id_buch.'&zc='.$arrArguments['zeitcontrol']);
    }


    /**
     * action bestatigung
     *
     * @return void
     */
    public function bestatigungAction() {

      $last_id_buch = $this->request->getArgument('idbuch');
      $this->view->assign('last_id_buch', $last_id_buch);

        if (!isset($last_id_buch)) {
            $err = 'Unbekannte Fehler!';
            $this->addFlashMessage($err, '', AbstractMessage::ERROR, false);
            $this->forward('mainFormular');
        }

      $neuBuchung = $this->buchungRepository->findByUid($last_id_buch);
      $this->view->assign('neuBuchung', $neuBuchung);

      $Wagen = $this->autoRepository->findByUid($neuBuchung->getAid());

            ## $CLEAN_SUMMA - сумма без коммиссии
            if ($neuBuchung->getVorkasse() == 15) {
                $CLEAN_SUMMA = $neuBuchung->getProvision();
            } else {
                $CLEAN_SUMMA = $neuBuchung->getSumma();
            }
            $this->view->assign('CLEAN_SUMMA', $CLEAN_SUMMA);
            $SUMMA = round(($CLEAN_SUMMA + 0.35) / 0.951);
            $this->view->assign('SUMMA', $SUMMA);
            $this->view->assign('GEBUHR', sprintf("%.2f", $SUMMA - $CLEAN_SUMMA));
            $this->view->assign('DATUM', date('d.m.Y', $neuBuchung->getAb()));
	            switch ($neuBuchung->getArt()) {
	              case 1:
                   $this->view->assign('ART', 'Transfer');
	                break;
	              case 2:
                   $this->view->assign('ART', 'Miete');
	                break;
	            }

       ## Text Mail
	   $inhalt = '<b>'.LocalizationUtility::translate($this->lngf.':Buchungsinformationen').'</b><br /><br />
		'.LocalizationUtility::translate($this->lngf.':Bestellung').' № '.$last_id_buch.'<br />
		'.LocalizationUtility::translate($this->lngf.':Art_der_Dienstleistung').': ';

		if ($neuBuchung->getArt()==2) { ## Automietung

		    $inhalt .= 'Automietung<br />';
			$inhalt .= LocalizationUtility::translate($this->lngf.':LAB_FAHRZEUG').': '.$Wagen->getKlass().', '.$Wagen->getName().'<br />
			'.LocalizationUtility::translate($this->lngf.':Standort').': '.$neuBuchung->getVon().'<br />'.LocalizationUtility::translate($this->lngf.':Stundenzahl').': '.$neuBuchung->getRentTime().'<br />';
		}
		elseif ($neuBuchung->getFlugNr()) {  ## Transfer Flughafen - Stadt

		     $inhalt .= 'Transfer<br />';
			 $inhalt .= LocalizationUtility::translate($this->lngf.':reisnr').': '.$neuBuchung->getFlugNr().'<br />
			 '.LocalizationUtility::translate($this->lngf.':Anreisedatum').': '.date('d.m.Y',$neuBuchung->getAb()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Ankunftszeit').': '.date('H:i',$neuBuchung->getAb()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Schild').': '.$neuBuchung->getSchild().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_FAHRZEUG').': '.$Wagen->getKlass().', '.$Wagen->getName().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ROUTE').'. '.LocalizationUtility::translate($this->lngf.':LAB_ROUTE_HIN').': '.$neuBuchung->getVon().' - '.$neuBuchung->getNach().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ADRESSE_FUR_FAHRZEUG').': '.$neuBuchung->getVonAdress().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ANKUNFT_ADRESSE').': '.$neuBuchung->getNachAdress().'<br />';

             if ($neuBuchung->getBack())
			 $inhalt .= '<br />'.LocalizationUtility::translate($this->lngf.':Ruckfahrt').': '.$neuBuchung->getNach().' - '.$neuBuchung->getVon().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_FLUGNR_ZURUCK').': '.$neuBuchung->getFlugNrZuruck().'<br />
			 '.LocalizationUtility::translate($this->lngf.':Ruckfahrtsdatum').': '.date('d.m.Y',$neuBuchung->getAbzuruck()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Abfahrtzeit').': '.date('H:i',$neuBuchung->getAbzuruck()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Abfahrtadresse').': '.$neuBuchung->getVonAdressZuruck().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ANKUNFT_ADRESSE').': '.$neuBuchung->getNachAdressZuruck().'<br />';
           }
		else {  ## Transfer Stadt - Stadt

		     $inhalt .= 'Transfer<br />';
			 $inhalt .= ''.LocalizationUtility::translate($this->lngf.':Anreisedatum').': '.date('d.m.Y',$neuBuchung->getAb()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Ankunftszeit').': '.date('H:i',$neuBuchung->getAb()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_FAHRZEUG').': '.$Wagen->getKlass().', '.$Wagen->getName().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ROUTE').'. '.LocalizationUtility::translate($this->lngf.':LAB_ROUTE_HIN').': '.$neuBuchung->getVon().' - '.$neuBuchung->getNach().'<br />
			 '.LocalizationUtility::translate($this->lngf.':Abfahrtadresse').': '.$neuBuchung->getVonAdress().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ANKUNFT_ADRESSE').': '.$neuBuchung->getNachAdress().'<br />';

             if ($neuBuchung->getBack())
			 $inhalt .= '<br />'.LocalizationUtility::translate($this->lngf.':Ruckfahrt').': '.$neuBuchung->getNach().' - '.$neuBuchung->getVon().'<br />
			 '.LocalizationUtility::translate($this->lngf.':Ruckfahrtsdatum').': '.date('d.m.Y',$neuBuchung->getAbzuruck()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Abfahrtzeit').': '.date('H:i',$neuBuchung->getAbzuruck()).'<br />
			 '.LocalizationUtility::translate($this->lngf.':Abfahrtadresse').': '.$neuBuchung->getNachAdress().'<br />
			 '.LocalizationUtility::translate($this->lngf.':LAB_ANKUNFT_ADRESSE').': '.$neuBuchung->getNachAdressZuruck().'<br />';
        }

		    $inhalt .= '<br />';

            switch ($neuBuchung->getKindersitz()) {
              case 0:
		          $inhalt .= LocalizationUtility::translate($this->lngf.':LAB_KINDERSITZ').': '.LocalizationUtility::translate($this->lngf.':LAB_NEIN').'<br />';
                break;
              case 1:
		          $inhalt .= LocalizationUtility::translate($this->lngf.':LAB_KINDERSITZ').': '.LocalizationUtility::translate($this->lngf.':LAB_JA').' '.LocalizationUtility::translate($this->lngf.':GEWICHT').' 9–18 kg<br />';
                break;
              case 2:
		          $inhalt .= LocalizationUtility::translate($this->lngf.':LAB_KINDERSITZ').': '.LocalizationUtility::translate($this->lngf.':LAB_JA').' '.LocalizationUtility::translate($this->lngf.':GEWICHT').' 13–36 kg<br />';
                break;
            }

		$inhalt .= LocalizationUtility::translate($this->lngf.':Bemerkung').': '.$neuBuchung->getKommentar().'<br />
		'.LocalizationUtility::translate($this->lngf.':PAX').': '.$neuBuchung->getPerson().'<br />
		'.LocalizationUtility::translate($this->lngf.':Kunde').': '.$neuBuchung->getName().'<br />
		'.LocalizationUtility::translate($this->lngf.':Telefon_des_Kunden').': '.$neuBuchung->getTelefon().'<br />';

       ## send Mail
       $mail = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
       ## attachment:
       $attachment1 = \Swift_Attachment::fromPath('https://admin.sdt-transfer.de/uploads/pdf/Rechnung_'.$last_id_buch.'.pdf');
       $attachment1->setFilename('Rechnung_'.$last_id_buch.'.pdf');
       $attachment2 = \Swift_Attachment::fromPath('https://admin.sdt-transfer.de/uploads/pdfVoucher/Voucher_'.$last_id_buch.'.pdf');
       $attachment2->setFilename('Voucher_'.$last_id_buch.'.pdf');
       $attachment3 = \Swift_Attachment::fromPath('https://admin.sdt-transfer.de/uploads/pdfKunde/Rechnung_'.$last_id_buch.'.pdf');
       $attachment3->setFilename('Rechnung_'.$last_id_buch.'.pdf');

        if ($neuBuchung->getIdUser() > 0)  { ## Agentur

            $rowAgentur = $this->getUserFromAdm($neuBuchung->getIdUser());

			    $inhalt .= '
				'.LocalizationUtility::translate($this->lngf.':Kunde').': '.$neuBuchung->getNameKunde().'<br />
				'.LocalizationUtility::translate($this->lngf.':Telefon_des_Kunden').': '.$neuBuchung->getTelKunde().'<br />
				'.LocalizationUtility::translate($this->lngf.':Email_Kunde').': '.$neuBuchung->getEmailKunde().'<br />';

	            $inhaltKunde = LocalizationUtility::translate($this->lngf.':Sehr_geehrte').' '.$neuBuchung->getNameKunde().'. '.LocalizationUtility::translate($this->lngf.':Vielen_Dank').'!<br /><br />'.$inhalt.'<br /><br />
	                '.LocalizationUtility::translate($this->lngf.':MfG').'<br />'.$rowAgentur['name'].'<br />'.$rowAgentur['address'].'<br />'.$rowAgentur['zip'].' '.$rowAgentur['city'].'<br />
					'.LocalizationUtility::translate($this->lngf.':Telefon').': '.$rowAgentur['telephone'].'<br />
					Fax: '.$rowAgentur['fax'].'<br />
					Email: '.$rowAgentur['email'];

			     $inhaltAgentura = LocalizationUtility::translate($this->lngf.':Sehr_geehrte').' '.$neuBuchung->getName().'. '.LocalizationUtility::translate($this->lngf.':Vielen_Dank').'!<br />
			     '.LocalizationUtility::translate($this->lngf.':mitteilung_Agentura').'
			     <br /><br />'.$inhalt.'<br /><br />
			     '.LocalizationUtility::translate($this->lngf.':MfG').'<br />SDT Transfer<br />Im Grohenstuck 1<br />65396 Walluf<br />
			     Telefon: +49 6123 50 34 117, +49 6123 50 34 119<br />Fax: +49 6123 50 34 118<br />
					Email: info@sdt-transfer.de';

	        $mail->setSubject('Buchung Nr. '.$last_id_buch);
	        $mail->setFrom(array('buchung@sdt-transfer.de' => 'SDT Transfer'));
		    $mail->addPart($inhaltKunde, 'text/html');
            $mail->attach($attachment2);
            $mail->attach($attachment3);
            $mail->setTo(array($neuBuchung->getEmailKunde() => 'Endkunde'));
            $mail->send();

            $mail2 = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
	        $mail2->setSubject('Buchung Nr. '.$last_id_buch);
	        $mail2->setFrom(array('buchung@sdt-transfer.de' => 'SDT Transfer'));
		    $mail2->addPart($inhaltAgentura, 'text/html');
            $mail2->attach($attachment1);
            $mail2->attach($attachment2);
            $mail2->setTo(array($neuBuchung->getEmail() => 'Auftragsteller'));
            $mail2->send();
             //$mail->setTo(array('info@sdt-transfer.de', 'p.stolberg@gmx.de' => 'Administrator'));
        }
        elseif ($neuBuchung->getAgent() > 0)  { ## Referer

            $rowAgentur = $this->getUserFromAdm($neuBuchung->getAgent());

			    $inhalt .= '
				'.LocalizationUtility::translate($this->lngf.':Kunde').': '.$neuBuchung->getNameKunde().'<br />
				'.LocalizationUtility::translate($this->lngf.':Telefon_des_Kunden').': '.$neuBuchung->getTelKunde().'<br />
				'.LocalizationUtility::translate($this->lngf.':Email_Kunde').': '.$neuBuchung->getEmailKunde().'<br />';

	            $inhaltKunde = LocalizationUtility::translate($this->lngf.':Sehr_geehrte').' '.$neuBuchung->getNameKunde().'. '.LocalizationUtility::translate($this->lngf.':Vielen_Dank').'!<br /><br />'.$inhalt.'<br /><br />
	                '.LocalizationUtility::translate($this->lngf.':MfG').'<br />'.$rowAgentur['name'].'<br />'.$rowAgentur['address'].'<br />'.$rowAgentur['zip'].' '.$rowAgentur['city'].'<br />
					'.LocalizationUtility::translate($this->lngf.':Telefon').': '.$rowAgentur['telephone'].'<br />
					Fax: '.$rowAgentur['fax'].'<br />
					Email: '.$rowAgentur['email'];

			     $inhaltAgentura = LocalizationUtility::translate($this->lngf.':Sehr_geehrte').' '.$neuBuchung->getName().'. '.LocalizationUtility::translate($this->lngf.':Vielen_Dank').'!<br />
			     '.LocalizationUtility::translate($this->lngf.':mitteilung_Agentura').'
			     <br /><br />'.$inhalt.'<br /><br />
			     '.LocalizationUtility::translate($this->lngf.':MfG').'<br />SDT Transfer<br />Im Grohenstuck 1<br />65396 Walluf<br />
			     Telefon: +49 6123 50 34 117, +49 6123 50 34 119<br />Fax: +49 6123 50 34 118<br />
					Email: info@sdt-transfer.de';

	        $mail->setSubject('Buchung Nr. '.$last_id_buch);
	        $mail->setFrom(array('buchung@sdt-transfer.de' => 'SDT Transfer'));
		    $mail->addPart($inhaltKunde, 'text/html');
            $mail->attach($attachment2);
            $mail->attach($attachment3);
            $mail->setTo(array($neuBuchung->getEmailKunde() => 'Endkunde'));
            $mail->send();

            $mail2 = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
	        $mail2->setSubject('Buchung Nr. '.$last_id_buch);
	        $mail2->setFrom(array('buchung@sdt-transfer.de' => 'SDT Transfer'));
		    $mail2->addPart($inhaltAgentura, 'text/html');
            $mail2->attach($attachment1);
            $mail2->attach($attachment2);
            $mail2->setTo(array($neuBuchung->getEmail() => 'Auftragsteller'));
            $mail2->send();
             //$mail->setTo(array('info@sdt-transfer.de', 'p.stolberg@gmx.de' => 'Administrator'));
        }
        else { ## Endkunde

	            $inhaltKunde = LocalizationUtility::translate($this->lngf.':Sehr_geehrte').' '.$neuBuchung->getName().'. '.LocalizationUtility::translate($this->lngf.':Vielen_Dank').'!<br /><br />
	              '.LocalizationUtility::translate($this->lngf.':mitteilung_Endkunde').'<br /><br />
	              '.$inhalt.'<br /><br />
	              '.LocalizationUtility::translate($this->lngf.':MfG').'<br />SDT Transfer<br />Im Grohenstuck 1<br />65396 Walluf<br />
			     Telefon: +49 6123 50 34 117, +49 6123 50 34 119<br />Fax: +49 6123 50 34 118<br />
					Email: info@sdt-transfer.de';

	        $mail->setSubject('Buchung Nr. '.$last_id_buch);
	        $mail->setFrom(array('buchung@sdt-transfer.de' => 'SDT Transfer'));
		    $mail->addPart($inhaltKunde, 'text/html');
            $mail->attach($attachment1);
            $mail->attach($attachment2);
            $mail->setTo(array($neuBuchung->getEmail() => 'Endkunde'));
            $mail->send();
        }

        //$GLOBALS['TSFE']->fe_user->removeSessionData(); // session_destroy();
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $buchungs = $this->buchungRepository->findAll();
        $this->view->assign('buchungs', $buchungs);
    }

    /**
     * action show
     *
     * @param \Sdt\TransferMietwagen\Domain\Model\Buchung $buchung
     * @return void
     */
    public function showAction(Buchung $buchung)
    {
        $this->view->assign('buchung', $buchung);
    }

    /**
     * action edit
     *
     * @param \Sdt\TransferMietwagen\Domain\Model\Buchung $buchung
     * @ignorevalidation $buchung
     * @return void
     */
    public function editAction(\Sdt\TransferMietwagen\Domain\Model\Buchung $buchung)
    {
        $this->view->assign('buchung', $buchung);
    }

    /**
     * action update
     *
     * @param \Sdt\TransferMietwagen\Domain\Model\Buchung $buchung
     * @return void
     */
    public function updateAction(\Sdt\TransferMietwagen\Domain\Model\Buchung $buchung)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->buchungRepository->update($buchung);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Sdt\TransferMietwagen\Domain\Model\Buchung $buchung
     * @return void
     */
    public function deleteAction(\Sdt\TransferMietwagen\Domain\Model\Buchung $buchung)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->buchungRepository->remove($buchung);
        $this->redirect('list');
    }

    /**
     * action editZahlung
     *
     * @return void
     */
    public function editZahlungAction()
    {
    }

    /**
     * action editStrecke
     *
     * @return void
     */
    public function editStreckeAction()
    {
    }

    /**
     * action provision
     *
     * @return void
     */
    public function provisionAction()
    {
    }

    /**
     * action leistungen
     *
     * @return void
     */
    public function leistungenAction()
    {
    }

    /**
     * action besteller
     *
     * @return void
     */
    public function bestellerAction()
    {
    }

    /**
     * action fahrer
     *
     * @return void
     */
    public function fahrerAction()
    {
    }


    public function getUserFromAdm($fid) {

        $db = new Rdb('sql529.your-server.de', 'sdtere_5', '88888888888', 'sdtere_db5');
        $res = $db->Query("SELECT * FROM fe_users WHERE uid='".$fid."'");
        $row = mysqli_fetch_array($res);
        //   DebuggerUtility::var_dump($row);
        //mysql_close();
        return $row;
    }



    public function insToAdm($last_id_buch, $objBuchung) {

        $db = new Rdb('sql529.your-server.de', 'sdtere_5', '88888888888', 'sdtere_db5');

        $buchung = array(
            'id' => $last_id_buch,
            'date_create' => time(),
            'UID' => $objBuchung->getIdUser(),
            'name' => $objBuchung->getName(),
            'nameKunde' => $objBuchung->getNameKunde(),
            'telefon' => $objBuchung->getTelefon(),
            'telKunde' => $objBuchung->getTelKunde(),
            'email' => $objBuchung->getEmail(),
            'emailKunde' => $objBuchung->getEmailKunde(),
            'adresse' => $objBuchung->getAdresse(),
            'staat' => $objBuchung->getStaat(),
            'stadt' => $objBuchung->getStadt(),
            'plz' => $objBuchung->getPlz(),
            'ZEIT_CONTROL' => $objBuchung->getZeitControl(),
            'start' => $objBuchung->getStart(),
            'end' => $objBuchung->getEnd(),
            'startMKT' => $objBuchung->getStartMkt(),
            'startZuruck' => $objBuchung->getStartZuruck(),
            'endZuruck' => $objBuchung->getEndZuruck(),
            'startZuruckMKT' => $objBuchung->getStartZuruckMkt(),
            'ab' => $objBuchung->getAb(),
            'abzuruck' => $objBuchung->getAbzuruck(),
            'bis' => $objBuchung->getBis(),
            'biszuruck' => $objBuchung->getBiszuruck(),
            'VON' => $objBuchung->getVon(),
            'VON_ADRESS' => $objBuchung->getVonAdress(),
            'VON_ADRESS_ZURUCK' => $objBuchung->getVonAdressZuruck(),
            'NACH' => $objBuchung->getNach(),
            'NACH_ADRESS' => $objBuchung->getNachAdress(),
            'NACH_ADRESS_ZURUCK' => $objBuchung->getNachAdressZuruck(),
            'TRANSFER_ID' => $objBuchung->getAid(),
            'distance' => $objBuchung->getDistance(),
            'distance_2' => $objBuchung->getDistanceErw(),
            'ART' => $objBuchung->getArt(),
            'zART' => $objBuchung->getZArt(),
            'back' => $objBuchung->getBack(),
            'person' => $objBuchung->getPerson(),
            'koffer' => $objBuchung->getKoffer(),
            'rent_time' => $objBuchung->getRentTime(),
            'Kindersitz' => $objBuchung->getKindersitz(),
            'vonFlug' => $objBuchung->getVonFlug(),
            'zurFlug' => $objBuchung->getZurFlug(),
            'flugNr' => $objBuchung->getFlugNr(),
            'flugZeit' => $objBuchung->getFlugZeit(),
            'flugNrZuruck' => $objBuchung->getFlugNrZuruck(),
            'flugZeitZuruck' => $objBuchung->getFlugZeitZuruck(),
            'grundpreis' => $objBuchung->getGrundpreis(),
            'summa' => $objBuchung->getSumma(),
            'provision' => $objBuchung->getProvision(),
            'MWST' => $objBuchung->getMwst(),
            'BEZAHLT' => $objBuchung->getBezahlt(),
            'vorkasse' => $objBuchung->getVorkasse(),
            'schild' => $objBuchung->getSchild(),
            'status' => $objBuchung->getStatus(),
            'kommentar' => $objBuchung->getKommentar(),
            'AGENT' => $objBuchung->getAgent()
        );
        //   DebuggerUtility::var_dump($buchung);
        $db->Query("INSERT INTO w_reservierung (`".implode('`,`', array_keys($buchung))."`) VALUES ('".implode('\',\'', $buchung)."')");
        //mysql_close();
    }


    public function getNumAgent()
    {
        session_start();
        if (isset($_GET['se']) && is_numeric($_GET['se']) && $_GET['se'] > 0) {

         $agent = $_GET['se'];
         $_SESSION['agent'] = $agent;

        }
        elseif (isset($_SESSION['agent'])) $agent = $_SESSION['agent'];
        else $agent = 0;

        return $agent;
    }


    public function getAgentur() {

        session_start();
        $arrAgentur = array();

        if (isset($_POST['fid']) && $_POST['fid'] > 0) {

         $arrAgentur['fid'] = $_POST['fid'];
         if (isset($_POST['username'])) $arrAgentur['username'] = $_POST['username'];
         if (isset($_POST['uscreate'])) $arrAgentur['uscreate'] = $_POST['uscreate'];
         if (isset($_POST['usergroup'])) $arrAgentur['usergroup'] = $_POST['usergroup'];

         $_SESSION['agentur'] = $arrAgentur;

        }
        elseif (isset($_SESSION['agentur'])) $arrAgentur = $_SESSION['agentur'];

        return $arrAgentur;
    }

}
