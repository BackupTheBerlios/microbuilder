### Makefile --- 

## Author: mbertier@alphanim.com
## Version: $Id: Makefile,v 1.1 2004/07/13 02:40:12 mbertier Exp $
## Keywords: 
## X-URL: 

all: tests tarball

tarball:
	cleanRep .
	tar cjf MicroBuilder.tar.bz2 ./*

doc:
	genDoc MicroBuilder

tests:
	find . -name "*.php" -exec php -l {} \;

### Makefile ends here
