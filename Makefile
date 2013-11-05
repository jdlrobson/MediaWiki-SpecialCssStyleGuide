MW_INSTALL_PATH ?= ../..

lsg:
	# FIXME: Use more up to date Ruby version
	kss-node styles _styleguide --less styles/styles.less --template template
