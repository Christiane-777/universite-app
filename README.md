# universite-app

## Description
Universite-app is a web application that allows students to **register online** and **track the status of their application file**.
It also provides an **administrator dashboard** where administrators can **receive, review, and manage student applications**.

---

## Student features 
- Online registration
- Application file submission
- Application status tracking (pending, approved, rejected)
- Personal student space

---

## Admin features
- Receive student applications
- View student information
- Approve or reject applications
- Manage application files

---

## Technologies used 
- **Frontend**: HTML, CSS, Javascript
- **Backend**: PHP
- **Local server**: WAMP Server
- **Database**: Mysql
- **Version control**: Git & Github

---

## Installation and setup
### 1. Requirements 
- Wamp Server installed
- Web browser (Chrome, Firefox, Edge)
- Git (optional)

---

### 2. Clone the repository
```bash
git clone https://github.com/Christiane-777/universite-app.git

### 3. Move the project to wamp
- Copy the folder universite-app
- Paste it into:
C:\wamp64\www\

### 4. Database Configuration
1. open phpMyAdmin
2. Create a database: CREATE DATABASE universite-app;
3. Import the project .sql file
4. Update the database connection file: 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universite-app";

---

### 5. Run the appliaction
- Start WAMP Server
- Make sure the icon is green
- Open your browser and go to:
http://localhost/universite-app

---

## Project structure
universite-app/
|---assets/
|-----|---css/
|-----|---img/
|-----|---js/
|-----|---lib/
|-----|---scss/
|-----|---uploads/
|---config/
|-----|---database.php
|---controllers/
|-----|---admin_actions.php
|-----|---login_admin.php
|-----|---login.php
|-----|---logout.php
|-----|---paiement.php
|-----|---register.php
|-----|---upload_docs.php
|-----|---uploads_docs.php
|---includes/
|-----|---foot.php
|-----|---footer.php
|-----|---head.php
|-----|---header.php
|-----|---navbar_admin.php
|-----|---navbar_etudiant.php
|---sql/
|-----|---universite.sql
|---views/
|-----|---admin/
|-----|---etudiant/
|-----|---public/
|index.php
|READ.ME

---

## Security
- Client-side and server-side form validation
- Session management for student and admin 
- Basic protection against unauthorized access

---

## Contributing
Contributions are welcome. Please submit your improvements through Pull requests.

---

## License 
This project is licensed under the MIT License.

--- 

## AUTHOR
K.C.C
Github: Christiane-777