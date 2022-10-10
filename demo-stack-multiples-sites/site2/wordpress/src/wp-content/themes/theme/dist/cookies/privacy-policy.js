var $__pp = (function (exports) {
  'use strict';

  function _typeof(obj) {
    "@babel/helpers - typeof";

    if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
      _typeof = function (obj) {
        return typeof obj;
      };
    } else {
      _typeof = function (obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };
    }

    return _typeof(obj);
  }

  function _slicedToArray(arr, i) {
    return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();
  }

  function _arrayWithHoles(arr) {
    if (Array.isArray(arr)) return arr;
  }

  function _iterableToArrayLimit(arr, i) {
    if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;
    var _arr = [];
    var _n = true;
    var _d = false;
    var _e = undefined;

    try {
      for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
        _arr.push(_s.value);

        if (i && _arr.length === i) break;
      }
    } catch (err) {
      _d = true;
      _e = err;
    } finally {
      try {
        if (!_n && _i["return"] != null) _i["return"]();
      } finally {
        if (_d) throw _e;
      }
    }

    return _arr;
  }

  function _unsupportedIterableToArray(o, minLen) {
    if (!o) return;
    if (typeof o === "string") return _arrayLikeToArray(o, minLen);
    var n = Object.prototype.toString.call(o).slice(8, -1);
    if (n === "Object" && o.constructor) n = o.constructor.name;
    if (n === "Map" || n === "Set") return Array.from(o);
    if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
  }

  function _arrayLikeToArray(arr, len) {
    if (len == null || len > arr.length) len = arr.length;

    for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

    return arr2;
  }

  function _nonIterableRest() {
    throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
  }

  /**
   * http://www.w3.org/TR/dom/#element
   * append and remove polyfills adapted from https://vanillajstoolkit.com/polyfills/append/
   * and from https://github.com/WebReflection/dom4
   */
  var _window = window,
      DocumentType = _window.DocumentType,
      Node = _window.Node,
      Element = _window.Element,
      HTMLElement = _window.HTMLElement,
      DocumentFragment = _window.DocumentFragment;
  var DocumentFragmentPrototype = DocumentFragment && DocumentFragment.prototype;
  var CharacterData = window.CharacterData || Node;
  var CharacterDataPrototype = CharacterData && CharacterData.prototype;
  var DocumentTypePrototype = DocumentType && DocumentType.prototype;
  var ElementPrototype = (Element || Node || HTMLElement).prototype;

  var textNodeIfPrimitive = function textNodeIfPrimitive(node) {
    return _typeof(node) === 'object' ? node : document.createTextNode(node);
  };

  function append() {
    var fragment = document.createDocumentFragment();

    for (var _len = arguments.length, nodes = new Array(_len), _key = 0; _key < _len; _key++) {
      nodes[_key] = arguments[_key];
    }

    nodes.forEach(function (node) {
      // eslint-disable-next-line unicorn/prefer-node-append
      fragment.appendChild(textNodeIfPrimitive(node));
    }); // eslint-disable-next-line unicorn/prefer-node-append

    this.appendChild(fragment);
  }

  function remove() {
    var parentNode = this.parentNode;

    if (parentNode) {
      // eslint-disable-next-line unicorn/prefer-node-remove
      parentNode.removeChild(this);
    }
  }

  var polyfillAppend = function polyfillAppend() {
    [ElementPrototype, DocumentFragmentPrototype].forEach(function (prototype) {
      if (prototype && !('append' in prototype)) {
        prototype.append = append;
      }
    });
  };

  var polyfillRemove = function polyfillRemove() {
    [ElementPrototype, CharacterDataPrototype, DocumentTypePrototype].forEach(function (prototype) {
      if (prototype && !('remove' in prototype)) {
        prototype.remove = remove;
      }
    });
  };

  var translations = {
    bg: {
      lang: 'bg',
      title: 'Управлението на „бисквитките“ (cookies) на интернет сайта на Европейския парламент',
      text: '<p>Уважаеми посетители,</p>' + '<p>Използваме аналитични бисквитки, за да Ви предложим по-добро сърфиране. Имате право да ги отхвърлите или приемете.</p>',
      textBottom1: 'За информация относно другите използвани от нас бисквитки и сървърни регистрационни файлове, Ви поканваме да прочетете за нашата ',
      textBottom2: ', нашата ',
      textBottom3: ' и за нашия ',
      link1: 'политика за защита на данните',
      link2: 'политика за бисквитките',
      link3: 'списък на бисквитките.',
      accept: 'Приемам аналитичните бисквитки',
      refuse: 'Отхвърлям аналитичните бисквитки',
      more: 'Повече',
      tooltip: 'Продължение',
      optInDesc: 'Въз основа на информацията, с която разполагаме, изглежда сте отхвърлили нашите аналитични бисквитки. Ако промените решението си, можете да задействате следната опция:',
      optInLabel: 'Приемам аналитичните бисквитки',
      optOutDesc: 'Въз основа на информацията, с която разполагаме, изглежда сте приели нашите аналитични бисквитки. Ако промените решението си, можете да задействате следната опция:',
      optOutLabel: 'Отхвърлям аналитичните бисквитки',
      chooseOptDesc: 'Въз основа на информацията, с която разполагаме, изглежда нито сте приели, нито сте отхвърлили нашите аналитични бисквитки. Съответно ние не сме поставили никакви бисквитки на Вашето устройство. Бихте ли могли да изразите своя избор изрично?',
      optDNT: 'Тъй като задействахте настройката „Не проследявай“ (DNT) на Вашия браузър, не добавяме никакви аналитични бисквитки на Вашето устройство. Ако промените решението си, моля деактивирайте настройката DNT на Вашия браузър и актуализирайте паметта си.'
    },
    cs: {
      lang: 'cs',
      title: 'Používání souborů cookies na internetových stránkách Evropského parlamentu',
      text: '<p>Vážení návštěvníci,</p>' + '<p>ke zlepšení kvality prohlížení našich webových stránek používáme analytické cookies. Máte možnost je přijmout nebo odmítnout.</p>',
      textBottom1: 'Další informace o ostatních cookies a záznamech na serveru, které používáme, naleznete na těchto stránkách: ',
      textBottom2: ', ',
      textBottom3: ' a ',
      link1: 'ochrana osobních údajů',
      link2: 'zásady používání cookies',
      link3: 'inventář cookies.',
      accept: 'Souhlasím se zasíláním analytických cookies',
      refuse: 'Nesouhlasím se zasíláním analytických cookies',
      more: 'více',
      tooltip: 'Přečtěte si více',
      optInDesc: 'Na základě informací, které máme k dispozici, se zdá, že nesouhlasíte se zasíláním našich analytických cookies. Pokud změníte názor, můžete aktivovat následující volbu:',
      optInLabel: 'Souhlasím se zasíláním analytických cookies',
      optOutDesc: 'Na základě informací, které máme k dispozici, se zdá, že souhlasíte se zasíláním našich analytických cookies. Pokud změníte názor, můžete aktivovat následující volbu:',
      optOutLabel: 'Nesouhlasím se zasíláním analytických cookies',
      chooseOptDesc: 'Na základě informací, které máme k dispozici, se zdá, že jste neučinili žádné rozhodnutí ohledně zasílání analytických cookies. Proto jsme ve vašem zařízení žádné nepoužili. Vyjádřete prosím svůj výslovný souhlas nebo nesouhlas výběrem jedné z možností.',
      optDNT: 'Jelikož jste ve svém prohlížeči aktivovali funkci „Do Not Track“ (DNT), nezaslali jsme do vašeho zařízení žádné analytické cookies. Pokud změníte názor, deaktivujte ve vašem prohlížeči funkci DNT a obnovte mezipaměť.'
    },
    da: {
      lang: 'da',
      title: 'Håndtering af cookies på Europa-Parlamentets websted',
      text: '<p>Kære besøgende</p>' + '<p>Vi bruger analysecookies for at tilbyde dig en bedre browsingoplevelse. Du kan vælge at afvise eller acceptere dem.</p>',
      textBottom1: 'For alle oplysninger om de øvrige cookies og serverlogfiler, vi bruger, opfordrer vi dig til at læse vores ',
      textBottom2: ', vores ',
      textBottom3: ' og vores ',
      link1: 'databeskyttelsespolitik',
      link2: 'cookiepolitik',
      link3: 'cookieoversigt.',
      accept: 'Jeg accepterer analysecookies',
      refuse: 'Jeg afviser analysecookies',
      more: 'Mere',
      tooltip: 'Læs mere',
      optInDesc: 'Ud fra de oplysninger, vi har til rådighed, har du tilsyneladende afvist vores analysecookies. Hvis du skifter mening, kan du vælge følgende:',
      optInLabel: 'Jeg accepterer analysecookies',
      optOutDesc: 'Ud fra de oplysninger, vi har til rådighed, har du tilsyneladende accepteret vores analysecookies. Hvis du skifter mening, kan du vælge følgende:',
      optOutLabel: 'Jeg afviser analysecookies',
      chooseOptDesc: 'Ud fra de oplysninger, vi har til rådighed, har du tilsyneladende hverken accepteret eller afvist vores analysecookies. Derfor har vi ikke placeret nogen på din enhed. Du bedes udtrykkeligt angive, hvilket valg du har truffet.',
      optDNT: 'Da du har aktiveret din browsers "Do Not Track"-indstilling (spor mig ikke), tilføjer vi ikke nogen analysecookies på din enhed. Hvis du skifter mening, bedes du deaktivere din browsers "Do Not Track"-indstilling og opdatere din cache.'
    },
    de: {
      lang: 'de',
      title: 'Verwendung von Cookies auf der Website des Europäischen Parlaments',
      text: '<p>Guten Tag!</p>' + '<p>Das Europäische Parlament setzt Analyse-Cookies, um die Qualität des Besuchs seiner Website zu verbessern. Sie können diese Cookies ablehnen oder akzeptieren.</p>',
      textBottom1: 'Weitere Informationen über die anderen Cookies und die Serverprotokolle, die vom Europäischen Parlament verwendet werden, finden Sie unter ',
      textBottom2: ', ',
      textBottom3: ' und im ',
      link1: 'Schutz personenbezogener Daten',
      link2: 'Cookies und Datenschutz',
      link3: 'Cookie-Verzeichnis.',
      accept: 'Analyse-Cookies akzeptieren',
      refuse: 'Analyse-Cookies ablehnen',
      more: 'Mehr',
      tooltip: 'Fortsetzung lesen',
      optInDesc: 'Anhand der vorliegenden Informationen haben Sie die Verwendung von Analyse-Cookies des Europäischen Parlaments abgelehnt. Wenn Sie Ihre Meinung ändern, können Sie das folgende Kontrollkästchen aktivieren:',
      optInLabel: 'Analyse-Cookies akzeptieren',
      optOutDesc: 'Anhand der vorliegenden Informationen haben Sie die Verwendung von Analyse-Cookies des Europäischen Parlaments akzeptiert. Wenn Sie Ihre Meinung ändern, können Sie das folgende Kontrollkästchen aktivieren:',
      optOutLabel: 'Analyse-Cookies ablehnen',
      chooseOptDesc: 'Anhand der vorliegenden Informationen haben Sie die Verwendung von Analyse-Cookies des Europäischen Parlaments weder akzeptiert noch abgelehnt. Dementsprechend hat das Europäische Parlament keine Cookies auf Ihrem Gerät gesetzt. Bitte treffen Sie hier ausdrücklich eine Auswahl:',
      optDNT: 'Da Sie in Ihrem Browser die Einstellung „Do Not Track“ (DNT, „nicht verfolgen“) aktiviert haben, setzt das Europäische Parlament auf Ihrem Gerät keine Analyse-Cookies. Wenn Sie Ihre Meinung ändern, müssen Sie in Ihrem Browser die DNT-Einstellung deaktivieren und den Cache aktualisieren.'
    },
    el: {
      lang: 'el',
      title: 'Πώς χρησιμοποιούνται τα cookies στον ιστότοπο του Ευρωπαϊκού Κοινοβουλίου',
      text: '<p>Αγαπητέ επισκέπτη,</p>' + '<p>Χρησιμοποιούμε cookies ανάλυσης για να σας προσφέρουμε καλύτερη εμπειρία περιήγησης . Έχετε την επιλογή να τα αρνηθείτε ή να τα αποδεχθείτε.</p>',
      textBottom1: 'Για οποιαδήποτε πληροφορία σχετικά με τα άλλα cookies και αρχεία καταγραφής διακομιστών που χρησιμοποιούμε, σας καλούμε να διαβάσετε την πολιτική μας για την ',
      textBottom2: ', την ',
      textBottom3: ' και τον ',
      link1: 'προστασία των δεδομένων',
      link2: 'πολιτική μας για τα cookies',
      link3: 'κατάλογο των cookies μας.',
      accept: 'Αποδέχομαι τα cookies ανάλυσης',
      refuse: 'Απορρίπτω τα cookies ανάλυσης',
      more: 'Περισσότερα',
      tooltip: 'Διαβάστε τη συνέχεια',
      optInDesc: 'Με βάση τις πληροφορίες που έχουμε στη διάθεσή μας, φαίνεται ότι αρνηθήκατε τα cookies ανάλυσής μας. Εάν αλλάξετε γνώμη, μπορείτε να ενεργοποιήσετε την ακόλουθη επιλογή:',
      optInLabel: 'Αποδέχομαι τα cookies ανάλυσης',
      optOutDesc: 'Με βάση τις πληροφορίες που έχουμε στη διάθεσή μας, φαίνεται ότι αποδεχθήκατε τα cookies ανάλυσής μας. Εάν αλλάξετε γνώμη, μπορείτε να ενεργοποιήσετε την ακόλουθη επιλογή:',
      optOutLabel: 'Απορρίπτω τα cookies ανάλυσης',
      chooseOptDesc: 'Με βάση τις πληροφορίες που έχουμε στη διάθεσή μας, φαίνεται ότι ούτε αποδεχθήκατε ούτε αρνηθήκατε τα cookies ανάλυσής μας. Κατά συνέπεια, δεν τοποθετήσαμε κανένα στη συσκευή σας. Θα θέλατε να δηλώσετε ρητά την επιλογή σας;',
      optDNT: 'Επειδή ενεργοποιήσατε τη ρύθμιση «Do Not Track» (DNT) («Μην παρακολουθείτε») στον φυλλομετρητή σας, δεν προσθέτουμε κανένα cookie ανάλυσης στη συσκευή σας. Εάν αλλάξετε γνώμη, απενεργοποιήστε τη ρύθμιση DNT του φυλλομετρητή σας και ανανεώστε την κρυφή μνήμη σας.'
    },
    es: {
      lang: 'es',
      title: 'La gestión de las cookies en el sitio del Parlamento Europeo',
      text: '<p>Estimado/a visitante:</p>' + '<p>Utilizamos cookies de análisis para ofrecerle una mejor experiencia de navegación. Tiene la opción de rechazarlas o de aceptarlas.</p>',
      textBottom1: 'Para cualquier información sobre las otras cookies y los servidores que utilizamos, le rogamos lea nuestra política de ',
      textBottom2: ', nuestra ',
      textBottom3: ' y nuestro ',
      link1: 'Protección de los datos personales',
      link2: 'Política de cookies',
      link3: 'Inventario de cookies.',
      accept: 'Acepto las cookies de análisis.',
      refuse: 'Rechazo las cookies de análisis.',
      more: 'Más',
      tooltip: 'Más...',
      optInDesc: 'Según la información de que disponemos, parece que usted rechazó nuestras cookies de análisis. Si cambia de opinión, puede activar la siguiente opción:',
      optInLabel: 'Acepto las cookies de análisis',
      optOutDesc: 'Según la información de que disponemos, parece que usted rechazó nuestras cookies de análisis. Si cambia de opinión, puede activar la siguiente opción:',
      optOutLabel: 'Rechazo las cookies de análisis',
      chooseOptDesc: 'Según la información de que disponemos, parece que usted rechazó nuestras cookies de análisis. Por lo tanto, no colocamos ninguna en su dispositivo. ¿Podría expresar explícitamente su elección?',
      optDNT: 'Al activar usted la configuración de «No realizar seguimiento» de su navegador, no añadimos ninguna cookie de análisis en su dispositivo. Si cambia de opinión, lo rogamos desactive la configuración de «No realizar seguimiento» de su navegador y actualice la memoria caché.'
    },
    et: {
      lang: 'et',
      title: 'Küpsiste haldamine Euroopa Parlamendi saidil',
      text: '<p>Austatud külastaja</p>' + '<p>Parema sirvimiskogemuse pakkumiseks kasutame analüüsiküpsiseid. Teil on võimalus neist keelduda või nendega nõustuda.</p>',
      textBottom1: 'Teabe saamiseks muude küpsiste ja serverilogide kohta, mida me kasutame, soovitame tutvuda meie ',
      textBottom2: ', ',
      textBottom3: ' ja ',
      link1: 'privaatsuspoliitika ja andmekaitsepõhimõtetega',
      link2: 'küpsiste kasutamise põhimõtetega',
      link3: 'küpsiste loeteluga.',
      accept: 'Nõustun analüüsiküpsistega',
      refuse: 'Keeldun analüüsiküpsistest',
      more: 'Lisateave',
      tooltip: 'Loe lähemalt',
      optInDesc: 'Meie käsutuses oleva teabe põhjal tundub, et keeldusite meie analüüsiküpsistest. Kui otsustate siiski analüüsiküpsistega nõustuda, võite aktiveerida järgmise valiku:',
      optInLabel: 'Nõustun analüüsiküpsistega',
      optOutDesc: 'Meie käsutuses oleva teabe põhjal tundub, et nõustusite meie analüüsiküpsistega. Kui otsustate siiski analüüsiküpsistest keelduda, võite aktiveerida järgmise valiku:',
      optOutLabel: 'Keeldun analüüsiküpsistest',
      chooseOptDesc: 'Meie käsutuses oleva teabe põhjal tundub, et te ei nõustunud meie analüüsiküpsistega ega ka ei keeldunud neist. Seetõttu ei paigaldanud me teie seadmele küpsiseid. Palun väljendage oma valikut selgesõnaliselt.',
      optDNT: 'Kuna aktiveerisite oma veebilehitsejas seade „Do Not Track“ (DNT), ei paigalda Euroopa Parlament teie seadmesse ühtegi analüüsiküpsist. Kui otsustate siiski küpsistega nõustuda, siis deaktiveerige oma veebilehitseja DNT seade ja värskendage vahemälu.'
    },
    fi: {
      lang: 'fi',
      title: 'Evästeiden hallinta Euroopan parlamentin verkkosivustolla',
      text: '<p>Tiedoksi sivuston käyttäjälle</p>' + '<p>Käytämme analytiikkaevästeitä käyttäjäkokemuksesi parantamiseen. Voit estää tai sallia ne.</p>',
      textBottom1: 'Tietoa käyttämistämme muista evästeistä ja palvelinlokeista: ',
      textBottom2: ', ',
      textBottom3: ' ja ',
      link1: 'tietosuojakäytäntömme',
      link2: 'evästekäytäntömme',
      link3: 'evästehakemistomme',
      accept: 'Hyväksyn analytiikkaevästeet',
      refuse: 'En hyväksy analytiikkaevästeitä',
      more: 'Lisää',
      tooltip: 'Lue lisää',
      optInDesc: 'Käytettävissämme olevien tietojen mukaan olet estänyt analytiikkaevästeemme. Jos muutat mieltäsi, voit valita seuraavan vaihtoehdon:',
      optInLabel: 'Hyväksyn analytiikkaevästeet',
      optOutDesc: 'Käytettävissämme olevien tietojen mukaan olet sallinut analytiikkaevästeemme. Jos muutat mieltäsi, voit valita seuraavan vaihtoehdon:',
      optOutLabel: 'En hyväksy analytiikkaevästeitä',
      chooseOptDesc: 'Käytettävissämme olevien tietojen mukaan et ole sallinut etkä estänyt analytiikkaevästeitämme. Näin ollen emme asettaneet niitä laitteellesi. Ilmoita, kumman vaihtoehdon valitset:',
      optDNT: 'Koska olet ottanut seuraamisenestoasetuksen (”Do Not Track”) käyttöön selaimessasi, emme lisää laitteellesi analytiikkaevästeitä. Jos muutat mieltäsi, ota DNT-asetus pois käytöstä selaimessasi ja päivitä välimuisti.'
    },
    fr: {
      lang: 'fr',
      title: 'La gestion des cookies sur le site du Parlement européen',
      text: '<p>Cher visiteur,</p>' + '<p>Nous utilisons des cookies analytiques pour vous offrir une meilleure expérience de navigation. Vous pouvez les refuser ou les accepter.</p>',
      textBottom1: 'Pour obtenir des informations sur les autres cookies et les journaux de serveur que nous utilisons, veuillez lire notre ',
      textBottom2: ', notre ',
      textBottom3: ' et notre ',
      link1: 'politique de protection des données',
      link2: 'politique d’utilisation des cookies',
      link3: 'inventaire des cookies.',
      accept: 'J’accepte les cookies analytiques',
      refuse: 'Je refuse les cookies analytiques',
      more: 'Plus d’options',
      tooltip: 'Lire la suite',
      optInDesc: 'Sur la base des informations dont nous disposons, il semble que vous ayez refusé nos cookies analytiques. Si vous changez d’avis, vous pouvez activer le choix suivant:',
      optInLabel: 'J’accepte les cookies analytiques',
      optOutDesc: 'Sur la base des informations dont nous disposons, il semble que vous ayez accepté nos cookies analytiques. Si vous changez d’avis, vous pouvez activer le choix suivant:',
      optOutLabel: 'Je refuse les cookies analytiques',
      chooseOptDesc: 'Sur la base des informations dont nous disposons, il semble que vous n’ayez ni accepté ni refusé nos cookies analytiques. Par conséquent, nous n’avons installé aucun cookie sur votre appareil. Pourriez-vous exprimer votre choix?',
      optDNT: 'Comme vous avez activé la fonctionnalité «Ne pas suivre» de votre navigateur, nous n’installons aucun cookie analytique sur votre appareil. Si vous changez d’avis, vous pouvez désactiver la fonctionnalité «Ne pas suivre» de votre navigateur et rafraîchir la mémoire cache.'
    },
    ga: {
      lang: 'ga',
      title: 'Bainistiú fianán ar láithreán gréasáin Pharlaimint na hEorpa',
      text: '<p>A chuairteoir, a chara,</p>' + '<p>Úsáidimid fianáin anailísíochta chun eispéireas brabhsála níos fearr a thairiscint duit. Tá an rogha agat iad a dhiúltú nó glacadh leo.</p>',
      textBottom1: 'Le haghaidh aon fhaisnéis faoi na fianáin agus na logaí freastalaí eile a úsáidimid, iarraimid ort go léifeá ár ',
      textBottom2: ', ár ',
      textBottom3: ' agus ár ',
      link1: 'mbeartas cosanta sonraí',
      link2: 'mbeartas fianán',
      link3: 'bhfardal fianán.',
      accept: 'Glacaim le fianáin anailísíochta',
      refuse: 'Diúltaím fianáin anailísíochta',
      more: 'Níos mó',
      tooltip: 'Read more',
      optInDesc: 'Bunaithe ar an bhfaisnéis atá ar fáil againn, is cosúil gur dhiúltaigh tú ár bhfianáin anailisíochta. Má athraíonn tú d’intinn, féadfaidh tú an rogha seo a leanas a ghníomhachtú:',
      optInLabel: 'Glacaim le fianáin anailísíochta',
      optOutDesc: 'Bunaithe ar an bhfaisnéis atá ar fáil againn, is cosúil gur ghlac tú lenár bhfianáin anailisíochta. Má athraíonn tú d’intinn, féadfaidh tú an rogha seo a leanas a ghníomhachtú:',
      optOutLabel: 'Diúltaím fianáin anailísíochta',
      chooseOptDesc: 'Bunaithe ar an bhfaisnéis atá ar fáil againn, is cosúil nár ghlac tú lenár bhfianáin anailisíochta nó nár dhiúltaigh tú iad. Dá bhrí sin, níl aon fhianáin suiteáilte againn ar do ghléas. An bhféadfá do rogha a chur in iúl?',
      optDNT: 'De bharr gur ghníomhaigh tú an socrú “Ná Rianaigh” (DNT) ar do bhrabhsálaí, ní chuireann Parlaimint na hEorpa aon fhianáin anailísíochta le do ghléas. Má athraíonn tú d’intinn, déan socrú DNT do bhrabhsálaí a dhíghníomhachtú agus do thaisce a athnuachan.'
    },
    hr: {
      lang: 'hr',
      title: 'Upravljanje kolačićima na internetskoj stranici Europskog parlamenta',
      text: '<p>Poštovani posjetitelji,</p>' + '<p>Koristimo analitičke kolačiće kako bismo vam omogućili bolje pretraživanje. Kolačiće možete odbiti ili prihvatiti.</p>',
      textBottom1: 'Sve informacije o drugim kolačićima i zapisnicima poslužitelja kojima se koristimo možete pronaći u našoj ',
      textBottom2: ', ',
      textBottom3: ' i ',
      link1: 'politici zaštite podataka',
      link2: 'politici kolačića',
      link3: 'popisu kolačića.',
      accept: 'Prihvaćam analitičke kolačiće',
      refuse: 'Ne prihvaćam analitičke kolačiće',
      more: 'Više',
      tooltip: 'Pročitaj više',
      optInDesc: 'Na temelju informacija kojima raspolažemo, zaključujemo da ste odbili analitičke kolačiće. Ako se predomislite, možete odabrati jednu od sljedećih mogućnosti:',
      optInLabel: 'Prihvaćam analitičke kolačiće',
      optOutDesc: 'Na temelju informacija kojima raspolažemo, zaključujemo da ste prihvatili analitičke kolačiće. Ako se predomislite, možete odabrati jednu od sljedećih mogućnosti:',
      optOutLabel: 'Ne prihvaćam analitičke kolačiće',
      chooseOptDesc: 'Na temelju informacija kojima raspolažemo, zaključujemo da niste ni prihvatili ni odbili analitičke kolačiće. U skladu s time na vaš uređaj nisu pohranjeni kolačići. Molimo vas da se izjasnite',
      optDNT: 'Budući da ste aktivirali opciju „Do Not Track” u svome pregledniku, na vaš uređaj ne dodajemo analitičke kolačiće. Ako se predomislite, deaktivirajte opciju „Do Not Track” u svome pregledniku i osvježite predmemoriju.'
    },
    hu: {
      lang: 'hu',
      title: 'A cookie-k használata az Európai Parlament honlapján',
      text: '<p>Tisztelt Látogató!</p>' + '<p>Elemzési célú sütiket használunk, hogy jobb böngészési élményt nyújtsunk Önnek. Lehetősége van arra, hogy elutasítsa vagy elfogadja őket.</p>',
      textBottom1: 'Az általunk használt többi sütivel és szervernaplóval kapcsolatos információkért, kérjük, olvassa el ',
      textBottom2: ', ',
      textBottom3: ' és ',
      link1: 'adatvédelmi szabályzatunkat',
      link2: 'sütikre vonatkozó szabályzatunkat',
      link3: 'sütijegyzékünket.',
      accept: 'Elfogadom az elemzési célú sütiket',
      refuse: 'Elutasítom az elemzési célú sütiket',
      more: 'További információk',
      tooltip: 'Tovább',
      optInDesc: 'A rendelkezésünkre álló információk alapján úgy tűnik, hogy Ön elutasította elemzési célú sütijeinket. Ha meggondolja magát, aktiválhatja a következő opciót:',
      optInLabel: 'Elfogadom az elemzési célú sütiket',
      optOutDesc: 'A rendelkezésünkre álló információk alapján úgy tűnik, hogy Ön elfogadta elemzési célú sütijeinket. Ha meggondolja magát, aktiválhatja a következő opciót:',
      optOutLabel: 'Elutasítom az elemzési célú sütiket',
      chooseOptDesc: 'A rendelkezésünkre álló információk alapján úgy tűnik, hogy Ön se nem fogadta el, se nem utasította el elemzési célú sütijeinket. Ezért a készülékén nem helyeztünk el sütit. Kérjük, szíveskedjen kifejezetten jelezni választását.',
      optDNT: 'Mivel aktiválta böngészőjének nyomon követést tiltó (DNT) beállítását, nem adunk hozzá elemzési célú sütiket az eszközéhez. Ha meggondolja magát, kérjük, oldja fel böngészője DNT-beállítását, és frissítse a gyorsítótárat.'
    },
    it: {
      lang: 'it',
      title: 'La gestione dei cookie sul sito del Parlamento europeo',
      text: '<p>Gentile visitatore,</p>' + '<p>utilizziamo cookie analitici per migliorare la tua esperienza di navigazione. Puoi scegliere se rifiutarli o accettarli.</p>',
      textBottom1: 'Per informazioni sugli altri cookie e i log di server che utilizziamo ti invitiamo a leggere la nostra ',
      textBottom2: ', la nostra ',
      textBottom3: ' e il nostro ',
      link1: 'politica in materia di protezione dei dati personali',
      link2: 'politica in materia di cookie',
      link3: 'inventario dei cookie.',
      accept: 'Accetto i cookie analitici',
      refuse: 'Rifiuto i cookie analitici',
      more: 'Altre opzioni',
      tooltip: 'Seguito',
      optInDesc: 'Sulla base delle informazioni a nostra disposizione, sembra che tu abbia rifiutato i nostri cookie analitici. Se cambi idea, puoi attivare la seguente scelta:',
      optInLabel: 'Accetto i cookie analitici',
      optOutDesc: 'Sulla base delle informazioni a nostra disposizione, sembra che tu abbia accettato i nostri cookie analitici. Se cambi idea, puoi attivare la seguente scelta:',
      optOutLabel: 'Rifiuto i cookie analitici',
      chooseOptDesc: 'Sulla base delle informazioni a nostra disposizione, sembra che tu non abbia né accettato né rifiutato i nostri cookie analitici. Pertanto, non abbiamo installato alcun cookie sul tuo dispositivo. Ti preghiamo di esplicitare la tua scelta.',
      optDNT: 'Poiché hai attivato l\'impostazione antitracciamento sul tuo browser, non installiamo alcun cookie analitico sul tuo dispositivo. Se cambi idea, puoi disattivare l\'impostazione antitracciamento del tuo browser e aggiornare la memoria cache.'
    },
    lt: {
      lang: 'lt',
      title: 'Slapukų tvarkymas Europos Parlamento svetainėje',
      text: '<p>Gerbiamas lankytojau,</p>' + '<p>naudojame analitinius slapukus, kad jums būtų patogiau naršyti. Galite sutikti arba nesutikti, kad jie būtų naudojami.</p>',
      textBottom1: 'Informaciją apie kitus mūsų naudojamus slapukus ir serverio žurnalus rasite perskaitę mūsų ',
      textBottom2: ', ',
      textBottom3: ' ir ',
      link1: 'duomenų apsaugos politiką',
      link2: 'slapukų politiką',
      link3: 'slapukų aprašą.',
      accept: 'Sutinku, kad būtų naudojami analitiniai slapukai',
      refuse: 'Nesutinku, kad būtų naudojami analitiniai slapukai',
      more: 'Daugiau',
      tooltip: 'Skaityti daugiau',
      optInDesc: 'Remiantis turima informacija panašu, jog nesutikote, kad būtų naudojami analitiniai slapukai. Jei apsigalvosite, galite aktyvuoti šį pasirinkimą:',
      optInLabel: 'Sutinku, kad būtų naudojami analitiniai slapukai',
      optOutDesc: 'Remiantis turima informacija panašu, jog sutikote, kad būtų naudojami analitiniai slapukai. Jei apsigalvosite, galite aktyvuoti šį pasirinkimą:',
      optOutLabel: 'Nesutinku, kad būtų naudojami analitiniai slapukai',
      chooseOptDesc: 'Remiantis turima informacija panašu, kad jūs nei davėte sutikimą naudoti analitinius slapukus, nei atsisakėte, kad jie būtų naudojami. Todėl jūsų įrenginyje jų nenaudojame. Ar galėtumėte aiškiai nurodyti, ką pasirinkate?',
      optDNT: 'Kadangi aktyvavote naršyklės nuostatą „Nesekti“ (DNT), į jūsų įrenginį nededame analitinių slapukų. Jei persigalvojate, savo naršyklėje išjunkite nuostatą DNT ir atnaujinkite atmintinę.'
    },
    lv: {
      lang: 'lv',
      title: 'Sīkdatņu pārvaldība Eiropas Parlamenta tīmekļa vietnē',
      text: '<p>Godātais apmeklētāj,</p>' + '<p>Mēs izmantojam analītiskās sīkdatnes, lai jums nodrošinātu labāku pārlūkošanas pieredzi. Jūs varat tās noraidīt vai pieņemt</p>',
      textBottom1: 'Ar papildu informāciju par citām mūsu izmantotajām sīkdatnēm un serveru ierakstiem  aicinām iepazīties sadaļās par ',
      textBottom2: ', mūsu ',
      textBottom3: ' un ',
      link1: 'personas datu aizsardzības politiku',
      link2: 'sīkdatņu politiku',
      link3: 'sīkdatņu sarakstu.',
      accept: 'Es piekrītu analītisko sīkdatņu izmantošanai',
      refuse: 'Es atsakos no analītiskajām sīkdatnēm',
      more: 'Vairāk',
      tooltip: 'Lasīt tālāk',
      optInDesc: 'Pamatojoties uz mūsu rīcībā esošo informāciju, šķiet, ka jūs noraidījāt mūsu analītiskās sīkdatnes. Ja pārdomājat, varat aktivizēt šādu izvēli:',
      optInLabel: 'Es piekrītu analītisko sīkdatņu izmantošanai',
      optOutDesc: 'Pamatojoties uz mūsu rīcībā esošo informāciju, šķiet, ka jūs piekritāt mūsu analītisko sīkdatņu izmantošanai. Ja pārdomājat, varat aktivizēt šādu izvēli:',
      optOutLabel: 'Es atsakos no analītiskajām sīkdatnēm',
      chooseOptDesc: 'Pamatojoties uz mūsu rīcībā esošo informāciju, šķiet, ka jūs nedz atteicāties no mūsu analītisko sīkdatņu izmantošanas, nedz piekritāt to izmantošanai. Līdz ar to mēs jūsu ierīcē tās neizmantojam. Vai jūs, lūdzu, varētu skaidri paust savu izvēli?',
      optDNT: 'Tā kā savā pārlūkprogramma jūs aktivizējāt iestatījumu “Nesekot” (DNT), mēs jūsu ierīcei nepievienojam nevienu analītisko sīkdatni. Ja pārdomājat, deaktivizējiet pārlūkprogrammas DNT iestatījumu un atsvaidziniet kešatmiņu.'
    },
    mt: {
      lang: 'mt',
      title: 'Il-ġestjoni tal-cookies fis-sit tal-Parlament Ewropew',
      text: '<p>Għażiż(a) viżitatur/viżitatriċi,</p>' + '<p>Aħna nużaw cookies analitiċi biex noffrulek esperjenza ta\' bbrawżjar aħjar. Għandek l-għażla li tirrifjuta jew li taċċettahom.</p>',
      textBottom1: 'Għal kwalunkwe informazzjoni dwar cookies oħra u l-logs tas-servers li nużaw, nistednuk taqra ',
      textBottom2: ', ',
      textBottom3: ' u ',
      link1: 'l-politika tagħna dwar il-protezzjoni tad-data',
      link2: 'il-politika tagħna dwar il-cookies',
      link3: 'l-inventarju tagħna dwar il-cookies.',
      accept: 'Naċċetta l-cookies analitiċi',
      refuse: 'Nirrifjuta l-cookies analitiċi',
      more: 'Aktar',
      tooltip: 'Read more',
      optInDesc: 'Fuq il-bażi tal-informazzjoni għad-dispożizzjoni tagħna, jidher li inti rrifjutat il-cookies analitiċi tagħna. Jekk tbiddel fehmtek, tista\' tattiva l-għażla li ġejja:',
      optInLabel: 'Naċċetta l-cookies analitiċi',
      optOutDesc: 'Fuq il-bażi tal-informazzjoni għad-dispożizzjoni tagħna, jidher li inti aċċettajt il-cookies analitiċi tagħna. Jekk tbiddel fehmtek, tista\' tattiva l-għażla li ġejja:',
      optOutLabel: 'Nirrifjuta l-cookies analitiċi ',
      chooseOptDesc: 'Fuq il-bażi tal-informazzjoni għad-dispożizzjoni tagħna, jidher li inti rrifjutajt il-cookies analitiċi tagħna. Konsegwentement, ma qegħidniex cookies fuq l-apparat tiegħek. Tista\' jekk jogħġbok tesprimi b\'mod espliċitu l-għażla tiegħek?',
      optDNT: 'Minħabba li attivajt il-konfigurazzjoni "Do Not Track" (DNT) tal-brawżer tiegħek, mhux se nżidu cookies analitiċi fuq l-apparat tiegħek. Jekk tbiddel fehmtek, jekk jogħġbok iddiżattiva l-konfigurazzjoni tad-DNT tal-brawżer tiegħek u aġġorna l-memorja tal-cache tiegħek.'
    },
    nl: {
      lang: 'nl',
      title: 'Cookies op de website van het Europees Parlement',
      text: '<p>Geachte bezoeker,</p>' + '<p>Wij gebruiken analytische cookies om uw surfervaring te verbeteren. U kunt deze cookies accepteren of weigeren.</p>',
      textBottom1: 'Nadere informatie over andere cookies en serverlogs die we gebruiken kunt u vinden in ons ',
      textBottom2: ', ons ',
      textBottom3: ' en onze lijst van ',
      link1: 'gegevensbeschermingsbeleid',
      link2: 'cookiebeleid',
      link3: 'cookies.',
      accept: 'Ik weiger analytische cookies',
      refuse: 'Ik accepteer analytische cookies',
      more: 'Meer',
      tooltip: 'Lees meer',
      optInDesc: 'Volgens de informatie waarover wij beschikken, heeft u onze analytische cookies geweigerd. Als u van mening verandert, kunt u de volgende optie activeren:',
      optInLabel: 'Ik accepteer analytische cookies',
      optOutDesc: 'Volgens de informatie waarover wij beschikken, heeft u onze analytische cookies geaccepteerd. Als u van mening verandert, kunt u de volgende optie activeren:',
      optOutLabel: 'Ik weiger analytische cookies',
      chooseOptDesc: 'Volgens de informatie waarover wij beschikken, heeft u onze analytische cookies noch geaccepteerd, nog geweigerd. We hebben dan ook geen cookies op uw apparaat geplaatst. Kunt u uw keuze uitdrukkelijke bevestigen?',
      optDNT: 'Omdat u de “Do Not Track”-optie in uw browser heeft ingeschakeld, plaatsen we geen analytische cookies op uw apparaat. Als u van mening verandert, gelieve dan de “Do Not Track”-optie in uw browser uit te schakelen en het cachegeheugen te wissen.'
    },
    pl: {
      lang: 'pl',
      title: 'Zarządzanie ciasteczkami na stronie Parlamentu Europejskiego',
      text: '<p>Drogi użytkowniku!</p>' + '<p>W celu zapewnienia wyższej jakości korzystania z naszej strony internetowej używamy analitycznych plików cookie. Możesz zdecydować, czy zgadzasz się na ich stosowanie, czy też nie.</p>',
      textBottom1: 'W celu uzyskania wszelkich informacji na temat innych używanych przez nas plików cookie i rejestrów aktywności sieciowej zapraszamy do zapoznania się z naszą ',
      textBottom2: ', naszą ',
      textBottom3: ' i naszym ',
      link1: 'Polityką ochrony prywatności',
      link2: 'Polityką dotyczącą plików cookie',
      link3: 'Wykazem plików cookie.',
      accept: 'Zgadzam się na stosowanie analitycznych plików cookie.',
      refuse: 'Nie zgadzam się na stosowanie analitycznych plików cookie.',
      more: 'Więcej',
      tooltip: 'Przeczytaj więcej',
      optInDesc: 'Na podstawie informacji, którymi dysponujemy, wydaje się, że nie zgadzasz się na stosowanie analitycznych plików cookie. Jeśli zmienisz zdanie, możesz dokonać następującego wyboru:',
      optInLabel: 'Zgadzam się na stosowanie analitycznych plików cookie',
      optOutDesc: 'Na podstawie informacji, którymi dysponujemy, wydaje się, że zgadzasz się na stosowanie analitycznych plików cookie. Jeśli zmienisz zdanie, możesz dokonać następującego wyboru:',
      optOutLabel: 'Nie zgadzam się na stosowanie analitycznych plików cookie',
      chooseOptDesc: 'Na podstawie informacji, którymi dysponujemy, wydaje się, że nie dokonałeś wyboru w odniesieniu do stosowania analitycznych plików cookie. W związku z tym nie dodaliśmy żadnych analitycznych plików cookie do twojego urządzenia. Czy możesz dokonać wyraźnego wyboru?',
      optDNT: 'W związku z włączeniem funkcji „Bez śledzenia” w twojej przeglądarce nie dodajemy żadnego analitycznego pliku cookie do twojego urządzenia. W przypadku zmiany zdania proszę wyłączyć funkcję „Bez śledzenia” w ustawieniach przeglądarki i odświeżyć pamięć podręczną.'
    },
    pt: {
      lang: 'pt',
      title: 'A gestão dos cookies no sítio Web do Parlamento Europeu.',
      text: '<p>Caro(a) visitante,</p>' + '<p>Utilizamos cookies analíticos para lhe oferecer uma melhor experiência de navegação. Tem a opção de recusá-los ou aceitá-los.</p>',
      textBottom1: 'Para mais informações sobre os outros cookies e registos de servidores que utilizamos, queira consultar a nossa ',
      textBottom2: ', a nossa ',
      textBottom3: ' e o nosso ',
      link1: 'política de proteção de dados',
      link2: 'política relativa aos cookies',
      link3: 'inventário de cookies.',
      accept: 'Aceito cookies analíticos',
      refuse: 'Recuso cookies analíticos',
      more: 'Mais',
      tooltip: 'Ler mais',
      optInDesc: 'Segundo a informação de que dispomos, parece ter recusado os nossos cookies analíticos. Se mudar de ideias, poderá ativar a seguinte escolha:',
      optInLabel: 'Aceito cookies analíticos',
      optOutDesc: 'Segundo a informação de que dispomos, parece ter aceite os nossos cookies analíticos. Se mudar de ideias, poderá ativar a seguinte escolha:',
      optOutLabel: 'Recuso cookies analíticos',
      chooseOptDesc: 'Segundo a informação de que dispomos, parece não ter aceite nem recusado os nossos cookies analíticos. Como tal, não instalámos nenhum cookie analítico no seu dispositivo. Pode indicar explicitamente a sua escolha?',
      optDNT: 'Uma vez que ativou a opção «não monitorizar» (Do Not Track - DNT) do seu navegador, não instalámos nenhum cookie analítico no seu dispositivo. Se mudar de ideias, desative a opção de DNT do seu navegador e atualize a cache.'
    },
    ro: {
      lang: 'ro',
      title: 'Gestionarea modulelor cookie pe site-ul Parlamentului European',
      text: '<p>Dragi vizitatori,</p>' + '<p>Utilizăm cookie-uri de analiză pentru a vă oferi o experiență de navigare mai bună. Puteți alege să le refuzați sau să le acceptați.</p>',
      textBottom1: 'Pentru informații suplimentare despre alte cookie-uri și jurnale de server pe care le folosim, vă invităm să citiți ',
      textBottom2: ', ',
      textBottom3: ' și ',
      link1: 'politica de protecție a datelor',
      link2: 'politica privind cookie-urile',
      link3: 'inventarul cookie-urilor.',
      accept: 'Accept cookie-urile de analiză',
      refuse: 'Refuz cookie-urile de analiză',
      more: 'Detalii',
      tooltip: 'Mai mult',
      optInDesc: 'Pe baza informațiilor de care dispunem, se pare că ați refuzat cookie-urile noastre de analiză. Dacă vă răzgândiți, puteți activa următoarea opțiune:',
      optInLabel: 'Accept cookie-urile de analiză',
      optOutDesc: 'Pe baza informațiilor de care dispunem, se pare că ați acceptat cookie-urile noastre de analiză. Dacă vă răzgândiți, puteți activa următoarea opțiune:',
      optOutLabel: 'Refuz cookie-urile de analiză',
      chooseOptDesc: 'Pe baza informațiilor de care dispunem, se pare că nu ați acceptat și nici nu ați refuzat cookie-urile noastre de analiză. Prin urmare, nu am folosit niciun cookie pe dispozitivul dvs. Vă rugăm să vă exprimați în mod explicit opțiunea.',
      optDNT: 'Deoarece ați activat setarea „Do Not Track” (DNT) a browserului, nu adăugăm niciun cookie de analiză pe dispozitivul dvs. Dacă vă răzgândiți, vă rugăm să dezactivați setarea DNT a browserului dvs. și să actualizați memoria cache.'
    },
    sk: {
      lang: 'sk',
      title: 'Správa súborov cookies na webovej stránke Európskeho parlamentu',
      text: '<p>Vážený návštevník,</p>' + '<p>Európsky parlament používa analytické súbory cookie, aby vám umožnil jednoduchšie prehliadanie. Môžete sa rozhodnúť, či s ich používaním budete súhlasiť alebo nie.</p>',
      textBottom1: 'Viac o ostatných súboroch cookie a serverových logoch, ktoré používa Európsky parlament, si môžete prečítať na stránkach ',
      textBottom2: ', ',
      textBottom3: ' a ',
      link1: 'politika ochrany údajov',
      link2: 'politika používania súborov cookie',
      link3: 'zoznam používaných súborov cookie.',
      accept: 'Súhlasím s používaním analytických súborov cookie.',
      refuse: 'Nesúhlasím s používaním analytických súborov cookie.',
      more: 'Viac',
      tooltip: 'Čítať ďalej',
      optInDesc: 'Na základe nám dostupných informácií ste odmietli používanie analytických súborov cookie. Ak zmeníte názor, môžete aktivovať ich používanie kliknutím na:',
      optInLabel: 'Súhlasím s používaním analytických súborov cookie.',
      optOutDesc: 'Na základe nám dostupných informácií ste súhlasili s používaním analytických súborov cookie. Ak zmeníte názor, môžete deaktivovať ich používanie kliknutím na:',
      optOutLabel: 'Nesúhlasím s používaním analytických súborov cookie.',
      chooseOptDesc: 'Na základe nám dostupných informácií ste neurobili žiadne rozhodnutie týkajúce sa používania analytických súborov cookie. Preto na vašom zariadení nebudú použité. Vyjadrite svoj výslovný súhlas alebo nesúhlas výberom jednej z možností:',
      optDNT: 'Keďže ste si v prehliadači aktivovali nastavenie „Do Not Track“ (DNT – nesledovať), Európsky parlament do vášho zariadenia žiadne analytické súbory cookie neposiela. Ak zmeníte názor, v prehliadači si deaktivujte nastavenie DNT a obnovte vyrovnávaciu pamäť.'
    },
    sl: {
      lang: 'sl',
      title: 'Uporaba piškotkov na spletišču Evropskega parlamenta',
      text: '<p>Spoštovani obiskovalci,</p>' + '<p>analitične piškotke uporabljamo, da bi vam omogočili učinkovitejše brskanje. Lahko jih zavrnete ali sprejmete.</p>',
      textBottom1: 'Za vse informacije o drugih piškotkih in strežniških dnevnikih, ki jih uporabljamo, vas vabimo, da si preberete našo ',
      textBottom2: ', našo ',
      textBottom3: ' in naš ',
      link1: 'politiko varstva podatkov',
      link2: 'politiko piškotkov',
      link3: 'seznam piškotkov.',
      accept: 'Sprejmi analitične piškotke',
      refuse: 'Zavrni analitične piškotke',
      more: 'Več',
      tooltip: 'Preberite več',
      optInDesc: 'Na podlagi razpoložljivih informacij sklepamo, da ste zavrnili naše analitične piškotke. Če si premislite, lahko aktivirate naslednjo nastavitev:',
      optInLabel: 'Sprejmi analitične piškotke',
      optOutDesc: 'Na podlagi razpoložljivih informacij sklepamo, da ste sprejeli naše analitične piškotke. Če si premislite, lahko aktivirate naslednjo nastavitev:',
      optOutLabel: 'Zavrni analitične piškotke',
      chooseOptDesc: 'Na podlagi razpoložljivih informacij sklepamo, da niste niti sprejeli niti zavrnili naših analitičnih piškotkov. Na vašo napravo zato nismo namestili nobenih piškotkov. Prosimo vas, da izrecno navedete svojo izbiro.',
      optDNT: 'Ker ste aktivirali nastavitev brskalnika „Ne sledi“ (DNT), na vašo napravo ne bomo dodali analitičnih piškotkov. Če si premislite, morate v brskalniku deaktivirati nastavitev DNT in osvežiti predpomnilnik.'
    },
    sv: {
      lang: 'sv',
      title: 'Hur används kakor (cookies), på Europaparlamentets webbplats?',
      text: '<p>Hej,</p>' + '<p>vi använder analytiska kakor för att du lättare ska kunna navigera på våra webbplatser. Du kan välja att avvisa eller godkänna dem.</p>',
      textBottom1: 'För information om övriga kakor och serverloggar som vi använder kan du läsa vår ',
      textBottom2: ', vår ',
      textBottom3: ' och vår ',
      link1: 'policy för skydd av personuppgifter',
      link2: 'policy för kakor',
      link3: 'genomgång av kakor.',
      accept: 'Jag godkänner analytiska kakor',
      refuse: 'Jag avvisar analytiska kakor',
      more: 'Mer',
      tooltip: 'Läs mer',
      optInDesc: 'Utifrån den information vi har tycks du ha valt att avvisa våra analytiska kakor. Om du ändrar dig kan du aktivera följande alternativ:',
      optInLabel: 'Jag godkänner analytiska kakor',
      optOutDesc: 'Utifrån den information vi har tycks du ha valt att godkänna våra analytiska kakor. Om du ändrar dig kan du aktivera följande alternativ:',
      optOutLabel: 'Jag avvisar analytiska kakor',
      chooseOptDesc: 'Utifrån den information vi har tycks du varken ha godkänt eller avvisat våra analytiska kakor. Vi har därför inte placerat några sådana kakor på din enhet. Vänligen ange uttryckligen ditt val',
      optDNT: 'Eftersom du har aktiverat ”Spåra inte”-inställningen i din webbläsare har vi inte placerat några analytiska kakor på din enhet. Om du ändrar dig kan du avaktivera ”Spåra inte”-inställningen i din webbläsare och uppdatera din cache.'
    },
    en: {
      lang: 'en',
      title: "Managing cookies on Parliament's website",
      text: '<p>Dear visitor,</p>' + '<p>We use analytics cookies to offer you a better browsing experience. You have the choice to refuse or accept them.</p>',
      textBottom1: 'For any information on the other cookies and server logs we use, we invite you to read our ',
      textBottom2: ', our ',
      textBottom3: ' and our ',
      link1: 'data protection policy',
      link2: 'cookies policy',
      link3: 'cookies inventory.',
      accept: 'I accept analytics cookies',
      refuse: 'I refuse analytics cookies',
      more: 'More',
      tooltip: 'Read more',
      optInDesc: 'Based on the information at our disposal, it seems you refused our analytics cookies. If you change your mind, you may activate the following choice:',
      optInLabel: 'I accept analytics cookies',
      optOutDesc: 'Based on the information at our disposal, it seems you accepted our analytics cookies. If you change your mind, you may activate the following choice:',
      optOutLabel: 'I refuse analytics cookies',
      chooseOptDesc: 'Based on the information at our disposal, it seems you neither accepted nor refused our analytics cookies. Consequently, we did not place any on your device. Could you please explicitly express your choice?',
      optDNT: 'Because you activated the "Do Not Track" (DNT) setting of your browser, we do not add any analytics cookie on your device. If you change your mind, please de-activate the DNT setting of your browser and refresh your cache.'
    }
  };

  polyfillAppend();
  polyfillRemove();
  var labels = translations[document.body.parentElement.lang] || translations.en;
  var NOTFOUND = -1; // cookie time to live: 13 months in milliseconds

  var COOKIE_TTL = (365 + 31) * 24 * 60 * 60 * 1000; // URL pour le bouton "En savoir plus" du menu

  var urltarget = 'privacy-policy'; // Nom des fichiers JS et CSS necessaire au composant des cookies

  var cookiename = window.$__cookiename || 'europarlcookiepolicysagreement'; // Nom du cookie utilise pour la sauvegarde du choix

  var currentCookies = function currentCookies() {
    return document.cookie;
  };

  var activateCookieManagement = true;
  /* eslint-disable eqeqeq */

  var isDNT = navigator.doNotTrack == 'yes' || navigator.doNotTrack == '1' || navigator.msDoNotTrack == '1' || window.doNotTrack == '1';
  /* eslint-enable eqeqeq */

  var ATIcookies = ['atidvisitor', 'atreman', 'atredir', 'atsession', 'atuserid', 'attvtreman', 'attvtsession', 'atwebosession'];
  var trackerData = document.querySelector("script[data-tracker-name='ATInternet']");
  var userConsent = [{
    name: 'WEBA',
    // name of the service
    serviceURL: trackerData // url of the service set by the programmer inside the HTML
    ? trackerData.getAttribute('data-value') : ''
  }];

  var trackerNode = function trackerNode() {
    return document.querySelector("script[src=\"".concat(userConsent[0].serviceURL, "\"]"));
  }; // - GESTION DES COOKIES  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


  var stringInString = function stringInString(needle, haystack) {
    return haystack && haystack.indexOf(needle) !== NOTFOUND;
  };

  var findElement = function findElement(location, tag) {
    return function (target, attribute) {
      return document.querySelector(location).querySelector("".concat(tag, "[").concat(attribute, "*=\"").concat(target, "\"]"));
    };
  };

  var findScriptInHead = findElement('head', 'script');
  var findScriptInBody = findElement('body', 'script');
  var findLink = findElement('head', 'link');
  var cookieDomain = stringInString('europarl.europa.eu', location.hostname) ? '.europarl.europa.eu' : location.hostname.replace('www', '');

  var injectCss = function injectCss(scriptElement, urltarget) {
    // Verification que le fichier CSS n'est pas deja present avant le chargement
    if (findLink("".concat(urltarget, ".css"), 'href')) {
      init();
    } else {
      var cssUrl = scriptElement.src.replace("".concat(urltarget, ".js"), urltarget).concat('.css'); // Creation de l'appel du fichier CSS

      var c = document.createElement('link');
      c.setAttribute('rel', 'stylesheet');
      c.setAttribute('type', 'text/css');
      c.setAttribute('href', cssUrl); // Ajout des evenements de chargement

      c.addEventListener('load', init, false);
      c.addEventListener('error', function (_) {
        remove$1();
      }); // Chargement du fichier CSS associe

      document.querySelector('head').append(c);
    }
  };

  function isCookieSet() {
    // Recherche du cookies d'acceptation
    // Resultat:
    //   -1 si cookie non-trouve
    // eslint-disable-next-line no-unused-vars
    var _currentCookies$split = currentCookies().split(';') // eslint-disable-next-line unicorn/no-reduce
    .reduce(function (_ref, cookie) {
      var _ref2 = _slicedToArray(_ref, 2),
          acc = _ref2[0],
          stop = _ref2[1];

      if (stop) {
        return [acc, stop];
      }

      var _cookie$split = cookie.split('='),
          _cookie$split2 = _slicedToArray(_cookie$split, 2),
          name = _cookie$split2[0],
          value = _cookie$split2[1];

      return name.trim() === cookiename ? [value.trim(), true] : [acc, stop];
    }, [-1, false]),
        _currentCookies$split2 = _slicedToArray(_currentCookies$split, 2),
        cookieFound = _currentCookies$split2[0],
        _ = _currentCookies$split2[1];

    return cookieFound !== -1;
  } // COOKIES : recherche de la presence du cookie d'acceptation


  function check() {
    if (isCookieSet() || isDNT) {
      remove$1();
    } else {
      // Recherche de l'adresse du fichier JS pour l'appel CSS dans l'entete de la page
      var scriptElement = findScriptInHead(urltarget, 'src') || findScriptInBody(urltarget, 'src'); // Recherche de l'adresse du fichier JS pour l'appel CSS dans le corps de la page

      if (scriptElement !== null) {
        // Ajout du fichier CSS pour le traitement du message
        injectCss(scriptElement, urltarget);
      }
    }

    if (isDNT || stringInString("".concat(cookiename, "=0"), currentCookies())) {
      ATIcookies.forEach(function (item) {
        if (stringInString(item, currentCookies())) {
          document.cookie = "".concat(item, "= ;expires=Thu, 01 Jan 1970 00:00:01 GMT; domain=").concat(cookieDomain, "; path=/; SameSite=strict");
        }
      });
    } // console.log(document.cookie);

  }

  var cookieExpiration = function cookieExpiration() {
    return "expires=".concat(new Date(Date.now() + COOKIE_TTL).toUTCString(), ";");
  };

  var setCookiePolicyCookie = function setCookiePolicyCookie(v) {
    // The value of the cookie should be :
    // 1 : the visitor accepted
    // 0 : the visitor refused
    document.cookie = "".concat(cookiename, "=").concat(v, "; ").concat(cookieExpiration(), " domain=").concat(cookieDomain, "; path=/; SameSite=strict;");
  };

  function acceptCookiePolicy() {
    if (!trackerNode() && !isDNT && activateCookieManagement) {
      userConsent.forEach(function (item) {
        if (item.name.toLowerCase() === 'weba') {
          addTrackerNode(item.serviceURL, item.name);
        }
      });
    }

    setCookiePolicyCookie('1');
  }

  function rejectCookiePolicy() {
    if (trackerNode() && activateCookieManagement) {
      userConsent.forEach(function (item) {
        if (item.name.toLowerCase() === 'weba') document.querySelector('head').removeChild(document.querySelector("script[src=\"".concat(item.serviceURL, "\"]")));
      });
    }

    setCookiePolicyCookie('0');
  } // - VALIDATION - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
  // VALIDATION : acceptation de la police


  function agree(_) {
    // Fermeture du pop up
    hide(); // Sauvegarde de la decision

    acceptCookiePolicy();
  }

  function refuse(_) {
    // Fermeture du pop up
    hide(); // Sauvegarde de la decision

    rejectCookiePolicy();
  } // - INITIALISATION - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
  // INITIALISATION : creation du widget


  function init() {
    var links = {
      link1: 'https://www.europarl.europa.eu/privacy-policy/{XX}/data-protection',
      link2: 'https://www.europarl.europa.eu/privacy-policy/{XX}/cookies-policy',
      link3: 'https://www.europarl.europa.eu/privacy-policy/{XX}/cookies-inventory'
    };
    var t; // Identification du conteneur principal

    var page = document.body; // Ajout du parametre d'activation des CSS
    // eslint-disable-next-line unicorn/prefer-dataset

    page.setAttribute('data-jsactive', true); // Recuperation des libelles (boutons, titre, texte)
    // Creation du conteneur

    var popup = document.createElement('section');
    popup.classList.add('epjs_cookiepolicy');
    popup.setAttribute('id', 'cookie-policy'); // popup.setAttribute('aria-modal', 'false');

    popup.setAttribute('tabindex', '0');
    var content = document.createElement('div');
    popup.append(content); // Creation du titre

    /* t = document.createElement('h2');
    t.classList.add('epjs_title');
    t.setAttribute('id', 'cookie-policy-title');
    t.append(document.createTextNode(labels.title));
    content.append(t); */
    // Creation de la description top

    t = document.createElement('div');
    t.classList.add('epjs_text');
    t.setAttribute('id', 'cookie-policy-description-top');
    t.innerHTML = labels.text;
    content.append(t); // Creation du conteneur des boutons de reponse

    var b = document.createElement('div');
    b.classList.add('epjs_buttons');
    content.append(b); // Creation de la description bottom

    t = document.createElement('div');
    t.classList.add('epjs_text');
    t.setAttribute('id', 'cookie-policy-description-bottom');
    var textBottom1 = document.createElement('span');
    textBottom1.innerHTML = labels.textBottom1;
    var textBottom2 = document.createElement('span');
    textBottom2.innerHTML = labels.textBottom2;
    var textBottom3 = document.createElement('span');
    textBottom3.innerHTML = labels.textBottom3;

    if (getCookiePolicyURL('data-more-link').length === 0) {
      t.append(textBottom1);
      t.append(buildBannerAdjacentURLS('link1', links.link1));
      t.innerHTML = t.innerHTML.replace("<span>", "").replace("</span>", "");
      t.append(textBottom2);
      t.append(buildBannerAdjacentURLS('link2', links.link2));
      t.innerHTML = t.innerHTML.replace("<span>", "").replace("</span>", "");
      t.append(textBottom3);
      t.append(buildBannerAdjacentURLS('link3', links.link3));
      t.innerHTML = t.innerHTML.replace("<span>", "").replace("</span>", "");
    } else {
      t.append(textBottom1);
      t.append(buildBannerAdjacentURLS('link1'));
      t.innerHTML = t.innerHTML.replace("<span>", "").replace("</span>", "");
    }

    t.innerHTML = "<p>" + t.innerHTML + "</p>";
    content.append(t); // Creation des boutons

    var refuseButton = document.createElement('button');
    refuseButton.classList.add('epjs_agree');
    refuseButton.setAttribute('type', 'button');
    t = document.createElement('span');
    t.append(document.createTextNode(labels.refuse));
    refuseButton.append(t);
    b.append(refuseButton);
    var acceptButton = document.createElement('button');
    acceptButton.classList.add('epjs_agree');
    acceptButton.setAttribute('type', 'button');
    t = document.createElement('span');
    t.append(document.createTextNode(labels.accept));
    acceptButton.append(t);
    b.append(acceptButton); // Integration du pop up

    page.insertBefore(popup, page.firstChild); // Ajout des evenements

    refuseButton.addEventListener('click', refuse);
    acceptButton.addEventListener('click', agree); // set focus to the popup

    document.querySelector('#cookie-policy').focus(); // Animation d'affichage

    setTimeout(view, 10);
  } // INITIALISATION : affichage du widget anime


  function view() {
    var p = document.querySelector('#cookie-policy');
    if (p !== null) p.classList.add('epjs_displayed');
  } // INITIALISATION : disparition du widget anime


  function hide() {
    var p = document.querySelector('#cookie-policy');

    if (p !== null) {
      p.addEventListener('transitionend', remove$1, false);
      p.classList.remove('epjs_displayed');
    }
  } // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
  // INITIALISATION : suppression du widget


  function remove$1() {
    var tag; // Suppression des balises HTML

    tag = document.querySelector('#cookie-policy');
    if (tag !== null) tag.remove(tag); // Suppression des fichiers charges

    tag = findScriptInHead("".concat(urltarget, ".js"), 'src');
    if (tag !== null) tag.remove(tag);
    tag = findLink("".concat(urltarget, ".css"), 'href');
    if (tag !== null) tag.remove(tag); // delete exports
  }

  function noop() {}

  function fakeTrackerModuleFactory() {
    return {
      staticinfography: noop,
      refresh: noop,
      scan: noop
    };
  }

  function buildOIODescription(parameter) {
    var textDiv = document.createElement('div');
    textDiv.setAttribute('class', 'ep-a_text');
    var paragraph = document.createElement('p');

    if (parameter.toString().toUpperCase() === 'OPT-OUT') {
      paragraph.innerHTML = labels.optOutDesc;
    } else if (parameter.toString().toUpperCase() === 'OPT-IN') {
      paragraph.innerHTML = labels.optInDesc;
    } else if (parameter.toString().toUpperCase() === 'NONE') {
      paragraph.innerHTML = labels.chooseOptDesc;
    } else {
      paragraph.innerHTML = labels.optDNT;
    }

    textDiv.append(paragraph);
    return textDiv;
  }

  function buildOIOCheckbox(parameter, index) {
    var containerDiv = document.createElement('div');
    containerDiv.setAttribute('class', 'ep_cookies-form-field');
    var input = document.createElement('input');

    if (index) {
      input.setAttribute('id', 'a11y-issue-' + index);
    } else {
      input.setAttribute('id', 'a11y-issue-1');
    }

    input.setAttribute('name', 'cookies-validation');
    input.setAttribute('type', 'radio');
    input.setAttribute('value', parameter);
    var label = document.createElement('label');

    if (index) {
      label.setAttribute('for', 'a11y-issue-' + index);
    } else {
      label.setAttribute('for', 'a11y-issue-1');
    }

    label.innerHTML = parameter;
    input.addEventListener('click', chooseOptMode);
    containerDiv.append(input);
    containerDiv.append(label);
    return containerDiv;
  }

  function buildWidget(optStatus) {
    var formNode = document.createElement('form');
    formNode.setAttribute('action', '');
    formNode.setAttribute('id', 'ep_opt');
    formNode.setAttribute('class', 'ep_opt-form');
    var fieldsetNode = document.createElement('fieldset');
    var checkboxLabel = '';
    var checkboxLabel2 = '';

    if (optStatus.toString().toUpperCase() === 'OPT-IN' && false) {
      checkboxLabel = labels.optInLabel;
    } else if (optStatus.toString().toUpperCase() === 'OPT-OUT' && false) {
      checkboxLabel = labels.optOutLabel;
    } else {
      checkboxLabel = labels.optOutLabel;
      checkboxLabel2 = labels.optInLabel;
    }

    formNode.innerHTML = '';
    fieldsetNode.innerHTML = '';
    fieldsetNode.append(buildOIODescription(optStatus)); //if (optStatus.toString().toUpperCase() === 'NONE') {

    {
      fieldsetNode.append(buildOIOCheckbox(checkboxLabel, 1));
      fieldsetNode.append(buildOIOCheckbox(checkboxLabel2, 2));
    }

    formNode.append(fieldsetNode);
    document.querySelector('#ep-opt-js').append(formNode);

    if (optStatus.toString().toUpperCase() === 'OPT-OUT') {
      document.querySelector('#a11y-issue-2').setAttribute('checked', 'checked');
    }

    if (optStatus.toString().toUpperCase() === 'OPT-IN') {
      document.querySelector('#a11y-issue-1').setAttribute('checked', 'checked');
    }
  }

  function addOptIO() {
    {
      var container = document.querySelector('#ep-opt-js');

      if (container) {
        var textToHide = container.querySelector('.ep-a_text') || container.querySelector('div');

        if (textToHide) {
          textToHide.style.display = 'none';
        }

        if (isDNT) {
          container.append(buildOIODescription('DNT'));
        } else if (stringInString("".concat(cookiename, "=0"), currentCookies())) {
          buildWidget('OPT-IN');
        } else if (stringInString("".concat(cookiename, "=1"), currentCookies())) {
          buildWidget('OPT-OUT');
        } else {
          buildWidget('NONE');
        }
      }
    }
  }

  function chooseOptMode(event) {
    var optioButton = document.querySelector('#a11y-issue-1'); //refuse

    var optioButton2 = document.querySelector('#a11y-issue-2'); //accept
    //document.querySelector('#ep-opt-js').innerHTML = '';

    /*if (optioButton2 === null) {
      if (optioButton.checked) {
        acceptCookiePolicy();
        optioButton2.removeAttribute('checked');
        optioButton2.checked = false;
        //buildWidget('OPT-OUT');
      } else {
        rejectCookiePolicy();
        check();
        optioButton.removeAttribute('checked');
        optioButton.checked = false;
        //buildWidget('OPT-IN');
      }
    } else */

    if (event.currentTarget.id === "a11y-issue-2") {
      acceptCookiePolicy();
      optioButton.removeAttribute('checked');
      optioButton.checked = false;
      document.querySelector('#ep-opt-js fieldset').getElementsByClassName('ep-a_text')[0].innerHTML = "<p>" + labels.optOutDesc + "</p>"; //buildWidget('OPT-OUT');
    } else {
      rejectCookiePolicy();
      check();
      optioButton2.removeAttribute('checked');
      optioButton2.checked = false;
      document.querySelector('#ep-opt-js fieldset').getElementsByClassName('ep-a_text')[0].innerHTML = "<p>" + labels.optInDesc + "</p>"; //buildWidget('OPT-IN');
    }
  }

  function logDNTStatus() {
    if (window.doNotTrack || navigator.doNotTrack || navigator.msDoNotTrack) {
      if (isDNT) {
        console.log('DNT enabled');
      } else {
        console.log('DNT disabled');
      }
    } else {
      console.log('DNT not supported');
    }
  }

  function addTrackerNode(url, className) {
    var theNode = document.createElement('script');
    theNode.setAttribute('type', 'text/javascript');
    theNode.setAttribute('defer', '');
    theNode.setAttribute('src', url);
    theNode.setAttribute('class', 'tracker-node-' + className);
    document.querySelector('head').append(theNode);
  }

  function getCookiePolicyURL(parameter) {
    var attr = parameter;
    var selector = "script[".concat(attr, "]");
    var element = document.querySelector(selector);
    return element ? element.getAttribute(attr) : '';
  }

  function trackerModuleIdFromUrl(url) {
    return url.split('/').pop().split('.').shift();
  }

  function buildBannerAdjacentURLS(parameter, link) {
    var info = document.createElement('a');
    var attribute = '';
    if (parameter === 'link1') attribute = 'data-more-link';
    if (parameter === 'link2') attribute = 'cookie-policy-link';
    if (parameter === 'link3') attribute = 'cookie-inventory-link';
    var infoSrc = getCookiePolicyURL(attribute).replace('{XX}', labels.lang);
    if (infoSrc.length === 0) infoSrc = link.replace('{XX}', labels.lang);
    info.setAttribute('href', infoSrc);
    info.setAttribute('class', parameter);
    info.setAttribute('style', 'text-decoration: underline; color: inherit');
    info.textContent = labels[parameter]; // info.setAttribute('title', labels.tooltip);

    return info; // t = document.createElement('span');
    // t.append(document.createTextNode(labels.more));
    // info.append(t);
    // b.append(info);
  }

  {
    // should we display the banner?
    check(); // logDNTStatus();

    userConsent.forEach(function (item) {
      if (item.name.toLowerCase() !== 'weba') addTrackerNode(item.serviceURL, item.name);
    }); // only load tracker if the user has given explicit consent

    if (stringInString("".concat(cookiename, "=1"), currentCookies())) {
      userConsent.forEach(function (item) {
        if (item.name.toLowerCase() === 'weba') addTrackerNode(item.serviceURL, item.name);
      });
    } else if (typeof define === 'function' && define.amd) {
      // some feature (e.g. continuous loading, infographics depends depend on the trackers
      userConsent.forEach(function (item) {
        if (item.name.toLowerCase() === 'weba' && item.serviceURL) define(trackerModuleIdFromUrl(item.serviceURL), [], fakeTrackerModuleFactory);
      });
    }
  }

  if (typeof define === 'function' && define.amd) {
    define('privacy-policy', function () {
      return {
        addOptIO: addOptIO
      };
    });
  }

  exports.addOptIO = addOptIO;
  exports.addTrackerNode = addTrackerNode;
  exports.agree = agree;
  exports.buildBannerAdjacentURLS = buildBannerAdjacentURLS;
  exports.buildOIOCheckbox = buildOIOCheckbox;
  exports.buildOIODescription = buildOIODescription;
  exports.buildWidget = buildWidget;
  exports.check = check;
  exports.chooseOptMode = chooseOptMode;
  exports.getCookiePolicyURL = getCookiePolicyURL;
  exports.hide = hide;
  exports.init = init;
  exports.logDNTStatus = logDNTStatus;
  exports.refuse = refuse;
  exports.remove = remove$1;
  exports.trackerModuleIdFromUrl = trackerModuleIdFromUrl;
  exports.view = view;

  return exports;

}({}));
//# sourceMappingURL=privacy-policy.js.map
