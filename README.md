# 🎬 DibrisPlus - Piattaforma Cinematografica

Una piattaforma web completa per gli amanti del cinema, sviluppata in PHP con MySQL. DibrisPlus permette agli utenti di esplorare un catalogo di film, creare liste personali, valutare i film e trovare cinema nelle vicinanze.

## ✨ Caratteristiche Principali

### 🎭 Per gli Utenti
- **Catalogo Film Completo** - Esplora un'ampia collezione di film con dettagli completi
- **Sistema di Valutazione** - Vota i tuoi film preferiti da 0 a 10
- **Liste Personali** - Organizza i film in:
  - ❤️ Preferiti
  - ⏰ Da guardare dopo
  - ✅ Già visti
- **Ricerca Avanzata** - Trova film per titolo
- **Profilo Personalizzabile** - Gestisci i tuoi dati e foto profilo
- **Cinema Finder** - Trova cinema vicini a te con mappa interattiva

### 👨‍💼 Per gli Amministratori
- **Gestione Film** - Aggiungi, modifica ed elimina film dal catalogo
- **Gestione Utenti** - Visualizza e gestisci gli account utente
- **Caricamento Media** - Upload di locandine e trailer

## 🛠️ Tecnologie Utilizzate

- **Backend**: PHP 7.4+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Mapping**: Leaflet.js + OpenStreetMap
- **Icons**: Font Awesome
- **Fonts**: Google Fonts (New Walt Disney Font)

## 🏗️ Struttura del Progetto

```
DibrisPlus/
├── Amministration/          # Area amministrativa
├── Cinema/                  # Finder cinema con mappa
├── Common_elements/         # Componenti condivisi
├── Film/                    # Pagine dettaglio film
├── Home/                    # Homepage
├── Login/                   # Sistema autenticazione
├── Registration/            # Registrazione utenti
├── Search_page/             # Ricerca film
├── User_area/              # Profilo utente
├── Script_php/             # Script PHP core
├── test/                   # Test automatici
└── presentation.php        # Landing page
```

## 🚀 Installazione

### Prerequisiti
- PHP 7.4 o superiore
- MySQL 5.7 o superiore / MariaDB 10.2+
- Web server (Apache/Nginx)

### Setup Database

1. Crea un database MySQL:
```sql
CREATE DATABASE unige;
```

2. Configura la connessione nel file `Common_elements/databaseConnection.php`:
```php
$conn = new mysqli('localhost', 'your_username', 'your_password', 'unige');
```

3. Crea le tabelle necessarie:
```sql
-- Tabella utenti
CREATE TABLE utenti (
    email VARCHAR(100) PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    numero_telefono VARCHAR(15),
    photo LONGBLOB,
    admin BOOLEAN DEFAULT FALSE
);

-- Tabella film
CREATE TABLE film (
    Titolo VARCHAR(255) PRIMARY KEY,
    Locandina LONGBLOB,
    AnnoDiRilascio YEAR,
    Regista VARCHAR(100),
    Genere VARCHAR(200),
    Durata INT,
    Produzione VARCHAR(200),
    Distribuzione VARCHAR(200),
    Paese VARCHAR(100),
    Incassi BIGINT,
    CostiDiProduzione BIGINT,
    Descrizione TEXT,
    Trailer VARCHAR(500),
    Attori TEXT
);

-- Tabelle per le liste utente
CREATE TABLE film_preferiti (
    Email VARCHAR(100),
    film VARCHAR(255),
    FOREIGN KEY (Email) REFERENCES utenti(email),
    FOREIGN KEY (film) REFERENCES film(Titolo),
    PRIMARY KEY (Email, film)
);

CREATE TABLE film_da_guardare (
    Email VARCHAR(100),
    film VARCHAR(255),
    FOREIGN KEY (Email) REFERENCES utenti(email),
    FOREIGN KEY (film) REFERENCES film(Titolo),
    PRIMARY KEY (Email, film)
);

CREATE TABLE film_visti (
    Email VARCHAR(100),
    film VARCHAR(255),
    FOREIGN KEY (Email) REFERENCES utenti(email),
    FOREIGN KEY (film) REFERENCES film(Titolo),
    PRIMARY KEY (Email, film)
);

-- Tabella voti
CREATE TABLE voti (
    Email VARCHAR(100),
    Voto INT CHECK (Voto >= 0 AND Voto <= 10),
    Film VARCHAR(255),
    FOREIGN KEY (Email) REFERENCES utenti(email),
    FOREIGN KEY (Film) REFERENCES film(Titolo),
    PRIMARY KEY (Email, Film)
);
```

### Installazione
1. Clona il repository:
```bash
git clone https://github.com/username/dibrisplus.git
```

2. Configura il web server per puntare alla cartella del progetto

3. Visita `presentation.php` per iniziare

## 🎯 Utilizzo

### Per gli Utenti
1. **Registrazione**: Crea un account dalla pagina di registrazione
2. **Login**: Accedi con le tue credenziali
3. **Esplora**: Naviga nel catalogo film dalla homepage
4. **Gestisci Liste**: Aggiungi film alle tue liste personali
5. **Valuta**: Assegna voti ai film che hai visto
6. **Cerca Cinema**: Usa la mappa per trovare cinema vicini

### Per gli Amministratori
1. Accedi con un account amministratore
2. Vai nell'area amministrativa
3. Gestisci film e utenti tramite le interfacce dedicate

## 🧪 Testing

Il progetto include test automatici nella cartella `test/`. Per eseguirli:

1. Configura l'URL di base nel file `test_all.php`
2. Esegui: `php test/test_all.php`

I test coprono:
- Registrazione utente
- Login/Logout
- Visualizzazione profilo
- Aggiornamento profilo

## 🔒 Sicurezza

- **Autenticazione sicura** con hash delle password
- **Sessioni gestite** correttamente
- **SQL Injection** prevenuta con prepared statements
- **XSS Protection** con sanitizzazione input
- **Controllo permessi** per area amministrativa
- **Validazione dati** lato server e client

## 🎨 Caratteristiche UI/UX

- Design responsive per dispositivi mobili
- Tema Disney-inspired con font personalizzato
- Animazioni CSS fluide
- Background animato con bolle
- Interfaccia intuitiva e user-friendly

## 📁 File Principali

- `presentation.php` - Landing page del sito
- `Common_elements/databaseConnection.php` - Configurazione database
- `Common_elements/controllo_accesso.php` - Controllo autenticazione
- `Common_elements/controlla_permessi.php` - Controllo permessi admin
- `Script_php/login.php` - Gestione login
- `Script_php/registration.php` - Gestione registrazione

## 🤝 Contribuire

1. Fork del repository
2. Crea un feature branch (`git checkout -b feature/NuovaFunzionalita`)
3. Commit delle modifiche (`git commit -m 'Aggiunta nuova funzionalità'`)
4. Push al branch (`git push origin feature/NuovaFunzionalita`)
5. Crea una Pull Request

## 📄 Licenza

Questo progetto è sviluppato per scopi educativi nell'ambito del corso di Applicazioni Web dell'Università di Genova.

## 👥 Autori

Progetto sviluppato per il corso di Applicazioni Web - DIBRIS, Università di Genova.

---

**🎬 DibrisPlus - La tua piattaforma cinematografica personale**
