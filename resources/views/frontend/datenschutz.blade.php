@extends('layouts.main')

@section('title', 'Datenschutzerklärung')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Dies ist unsere Datenschutzerklärung.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')

@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                    <li>{{ __('Datenschutz-Bestimmungen') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ __('Datenschutzerklärung') }}</h2>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Datenschutz</h2>
                        <p>Wir informieren Sie nachfolgend gemäß den gesetzlichen Vorgaben des Datenschutzrechts (insb.
                            gemäß BDSG n.F. und der europäischen Datenschutz-Grundverordnung ‚DS-GVO‘) über die Art, den
                            Umfang und Zweck der Verarbeitung personenbezogener Daten durch unser Unternehmen. Diese
                            Datenschutzerklärung gilt auch für unsere Websites und Sozial-Media-Profile. Bezüglich der
                            Definition von Begriffen wie etwa „personenbezogene Daten“ oder „Verarbeitung“ verweisen wir
                            auf Art. 4 DS-GVO.</p>
                        <strong>Name und Kontaktdaten des / der Verantwortlichen</strong><br/>
                        Unser/e Verantwortliche/r (nachfolgend „Verantwortlicher“) i.S.d. Art. 4 Zif. 7 DS-GVO ist:<br/>
                        <br/>{{ env('TTF_NAME') }} (Verein/Club)
                        <br/>{{ env('TTF_STRASSE') }}
                        <br/>{{ env('TTF_ORT') }}, Deutschland
                        <br/>Vertretungsberechtigt: {{ env('TTF_NAME1') }}
                        <br/>Fax: {{ env('TTF_FAX') }}
                        <br/>E-Mail-Adresse:
                        {{ env('TTF_EMAIL') }}<br/><br/><strong>Datenarten, Zwecke der Verarbeitung und
                            Kategorien betroffener Personen</strong><br/>
                        <p>Nachfolgend informieren wir Sie über Art, Umfang und Zweck der Erhebung, Verarbeitung und
                            Nutzung personenbezogener Daten.</p>
                        <strong>1. Arten der Daten, die wir verarbeiten</strong><br/>Nutzungsdaten (Zugriffszeiten,
                        besuchte Websites etc.), Bestandsdaten (Name, Adresse etc.), Kontaktdaten (Telefonnummer,
                        E-Mail, Fax etc.), Inhaltsdaten (Texteingaben, Videos, Fotos etc.), Kommunikationsdaten
                        (IP-Adresse etc.), <br/>
                        <br/>
                        <strong>2. Zwecke der Verarbeitung nach Art. 13 Abs. 1 c) DS-GVO</strong><br/>Nutzererfahrung
                        verbessern, Website benutzerfreundlich gestalten, Vermeidung von SPAM und Missbrauch,
                        Kontaktanfragen abwickeln, Websites mit Funktionen und Inhalten bereitstellen<br/>
                        <br/>
                        <strong>3. Kategorien der betroffenen Personen nach Art. 13 Abs. 1 e) DS-GVO</strong><br/>Besucher/Nutzer
                        der Website, Interessenten, <br/>
                        <br/>
                        <p>Die betroffenen Personen werden zusammenfassend als „Nutzer“ bezeichnet.</p>
                        <br/>

                        <strong>Rechtsgrundlagen der Verarbeitung personenbezogener Daten</strong>
                        <p>Nachfolgend Informieren wir Sie über die Rechtsgrundlagen der Verarbeitung personenbezogener
                            Daten:</p>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wenn wir Ihre Einwilligung für die Verarbeitung personenbezogenen Daten eingeholt haben,
                                ist Art. 6 Abs. 1 S. 1 lit. a) DS-GVO Rechtsgrundlage.
                            </li>
                            <li>Ist die Verarbeitung zur Erfüllung eines Vertrags oder zur Durchführung vorvertraglicher
                                Maßnahmen erforderlich, die auf Ihre Anfrage hin erfolgen, so ist Art. 6 Abs. 1 S. 1
                                lit. b) DS-GVO Rechtsgrundlage.
                            </li>
                            <li>Ist die Verarbeitung zur Erfüllung einer rechtlichen Verpflichtung erforderlich, der wir
                                unterliegen (z.B. gesetzliche Aufbewahrungspflichten), so ist Art. 6 Abs. 1 S. 1 lit. c)
                                DS-GVO Rechtsgrundlage.
                            </li>
                            <li>Ist die Verarbeitung erforderlich, um lebenswichtige Interessen der betroffenen Person
                                oder einer anderen natürlichen Person zu schützen, so ist Art. 6 Abs. 1 S. 1 lit. d)
                                DS-GVO Rechtsgrundlage.
                            </li>
                            <li>Ist die Verarbeitung zur Wahrung unserer oder der berechtigten Interessen eines Dritten
                                erforderlich und überwiegen diesbezüglich Ihre Interessen oder Grundrechte und
                                Grundfreiheiten nicht, so ist Art. 6 Abs. 1 S. 1 lit. f) DS-GVO Rechtsgrundlage.
                            </li>
                        </ol>
                        <br/>
                        <strong>Weitergabe personenbezogener Daten an Dritte und Auftragsverarbeiter</strong>
                        <p>Ohne Ihre Einwilligung geben wir grundsätzlich keine Daten an Dritte weiter. Sollte dies doch
                            der Fall sein, dann erfolgt die Weitergabe auf der Grundlage der zuvor genannten
                            Rechtsgrundlagen z.B. bei der Weitergabe von Daten an Online-Paymentanbieter zur
                            Vertragserfüllung oder aufgrund gerichtlicher Anordnung oder wegen einer gesetzlichen
                            Verpflichtung zur Herausgabe der Daten zum Zwecke der Strafverfolgung, zur Gefahrenabwehr
                            oder zur Durchsetzung der Rechte am geistigen Eigentum.<br/>
                            Wir setzen zudem Auftragsverarbeiter (externe Dienstleister z.B. zum Webhosting unserer
                            Websites und Datenbanken) zur Verarbeitung Ihrer Daten ein. Wenn im Rahmen einer
                            Vereinbarung zur Auftragsverarbeitung an die Auftragsverarbeiter Daten weitergegeben werden,
                            erfolgt dies immer nach Art. 28 DS-GVO. Wir wählen dabei unsere Auftragsverarbeiter
                            sorgfältig aus, kontrollieren diese regelmäßig und haben uns ein Weisungsrecht hinsichtlich
                            der Daten einräumen lassen. Zudem müssen die Auftragsverarbeiter geeignete technische und
                            organisatorische Maßnahmen getroffen haben und die Datenschutzvorschriften gem. BDSG n.F.
                            und DS-GVO einhalten</p>

                        <br/>
                        <strong>Datenübermittlung in Drittstaaten</strong>
                        <p>Durch die Verabschiedung der europäischen Datenschutz-Grundverordnung (DS-GVO) wurde eine
                            einheitliche Grundlage für den Datenschutz in Europa geschaffen. Ihre Daten werden daher
                            vorwiegend durch Unternehmen verarbeitet, für die DS-GVO Anwendung findet. Sollte doch die
                            Verarbeitung durch Dienste Dritter außerhalb der Europäischen Union oder des Europäischen
                            Wirtschaftsraums stattfinden, so müssen diese die besonderen Voraussetzungen der Art. 44 ff.
                            DS-GVO erfüllen. Das bedeutet, die Verarbeitung erfolgt aufgrund besonderer Garantien, wie
                            etwa die von der EU-Kommission offiziell anerkannte Feststellung eines der EU entsprechenden
                            Datenschutzniveaus oder der Beachtung offiziell anerkannter spezieller vertraglicher
                            Verpflichtungen, der so genannten „Standardvertragsklauseln“.<br/>Soweit wir aufgrund der
                            Unwirksamkeit des sog. „Privacy Shields“, nach Art. 49 Abs. 1 S. 1 lit. a) DSGVO die
                            ausdrückliche Einwilligung in die Datenübermittlung in die USA von Ihnen einholen, weisen
                            wird diesbezüglich auf das Risiko eines geheimen Zugriffs durch US-Behörden und die Nutzung
                            der Daten zu Überwachungszwecken, ggf. ohne Rechtsbehelfsmöglichkeiten für EU-Bürger, hin.
                        </p>

                        <br/>
                        <strong>Löschung von Daten und Speicherdauer</strong>
                        <p>Sofern nicht in dieser Datenschutzerklärung ausdrücklich angegeben, werden Ihre
                            personenbezogen Daten gelöscht oder gesperrt, sobald die zur Verarbeitung erteilte
                            Einwilligung von Ihnen widerrufen wird oder der Zweck für die Speicherung entfällt bzw. die
                            Daten für den Zweck nicht mehr erforderlich sind, es sei denn deren weitere Aufbewahrung ist
                            zu Beweiszwecken erforderlich oder dem stehen gesetzliche Aufbewahrungspflichten
                            entgegenstehen. Darunter fallen etwa handelsrechtliche Aufbewahrungspflichten von
                            Geschäftsbriefen nach § 257 Abs. 1 HGB (6 Jahre) sowie steuerrechtliche
                            Aufbewahrungspflichten nach § 147 Abs. 1 AO von Belegen (10 Jahre). Wenn die vorgeschriebene
                            Aufbewahrungsfrist abläuft, erfolgt eine Sperrung oder Löschung Ihrer Daten, es sei denn die
                            Speicherung ist weiterhin für einen Vertragsabschluss oder zur Vertragserfüllung
                            erforderlich.</p>

                        <br/>
                        <strong>Bestehen einer automatisierten Entscheidungsfindung</strong>
                        <p>Wir setzen keine automatische Entscheidungsfindung oder ein Profiling ein.</p>

                        <br/>
                        <strong>Bereitstellung unserer Website und Erstellung von Logfiles</strong>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wenn Sie unsere Webseite lediglich informatorisch nutzen (also keine Registrierung und
                                auch keine anderweitige Übermittlung von Informationen), erheben wir nur die
                                personenbezogenen Daten, die Ihr Browser an unseren Server übermittelt. Wenn Sie unsere
                                Website betrachten möchten, erheben wir die folgenden Daten:<br/>
                                • IP-Adresse;<br/>
                                • Internet-Service-Provider des Nutzers;<br/>
                                • Datum und Uhrzeit des Abrufs;<br/>
                                • Browsertyp;<br/>
                                • Sprache und Browser-Version;<br/>
                                • Inhalt des Abrufs;<br/>
                                • Zeitzone;<br/>
                                • Zugriffsstatus/HTTP-Statuscode;<br/>
                                • Datenmenge;<br/>
                                • Websites, von denen die Anforderung kommt;<br/>
                                • Betriebssystem.<br/>
                                Eine Speicherung dieser Daten zusammen mit anderen personenbezogenen Daten von Ihnen
                                findet nicht statt.<br/><br/>
                            </li>
                            <li>Diese Daten dienen dem Zweck der nutzerfreundlichen, funktionsfähigen und sicheren
                                Auslieferung unserer Website an Sie mit Funktionen und Inhalten sowie deren Optimierung
                                und statistischen Auswertung.<br/><br/></li>
                            <li>Rechtsgrundlage hierfür ist unser in den obigen Zwecken auch liegendes berechtigtes
                                Interesse an der Datenverarbeitung nach Art. 6 Abs. 1 S.1 lit. f) DS-GVO.<br/><br/></li>
                            <li>Wir speichern aus Sicherheitsgründen diese Daten in Server-Logfiles für die
                                Speicherdauer von 7 Tagen. Nach Ablauf dieser Frist werden diese automatisch gelöscht,
                                es sei denn wir benötigen deren Aufbewahrung zu Beweiszwecken bei Angriffen auf die
                                Serverinfrastruktur oder anderen Rechtsverletzungen.<br/></li>
                        </ol>
                        <br/>
                        <strong>Cookies</strong>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir verwenden sog. Cookies bei Ihrem Besuch unserer Website. Cookies sind kleine
                                Textdateien, die Ihr Internet-Browser auf Ihrem Rechner ablegt und speichert. Wenn Sie
                                unsere Website erneut aufrufen, geben diese Cookies Informationen ab, um Sie automatisch
                                wiederzuerkennen. Zu den Cookies zählen auch die sog. „Nutzer-IDs“, wo Angaben der
                                Nutzer mittels pseudonymisierter Profile gespeichert werden. Wir informieren Sie dazu
                                beim Aufruf unserer Website mittels eines Hinweises auf unsere Datenschutzerklärung über
                                die Verwendung von Cookies zu den zuvor genannten Zwecken und wie Sie dieser
                                widersprechen bzw. deren Speicherung verhindern können („Opt-out“).<br/><br/>
                                <strong>Es werden folgende Cookie-Arten unterschieden:</strong><br/><br/>
                                <strong>• Notwendige, essentielle Cookies:</strong> Essentielle Cookies sind Cookies,
                                die zum Betrieb der Webseite unbedingt erforderlich sind, um bestimmte Funktionen der
                                Webseite wie Logins, Warenkorb oder Nutzereingaben z.B. bzgl. Sprache der Webseite zu
                                speichern.<br/><br/>
                                <strong>• Session-Cookies:</strong> Session-Cookies werden zum Wiedererkennen mehrfacher
                                Nutzung eines Angebots durch denselben Nutzer (z.B. wenn Sie sich eingeloggt haben zur
                                Feststellung Ihres Login-Status) benötigt. Wenn Sie unsere Seite erneut aufrufen, geben
                                diese Cookies Informationen ab, um Sie automatisch wiederzuerkennen. Die so erlangten
                                Informationen dienen dazu, unsere Angebote zu optimieren und Ihnen einen leichteren
                                Zugang auf unsere Seite zu ermöglichen. Wenn Sie den Browser schließen oder Sie sich
                                ausloggen, werden die Session-Cookies gelöscht.<br/><br/>
                                <strong>• Persistente Cookies:</strong> Diese Cookies bleiben auch nach dem Schließen
                                des Browsers gespeichert. Sie dienen zur Speicherung des Logins, der Reichweitenmessung
                                und zu Marketingzwecken. Diese werden automatisiert nach einer vorgegebenen Dauer
                                gelöscht, die sich je nach Cookie unterscheiden kann. In den Sicherheitseinstellungen
                                Ihres Browsers können Sie die Cookies jederzeit löschen.<br/><br/>
                                <strong>• Cookies von Drittanbietern (Third-Party-Cookies insb. von
                                    Werbetreibenden):</strong> Entsprechend Ihren Wünschen können Sie können Ihre
                                Browser-Einstellung konfigurieren und z. B. Die Annahme von Third-Party-Cookies oder
                                allen Cookies ablehnen. Wir weisen Sie jedoch an dieser Stelle darauf hin, dass Sie dann
                                eventuell nicht alle Funktionen dieser Website nutzen können. Lesen Sie Näheres zu
                                diesen Cookies bei den jeweiligen Datenschutzerklärungen zu den
                                Drittanbietern.<br/><br/>
                            </li>
                            <li><strong>Datenkategorien:</strong> Nutzerdaten, Cookie, Nutzer-ID (inb. die besuchten
                                Seiten, Geräteinformationen, Zugriffszeiten und IP-Adressen).<br/><br/></li>
                            <li><strong>Zwecke der Verarbeitung:</strong> Die so erlangten Informationen dienen dem
                                Zweck, unsere Webangebote technisch und wirtschaftlich zu optimieren und Ihnen einen
                                leichteren und sicheren Zugang auf unsere Website zu ermöglichen.<br/><br/></li>
                            <li><strong>Rechtsgrundlagen:</strong> Wenn wir Ihre personenbezogenen Daten mit Hilfe von
                                Cookies aufgrund Ihrer Einwilligung verarbeiten („Opt-in“), dann ist Art. 6 Abs. 1 S. 1
                                lit. a) DSGVO die Rechtsgrundlage. Ansonsten haben wir ein berechtigtes Interesse an der
                                effektiven Funktionalität, Verbesserung und wirtschaftlichen Betrieb der Website, so
                                dass in dem Falle Art. 6 Abs. 1 S. 1 lit. f) DS-GVO Rechtsgrundlage ist. Rechtsgrundlage
                                ist zudem Art. 6 Abs. 1 S. 1 lit. b) DS-GVO, wenn die Cookies zur Vertragsanbahnung z.B.
                                bei Bestellungen gesetzt werden.<br/><br/></li>
                            <li><strong>Speicherdauer/ Löschung:</strong> Die Daten werden gelöscht, sobald sie für die
                                Erreichung des Zweckes ihrer Erhebung nicht mehr erforderlich sind. Im Falle der
                                Erfassung der Daten zur Bereitstellung der Website ist dies der Fall, wenn die jeweilige
                                Session beendet ist.<br/><br/>Cookies werden ansonsten auf Ihrem Computer gespeichert
                                und von diesem an unsere Seite übermittelt. Daher haben Sie als Nutzer auch die volle
                                Kontrolle über die Verwendung von Cookies. Durch eine Änderung der Einstellungen in
                                Ihrem Internetbrowser können Sie die Übertragung von Cookies deaktivieren oder
                                einschränken. Bereits gespeicherte Cookies können jederzeit gelöscht werden. Dies kann
                                auch automatisiert erfolgen. Werden Cookies für unsere Website deaktiviert, können
                                möglicherweise nicht mehr alle Funktionen der Website vollumfänglich genutzt
                                werden.<br/><br/>
                                <strong>Hier finden Sie Informationen zur L&ouml;schung von Cookies nach
                                    Browsern:</strong><br/><br/>
                                <strong>Chrome:</strong> <a href="https://support.google.com/chrome/answer/95647"
                                                            target="_blank" rel="nofollow">https://support.google.com/chrome/answer/95647</a><br/><br/>
                                <strong>Safari:</strong> <a
                                    href="https://support.apple.com/de-at/guide/safari/sfri11471/mac" target="_blank"
                                    rel="nofollow">https://support.apple.com/de-at/guide/safari/sfri11471/mac</a><br/><br/>
                                <strong>Firefox:</strong> <a
                                    href="https://support.mozilla.org/de/kb/cookies-und-website-daten-in-firefox-loschen"
                                    target="_blank" rel="nofollow">https://support.mozilla.org/de/kb/cookies-und-website-daten-in-firefox-loschen</a><br/><br/>
                                <strong>Internet Explorer:</strong> <a
                                    href="https://support.microsoft.com/de-at/help/17442/windows-internet-explorer-delete-manage-cookies"
                                    target="_blank" rel="nofollow">https://support.microsoft.com/de-at/help/17442/windows-internet-explorer-delete-manage-cookies</a><br/><br/>
                                <strong>Microsoft Edge:</strong> <a
                                    href="https://support.microsoft.com/de-at/help/4027947/windows-delete-cookies"
                                    target="_blank" rel="nofollow">https://support.microsoft.com/de-at/help/4027947/windows-delete-cookies</a><br/><br/>
                            </li>
                            <li><strong>Widerspruch und „Opt-Out“:</strong> Das Speichern von Cookies auf Ihrer
                                Festplatte können Sie unabhängig von einer Einwilligung oder gesetzlichen Erlaubnis
                                allgemein verhindern, indem Sie in Ihren Browser-Einstellungen „keine Cookies
                                akzeptieren“ wählen. Dies kann aber eine Funktionseinschränkung unserer Angebote zur
                                Folge haben. Sie können dem Einsatz von Cookies von Drittanbietern zu Werbezwecken über
                                ein sog. „Opt-out“ über diese amerikanische Website (https://optout.aboutads.info) oder
                                diese europäische Website (http://www.youronlinechoices.com/de/praferenzmanagement/)
                                widersprechen.<br/><br/></li>
                        </ol>
                        <br/>
                        <strong>Abwicklung von Verträgen</strong>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir verarbeiten Bestandsdaten (z.B. Unternehmen, Titel/akademischer Grad, Namen und
                                Adressen sowie Kontaktdaten von Nutzern, E-Mail), Vertragsdaten (z.B. in Anspruch
                                genommene Leistungen, Namen von Kontaktpersonen) und Zahlungsdaten (z.B. Bankverbindung,
                                Zahlungshistorie) zwecks Erfüllung unserer vertraglichen Verpflichtungen (Kenntnis, wer
                                Vertragspartner ist; Begründung, inhaltliche Ausgestaltung und Abwicklung des Vertrags;
                                Überprüfung auf Plausibilität der Daten) und Serviceleistungen (z.B. Kontaktaufnahme des
                                Kundenservice) gem. Art. 6 Abs. 1 S. 1 lit b) DS-GVO. Die in Onlineformularen als
                                verpflichtend gekennzeichneten Eingaben, sind für den Vertragsschluss erforderlich.<br/><br/>
                            </li>
                            <li>Eine Weitergabe dieser Daten an Dritte erfolgt grundsätzlich nicht, außer sie ist zur
                                Verfolgung unserer Ansprüche (z.B. Übergabe an Rechtsanwalt zum Inkasso) oder zur
                                Erfüllung des Vertrags (z.B. Übergabe der Daten an Zahlungsanbieter) erforderlich oder
                                es besteht hierzu besteht eine gesetzliche Verpflichtung gem. Art. 6 Abs. 1 S. 1 lit. c)
                                DS-GVO.<br/><br/></li>
                            <li>Wir können die von Ihnen angegebenen Daten zudem verarbeiten, um Sie über weitere
                                interessante Produkte aus unserem Portfolio zu informieren oder Ihnen E-Mails mit
                                technischen Informationen zukommen lassen.<br/><br/></li>
                            <li>Die Daten werden gelöscht, sobald sie für die Erreichung des Zweckes ihrer Erhebung
                                nicht mehr erforderlich sind. Dies ist für die Bestands- und Vertragsdaten dann der
                                Fall, wenn die Daten für die Durchführung des Vertrages nicht mehr erforderlich sind und
                                keine Ansprüche mehr aus dem Vertrag geltend gemacht werden können, weil diese verjährt
                                sind (Gewährleistung: zwei Jahre / Regelverjährung: drei Jahre). Wir sind aufgrund
                                handels- und steuerrechtlicher Vorgaben verpflichtet, Ihre Adress-, Zahlungs- und
                                Bestelldaten für die Dauer von zehn Jahren zu speichern. Allerdings nehmen wir bei
                                Vertragsbeendigung nach drei Jahren eine Einschränkung der Verarbeitung vor, d. h. Ihre
                                Daten werden nur zur Einhaltung der gesetzlichen Verpflichtungen eingesetzt. Angaben im
                                Nutzerkonto verbleiben bis zu dessen Löschung.<br/><br/></li>
                        </ol>
                        <br/>
                        <strong>Kontaktaufnahme per Kontaktformular / E-Mail / Fax / Post</strong>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Bei der Kontaktaufnahme mit uns per Kontaktformular, Fax, Post oder E-Mail werden Ihre
                                Angaben zum Zwecke der Abwicklung der Kontaktanfrage verarbeitet.<br/><br/></li>
                            <li>Rechtsgrundlage für die Verarbeitung der Daten ist bei Vorliegen einer Einwilligung von
                                Ihnen Art. 6 Abs. 1 S. 1 lit. a) DS-GVO. Rechtsgrundlage für die Verarbeitung der Daten,
                                die im Zuge einer Kontaktanfrage oder E-Mail, eines Briefes oder Faxes übermittelt
                                werden, ist Art. 6 Abs. 1 S. 1 lit. f) DS-GVO. Der Verantwortliche hat ein berechtigtes
                                Interesse an der Verarbeitung und Speicherung der Daten, um Anfragen der Nutzer
                                beantworten zu können, zur Beweissicherung aus Haftungsgründen und um ggf. seiner
                                gesetzlichen Aufbewahrungspflichten bei Geschäftsbriefen nachkommen zu können. Zielt der
                                Kontakt auf den Abschluss eines Vertrages ab, so ist zusätzliche Rechtsgrundlage für die
                                Verarbeitung Art. 6 Abs. 1 S. 1 lit. b) DS-GVO.<br/><br/></li>
                            <li>Wir können Ihre Angaben und Kontaktanfrage in unserem Customer-Relationship-Management
                                System ("CRM System") oder einem vergleichbaren System speichern.<br/><br/></li>
                            <li>Die Daten werden gelöscht, sobald sie für die Erreichung des Zweckes ihrer Erhebung
                                nicht mehr erforderlich sind. Für die personenbezogenen Daten aus der Eingabemaske des
                                Kontaktformulars und diejenigen, die per E-Mail übersandt wurden, ist dies dann der
                                Fall, wenn die jeweilige Konversation mit Ihnen beendet ist. Beendet ist die
                                Konversation dann, wenn sich aus den Umständen entnehmen lässt, dass der betroffene
                                Sachverhalt abschließend geklärt ist. Anfragen von Nutzern, die über einen Account bzw.
                                Vertrag mit uns verfügen, speichern wir bis zum Ablauf von zwei Jahren nach
                                Vertragsbeendigung. Im Fall von gesetzlichen Archivierungspflichten erfolgt die Löschung
                                nach deren Ablauf: Ende handelsrechtlicher (6 Jahre) und steuerrechtlicher (10 Jahre)
                                Aufbewahrungspflicht.<br/><br/></li>
                            <li>Sie haben jederzeit die Möglichkeit, die Einwilligung nach Art. 6 Abs. 1 S. 1 lit. a)
                                DS-GVO zur Verarbeitung der personenbezogenen Daten zu widerrufen. Nehmen Sie per E-Mail
                                Kontakt mit uns auf, so können Sie der Speicherung der personenbezogenen Daten jederzeit
                                widersprechen.<br/><br/></li>
                        </ol>
                        <br/>
                        <strong>Kontaktaufnahme per Telefon</strong>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Bei der Kontaktaufnahme mit uns per Telefon wird Ihre Telefonnummer zur Bearbeitung der
                                Kontaktanfrage und deren Abwicklung verarbeitet und temporär im RAM / Cache des
                                Telefongerätes / Displays gespeichert bzw. angezeigt. Die Speicherung erfolgt aus
                                Haftungs- und Sicherheitsgründen, um den Beweis des Anrufs führen zu können sowie aus
                                wirtschaftlichen Gründen, um einen Rückruf zu ermöglichen. Im Falle von unberechtigten
                                Werbeanrufen, sperren wir die Rufnummern.<br/><br/></li>
                            <li>Rechtsgrundlage für die Verarbeitung der Telefonnummer ist Art. 6 Abs. 1 S. 1 lit. f)
                                DS-GVO. Zielt der Kontakt auf den Abschluss eines Vertrages ab, so ist zusätzliche
                                Rechtsgrundlage für die Verarbeitung Art. 6 Abs. 1 lit. b) DS-GVO.<br/><br/></li>
                            <li>Der Gerätecache speichert die Anrufe 30 Tage und überschreibt bzw. löscht sukzessiv alte
                                Daten, bei Entsorgung des Gerätes werden alle Daten gelöscht und der Speicher ggf.
                                zerstört. Gesperrte Telefonnummer werden jährlich auf die Notwendigkeit der Sperrung
                                geprüft.<br/><br/></li>
                            <li>Sie können die Anzeige der Telefonnummer verhindern, indem Sie mit unterdrückter
                                Telefonnummer anrufen.<br/><br/></li>
                        </ol>
                        <br/>
                        <strong>Google Adsense</strong>
                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir haben Werbeanzeigen des Google Dienstes „Adsense“ (<strong>Dienstanbieter:</strong>
                                Google Ireland Limited, Registernr.: 368047, Gordon House, Barrow Street, Dublin 4,
                                Irland) auf unserer Webseite integriert. Die Werbeanzeigen sind über den (i)-Hinweis
                                „Google-Anzeigen“ in jeder Anzeige gekennzeichnet. <br/><br/></li>
                            <li><strong>Datenkategorien und Beschreibung der Datenverarbeitung:</strong> Nutzungsdaten/
                                Kommunikationsdaten; Google erhält beim Besuch unserer Website die Information, dass Sie
                                unsere Website aufgerufen haben. Dazu setzt Google einen Web-Beacon bzw. Cookie auf
                                Ihren Computer. Die Daten werden auch in die USA übertragen und dort analysiert. Wenn
                                Sie mit einem Google-Account eingeloggt sind, können durch Adsense die Daten Ihrem
                                Account zugeordnet werden. Wenn Sie dies nicht wünschen, müssen Sie sich vor dem Besuch
                                unserer Website ausloggen. Aber auch andere Informationen können hierfür durch Google
                                herangezogen werden:<br/><br/>
                                &bull; die Art der von Ihnen besuchten Websites sowie der auf Ihrem Gerät installierten
                                mobilen Apps;<br/><br/>
                                &bull; Cookies in Ihrem Browser und Einstellungen in Ihrem Google-Konto;<br/><br/>
                                &bull; Websites und Apps, die Sie besucht haben;<br/><br/>
                                &bull; Ihre Aktivitäten auf anderen Geräten;<br/><br/>
                                &bull; vorherige Interaktionen mit Anzeigen oder Werbediensten von Google;<br/><br/>
                                &bull; Ihre Google-Kontoaktivitäten und -informationen.<br/><br/><br/>
                                Bei einem Klick auf eine Adsense-Anzeige wird die IP der Nutzer durch Google verarbeitet
                                (Nutzungsdaten), wobei die Verarbeitung pseudonymisiert (sog. „Werbe-ID“) erfolgt, indem
                                die IP um die letzten beiden Stellen gekürzt wird.
                                Google verknüpft bei personalisierter Werbung Kennungen aus Cookies oder ähnlichen
                                Technologien nicht mit besonderen Kategorien personenbezogener Daten nach Art. 9 DS-GVO
                                wie ethnischer Herkunft, Religion, sexueller Orientierung oder Gesundheit.<br/><br/>
                            </li>
                            <li><strong>Zweck der Verarbeitung:</strong> Wir haben dabei die personalisierten Anzeigen
                                aktiviert, um Ihnen interessantere Werbung anzuzeigen, die die kommerzielle Nutzung
                                unserer Website unterstützt, den Wert für uns steigert und für Sie die Nutzererfahrung
                                verbessert. Mithilfe personalisierter Werbung können wir über Adsense Nutzer auf
                                Grundlage ihrer Interessen und demografischen Merkmale (z.B. "Sportbegeisterte")
                                erreichen. Zudem dient die Verarbeitung dem Tracking, Remarketing und der
                                Conversion-Messung sowie zur Finanzierung unseres Webangebots.<br/><br/></li>
                            <li><strong>Rechtsgrundlagen:</strong> Haben Sie für Verarbeitung Ihrer personenbezogenen
                                Daten mittels „Google Adsense mit personalisierten Anzeigen“ Ihre Einwilligung erteilt
                                („Opt-in“), dann ist Art. 6 Abs. 1 S. 1 lit. a) DS-GVO die Rechtsgrundlage.
                                Rechtsgrundlage für die Verarbeitung Ihrer Daten ist ansonsten Art. 6 Abs. 1 S. 1 lit.
                                f) DS-GVO aufgrund unserer berechtigten Interessen an der Analyse, Optimierung und dem
                                effizienten wirtschaftlichen Betrieb unserer Werbung und Website.<br/><br/></li>
                            <li><strong>Datenübermittlung/Empfängerkategorie:</strong> Google Irland, USA; Diese Website
                                hat auch Google AdSense-Anzeigen von Drittanbietern aktiviert. Die vorgenannten Daten k&ouml;nnen
                                auch an diese Drittanbieter &bdquo;Certified External Vendors&ldquo; benannt unter <a
                                    href="https://support.google.com/dfp_sb/answer/94149" target="_blank"
                                    rel="nofollow">https://support.google.com/dfp_sb/answer/94149</a> &uuml;bertragen
                                werden.<br/><br/></li>
                            <li><strong>Speicherdauer:</strong> Die Daten werden bis zu 24 Monate nach dem letzten
                                Besuch gespeichert.<br/><br/></li>

                            <li><strong>Widerspruchs- und Beseitigungsmöglichkeiten („Opt-Out“):</strong>
                                Sie können der Installation von Cookies durch Google Adsense auf verschiedene Arten widersprechen bzw.
                                diese verhindern:
                                <br/><br/>
                                &bull; Sie können die Cookies in Ihrem Browser durch die <strong>Einstellung “keine
                                    Cookies akzeptieren”</strong> unterbinden, was auch die Cookies von Drittanbietern
                                beinhaltet;<br/><br/>
                                &bull; Sie k&ouml;nnen direkt bei Google &uuml;ber den Link <a
                                    href="https://adssettings.google.com/" target="_blank" rel="nofollow">https://adssettings.google.com</a>
                                die personenbezogenen Anzeigen bei Google deaktivieren, wobei diese Einstellung nur
                                solange Bestand hat bis Sie Ihre Cookies l&ouml;schen. <strong>Zur Deaktivierung der
                                    personalisierten Werbung auf Mobilger&auml;ten</strong> finden Sie hier eine
                                Anleitung: <a href="https://support.google.com/adsense/troubleshooter/1631343"
                                              target="_blank" rel="nofollow">https://support.google.com/adsense/troubleshooter/1631343;</a><br/><br/>
                                &bull; Sie k&ouml;nnen die personalisierten <strong>Anzeigen der Drittanbieter</strong>,
                                die an der Werbeselbstregulierungsinitiaive &ldquo;About Ads&rdquo; teilnehmen &uuml;ber
                                den Link <a href="https://optout.aboutads.info/" rel="nofollow" target="_blank">https://optout.aboutads.info</a>
                                f&uuml;r US-Seiten oder f&uuml;r EU-Seiten unter <a
                                    href="http://www.youronlinechoices.com/de/praferenzmanagement/" rel="nofollow"
                                    target="_blank">http://www.youronlinechoices.com/de/praferenzmanagement/</a>
                                deaktivieren, wobei diese Einstellung nur solange Bestand hat, bis Sie all Ihre Cookies
                                l&ouml;schen;<br/>
                                &bull; Sie k&ouml;nnen durch ein <strong>Browser-Plug-in</strong> f&uuml;r Chrome,
                                Firefox oder Internet-Explorer unter dem Link <a
                                    href="https://support.google.com/ads/answer/7395996" rel="nofollow" target="_blank">https://support.google.com/ads/answer/7395996</a>
                                dauerhaft Cookies deaktivieren. Diese Deaktivierung kann zur Folge haben, dass Sie nicht
                                alle Funktionen unserer Website mehr vollumf&auml;nglich nutzen k&ouml;nnen.<br/>
                                <br/>
                            </li>
                            <li>In der Datenschutzerklärung für Werbung von Google unter <a
                                    href="https://policies.google.com/technologies/ads" rel="nofollow" target="_blank">https://policies.google.com/technologies/ads</a>
                                finden Sie weitere Informationen zur Verwendung von Google Cookies in Anzeigen und deren
                                Werbetechnologien, Speicherdauer, Anonymisierung, Standortdaten, Funktionsweise und Ihre
                                Rechte.<br/><br/></li>

                        </ol>
                        <br/>
                        <strong>Google Analytics</strong>

                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir haben das Webseitenanalyse-Tool „Google Analytics“ (<strong>Dienstanbieter:</strong>
                                Google Ireland Limited, Registernr.: 368047, Gordon House, Barrow Street, Dublin 4,
                                Irland) auf unserer Website integriert.<br/><br/></li>
                            <li><strong>Datenkategorien und Beschreibung der Datenverarbeitung:</strong> User-ID,
                                IP-Adresse (anonymisiert). Beim Besuch unserer Website setzt Google einen Cookie auf
                                Ihren Computer, um die Benutzung unserer Website durch Sie analysieren zu k&ouml;nnen.
                                Wir haben die IP-Anonymisierung &bdquo;anonymizeIP&ldquo; aktiviert, wodurch die
                                IP-Adressen nur gek&uuml;rzt weiterverarbeitet werden. Auf dieser Webseite wird Ihre
                                IP-Adresse von Google daher innerhalb von Mitgliedstaaten der Europ&auml;ischen Union
                                oder in anderen Vertragsstaaten des Abkommens &uuml;ber den Europ&auml;ischen
                                Wirtschaftsraum zuvor gek&uuml;rzt. Nur in Ausnahmef&auml;llen wird die volle IP-Adresse
                                an einen Server von Google in den USA &uuml;bertragen und dort gek&uuml;rzt. Im Auftrag
                                des Betreibers dieser Webseite wird Google diese Informationen benutzen, um Ihre Nutzung
                                der Webseite auszuwerten, um Reports &uuml;ber die Webseitenaktivit&auml;ten
                                zusammenzustellen und um weitere, mit der Websitenutzung und der Internetnutzung
                                verbundene, Dienstleistungen gegen&uuml;ber dem Verantwortlichen zu erbringen. Wir haben
                                dar&uuml;ber hinaus die ger&auml;te&uuml;bergreifende Analyse von Website-Besuchern
                                aktiviert, die &uuml;ber eine sog. User-ID durchgef&uuml;hrt wird. Die im Rahmen von
                                Google Analytics von Ihrem Browser &uuml;bermittelte IP-Adresse wird nicht mit anderen
                                Daten von Google zusammengef&uuml;hrt. Weitere Informationen zu Datennutzung bei Google
                                Analytics finden Sie hier:&nbsp;<a href="https://www.google.com/analytics/terms/de.html"
                                                                   rel="nofollow" target="_blank">https://www.google.com/analytics/terms/de.html</a>&nbsp;(Nutzungsbedingungen
                                von Analytics),&nbsp;<a href="https://support.google.com/analytics/answer/6004245?hl=de"
                                                        rel="nofollow" target="_blank">https://support.google.com/analytics/answer/6004245?hl=de</a>&nbsp;(Hinweise
                                zum Datenschutz bei Analytics) und Googles Datenschutzerkl&auml;rung&nbsp;<a
                                    href="https://policies.google.com/privacy" rel="nofollow" target="_blank">https://policies.google.com/privacy</a>.<br/><br/>
                            </li>
                            <li><strong>Zweck der Verarbeitung:</strong> Die Nutzung von Google Analytics dient dem
                                Zweck der Analyse, Optimierung und Verbesserung unserer Website.<br/><br/></li>
                            <li><strong>Rechtsgrundlagen:</strong> Haben Sie für Verarbeitung Ihrer personenbezogenen
                                Daten mittels „Google Analytics“ vom Drittanbieter Ihre Einwilligung erteilt („Opt-in“),
                                dann ist Art. 6 Abs. 1 S. 1 lit. a) DS-GVO die Rechtsgrundlage. Rechtsgrundlage ist
                                zudem unser in den obigen Zwecken liegendes berechtigtes Interesse (der Analyse,
                                Optimierung und Verbesserung unserer Website) an der Datenverarbeitung nach Art. 6 Abs.
                                1 S.1 lit. f) DS-GVO. Bei Services, die im Zusammenhang mit einem Vertrag erbracht
                                werden, erfolgt das Tracking und die Analyse des Nutzerhaltens nach Art. 6 Abs. 1 S. 1
                                lit. b) DS-GVO, um mit den dadurch gewonnen Informationen, optimierte Services zur
                                Erfüllung des Vertragszwecks anbieten zu können.<br/><br/></li>
                            <li><strong>Speicherdauer:</strong> Die von uns gesendeten und mit Cookies, Nutzerkennungen
                                (z. B. User-ID) oder Werbe-IDs verknüpften Daten werden nach Monaten automatisch
                                gelöscht. Die Löschung von Daten, deren Aufbewahrungsdauer erreicht ist, erfolgt
                                automatisch einmal im Monat.<br/><br/></li>
                            <li><strong>Datenübermittlung/Empfängerkategorie:</strong> Google, Irland und USA. Wir haben
                                zudem mit Google eine Vereinbarung zur Auftragsverarbeitung nach Art. 28 DS-GVO
                                geschlossen.<br/><br/></li>
                            <li><strong>Widerspruchs- und Beseitigungsmöglichkeiten („Opt-Out“):</strong><br/>
                                &bull; Das Speichern von Cookies auf Ihrer Festplatte k&ouml;nnen Sie allgemein
                                verhindern, indem Sie in Ihren Browser-Einstellungen &bdquo;keine Cookies akzeptieren&ldquo;
                                w&auml;hlen. Dies kann aber eine Funktionseinschr&auml;nkung unserer Angebote zur Folge
                                haben. Sie k&ouml;nnen dar&uuml;ber hinaus die Erfassung der, durch das Cookie erzeugten
                                und auf Ihre Nutzung der Website bezogenen, Daten an Google sowie die Verarbeitung
                                dieser Daten durch Google verhindern, indem sie das unter dem folgenden Link verf&uuml;gbare
                                Browser-Plugin herunterladen und installieren:&nbsp;<a
                                    href="http://tools.google.com/dlpage/gaoptout?hl=de" target="_blank" rel="nofollow">http://tools.google.com/dlpage/gaoptout?hl=de</a><br/><br/>
                                &bull; Als Alternative zum obigen Browser-Plugin können Sie die Erfassung durch Google
                                Analytics unterbinden, indem Sie <strong>[__hier bitte__den Analytics Opt-Out Link Ihrer
                                    Webseite einfügen]</strong> klicken. Durch den Klick wird ein „Opt-out“-Cookie
                                gesetzt, das die Erfassung Ihrer Daten beim Besuch dieser Webseite zukünftig verhindert.
                                Dieses Cookie gilt nur für unsere Webseite und Ihren aktuellen Browser und hat nur
                                solange Bestand bis Sie Ihre Cookies löschen. In dem Falle müssten Sie das Cookie erneut
                                setzen.<br/><br/>
                                &bull; Die <strong>geräteübergreifende Nutzeranalyse</strong> können Sie in Ihrem
                                Google-Account unter „Meine Daten > persönliche Daten“ deaktivieren.<br/><br/></li>
                        </ol>
                        <br/>
                        <strong>YouTube-Videos</strong>

                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir haben auf unserer Website YouTube-Videos von youtube.com mittels der
                                embedded-Funktion eingebunden, so dass diese auf unserer Website direkt aufrufbar sind.
                                YouTube gehört zur Google Ireland Limited, Registernr.: 368047, Gordon House, Barrow
                                Street, Dublin 4, Irland.<br/><br/></li>
                            <li><strong>Datenkategorie und Beschreibung der Datenverarbeitung:</strong> Nutzungsdaten
                                (z.B. aufgerufene Webseite, Inhalte und Zugriffszeiten). Wir haben die Videos im sog.
                                „erweiterten Datenschutz-Modus“ eingebunden, ohne dass mit Cookies das Nutzungsverhalten
                                erfasst wird, um die Videowiedergabe zu personalisieren. Stattdessen basieren die
                                Videoempfehlungen auf dem aktuell abgespielten Video. Videos, die im erweiterten
                                Datenschutzmodus in einem eingebetteten Player wiedergegeben werden, wirken sich nicht
                                darauf aus, welche Videos Ihnen auf YouTube empfohlen werden. Beim Start eines Videos
                                (Klick auf das Video) willigen Sie ein, dass YouTube die Information trackt, dass Sie
                                die entsprechende Unterseite bzw. das Video auf unserer Website aufgerufen haben und
                                diese Daten für Werbezecke nutzt.<br/><br/></li>
                            <li><strong>Zweck der Verarbeitung:</strong> Bereitstellung eines nutzerfreundlichen
                                Angebots, Optimierung und Verbesserung unserer Inhalte. <br/><br/></li>
                            <li><strong>Rechtsgrundlagen:</strong> Haben Sie für Verarbeitung Ihrer personenbezogenen
                                Daten mittels „etracker“ vom Drittanbieter Ihre Einwilligung erteilt („Opt-in“), dann
                                ist Art. 6 Abs. 1 S. 1 lit. a) DS-GVO die Rechtsgrundlage. Rechtsgrundlage ist zudem
                                unser in den obigen Zwecken liegendes berechtigtes Interesse an der Datenverarbeitung
                                nach Art. 6 Abs. 1 S.1 lit. f) DS-GVO. Bei Services, die im Zusammenhang mit einem
                                Vertrag erbracht werden, erfolgt das Tracking und die Analyse des Nutzerhaltens nach
                                Art. 6 Abs. 1 S. 1 lit. b) DS-GVO, um mit den dadurch gewonnen Informationen, optimierte
                                Services zur Erfüllung des Vertragszwecks anbieten zu können.<br/><br/></li>
                            <li><strong>Datenübermittlung/Empfängerkategorie:</strong> Drittanbieter in den USA. Die
                                gewonnenen Daten werden in die USA &uuml;bertragen und dort gespeichert. Dies erfolgt
                                auch ohne Nutzerkonto bei Google. Sollten Sie in Ihren Google-Account eingeloggt sein,
                                kann Google die obigen Daten Ihrem Account zuordnen. Wenn Sie dies nicht w&uuml;nschen,
                                m&uuml;ssen Sie sich in Ihrem Google-Account ausloggen. Google erstellt aus solchen
                                Daten Nutzerprofile und nutzt diese Daten zum Zwecke der Werbung, Marktforschung oder
                                Optimierung seiner Websites.<br/><br/></li>
                            <li><strong>Speicherdauer:</strong> Cookies bis zu 2 Jahre bzw. bis zur Löschung der Cookies
                                durch Sie als Nutzer.<br/><br/></li>
                            <li><strong>Widerspruch:</strong> Sie haben gegen&uuml;ber Google ein Widerspruchsrecht
                                gegen die Bildung von Nutzerprofilen. Bitte richten Sie sich deswegen direkt an Google
                                &uuml;ber die unten genannte Datenschutzerkl&auml;rung. Ein Opt-Out-Widerspruch
                                hinsichtlich der Werbe-Cookies k&ouml;nnen Sie hier in Ihrem Google-Account
                                vornehmen:<br/><a href="https://adssettings.google.com/authenticated" target="_blank"
                                                  rel="nofollow">https://adssettings.google.com/authenticated</a>.<br/><br/>
                            </li>
                            <li>In den Nutzungsbedingungen von YouTube unter&nbsp;<a
                                    href="https://www.youtube.com/t/terms" target="_blank" rel="nofollow">https://www.youtube.com/t/terms</a>&nbsp;und
                                in der Datenschutzerkl&auml;rung f&uuml;r Werbung von Google unter&nbsp;<a
                                    href="https://policies.google.com/technologies/ads" target="_blank" rel="nofollow">https://policies.google.com/technologies/ads</a>&nbsp;finden
                                Sie weitere Informationen zur<br/><br/></li>
                            <li>Verwendung von Google Cookies und deren Werbetechnologien, Speicherdauer,
                                Anonymisierung, Standortdaten, Funktionsweise und Ihre Rechte. Allgemeine
                                Datenschutzerklärung von Google: <a href="https://policies.google.com/privacy"
                                                                    target="_blank" rel="nofollow">https://policies.google.com/privacy</a>.<br/><br/>
                            </li>
                        </ol>
                        <br/>
                        <strong>Google Maps</strong>

                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir haben auf unserer Website Karten von „Google Maps“ (<strong>Anbieter</strong>:
                                Google Ireland Limited, Registernr.: 368047, Gordon House, Barrow Street, Dublin 4,
                                Irland) integriert.<br/><br/></li>
                            <li><strong>Datenkategorie und Beschreibung der Datenverarbeitung:</strong> Nutzungsdaten
                                (z.B. IP, Standort, aufgerufene Seite). Mit Google Maps können wir den Standort von
                                Adressen und eine Anfahrtsbeschreibung direkt auf unserer Website in interaktiven Karten
                                anzeigen und Ihnen die Nutzung dieses Tools ermöglichen. Bei dem Abruf unserer Website,
                                wo Google Maps integriert ist, wird eine Verbindung zu den Servern von Google in den USA
                                aufgebaut. Hierbei können Ihre IP und Standort an Google übertragen werden. Zudem erhält
                                Google die Information, dass Sie die entsprechende Seite aufgerufen haben. Dies erfolgt
                                auch ohne Nutzerkonto bei Google. Sollten Sie in Ihren Google-Account eingeloggt sein,
                                kann Google die obigen Daten Ihrem Account zuordnen. Wenn Sie dies nicht wünschen,
                                müssen Sie sich bei Ihrem Google-Account ausloggen. Google erstellt aus solchen Daten
                                Nutzerprofile und nutzt diese Daten zum Zwecke der Werbung, Marktforschung oder
                                Optimierung seiner Websites.<br/><br/></li>
                            <li><strong>Zweck der Verarbeitung:</strong> Bereitstellung einer nutzerfreundlichen,
                                wirtschaftlichen und optimierten Webseite.<br/><br/></li>
                            <li><strong>Rechtsgrundlagen:</strong> Haben Sie für Verarbeitung Ihrer personenbezogenen
                                Daten mittels „Google Maps“ vom Drittanbieter Ihre Einwilligung erteilt („Opt-in“), dann
                                ist Art. 6 Abs. 1 S. 1 lit. a) DS-GVO die Rechtsgrundlage. Rechtsgrundlage ist zudem
                                unser in den obigen Zwecken liegendes berechtigtes Interesse an der Datenverarbeitung
                                nach Art. 6 Abs. 1 S.1 lit. f) DS-GVO.<br/><br/></li>
                            <li><strong>Datenübermittlung/Empfängerkategorie:</strong> Drittanbieter in den
                                USA.<br/><br/></li>
                            <li><strong>Speicherdauer:</strong> Cookies bis zu 6 Monate oder bis zur Löschung durch Sie.
                                Ansonsten sobald sie nicht mehr für die Verarbeitungszwecke benötigt werden.<br/><br/>
                            </li>
                            <li><strong>Widerspruchs- und Beseitigungsmöglichkeit:</strong> Sie haben gegen&uuml;ber
                                Google ein Widerspruchsrecht gegen die Bildung von Nutzerprofilen. Bitte richten Sie
                                sich deswegen direkt an Google &uuml;ber die unten genannte Datenschutzerkl&auml;rung.
                                Ein Opt-Out-Widerspruch hinsichtlich der Werbe-Cookies k&ouml;nnen Sie hier in Ihrem
                                Google-Account vornehmen:<br/><a href="https://adssettings.google.com/authenticated"
                                                                 target="_blank" rel="nofollow">https://adssettings.google.com/authenticated</a>.<br/><br/>
                            </li>
                            <li>In den Nutzungsbedingungen von Google Maps unter <a
                                    href="https://www.google.com/intl/de_de/help/terms_maps.html" target="_blank"
                                    rel="nofollow">https://www.google.com/intl/de_de/help/terms_maps.html</a> und in der
                                Datenschutzerkl&auml;rung f&uuml;r Werbung von Google unter <a
                                    href="https://policies.google.com/technologies/ads" target="_blank" rel="nofollow">https://policies.google.com/technologies/ads</a>
                                finden Sie weitere Informationen zur Verwendung von Google Cookies und deren
                                Werbetechnologien, Speicherdauer, Anonymisierung, Standortdaten, Funktionsweise und Ihre
                                Rechte. Allgemeine Datenschutzerkl&auml;rung von Google: <a
                                    href="https://policies.google.com/privacy" target="_blank" rel="nofollow">https://policies.google.com/privacy</a>.<br/><br/>
                            </li>
                        </ol>
                        <br/>
                        <strong>Präsenz in sozialen Medien</strong>

                        <ol style="margin:10px 0px; padding:15px;">
                            <li>Wir unterhalten in sozialen Medien Profile bzw. Fanpages. Bei der Nutzung und dem Aufruf
                                unseres Profils im jeweiligen Netzwerk durch Sie gelten die jeweiligen
                                Datenschutzhinweise und Nutzungsbedingungen des jeweiligen Netzwerks.<br/><br/></li>
                            <li><strong>Datenkategorien und Beschreibung der Datenverarbeitung:</strong> Nutzungsdaten,
                                Kontaktdaten, Inhaltsdaten, Bestandsdaten. Ferner werden die Daten der Nutzer innerhalb
                                sozialer Netzwerke im Regelfall für Marktforschungs- und Werbezwecke verarbeitet. So
                                können z.B. anhand des Nutzungsverhaltens und sich daraus ergebender Interessen der
                                Nutzer Nutzungsprofile erstellt werden. Die Nutzungsprofile können wiederum verwendet
                                werden, um z.B. Werbeanzeigen innerhalb und außerhalb der Netzwerke zu schalten, die
                                mutmaßlich den Interessen der Nutzer entsprechen. Zu diesen Zwecken werden im Regelfall
                                Cookies auf den Rechnern der Nutzer gespeichert, in denen das Nutzungsverhalten und die
                                Interessen der Nutzer gespeichert werden. Ferner können in den Nutzungsprofilen auch
                                Daten unabhängig der von den Nutzern verwendeten Geräte gespeichert werden
                                (insbesondere, wenn die Nutzer Mitglieder der jeweiligen Plattformen sind und bei diesen
                                eingeloggt sind). Für eine detaillierte Darstellung der jeweiligen Verarbeitungsformen
                                und der Widerspruchsmöglichkeiten (Opt-Out) verweisen wir auf die Datenschutzerklärungen
                                und Angaben der Betreiber der jeweiligen Netzwerke. Auch im Fall von Auskunftsanfragen
                                und der Geltendmachung von Betroffenenrechten weisen wir darauf hin, dass diese am
                                effektivsten bei den Anbietern geltend gemacht werden können. Nur die Anbieter haben
                                jeweils Zugriff auf die Daten der Nutzer und können direkt entsprechende Maßnahmen
                                ergreifen und Auskünfte geben. Sollten Sie dennoch Hilfe benötigen, dann können Sie sich
                                an uns wenden.<br/><br/></li>
                            <li><strong>Zweck der Verarbeitung:</strong> Kommunikation mit den auf den sozialen
                                Netzwerken angeschlossenen und registrierten Nutzern; Information und Werbung für unsere
                                Produkte, Angebote und Dienstleistungen; Außerdarstellung und Imagepflege; Auswertung
                                und Analyse der Nutzer und Inhalte unserer Präsenzen in den sozialen Medien.<br/><br/>
                            </li>
                            <li><strong>Rechtsgrundlagen:</strong> Die Rechtsgrundlage für die Verarbeitung der
                                personenbezogenen Daten ist unser in den obigen Zwecken liegendes berechtigtes Interesse
                                gemäß Art. 6 Abs. 1 S. 1 lit. f) DS-GVO. Soweit Sie uns bzw. dem Verantwortlichen des
                                sozialen Netzwerks eine Einwilligung in die Verarbeitung Ihrer personenbezogenen Daten
                                erteilt haben, ist Rechtsgrundlage Art. 6 Abs. 1 S. 1 lit. a) i.V.m. Art. 7 DS-GVO.<br/><br/>
                            </li>
                            <li><strong>Datenübermittlung/Empfängerkategorie:</strong> Soziales Netzwerk.<br/><br/></li>
                            <li>Die Datenschutzhinweise, Auskunftsmöglichkeiten und Widerspruchmöglichkeiten (Opt-Out)
                                der jeweiligen Netzwerke / Diensteanbieter finden Sie hier:<br/><br/>•
                                <strong>Facebook</strong> – Diensteanbieter: Facebook Ireland Ltd., 4 Grand Canal
                                Square, Grand Canal Harbour, Dublin 2, Irland); Website: <a
                                    href="http://www.facebook.com/" rel="nofollow" target="_blank">www.facebook.com</a>;
                                Datenschutzerkl&auml;rung:&nbsp;<a href="https://www.facebook.com/about/privacy/"
                                                                   rel="nofollow" target="_blank">https://www.facebook.com/about/privacy/</a>,
                                Opt-Out:&nbsp;<a href="https://www.facebook.com/settings?tab=ads" rel="nofollow"
                                                 target="_blank">https://www.facebook.com/settings?tab=ads</a>&nbsp;und&nbsp;<a
                                    href="http://www.youronlinechoices.com/" rel="nofollow" target="_blank">http://www.youronlinechoices.com</a>;
                                Widerspruch: <a href="https://www.facebook.com/help/contact/2061665240770586"
                                                rel="nofollow" target="_blank">https://www.facebook.com/help/contact/2061665240770586</a>;
                                Vereinbarung &uuml;ber gemeinsame Verarbeitung personenbezogener Daten auf
                                Facebook-Seiten (Art. 26 DS-GVO): <a
                                    href="https://www.facebook.com/legal/terms/page_controller_addendum" rel="nofollow"
                                    target="_blank">https://www.facebook.com/legal/terms/page_controller_addendum</a>,
                                Datenschutzhinweise f&uuml;r Facebook-Seiten: <a
                                    href="https://www.facebook.com/legal/terms/information_about_page_insights_data"
                                    rel="nofollow" target="_blank">https://www.facebook.com/legal/terms/information_about_page_insights_data</a>.<br/><br/>•
                                <strong>Instagram</strong> – Diensteanbieter: Facebook Ireland Ltd., 4 Grand Canal
                                Square, Grand Canal Harbour, Dublin 2, Irland) &ndash; Datenschutzerkl&auml;rung/
                                Opt-Out:&nbsp; <a href="https://help.instagram.com/519522125107875" rel="nofollow"
                                                  target="_blank">https://help.instagram.com/519522125107875</a>,
                                Widerspruch: <a href="https://help.instagram.com/contact/186020218683230" rel="nofollow"
                                                target="_blank">https://help.instagram.com/contact/186020218683230</a>;
                                Vereinbarung &uuml;ber gemeinsame Verarbeitung personenbezogener Daten auf
                                Instagram-Seiten (Art. 26 DS-GVO): <a
                                    href="https://www.facebook.com/legal/terms/page_controller_addendum" rel="nofollow"
                                    target="_blank">https://www.facebook.com/legal/terms/page_controller_addendum</a>.<br/><br/>•
                                <strong>Twitter</strong> – Diensteanbieter: Twitter Inc., 1355 Market Street, Suite 900,
                                San Francisco, CA 94103, USA) - Datenschutzerkl&auml;rung:&nbsp;<a
                                    href="https://twitter.com/de/privacy" target="_blank" rel="nofollow">https://twitter.com/de/privacy</a>,
                                Opt-Out:&nbsp;<a href="https://twitter.com/personalization" target="_blank"
                                                 rel="nofollow">https://twitter.com/personalization</a>.<br/><br/></li>
                        </ol>
                        <br/>
                        <strong>Rechte der betroffenen Person</strong>

                        <ol style="margin:10px 0px; padding:15px;">
                            <li><strong>Widerspruch oder Widerruf gegen die Verarbeitung Ihrer Daten<br/><br/>
                                    Soweit die Verarbeitung auf Ihrer Einwilligung gemäß Art. 6 Abs. 1 S. 1 lit. a),
                                    Art. 7 DS-GVO beruht, haben Sie das Recht, die Einwilligung jederzeit zu widerrufen.
                                    Die Rechtmäßigkeit der aufgrund der Einwilligung bis zum Widerruf erfolgten
                                    Verarbeitung wird dadurch nicht berührt.<br/><br/>
                                    Soweit wir die Verarbeitung Ihrer personenbezogenen Daten auf die Interessenabwägung
                                    gemäß Art. 6 Abs. 1 S. 1 lit. f) DS-GVO stützen, können Sie Widerspruch gegen die
                                    Verarbeitung einlegen. Dies ist der Fall, wenn die Verarbeitung insbesondere nicht
                                    zur Erfüllung eines Vertrags mit Ihnen erforderlich ist, was von uns jeweils bei der
                                    nachfolgenden Beschreibung der Funktionen dargestellt wird. Bei Ausübung eines
                                    solchen Widerspruchs bitten wir um Darlegung der Gründe, weshalb wir Ihre
                                    personenbezogenen Daten nicht wie von uns durchgeführt verarbeiten sollten. Im Falle
                                    Ihres begründeten Widerspruchs prüfen wir die Sachlage und werden entweder die
                                    Datenverarbeitung einstellen bzw. anpassen oder Ihnen unsere zwingenden
                                    schutzwürdigen Gründe aufzeigen, aufgrund derer wir die Verarbeitung
                                    fortführen.<br/><br/>
                                    Sie können der Verarbeitung Ihrer personenbezogenen Daten für Zwecke der Werbung und
                                    Datenanalyse jederzeit widersprechen. Das Widerspruchsrecht können Sie kostenfrei
                                    ausüben. Über Ihren Werbewiderspruch können Sie uns unter folgenden Kontaktdaten
                                    informieren:<br/>
                                    <br/>{{ env('TTF_NAME') }} (Verein/Club)
                                    <br/>{{ env('TTF_STRASSE') }}
                                    <br/>{{ env('TTF_ORT') }}, Deutschland
                                    <br/>Vertretungsberechtigt: {{ env('TTF_NAME1') }}
                                    <br/>Fax: {{ env('TTF_FAX') }}
                                    <br/>E-Mail-Adresse:
                                    {{ env('TTF_EMAIL') }}<br/></strong>
                                <br/></li>
                            <li><strong>Recht auf Auskunft</strong><br/>
                                Sie haben das Recht, von uns eine Bestätigung darüber zu verlangen, ob Sie betreffende
                                personenbezogene Daten verarbeitet werden. Sofern dies der Fall ist, haben Sie ein Recht
                                auf Auskunft über Ihre bei uns gespeicherten persönlichen Daten nach Art. 15 DS-GVO.
                                Dies beinhaltet insbesondere die Auskunft über die Verarbeitungszwecke, die Kategorie
                                der personenbezogenen Daten, die Kategorien von Empfängern, gegenüber denen Ihre Daten
                                offengelegt wurden oder werden, die geplante Speicherdauer, die Herkunft ihrer Daten,
                                sofern diese nicht direkt bei Ihnen erhoben wurden.<br/><br/></li>
                            <li><strong>Recht auf Berichtigung</strong><br/>
                                Sie haben ein Recht auf Berichtigung unrichtiger oder auf Vervollständigung richtiger
                                Daten nach Art. 16 DS-GVO.
                                <br/><br/>
                            </li>
                            <li><strong>Recht auf Löschung</strong><br/>
                                Sie haben ein Recht auf Löschung Ihrer bei uns gespeicherten Daten nach Art. 17 DS-GVO,
                                es sei denn gesetzliche oder vertraglichen Aufbewahrungsfristen oder andere gesetzliche
                                Pflichten bzw. Rechte zur weiteren Speicherung stehen dieser entgegen.
                                <br/><br/>
                            </li>
                            <li><strong>Recht auf Einschränkung</strong><br/>
                                Sie haben das Recht, eine Einschränkung bei der Verarbeitung Ihrer personenbezogenen
                                Daten zu verlangen, wenn eine der Voraussetzungen in Art. 18 Abs. 1 lit. a) bis d)
                                DS-GVO erfüllt ist:<br/>
                                • Wenn Sie die Richtigkeit der Sie betreffenden personenbezogenen für eine Dauer
                                bestreiten, die es dem Verantwortlichen ermöglicht, die Richtigkeit der
                                personenbezogenen Daten zu überprüfen;<br/><br/>
                                • die Verarbeitung unrechtmäßig ist und Sie die Löschung der personenbezogenen Daten
                                ablehnen und stattdessen die Einschränkung der Nutzung der personenbezogenen Daten
                                verlangen;<br/><br/>
                                • der Verantwortliche die personenbezogenen Daten für die Zwecke der Verarbeitung nicht
                                länger benötigt, Sie diese jedoch zur Geltendmachung, Ausübung oder Verteidigung von
                                Rechtsansprüchen benötigen, oder<br/><br/>
                                • wenn Sie Widerspruch gegen die Verarbeitung gemäß Art. 21 Abs. 1 DS-GVO eingelegt
                                haben und noch nicht feststeht, ob die berechtigten Gründe des Verantwortlichen
                                gegenüber Ihren Gründen überwiegen.<br/><br/>
                            </li>
                            <li><strong>Recht auf Datenübertragbarkeit</strong><br/>
                                Sie haben ein Recht auf Datenübertragbarkeit nach Art. 20 DS-GVO, was bedeutet, dass Sie
                                die bei uns über Sie gespeicherten personenbezogenen Daten in einem strukturierten,
                                gängigen und maschinenlesbaren Format erhalten können oder die Übermittlung an einen
                                anderen Verantwortlichen verlangen können.
                                <br/><br/>
                            </li>
                            <li><strong>Recht auf Beschwerde</strong><br/>
                                Sie haben ein Recht auf Beschwerde bei einer Aufsichtsbehörde. In der Regel können Sie
                                sich hierfür an die Aufsichtsbehörde insbesondere in dem Mitgliedstaat ihres
                                Aufenthaltsorts, ihres Arbeitsplatzes oder des Orts des mutmaßlichen Verstoßes wenden.
                                <br/><br/>
                            </li>
                        </ol>
                        <br/>
                        <strong>Datensicherheit</strong>
                        <p>Um alle personenbezogen Daten, die an uns übermittelt werden, zu schützen und um
                            sicherzustellen, dass die Datenschutzvorschriften von uns, aber auch unseren externen
                            Dienstleistern eingehalten werden, haben wir geeignete technische und organisatorische
                            Sicherheitsmaßnahmen getroffen. Deshalb werden unter anderem alle Daten zwischen Ihrem
                            Browser und unserem Server über eine sichere SSL-Verbindung verschlüsselt übertragen.</p>
                        <br/>
                        <br/>
                        <strong>Stand: 06.08.2020</strong>
                        <p>Quelle: <a href="https://www.juraforum.de/datenschutzerklaerung-muster/">Datenschutzerklärung
                                DSGVO Muster von Juraforum.de</a></p>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
