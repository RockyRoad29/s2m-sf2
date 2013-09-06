/file: app\/config\/parameters.yml/ s/yml/yml.dist/

/<cut>$/,/<\/cut>$/          d
/<\/cut>$/                   i\
# --------------------------------------------------------------<cut>\
# Attention: Initialement généré par `composer install`,\
#     ce fichier, pour des raisons de sécurité,\
#     est exclu du suivi par une clause dans `.gitignore`.\
#\
#     Mais son modèle, `parameters.yml.dist`, est inclus\
#     dans le suivi. On peut le tenir à jour facilement grâce\
#     au filtre `parameters-filter.sed`, comme ceci:\
#\
# $ sed -f parameters-filter.sed app/config/parameters.yml > app/config/parameters.yml.dist\
# --------------------------------------------------------------</cut>\

/^    secret/              s/:\( *\).*$/:\1ThisTokenIsNotSoSecretChangeIt/;
/^    database.*_user/     s/:\( *\).*$/:\1root/;
/^    database.*_password/ s/:\( *\).*$/:\1~/;
/^    database.*_host/     s/:\( *\).*$/:\1127.0.0.1/;
/^    database.*_port/     s/:\( *\).*$/:\1~/;
/^    database.*_name/     s/:\( *\).*$/:\1symfony/;

