# remove public folder berfore rebuild
echo 'clean up'
rm -rf public

# build hugo
echo 'build hugo'
hugo

# deploy to a Cloud provider
echo 'prepare hugo to deploy'
hugo deploy

# deploy app to Cloud
echo 'deploy'
cloud app deploy
