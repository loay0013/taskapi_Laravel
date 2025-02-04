TaskAPI Laravel
📝 Beskrivelse
TaskAPI er et RESTful API udviklet med Laravel, designet til at håndtere opgavestyring. Dette projekt tilbyder endpoints til oprettelse, læsning, opdatering og sletning (CRUD) af opgaver, hvilket muliggør effektiv integration med frontend-applikationer eller andre tjenester.

🚀 Funktioner
CRUD-operationer for opgaver
Brugerautentifikation og -autorisation
Validering af inputdata
Paginering af opgavelister
Fejlhåndtering og meningsfulde API-responser
📦 Teknologier anvendt
Laravel – PHP-rammeværk til webapplikationer
MySQL – Relationsdatabase til datalagring
JWT (JSON Web Tokens) – Til sikker brugerautentifikation
Composer – Afhængighedsstyring
🔧 Installation
Følg disse trin for at installere og køre projektet lokalt:

1.Klon repoet
git clone https://github.com/loay0013/taskapi_Laravel.git
cd taskapi_Laravel
2.Installer afhængigheder
composer install
3.Opret en miljøfil
cp .env.example .env
4.Generer applikationsnøgle
php artisan key:generate
5.Konfigurer database
Åbn .env-filen og opdater følgende sektion med dine databaseoplysninger:
makefile
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskapi
DB_USERNAME=din_brugernavn
DB_PASSWORD=dit_password
6.Migrer databasen
php artisan migrate
7.Start udviklingsserveren
php artisan serve
