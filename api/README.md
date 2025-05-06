# API

curl -k --request PATCH \
  --url https://localhost/users/5/two-factor/devices/fdac182d-b613-4b71-bb8d-6717a0c9341d \
  --header 'Content-Type: application/json' \
  --header 'accept: application/ld+json' \
  --data '{
  "code": "6a10a432",
  "name": "coucou"
}'


The API will be here.

Refer to the [Getting Started Guide](https://api-platform.com/docs/distribution) for more information.
