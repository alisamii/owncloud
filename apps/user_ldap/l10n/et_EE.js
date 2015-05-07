OC.L10N.register(
    "user_ldap",
    {
    "Failed to clear the mappings." : "Vastendususte puhastamine ebaõnnestus.",
    "Failed to delete the server configuration" : "Serveri seadistuse kustutamine ebaõnnestus",
    "The configuration is valid and the connection could be established!" : "Seadistus on korrektne ning ühendus on olemas!",
    "The configuration is valid, but the Bind failed. Please check the server settings and credentials." : "Seadistus on korrektne, kuid ühendus ebaõnnestus. Palun kontrolli serveri seadeid ja ühenduseks kasutatavaid kasutajatunnuseid.",
    "The configuration is invalid. Please have a look at the logs for further details." : "Seadistus on vigane. Lisainfot vaata palun logidest.",
    "No action specified" : "Tegevusi pole määratletud",
    "No configuration specified" : "Seadistust pole määratletud",
    "No data specified" : "Andmeid pole määratletud",
    " Could not set configuration %s" : "Ei suutnud seadistada %s",
    "Deletion failed" : "Kustutamine ebaõnnestus",
    "Take over settings from recent server configuration?" : "Võta sätted viimasest serveri seadistusest?",
    "Keep settings?" : "Säilitada seadistused?",
    "{nthServer}. Server" : "{nthServer}. Server",
    "Cannot add server configuration" : "Ei suuda lisada serveri seadistust",
    "mappings cleared" : "vastendused puhastatud",
    "Success" : "Korras",
    "Error" : "Viga",
    "Please specify a Base DN" : "Palun määra baas DN",
    "Could not determine Base DN" : "Baas DN-i tuvastamine ebaõnnestus",
    "Please specify the port" : "Palun määra post",
    "Configuration OK" : "Seadistus on korras",
    "Configuration incorrect" : "Seadistus on vigane",
    "Configuration incomplete" : "Seadistus on puudulik",
    "Select groups" : "Vali grupid",
    "Select object classes" : "Vali objekti klassid",
    "Select attributes" : "Vali atribuudid",
    "Connection test succeeded" : "Ühenduse testimine õnnestus",
    "Connection test failed" : "Ühenduse testimine ebaõnnestus",
    "Do you really want to delete the current Server Configuration?" : "Oled kindel, et tahad kustutada praegust serveri seadistust?",
    "Confirm Deletion" : "Kinnita kustutamine",
    "_%s group found_::_%s groups found_" : ["%s grupp leitud","%s gruppi leitud"],
    "_%s user found_::_%s users found_" : ["%s kasutaja leitud","%s kasutajat leitud"],
    "Could not find the desired feature" : "Ei suuda leida soovitud funktsioonaalsust",
    "Invalid Host" : "Vigane server",
    "Server" : "Server",
    "User Filter" : "Kasutaja filter",
    "Login Filter" : "Kasutajanime filter",
    "Group Filter" : "Grupi filter",
    "Save" : "Salvesta",
    "Test Configuration" : "Testi seadistust",
    "Help" : "Abiinfo",
    "Groups meeting these criteria are available in %s:" : "Kriteeriumiga sobivad grupid on saadaval %s:",
    "only those object classes:" : "ainult need objektiklassid:",
    "only from those groups:" : "ainult nendest gruppidest:",
    "Edit raw filter instead" : "Selle asemel muuda filtrit",
    "Raw LDAP filter" : "LDAP filter",
    "The filter specifies which LDAP groups shall have access to the %s instance." : "Filter määrab millised LDAP grupid saavad ligipääsu sellele %s instantsile.",
    "Test Filter" : "Testi filtrit",
    "groups found" : "gruppi leitud",
    "Users login with this attribute:" : "Logimiseks kasutatkse atribuuti: ",
    "LDAP Username:" : "LDAP kasutajanimi:",
    "LDAP Email Address:" : "LDAP e-posti aadress:",
    "Other Attributes:" : "Muud atribuudid:",
    "Defines the filter to apply, when login is attempted. %%uid replaces the username in the login action. Example: \"uid=%%uid\"" : "Määrab sisselogimisel kasutatava filtri. %%uid asendab sisselogimistegevuses kasutajanime. Näide: \"uid=%%uid\"",
    "1. Server" : "1. Server",
    "%s. Server:" : "%s. Server:",
    "Add Server Configuration" : "Lisa serveri seadistus",
    "Delete Configuration" : "Kustuta seadistused",
    "Host" : "Host",
    "You can omit the protocol, except you require SSL. Then start with ldaps://" : "Sa ei saa protokolli ära jätta, välja arvatud siis, kui sa nõuad SSL-ühendust. Sel juhul alusta eesliitega ldaps://",
    "Port" : "Port",
    "User DN" : "Kasutaja DN",
    "The DN of the client user with which the bind shall be done, e.g. uid=agent,dc=example,dc=com. For anonymous access, leave DN and Password empty." : "Klientkasutaja DN, kellega seotakse, nt. uid=agent,dc=näidis,dc=com. Anonüümseks ligipääsuks jäta DN ja parool tühjaks.",
    "Password" : "Parool",
    "For anonymous access, leave DN and Password empty." : "Anonüümseks ligipääsuks jäta DN ja parool tühjaks.",
    "One Base DN per line" : "Üks baas-DN rea kohta",
    "You can specify Base DN for users and groups in the Advanced tab" : "Sa saad kasutajate ja gruppide baas DN-i määrata lisavalikute vahekaardilt",
    "Avoids automatic LDAP requests. Better for bigger setups, but requires some LDAP knowledge." : "Väldib automaatseid LDAP päringuid, Parem suurematele saitidele, aga nõuab mõningaid teadmisi LDAP kohta.",
    "Manually enter LDAP filters (recommended for large directories)" : "Sisesta LDAP filtrid automaatselt (sooitatav suurtele kataloogidele)",
    "Limit %s access to users meeting these criteria:" : "Piira %s liigpääs kriteeriumiga sobivatele kasutajatele:",
    "The filter specifies which LDAP users shall have access to the %s instance." : "Filter määrab millised LDAP kasutajad pääsevad ligi %s instantsile.",
    "users found" : "kasutajat leitud",
    "Saving" : "Salvestamine",
    "Back" : "Tagasi",
    "Continue" : "Jätka",
    "LDAP" : "LDAP",
    "Expert" : "Ekspert",
    "Advanced" : "Täpsem",
    "<b>Warning:</b> Apps user_ldap and user_webdavauth are incompatible. You may experience unexpected behavior. Please ask your system administrator to disable one of them." : "<b>Hoiatus:</b> rakendused user_ldap ja user_webdavauht ei ole ühilduvad. Töös võib esineda ootamatuid tõrkeid.\nPalu oma süsteemihalduril üks neist rakendustest kasutusest eemaldada.",
    "<b>Warning:</b> The PHP LDAP module is not installed, the backend will not work. Please ask your system administrator to install it." : "<b>Hoiatus:</b>PHP LDAP moodul pole paigaldatud ning LDAP kasutamine ei ole võimalik. Palu oma süsteeihaldurit see paigaldada.",
    "Connection Settings" : "Ühenduse seaded",
    "Configuration Active" : "Seadistus aktiivne",
    "When unchecked, this configuration will be skipped." : "Kui on märkimata, siis seadistust ei kasutata.",
    "Backup (Replica) Host" : "Varuserver",
    "Give an optional backup host. It must be a replica of the main LDAP/AD server." : "Lisa valikuline varuserver. See peab olema koopia peamisest LDAP/AD serverist.",
    "Backup (Replica) Port" : "Varuserveri (replika) port",
    "Disable Main Server" : "Ära kasuta peaserverit",
    "Only connect to the replica server." : "Ühendu ainult replitseeriva serveriga.",
    "Case insensitive LDAP server (Windows)" : "Tõusutundetu LDAP server (Windows)",
    "Turn off SSL certificate validation." : "Lülita SSL sertifikaadi kontrollimine välja.",
    "Not recommended, use it for testing only! If connection only works with this option, import the LDAP server's SSL certificate in your %s server." : "Pole soovitatav, kasuta seda ainult testimiseks! Kui ühendus toimib ainult selle valikuga, siis impordi LDAP serveri SSL sertifikaat oma %s serverisse.",
    "Cache Time-To-Live" : "Puhvri iga",
    "in seconds. A change empties the cache." : "sekundites. Muudatus tühjendab vahemälu.",
    "Directory Settings" : "Kausta seaded",
    "User Display Name Field" : "Kasutaja näidatava nime väli",
    "The LDAP attribute to use to generate the user's display name." : "LDAP atribuut, mida kasutatakse kasutaja kuvatava nime loomiseks.",
    "Base User Tree" : "Baaskasutaja puu",
    "One User Base DN per line" : "Üks kasutaja baas-DN rea kohta",
    "User Search Attributes" : "Kasutaja otsingu atribuudid",
    "Optional; one attribute per line" : "Valikuline; üks atribuut rea kohta",
    "Group Display Name Field" : "Grupi näidatava nime väli",
    "The LDAP attribute to use to generate the groups's display name." : "LDAP atribuut, mida kasutatakse ownCloudi grupi kuvatava nime loomiseks.",
    "Base Group Tree" : "Baasgrupi puu",
    "One Group Base DN per line" : "Üks grupi baas-DN rea kohta",
    "Group Search Attributes" : "Grupi otsingu atribuudid",
    "Group-Member association" : "Grupiliikme seotus",
    "Nested Groups" : "Sisegrupp",
    "When switched on, groups that contain groups are supported. (Only works if the group member attribute contains DNs.)" : "Sisse lülitamisel on toetatakse gruppe sisaldavad gruppe. (Toimib, kui grupi liikme atribuut sisaldab DN-e.)",
    "Paging chunksize" : "Kutsungi pataka suurus",
    "Chunksize used for paged LDAP searches that may return bulky results like user or group enumeration. (Setting it 0 disables paged LDAP searches in those situations.)" : "Pataka suurust kasutatakse LDAPi kutsungite kaupa otsingute puhul, mis võivad väljastada pikki kasutajate või gruppide loetelusid. (Määrates suuruseks 0, keelatakse LDAP patakate kaupa otsing taolistes situatsioonides)",
    "Special Attributes" : "Spetsiifilised atribuudid",
    "Quota Field" : "Mahupiirangu atribuut",
    "Quota Default" : "Vaikimisi mahupiirang",
    "in bytes" : "baitides",
    "Email Field" : "E-posti väli",
    "User Home Folder Naming Rule" : "Kasutaja kodukataloogi nimetamise reegel",
    "Leave empty for user name (default). Otherwise, specify an LDAP/AD attribute." : "Kasutajanime (vaikeväärtus) kasutamiseks jäta tühjaks. Vastasel juhul määra LDAP/AD omadus.",
    "Internal Username" : "Sisemine kasutajanimi",
    "By default the internal username will be created from the UUID attribute. It makes sure that the username is unique and characters do not need to be converted. The internal username has the restriction that only these characters are allowed: [ a-zA-Z0-9_.@- ].  Other characters are replaced with their ASCII correspondence or simply omitted. On collisions a number will be added/increased. The internal username is used to identify a user internally. It is also the default name for the user home folder. It is also a part of remote URLs, for instance for all *DAV services. With this setting, the default behavior can be overridden. To achieve a similar behavior as before ownCloud 5 enter the user display name attribute in the following field. Leave it empty for default behavior. Changes will have effect only on newly mapped (added) LDAP users." : "Vaikimisi tekitatakse sisemine kasutajanimi UUID atribuudist. See tagab, et kasutajanimi on unikaalne ja sümboleid pole vaja muuta. Sisemisel kasutajatunnuse puhul on lubatud ainult järgmised sümbolid: [ a-zA-Z0-9_.@- ]. Muud sümbolid asendatakse nende ASCII vastega või lihtsalt hüljatakse. Tõrgete korral lisatakse number või suurendatakse seda. Sisemist kasutajatunnust kasutatakse kasutaja sisemiseks tuvastamiseks. Ühtlasi on see ownCloudis kasutaja vaikimisi kodukataloogi nimeks. See on ka serveri URLi osaks, näiteks kõikidel *DAV teenustel. Selle seadistusega saab tühistada vaikimisi käitumise. Saavutamaks sarnast käitumist eelnevate ownCloud 5 versioonidega, sisesta kasutaja kuvatava nime atribuut järgnevale väljale. Vaikimisi seadistuseks jäta tühjaks. Muudatused mõjutavad ainult uusi (lisatud) LDAP kasutajate vastendusi.",
    "Internal Username Attribute:" : "Sisemise kasutajatunnuse atribuut:",
    "Override UUID detection" : "Tühista UUID tuvastus",
    "By default, the UUID attribute is automatically detected. The UUID attribute is used to doubtlessly identify LDAP users and groups. Also, the internal username will be created based on the UUID, if not specified otherwise above. You can override the setting and pass an attribute of your choice. You must make sure that the attribute of your choice can be fetched for both users and groups and it is unique. Leave it empty for default behavior. Changes will have effect only on newly mapped (added) LDAP users and groups." : "Vaikimis ownCloud tuvastab automaatselt UUID atribuudi. UUID atribuuti kasutatakse LDAP kasutajate ja gruppide kindlaks tuvastamiseks. Samuti tekitatakse sisemine kasutajanimi UUID alusel, kui pole määratud teisiti. Sa saad tühistada selle seadistuse ning määrata atribuudi omal valikul. Pead veenduma, et valitud atribuut toimib nii kasutajate kui gruppide puhul ning on unikaalne. Vaikimisi seadistuseks jäta tühjaks. Muudatused mõjutavad ainult uusi (lisatud) LDAP kasutajate vastendusi.",
    "UUID Attribute for Users:" : "UUID atribuut kasutajatele:",
    "UUID Attribute for Groups:" : "UUID atribuut gruppidele:",
    "Username-LDAP User Mapping" : "LDAP-Kasutajatunnus Kasutaja Vastendus",
    "Usernames are used to store and assign (meta) data. In order to precisely identify and recognize users, each LDAP user will have a internal username. This requires a mapping from username to LDAP user. The created username is mapped to the UUID of the LDAP user. Additionally the DN is cached as well to reduce LDAP interaction, but it is not used for identification. If the DN changes, the changes will be found. The internal username is used all over. Clearing the mappings will have leftovers everywhere. Clearing the mappings is not configuration sensitive, it affects all LDAP configurations! Never clear the mappings in a production environment, only in a testing or experimental stage." : "ownCloud kasutab kasutajanime talletamaks ja omistamaks (pseudo) andmeid. Et täpselt tuvastada ja määratleda kasutajaid, peab iga LDAP kasutaja omama sisemist kasutajatunnust. See vajab ownCloud kasutajatunnuse vastendust LDAP kasutajaks. Tekitatud kasutajanimi vastendatakse LDAP kasutaja UUID-iks. Lisaks puhverdatakse DN vähendamaks LDAP päringuid, kuid seda ei kasutata tuvastamisel. ownCloud suudab tuvastada ka DN muutumise. ownCloud sisemist kasutajatunnust kasutatakse üle kogu ownCloudi. Eemaldates vastenduse tekivad kõikjal andmejäägid. Vastenduste eemaldamine ei ole konfiguratsiooni tundlik, see mõjutab kõiki LDAP seadistusi! Ära kunagi eemalda vastendusi produktsioonis! Seda võid teha ainult testis või katsetuste masinas.",
    "Clear Username-LDAP User Mapping" : "Puhasta LDAP-Kasutajatunnus Kasutaja Vastendus",
    "Clear Groupname-LDAP Group Mapping" : "Puhasta LDAP-Grupinimi Grupp Vastendus"
},
"nplurals=2; plural=(n != 1);");
