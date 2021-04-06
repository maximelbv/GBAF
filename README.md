<h1>GBAF(Groupement Banque Assurance Français)</h1>

Description

Banking products and services are many and varied. In order to
best inform customers, employees of 340 bank branches and
insurance in France (agents, account managers, financial advisers, etc.)
search the Internet for information on banking products and
funders, among others.
Today, there is no database to search for this information from
reliably and quickly or to give its opinion on the partners and actors of the
banking sector, such as associations or solidarity funders.
To remedy this, the GBAF wishes to offer employees of large groups
French a single point of entry, listing a large amount of information
on the partners and actors of the group as well as on the products and services
banking and financial.

Context

This project is the last exercise of my training. It aims to train me in PHP and SQL in a professional context.

Constrains : 

IN GENERAL
✅ HTML5 / CSS3 structure 
⬛ Responsive 
✅ PHP / SQL for interactions between the site and the database.

LOGIN / LOGOUT
✅ Login required to access site information through a UserName and a Password.
⬛ When the page loads, the UserName and Password fields take the entire width of the screen, between the header and the footer
✅ At the first connection, the user can create his account via a page registration
⬛ The user can modify their personal information at any time via the "Account settings" page
✅ Required fields on the registration page:
    ○ Name;
    ○ First name;
    ○ UserName;
    ○ Password;
    ○ Secret question;
    ○ Answer to the secret question.
⬛ If the user forgets his password, he can enter his UserName and answer the secret question to create a new one.
✅ When the user is logged in, his name and first name are indicated in the header on all pages.
⬛ A button "Disconnect" is present in the header
⬛ If the user is logged out, he is automatically redirected to the first page for a new connection via an UserName and a Password.

USER CONNECTED 
✅ brief presentation of GBAF;
✅ list of the different actors / partners of the French banking system including:
    ○ logo;
    ○ title;
    ○ company presentation with display of the first line of
    text;
    ○ "Show more" button (to open a new page
    for each actor / partner).
⬛ Details of the partner page including:
    ● logo;
    ● title;
    ● full description text;
    ● Like / Dislike button used to give an opinion (professional and constructive) with one click on the actor / partner;
    ● indication of the number of Like / Dislike;
    ● button to post a new comment;
    ● list of comments on this actor / partner including:
        ○ the first name of the user who left the comment;
        ○ the date of publication;
        ○ the text.

Roadmap (sorted chonologically): 

✅ HTML / CSS structure 
✅ actors database
✅ implementation of the actors data in the index and single actor pages
✅ Login / register pages creation 
✅ users database 
✅ Register form : create an entry in the database with a password hash.
✅ Register form : error if username already in use
✅ Login form : Login if the ids match
✅ Login form : Redirection to the header with the session started
⬛ Media queries for the index page
⬛ Register form : REGEX
⬛ Styling the login and register pages
⬛ Password lost page
⬛ Styling and add responsive to the single actor page 
⬛ Comment section in the single actor pages
⬛ Like section in the single actor pages
⬛ Securing the forms
⬛ Securing the url access
⬛ Legal pages (contact, Legal notice)
⬛ Foreign key



Graphical charter

Wireframe and zoning: provided by our web designer.
Logo: provided by our web designer.
Colorimetry: red and white. According to the GBAF logo.
Fonts : Poppins

Ressources used : 

Editor : Visual Studio Code
Server : Apache 2.4.27, WAMP local
database : phpMyAdmin
Languages : HTML, CSS, PHP, SQL
Learning for this project :
    - https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql
    - https://www.php.net/docs.php
    - https://dev.mysql.com/doc/

Specifications and support

W3C validated
Responsive
Tested on Google Chrome, Firefox, Opera
Most of the lines in the code are commented, if you have a question, contact me at maximelefebvre60230@gmail.com

Status : in developpment.
