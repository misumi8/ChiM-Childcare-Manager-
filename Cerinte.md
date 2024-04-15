# ChiM (Childcare Manager) - Specificarea cerintelor principale

Cuprins
=================
  * [1. Introducere](#1-introducere)
  * [2. Cerinte functionale](#2-cerinte-functionale)
    * 2.1 [Pagina de profil](#21-pagina-de-profil)
    * 2.3 [Pagina principala](#23-pagina-principala)
  * [3. Caracteristici ale sistemului](#3-caracteristici-ale-sistemului)
    * 3.1 [Inregistrare](#31-inregistrare)
    * 3.2 [Autentificare](#32-autentificare)
    * 3.3 [Deconectare](#33-deconectare)
    * 3.4 [Adaugare copil](#34-adaugare-copil)
      * 3.4.1 [Adaugare resursa multimedia](#341-adaugare-resursa-multimedia)
      * 3.4.2 [Calendar ore de somn si hranire](#342-calendar-ore-de-somn-si-hranire)
      * 3.4.3 [Adaugare camp informatii](#343-adaugare-camp-informatii)
      * 3.4.4 [Adaugare tag "important"](#344-adaugare-tag-"important")
      * 3.4.5 [Timestamp](#345-timestamp)
    * 3.5 [Timeline](#35-timeline)
    * 3.6 [Distribuire](#36-distribuire)
  * [4. Cerinte non-functionale](#4-cerinte-non-functionale)
    * 4.1 [Utilizare](#41-utilizare)
    * 4.2 [Securitate](#42-securitate)
    * 4.3 [Performanta](#43-performanta)
    * 4.4 [Disponibilitate](#44-disponibilitate)




## 1. Introducere
ChiM (Childcare Manager) este o aplicatie web responsiva cu arhitectura de tip social media creata cu scopul educarii cuplurilor care au, sau isi doresc copii. Aplicatia ofera resurse despre educarea unui copil in diferite etape ale cresterii lui, pune la dispozitie diferite mecanisme de gestiune a ingrijirii bebelusilor si faciliteaza interconectarea utilizatorilor.

## 2. Cerinte functionale
### 2.1 Pagina de profil
Sistemul de inregistrare a utilizatorilor permite adaugarea datelor personale in aplicatie si faciliteaza accesul la toate functionalitatile website-ului, precum calendarul hranirii, al orelor de somn, diverse resurse multimedia (fotografii, filme, inregistrari audio) privind evolutia copilului, istoricul medical, relationarea cu alti copii (e.g., verisori, colegi de gradinita/scoala) cu optiunea partajarii acestor resurse pe pagina principala a aplicatiei.
### 2.3 Pagina feed
Pagina feed este un spatiu comun unde orice utilizator poate vedea un flux cu toate postarile facute publice de catre useri prin optiunea de share.
## 3. System features
### 3.1 Register
Pagina de register creaza un cont nou.
### 3.2 Log in
Pagina de log in permite accesarea unui cont din baza de date.
### 3.3 Log out
Butonul de log out scoate utilizatorul din cont.
### 3.4 Adaugare copil
Optiune de adaugare copil pe profil.
#### 3.4.1 Adaugare resursa multimedia
Optiune de adaugare resursa multimedia.
#### 3.4.2 Calendar ore de somn si hranire
Calendar pentru gestionarea orelor de somn si hranire la copii sub 2 ani.
#### 3.4.3 Adaugare camp informatii
Optiune de adaugare diverse informatii legate de copil.
#### 3.4.4 Adaugare tag "important"
Optiune de a marca orice informatie a copilului ca fiind importanta.
#### 3.4.5 Timestamp
Fiecare informatie adaugata are un timestamp atasat.
### 3.5 Timeline
Aplicatia ofera o vedere cronologica a celor mai importante momente ale copiilor.
### 3.6 Share
Buton de postare resursa despre copil pe pagina feed.


## 4. Cerinte non-functionale
### 4.1 Utilizare
Aplicatia va fi usor de utilizat si de navigat, cu o interfata intuitiva care permite utilizatorilor sa acceseze rapid functionalitatile principale. Aplicația va fi, de asemenea, receptiva si adaptabila diferitelor tipuri de dispozitive si dimensiuni ale ecranului. Aplicatia va fi echipata cu butoane in partea de sus a ecranului pentru a naviga intre sectiuni. In sectiunea de profil a utilizatorului vor fi disponibile butoane suplimentare pentru personalizarea contului.
### 4.2 Securitate
Aplicatia va implementa masuri de securitate robuste pentru a proteja datele utilizatorilor si a preveni accesul neautorizat, cum ar fi criptarea, autentificarea utilizatorului si controlul accesului.
### 4.3 Performanta
Aplicația va fi optimizata pentru performanta, cu timpuri de incarcare rapide si o latenta minima, chiar si in cazul utilizarii intensive.
### 4.4 Disponibilitate
Aplicația va avea disponibilitate crescuta, cu o perioada minima de nefunctionare si ferestre de mentenanta, pentru a asigura utilizatorilor accesul la aplicație in orice moment.
