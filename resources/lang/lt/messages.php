<?php

return [

    /* ***********************
    * Navigation
    *********************** */
    'page' => 'Working.today',
    'timesheet' => 'Grafikas',
    'users' => 'Vartotojai',
    'profile' => 'Paskyra',
    'logout' => 'Atsijungti',

    // Admin
    'payroll' => 'Payroll',
    'managers' => 'Menedžeriai',
    'settings' => 'Nustatymai',

    // Manager
    'urgent-requests' => 'Laukia patvirtinimo',
    'check-by-date' => 'Pagal dieną',
    'fixes' => 'Pataisymai',

    // User


    /* ***********************
    * Login
    *********************** */
    'login' => 'Prisijungti',
    'e-mail' => 'El. paštas',
    'password' => 'Slaptažodis',
    'remember' => 'Prisiminti mane',
    'login-button' => 'Prisijungti',
    'forgot-password' => 'Pamiršai slaptažodį?',
    'login-error' => 'Duomenų įvedimo klaida.',


    /* ***********************
    * Admin
    *********************** */

    // Payroll
    'table-starts' => 'PRADŽIA',
    'table-ends' => 'PABAIGA',
    'table-salaries' => 'MOKĖTI',
    'table-fixes' => 'PATAISYMAI',
    'table-total' => 'VISO',
    'table-show' => 'ŽIŪRETI',
    'table-status' => 'BŪSENA',

    'status-current' => 'EINAMASIS',
    'status-approved' => 'PATVIRTINTAS',
    'pending-requests' => 'nepatvirtintų užklausų',

    'button-approve' => 'Patvirtinti',

    'week' => 'Savaitė',

    'by-user' => 'Pagal vartotoją',
    'by-day' => 'Pagal dieną',
    'only-fixes' => 'Pataisymai',

    'date' => 'DATA',
    'day' => 'DIENA',
    'status' => 'BŪSENA',
    'earned' => 'UŽDIRBO',
    'worked' => 'DIRBO',

    'status-not-submitted' => 'NEPATEIKTA',
    'status-cancelled' => 'ATMESTA',
    'status-waiting-approval' => 'LAUKIAMA PATVIRTINIMO',

    'day-shift' => 'Dieninė pamaina',
    'night-shift' => 'Naktinė pamaina',

    'table-fix' => 'PATAISYMAS',

    'comment' => 'Komentaras:',
    'total' => 'VISO:',

    'table-user' => 'VARTOTOJAS',
    'table-worked' => 'DIRBO',
    'table-earned' => 'UŽDIRBO',
    'table-sum' => 'SUMA',
    'table-comment' => 'KOMENTARAS',

    // Managers

    'button-add-manager' => 'Pridėti menedžerį',
    'table-name' => 'VARDAS',
    'table-email' => 'EL. PAŠTAS',
    'table-phone' => 'TELEFONAS',
    'table-actions' => 'VEIKSMAI',
    'button-edit' => 'Keisti',
    'are-you-sure' => 'Ar tikrai norite atlikti šį veiksmą?',
    'button-delete' => 'Pašalinti',
    'edit-manager' => 'Keisti menedžerio informaciją',

    'field-name' => 'Vardas:',
    'field-surname' => 'Pavardė:',
    'field-email' => 'El. paštas:',
    'field-phone' => 'Telefonas:',
    'field-new-pass' => 'Naujas slaptažodis:',
    'field-repeat-pass' => 'Pakartoti slaptažodį:',

    'button-update-manager' => 'Išsaugoti',

    'create-manager' => 'Pridėti menedžerį',
    'field-password' => 'Slaptažodis:',
    'button-create-manager' => 'Išsaugoti',


    // Users

    'button-add-user' => 'Pridėti vartotoją',
    'edit-user' => 'Keisti vartotojo nustatymus',
    'button-update-user' => 'Išsaugoti',
    'create-user' => 'Naujas vartotojas',
    'button-create-user' => 'Išsaugoti',

    // Settings

    'setting-day_fare' => 'Dieninis tarifas:',
    'setting-night_fare' => 'Naktinis tarifas:',
    'setting-start_date' => 'Pradžios data:',
    'setting-emails' => 'Siųsti el. laiškus:',
    'button-update-info' => 'Išsaugoti',

    // Profile

    'profile-edit' => 'Vartotojo nustatymai',
    'button-update' => 'Išsaugoti',


    /* ***********************
    * Manager
    *********************** */

    // Urgent requests

    'near-user-fixes' => 'pataisymų',
    'table-date' => 'DATA',
    'table-day' => 'DIENA',
    'no-urgent-requests' => 'Nėra pavėluotų patvirtinimų',

    // Timesheet

    'all-users' => 'Visi vartotojai',

    // Check by date

    'change-day' => 'Keisti dieną',

    // Fixes

    'select-week-for-fixes' => 'Pasirinkite savaitę',
    'table-begins' => 'PRADŽIA',
    'add-fix-for-week' => 'Pridėti pataisymą šiai savaitei',
    'show-fixes' => 'Rodyti pataisymus',
    'fixes-list-for-week' => 'Savaitės pataisymai',
    'all-weeks' => 'Visos savaitės',
    'add-fix-week' => 'Pridėti pataisymą savaitei',
    'form-user' => 'Vartotojas:',
    'form-sum' => 'Suma (£):',
    'form-comment' => 'Komentaras:',
    'add-this-fix' => 'Išsaugoti pataisymą',
    'edit-fix' => 'Keisti pataisymą',
    'save-this-fix' => 'Išsaugoti pataisymą',
    'fixes-list-for-user' => 'Pataisymai vartotojo',
    'show-all-fixes' => 'Rodyti visus pataisymus',

    // Users

    // Profile


    /* ***********************
    * User
    *********************** */

    // Timesheet

    'button-resubmit' => 'Pateikti',
    'button-submit' => 'Pateikti',


    /* ***********************
    * Controllers messages
    *********************** */

    // DayController

    'time-submitted' => 'Darbo pamainos užklausa pateikta!',
    'record-approved' => 'Užklausa sėkmingai patvirtinta!',
    'record-cancelled' => 'Užklausa pašalita!',

    // FixesController

    'fix-added' => 'Pataisymas sėkmingai pridėtas!',
    'fix-updated' => 'Pataisymas sėkmingai pakeistas!',

    // ManagerController

    'manager-added' => 'Naujas menedžeris sėkmingai pridėtas!',
    'manager-updated' => 'Menedžerio informacija išsaugota!',
    'manager-deleted' => 'Menedžeris sėkmingai pašalintas!',

    // SettingsController

    'settings-updated' => 'Nustatymai išsaugoti!',

    // TimesheetController

    'information-updated' => 'Informacija sėkmingai pakeista!',

    // UsersController

    'user-added' => 'Naujas vartotojas sėkmingai pridėtas!',
    'user-updated' => 'Vartotojo informacija išsaugota!',
    'user-deleted' => 'Vartotojas pašalintas!',

    // WeekController

    'payroll-paid' => 'Payroll periodas sėkmingai patvirtintas',

    // Days

    'days.Sunday' => 'Sekmadienis',
    'days.Saturday' => 'Šeštadienis',
    'days.Friday' => 'Penktadienis',
    'days.Thursday' => 'Ketvirtadienis',
    'days.Wednesday' => 'Trečiadienis',
    'days.Tuesday' => 'Antradienis',
    'days.Monday' => 'Pirmadienis',
];
