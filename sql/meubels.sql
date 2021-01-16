CREATE TABLE `ajax_meubels` (
  `artikelnr` int(11) NOT NULL default '0',
  `naam` varchar(50) NOT NULL default '',
  `type` varchar(50) NOT NULL default '',
  `omschrijving` text NOT NULL default '',
  `prijs` float(5,2) NOT NULL default '0.00',
  PRIMARY KEY  (`artikelnr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ajax_meubels` VALUES (10084532, 'Armour', '2-zitsbank', 'De Armour is een zeer voordelig geprijsde designbank met een eigenzinnige uitstraling. De Armour is verkrijgbaar in een groot aantal bekledingssoorten en kleuren.', 449.00);

INSERT INTO `ajax_meubels` VALUES (10085305, 'Baltica', '2-zitsbank', 'De Baltica is een tijdloos en duurzaam model met een prima zitcomfort tegen een zeer voordelige prijs. Met zijn mooie afwerking zal deze combinatie lang onderdeel uit maken van uw interieur en zult u er veel zitplezier aan beleven. Dit model Premium is leverbaar in 3-zits, 2-zits en 1-zits en daarnaast ook als hoekbank of loungebank.', 599.00);

INSERT INTO `ajax_meubels` VALUES (10108335, 'Bari', '3-zitsbank', 'De Bari is een L-shape bank. Een mooie en complete moderne toevoeging aan uw woonkamer. Daarnaast is het model Bari verkrijgbaar als 3-zits, 2-zits en 1-zits.
Verkrijgbaar in verschillende kleuren.', 720.00);

INSERT INTO `ajax_meubels` VALUES (40074107, 'Canada', '6-zitsbank', 'De Canada is een tijdloos en duurzaam model met een enorm zitcomfort. Dit robuuste model is volledig naar uw gebruikswensen en de beschikbare ruimte in te delen door het samenvoegen van de verschillende combinaties en (hoek)elementen. Van 1-zits tot 3-zits en van hoekbank tot hocker is de Canada verkrijgbaar in een grote variëteit aan bekledingssoorten en -kleuren.', 1299.00);

INSERT INTO `ajax_meubels` VALUES (40084724, 'Colorado', '3-zitsbank', 'Dat is nog eens bijzonder zitten! Het model Colorado is een eigenzinnig en romantisch model dat alle aandacht zal krijgen in uw woonkamer. Door het combineren van verschillende stoffen/kleuren van de sierkussens kunt u dit model uw eigen &quot;handtekening&quot; geven. Dit model zelf en de sierkussens zijn in een grote vari&euml;teit aan bekledingssoorten en -kleuren verkrijgbaar.', 799.00);

INSERT INTO `ajax_meubels` VALUES (50121189, 'Hawaii', '5-zitsbank', 'De Hawaii is een comfortabele loungebank (L-shape) met ongekende stylingsmogelijkheden door de verschillende formaten (losse) kussens (mogelijk in diverse kleuren/stofsoorten).', 999.99);
