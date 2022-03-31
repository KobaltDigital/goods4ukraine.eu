#!/bin/bash
# git push and git pull it on

git pull
git push

echo "git pull on acc?"
select yn in "Yes" "No"; do
    case $yn in
        Yes ) ssh -A kobalt@goods4ukraine.eu 'cd /var/www/acc.goods4ukraine.eu/ && git pull && php artisan down && composer update --no-scripts && php artisan migrate:fresh && php artisan db:seed && composer dump-autoload -o && php artisan up'; break;;
        No ) break;;
    esac
done

echo "git pull on live?"
select yn in "Yes" "No"; do
    case $yn in
        Yes ) ssh -A kobalt@goods4ukraine.eu 'cd /var/www/goods4ukraine.eu/ && git pull && php artisan down && composer install && composer dump-autoload -o && php artisan migrate && php artisan up && sudo php artisan optimize:clear'; break;;
        No ) break;;
    esac
done

echo 'Done!'
