<?php

return [

    /* ***********************
    * Navigation
    *********************** */
    'page' => 'WORKING',
    'timesheet' => 'Darbo grafikas',
    'users' => 'Vartotojai',
    'profile' => 'Paskyra',
    'logout' => 'Atsijungti',

    // Admin
    'payroll' => 'Periodai',
    'managers' => 'Vadovai',
    'settings' => 'Nustatymai',

    // Manager
    'urgent-requests' => 'Laukia patvirtinimo',
    'check-by-date' => 'Pagal datą',
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
    'table-salaries' => 'MOKĖJIMAS',
    'table-fixes' => 'PATAISYMAI',
    'table-total' => 'VISO',
    'table-show' => 'PERIODO IŠMOKĖJIMAI',
    'table-status' => 'BŪSENA',

    'status-current' => 'EINAMASIS',
    'status-approved' => 'PATVIRTINTA',
    'pending-requests' => 'nepatvirtintų užklausų',

    'button-approve' => 'Patvirtinti',

    'week' => 'Savaitė',

    'by-user' => 'Pagal vartotoją',
    'by-day' => 'Pagal dieną',
    'only-fixes' => 'Pataisymai',

    'date' => 'DATA',
    'day' => 'DIENA',
    'status' => 'BŪSENA',
    'earned' => 'MOKĖJIMAS',
    'worked' => 'PAMAINA',

    'status-not-submitted' => 'NEPATEIKTA',
    'status-cancelled' => 'ATMESTA',
    'status-waiting-approval' => 'LAUKIAMA PATVIRTINIMO',

    'day-shift' => 'Dieninė pamaina',
    'night-shift' => 'Naktinė pamaina',

    'table-fix' => 'PATAISYMAS',

    'comment' => 'Komentaras:',
    'total' => 'VISO:',

    'table-user' => 'VARTOTOJAS',
    'table-worked' => 'PAMAINA',
    'table-earned' => 'MOKĖJIMAS',
    'table-sum' => 'SUMA',
    'table-comment' => 'KOMENTARAS',

    // Managers

    'button-add-manager' => 'Pridėti vadovą',
    'table-name' => 'VARDAS',
    'table-email' => 'EL. PAŠTAS',
    'table-phone' => 'TELEFONAS',
    'table-actions' => 'VEIKSMAI',
    'button-edit' => 'Keisti',
    'are-you-sure' => 'Ar tikrai norite atlikti šį veiksmą?',
    'button-delete' => 'Pašalinti',
    'button-reject' => 'Atmesti',
    'edit-manager' => 'Keisti vadovo informaciją',

    'field-name' => 'Vardas:',
    'field-surname' => 'Pavardė:',
    'field-email' => 'El. paštas:',
    'field-phone' => 'Telefonas:',
    'field-new-pass' => 'Naujas slaptažodis:',
    'field-repeat-pass' => 'Pakartoti slaptažodį:',

    'button-update-manager' => 'Išsaugoti',

    'create-manager' => 'Pridėti vadovą',
    'field-password' => 'Slaptažodis:',
    'button-create-manager' => 'Išsaugoti',


    // Users

    'button-add-user' => 'Pridėti vartotoją',
    'edit-user' => 'Keisti vartotojo informaciją',
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

    'near-user-fixes' => 'pataisymai',
    'table-date' => 'DATA',
    'table-day' => 'DIENA',
    'no-urgent-requests' => 'Nėra pavėluotų patvirtinimų',

    // Timesheet

    'all-users' => 'Visi vartotojai',

    // Check by date

    'change-day' => 'Keisti dieną',

    // Fixes

    'select-week-for-fixes' => 'Pataisymai pagal periodą',
    'table-begins' => 'PRADŽIA',
    'add-fix-for-week' => 'Pridėti naują',
    'show-fixes' => 'Rodyti esamus',
    'fixes-list-for-week' => 'Savaitės pataisymai',
    'all-weeks' => 'Rodyti visus periodus',
    'add-fix-week' => 'Pridėti pataisymą periodui',
    'form-user' => 'Vartotojas:',
    'form-sum' => 'Suma (£):',
    'form-comment' => 'Komentaras:',
    'add-this-fix' => 'Išsaugoti',
    'edit-fix' => 'Keisti pataisymo detales',
    'save-this-fix' => 'Išsaugoti pakeitimus',
    'fixes-list-for-user' => 'Pataisymai vartotojo',
    'show-all-fixes' => 'Rodyti visus pataisymus',
    'period' => 'Periodas',

    // Users

    // Profile


    /* ***********************
    * User
    *********************** */

    // Timesheet

    'button-resubmit' => 'Pakeisti',
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

    'manager-added' => 'Naujas vadovas sėkmingai pridėtas!',
    'manager-updated' => 'Vadovo informacija išsaugota!',
    'manager-deleted' => 'Vadovas sėkmingai pašalintas!',

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

    'search-user' => 'Ieškoti vartotojo',

    // Password reset

    'reset-password' => 'Slaptažodžio atkurimas',
    'form-confirm-pass' => 'Patvirtinti slpatažodį',
    'button-send-pass-reset' => 'Atkurti slaptažodį',

    'table-language' => 'KALBA',
    'form-lang' => 'Kalba'
];
