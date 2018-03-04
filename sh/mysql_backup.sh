#!/bin/sh

DB_NAME="cms"
DB_USER="root"
DB_PASS=""

BCK_DIR="/home/wwwroot/default/cms/sh"
DATE=`date +%Y%m%d_%H%M%S`

mysqldump --opt -u$DB_USER -p$DB_PASS $DB_NAME|gzip > $BCK_DIR/$DB_NAME.dump_$DATE.sql.gz

