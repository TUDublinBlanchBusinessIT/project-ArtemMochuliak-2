# Car Maintenance Log System

This project is a PHP/MySQL web application for recording and managing car maintenance services.
The user can enter details of a service (service type, cost, date) and the information is stored in a
MySQL database. The system can also display previously saved records and allows them to be updated
or deleted.

The application also includes a login system so that only authorised users can access the
maintenance records. Sessions are used to keep the user logged in, and there is a timeout feature
that logs the user out automatically after a period of inactivity. The system also includes search and filtering options to help users quickly find specific maintenance records.