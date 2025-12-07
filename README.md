# CSCI 2170: Intro to Server-Side Scripting

Fall semester 2025

## Assignment

* Assignment 3

## Developer info

* Full name: Alex Russell
* B00/B01 number: B00920458
* Dal email address: alexrussell@dal.ca

## Gitlab assignment folder

* Link to the Gitlab project folder: https://git.cs.dal.ca/courses/2025-Fall/csci-2170/assignments/a3/russell2 

## Application name and description

* Include list of features implemented
- Created class `ArticleController` using PHP OOP princples with getter methods: `getAllArticles()` and `getArticleById()` to display/route to desired results. (Really proud of this solution actually)
- Continuing with an OOP approach (since thats where im most comfortable) with user auth. 
- Login system, allowing those who do have an account to see premium content, prompting to register/login if not. 
- Logging out destroys current session.

* Any APIs used/created and their URLs.
* Any additional notes or considerations.

## Setup and test instructions

- git clone the repo into root directory (typically xampp/htdocs)

- run appache and mysql in xampp control panel

- open browser and enter localhost/{path/to/index.php} !

- now you should see a list of articles

## Tests

*Disclaimer*: all tests were done during development of that feature. So UI will be different throughout. 

### Test 1: ID routing (Default) 

![screenshot](public/assets/test1.png)

### Test 2: Slug Routing (Optional)

![screenshot](public/assets/test2.png)
at the time of this screenshot a visual bug when searching with slug was occuring with occuring with the id variable.

### Test 3: Premium Article without being logged in
![screenshot](public/assets/test3.png)
As you can see we are logged in as Yoda and now have access to the articles content

### Test 4: Premium Article while being registered
![screenshot](public/assets/test4.png)

## References/citations

1. APA/ACM/IEEE format

- Author unknown. (n.d.). How do you fix "fatal error: call to a member function bind_param() on bool" (PHP/MySQLi development)? In Quora. Retrieved from https://www.quora.com/How-do-you-fix-fatal-error-call-to-a-member-function-bind_param-on-bool-PHP-MySQL-mysqli-development 
- Deepak, S. (2017, June 20). proper way to logout from a session in PHP. Stack Overflow. https://stackoverflow.com/questions/3512507/proper-way-to-logout-from-a-session-in-php
- GeeksforGeeks. (2024, January 17). How to Validate Password using Regular Expressions in PHP ? GeeksforGeeks. https://www.geeksforgeeks.org/php/how-to-validate-password-using-regular-expressions-in-php/
- Plumb, J. (2013, June 12). Convert SQL results into PHP array. Stack Overflow. https://stackoverflow.com/questions/17056349/convert-sql-results-into-php-array
- Sampangi, R. (2025). LN15-PHP-Cookies-and-Sessions-using-PHP. https://dal.brightspace.com/d2l/le/content/395861/viewContent/5186911/View 
