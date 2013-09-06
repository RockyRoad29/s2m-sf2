
parameters.yml.dist: parameters-filter.sed parameters.yml
	sed -f $^ > $@

parameters.yml: parameters-gen.sed
	@echo Attention: vous allez écraser votre $@
	rm -i $@
	sed -f $<  parameters.yml.dist > $@
	@echo Editer votre nouveau fichier $@ selon vos besoins.
