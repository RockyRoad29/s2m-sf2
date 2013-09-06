/<cut>$/,/<\/cut>$/          d
/^parameters:/             i\
# Ceci est un modèle pour votre fichier `parameters.yml`, qui \
# est exclu du suivi de versions pour des raisons de sécurité.\
#\
# Modifiez ces valeurs selon vos besoins.\

/^    secret/              s/:\( *\).*$/:\1ThisTokenIsNotSoSecretChangeIt/;
/^    database.*_user/     s/:\( *\).*$/:\1root/;
/^    database.*_password/ s/:\( *\).*$/:\1~/;
/^    database.*_host/     s/:\( *\).*$/:\1127.0.0.1/;
/^    database.*_port/     s/:\( *\).*$/:\1~/;
/^    database.*_name/     s/:\( *\).*$/:\1symfony/;

