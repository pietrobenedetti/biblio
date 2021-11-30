**Installare vue:**

`npm install -g @vue/cli`

**Scaricare il progetto**

Entrare nella cartella /front-office

Eseguire nel terminale:

`npm install`

Entrare nella cartella /back-office

Eseguire nel terminale:

`composer update`

**Collegamento DB**

Nella cartella /back-office cercare il file `.env.example`
Creare file `.env` uguale al file `.env.example`, e modificare il nome del database **DB_DATABASE = nome_db**

**Effettuare le migrazioni**

Per creare la struttura del database, entrare nella cartella /back-office ed eseguire nel terminale:

`php artisan migrate`

**Serve**

Nella cartella /back-office eseguire nel terminale:

`php artisan serve`

Nella cartella /front-office eseguire nel terminale:

`npm run serve`

Naviga in https://localhost:8080/. L'applicazione automaticamente si ricarica ad ogni modifica dei file
