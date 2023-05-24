# BKT-APP

Para ejecutar este proyecto se necesita de Laragon y Node.js instalados
Entramos en la carpeta de laragon/www 
Ahi dentro vamos a clonar el repositorio
git init
git clone https://github.com/KathieFranco/Becas-prueba1.git

Ahora desde laragon abrimos la terminal y entramos a la carpeta del repositorio
cd Becas-prueba1
composer install
cp .env.example .env
php artisan key:generate

Abrimos el codigo y dentro del archivo env buscamos el apartado
DB_DATABASE: Becas

Das en iniciar a Laragon

Desde terminar ejecutas el comando 
nmp run dev

Y listo ya podras ver el proyecto!
